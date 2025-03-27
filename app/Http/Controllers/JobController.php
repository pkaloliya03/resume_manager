<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Resume;
use Carbon\Carbon;

class JobController extends Controller
{
    // Show all jobs (Admin Panel)
    public function index()
    {
        $jobs = Job::with('applications')->get(); // Fetch jobs with their applications
        return view('admin.admin_jobs', compact('jobs'));
    }

    // Show job creation form (Admin Panel)
    public function create()
    {
        return view('admin.create_jobs');
    }

    // Store new job in the database (Admin Panel)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'education' => 'required|string',
            'experience' => 'required|string',
            'location' => 'required|string',
            'salary' => 'nullable|string|max:255', // Ensure it's string, not numeric
            'job_type' => 'required|in:Full-time,Part-time,Internship',
            'work_mode' => 'required|in:On-site,Remote,Hybrid',
            'required_skills' => 'required|string',
            'last_date_to_apply' => 'required|date',
            'hr_contact_name' => 'required|string|max:255',
            'hr_email' => 'required|email|unique:jobs,hr_email'
        ]);

        Job::create($validated);

        return redirect()->route('admin.jobs.index')->with('success', 'Job added successfully.');
    }

    // Show edit form (Admin Panel)
    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('admin.edit_job', compact('job'));
    }

    // Update job details (Admin Panel)
    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'education' => 'required|string',
            'experience' => 'required|string',
            'location' => 'required|string',
            'salary' => 'required|string|max:255',
            'job_type' => 'required|in:Full-time,Part-time,Internship',
            'work_mode' => 'required|in:On-site,Remote,Hybrid',
            'required_skills' => 'required|string',
            'last_date_to_apply' => 'required|date',
            'hr_contact_name' => 'required|string|max:255',
            'hr_email' => 'required|email|unique:jobs,hr_email,' . $id
        ]);

        $job->update($request->all());

        return redirect()->route('admin.jobs.index')->with('success', 'Job updated successfully.');
    }

    // Delete a job (Admin Panel)
    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();

        return redirect()->route('admin.jobs.index')->with('success', 'Job deleted successfully.');
    }

    // Show all available jobs (User Side)
    public function showJobs()
    {
        $jobs = Job::latest()->get();
        return view('jobs', compact('jobs'));
    }

    // Show job application form (User Side)
    public function apply($jobId)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to log in to apply.');
        }

        $job = Job::findOrFail($jobId);
        return view('jobs.apply', compact('job'));
    }

    // View single job details (User Side)
    public function view($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs_view', compact('job'));
    }

    // Apply for a Job (User)
    public function checkApplication($jobId)
    {
        $hasApplied = JobApplication::where('user_id', Auth::id())
            ->where('job_id', $jobId)
            ->exists();

        return response()->json(['hasApplied' => $hasApplied]);
    }

    // public function submitApplication($jobId)
    // {

    //     if (!Auth::check()) {
    //         return redirect()->route('login')->with('error', 'You need to log in to apply for a job.');
    //     }

    //     $user = Auth::user();


    //     $hasResume = Resume::where('user_id', $user->id)->exists();
    //     if (!$hasResume) {
    //         return redirect()->back()->withErrors(['resume' => 'You must upload your resume before applying for a job.']);
    //     }


    //     $hasApplied = JobApplication::where('user_id', $user->id)->where('job_id', $jobId)->exists();
    //     if ($hasApplied) {
    //         return redirect()->back()->with('error', 'You have already applied for this job.');
    //     }


    //     JobApplication::create([
    //         'user_id' => $user->id,
    //         'job_id' => $jobId,
    //     ]);

    //     return redirect()->back()->with('success', 'You have successfully applied for the job.');
    // }

    public function submitApplication($jobId)
    {
        // Check if user is logged in
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to log in to apply for a job.');
        }

        $user = Auth::user();

        // Check if the user has uploaded a resume
        $hasResume = Resume::where('user_id', $user->id)->exists();
        if (!$hasResume) {
            return redirect()->back()->withErrors(['resume' => 'You must upload your resume before applying for a job.']);
        }

        // Check if the user has already applied
        $hasApplied = JobApplication::where('user_id', $user->id)->where('job_id', $jobId)->exists();
        if ($hasApplied) {
            return redirect()->back()->with('error', 'You have already applied for this job.');
        }

        // Create job application with the applied_on date
        JobApplication::create([
            'user_id' => $user->id,
            'job_id' => $jobId,
            'applied_on' => Carbon::now(), // Store current timestamp
        ]);

        return redirect()->back()->with('success', 'You have successfully applied for the job.');
    }


    // Show all job applications (Admin Panel)
    public function showApplications()
    {
        $applications = JobApplication::with(['user', 'job'])->latest()->get();
        return view('admin.applications', compact('applications'));
    }
}
