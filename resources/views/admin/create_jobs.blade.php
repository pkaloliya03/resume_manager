@extends('admin.layout')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Add Job</h2>

    <form action="{{ route('admin.jobs.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf

        <!-- Job Title -->
        <label class="block mb-2">Job Title:</label>
        <input type="text" name="title" class="border p-2 w-full mb-4" required>

        <!-- Company Name -->
        <label class="block mb-2">Company Name:</label>
        <input type="text" name="company_name" class="border p-2 w-full mb-4" required>

        <!-- Education Level -->
        <label class="block mb-2">Education Level:</label>
        <input type="text" name="education" class="border p-2 w-full mb-4" required>

        <!-- Experience -->
        <label class="block mb-2">Experience:</label>
        <input type="text" name="experience" class="border p-2 w-full mb-4" required>

        <!-- Location -->
        <label class="block mb-2">Location:</label>
        <input type="text" name="location" class="border p-2 w-full mb-4" required>

        <!-- Salary -->
        <label class="block mb-2">Salary:</label>
        <input type="number" name="salary" class="border p-2 w-full mb-4" step="0.01" min="0">

        <!-- Job Type -->
        <label class="block mb-2">Job Type:</label>
        <select name="job_type" class="border p-2 w-full mb-4" required>
            <option value="Full-time">Full-time</option>
            <option value="Part-time">Part-time</option>
            <option value="Internship">Internship</option>
        </select>

        <!-- Work Mode -->
        <label class="block mb-2">Work Mode:</label>
        <select name="work_mode" class="border p-2 w-full mb-4" required>
            <option value="On-site">On-site</option>
            <option value="Remote">Remote</option>
            <option value="Hybrid">Hybrid</option>
        </select>

        <!-- Required Skills -->
        <label class="block mb-2">Required Skills:</label>
        <input type="text" name="required_skills" class="border p-2 w-full mb-4" placeholder="E.g., Laravel, PHP, ReactJS" required>

        <!-- Last Date to Apply -->
        <label class="block mb-2">Last Date to Apply:</label>
        <input type="date" name="last_date_to_apply" class="border p-2 w-full mb-4" required>

        <!-- HR Contact Name -->
        <label class="block mb-2">HR Contact Name:</label>
        <input type="text" name="hr_contact_name" class="border p-2 w-full mb-4" required>

        <!-- HR Email -->
        <label class="block mb-2">HR Email:</label>
        <input type="email" name="hr_email" class="border p-2 w-full mb-4" required>

        <!-- Buttons -->
        <div class="flex space-x-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save Job</button>
            <a href="{{ route('admin.jobs.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Back to Jobs</a>
        </div>
    </form>
</div>
@endsection
