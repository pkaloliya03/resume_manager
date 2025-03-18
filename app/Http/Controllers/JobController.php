<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    // Show all jobs
    public function index()
    {
        $jobs = Job::all();
        return view('admin.admin_jobs', compact('jobs'));
    }

    // Show job creation form
    public function create()
    {
        return view('admin.create_jobs');
    }

    // Store new job in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'education' => 'required|string',
            'experience' => 'required|string',
            'location' => 'required|string',
            'salary' => 'nullable|numeric',
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

    // Show edit form
    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('admin.edit_job', compact('job'));
    }

    // Update job details
    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'education' => 'required|string',
            'experience' => 'required|string',
            'location' => 'required|string',
            'salary' => 'nullable|numeric',
            'job_type' => 'required|in:Full-time,Part-time,Internship',
            'work_mode' => 'required|in:On-site,Remote,Hybrid',
            'required_skills' => 'required|string',
            'last_date_to_apply' => 'required|date',
            'hr_contact_name' => 'required|string|max:255',
            'hr_email' => 'required|email|unique:jobs,hr_email,' . $id
        ]);

        // Update only the required columns
        $job->update([
            'title' => $request->input('title'),
            'company_name' => $request->input('company_name'),
            'education' => $request->input('education'),
            'experience' => $request->input('experience'),
            'location' => $request->input('location'),
            'salary' => $request->input('salary'),
            'job_type' => $request->input('job_type'),
            'work_mode' => $request->input('work_mode'),
            'required_skills' => $request->input('required_skills'),
            'last_date_to_apply' => $request->input('last_date_to_apply'),
            'hr_contact_name' => $request->input('hr_contact_name'),
            'hr_email' => $request->input('hr_email'),
        ]);

        return redirect()->route('admin.jobs.index')->with('success', 'Job updated successfully.');
    }

    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();

        return redirect()->route('admin.jobs.index')->with('success', 'Job deleted successfully.');
    }

    public function showJobs()
    {
        $jobs = Job::latest()->get(); // Fetch all jobs from the database
        return view('jobs', compact('jobs')); // Pass jobs to the view
    }

    public function apply($jobId)
    {
        $job = Job::findOrFail($jobId);
        return view('apply', compact('job'));
    }

    public function view($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs_view', compact('job'));
    }
}
