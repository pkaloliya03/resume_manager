<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobApplication;

class AdminJobController extends Controller
{
    // Display all applications
    public function applications()
    {
        $applications = JobApplication::with('user', 'job')->get();
        return view('admin.applications', compact('applications'));
    }

    // Approve an application
    public function approveApplication($id)
    {
        $application = JobApplication::findOrFail($id);
        $application->status = 'Approved';
        $application->save();

        return back()->with('success', 'Job application approved successfully.');
    }

    // Reject an application
    public function rejectApplication($id)
    {
        $application = JobApplication::findOrFail($id);
        $application->status = 'Rejected';
        $application->save();

        return back()->with('error', 'Job application rejected.');
    }

    public function destroy($id)
    {
        $application = JobApplication::findOrFail($id);
        $application->delete();

        return redirect()->route('admin.applications')->with('success', 'Job application deleted successfully.');
    }
}
