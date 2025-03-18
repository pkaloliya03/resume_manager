@extends('admin.layout')

@section('content')
<div class="p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-xl font-bold mb-4">Edit Job</h2>

    @if(session('success'))
    <p class="text-green-500">{{ session('success') }}</p>
    @endif

    <form action="{{ route('admin.jobs.update', $job->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Job Title -->
        <div class="mb-4">
            <label class="block text-gray-700">Job Title</label>
            <input type="text" name="title" value="{{ $job->title }}" class="w-full p-2 border rounded" required>
        </div>

        <!-- Company Name -->
        <div class="mb-4">
            <label class="block text-gray-700">Company Name</label>
            <input type="text" name="company_name" value="{{ $job->company_name }}" class="w-full p-2 border rounded" required>
        </div>

        <!-- Education -->
        <div class="mb-4">
            <label class="block text-gray-700">Education</label>
            <input type="text" name="education" value="{{ $job->education }}" class="w-full p-2 border rounded" required>
        </div>

        <!-- Experience -->
        <div class="mb-4">
            <label class="block text-gray-700">Experience</label>
            <input type="text" name="experience" value="{{ $job->experience }}" class="w-full p-2 border rounded" required>
        </div>

        <!-- Location -->
        <div class="mb-4">
            <label class="block text-gray-700">Location</label>
            <input type="text" name="location" value="{{ $job->location }}" class="w-full p-2 border rounded" required>
        </div>

        <!-- Salary -->
        <div class="mb-4">
            <label class="block text-gray-700">Salary</label>
            <input type="number" name="salary" value="{{ $job->salary }}" class="w-full p-2 border rounded" step="0.01" min="0">
        </div>

        <!-- Job Type -->
        <div class="mb-4">
            <label class="block text-gray-700">Job Type</label>
            <select name="job_type" class="w-full p-2 border rounded" required>
                <option value="Full-time" {{ $job->job_type == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                <option value="Part-time" {{ $job->job_type == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                <option value="Internship" {{ $job->job_type == 'Internship' ? 'selected' : '' }}>Internship</option>
            </select>
        </div>

        <!-- Work Mode -->
        <div class="mb-4">
            <label class="block text-gray-700">Work Mode</label>
            <select name="work_mode" class="w-full p-2 border rounded" required>
                <option value="On-site" {{ $job->work_mode == 'On-site' ? 'selected' : '' }}>On-site</option>
                <option value="Remote" {{ $job->work_mode == 'Remote' ? 'selected' : '' }}>Remote</option>
                <option value="Hybrid" {{ $job->work_mode == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
            </select>
        </div>

        <!-- Required Skills -->
        <div class="mb-4">
            <label class="block text-gray-700">Required Skills</label>
            <input type="text" name="required_skills" value="{{ $job->required_skills }}" class="w-full p-2 border rounded" placeholder="E.g., Laravel, PHP, ReactJS" required>
        </div>

        <!-- Last Date to Apply -->
        <div class="mb-4">
            <label class="block text-gray-700">Last Date to Apply</label>
            <input type="date" name="last_date_to_apply" value="{{ $job->last_date_to_apply }}" class="w-full p-2 border rounded" required>
        </div>

        <!-- HR Contact Name -->
        <div class="mb-4">
            <label class="block text-gray-700">HR Contact Name</label>
            <input type="text" name="hr_contact_name" value="{{ $job->hr_contact_name }}" class="w-full p-2 border rounded" required>
        </div>

        <!-- HR Email -->
        <div class="mb-4">
            <label class="block text-gray-700">HR Email</label>
            <input type="email" name="hr_email" value="{{ $job->hr_email }}" class="w-full p-2 border rounded" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            Update Job
        </button>

        <a href="{{ route('admin.jobs.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Back to Jobs</a>
    </form>
</div>
@endsection