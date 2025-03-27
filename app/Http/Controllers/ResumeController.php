<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resume;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

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
            'resume' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        $user = Auth::user();
        $file = $request->file('resume');
        $originalName = $file->getClientOriginalName(); // Get Original File Name
        $filePath = $file->storeAs('resumes', $file->getClientOriginalName(), 'public'); // Store with Original Name

        Resume::create([
            'user_id' => $user->id,
            'file_path' => 'storage/resumes/' . $file->getClientOriginalName() // Adjust Path for Public Access
        ]);

        return redirect()->back()->with('success', 'Resume uploaded successfully.');
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
