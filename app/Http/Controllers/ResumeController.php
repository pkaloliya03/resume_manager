<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resume;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{

    public function index()
    {
        $resumes = Resume::with('user')->get(); // Eager loading user data
        return view('admin.resumes', compact('resumes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'resume' => 'required|mimes:pdf,doc,docx|max:2048'
        ]);

        $fileName = time() . '_' . $request->file('resume')->getClientOriginalName();
        $filePath = $request->file('resume')->storeAs('resumes', $fileName, 'public');

        Resume::create([
            'user_id' => Auth::id(),
            'filename' => $fileName,  // Use filename instead of file_path
            'file_path' => $filePath
        ]);

        return back()->with('success', 'Resume uploaded successfully!');
    }

    public function destroy($id)
    {
        $resume = Resume::find($id);

        if (!$resume) {
            return redirect()->route('admin.resumes')->with('error', 'Resume not found!');
        }

        // Delete the file from storage
        Storage::delete($resume->file_path);

        // Delete record from the database
        $resume->delete();

        return redirect()->route('admin.resumes')->with('success', 'Resume deleted successfully!');
    }
}
