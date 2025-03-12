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
        $request->validate([
            'title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'education' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'salary' => 'nullable|numeric',
        ]);

        Job::create([
            'title' => $request->title,
            'company_name' => $request->company_name,
            'education' => $request->education,
            'experience' => $request->experience,
            'description' => $request->description,
            'location' => $request->location,
            'salary' => $request->salary,
        ]);

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
            'title' => 'required',
            'company_name' => 'required',
            'education' => 'required',
            'experience' => 'required',
            'description' => 'required',
            'location' => 'required',
            'salary' => 'nullable|numeric',
        ]);

        $job->update($request->all());

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
}
