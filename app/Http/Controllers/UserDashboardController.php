<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Models\Resume;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Fetch applied jobs
        $appliedJobs = JobApplication::where('user_id', $user->id)->with('job')->get();

        // Fetch uploaded resume
        $resume = Resume::where('user_id', $user->id)->latest()->first();

        return view('dashboard', compact('appliedJobs', 'resume'));
    }

    public function deleteResume()
    {
        $user = Auth::user();
        $resume = Resume::where('user_id', $user->id)->latest()->first();

        if ($resume) {
            Storage::delete($resume->file_path);
            $resume->delete();
        }

        return redirect()->back()->with('success', 'Resume deleted successfully.');
    }
}

