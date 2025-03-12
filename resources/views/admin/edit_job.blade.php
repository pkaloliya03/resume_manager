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

        <div class="mb-4">
            <label class="block text-gray-700">Job Title</label>
            <input type="text" name="title" value="{{ $job->title }}" 
                   class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Company Name</label>
            <input type="text" name="company_name" value="{{ $job->company_name }}" 
                   class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Education</label>
            <input type="text" name="education" value="{{ $job->education }}" 
                   class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Experience (Years)</label>
            <input type="text" name="experience" value="{{ $job->experience }}" 
                   class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Description</label>
            <textarea name="description" class="w-full p-2 border rounded" required>{{ $job->description }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Location</label>
            <input type="text" name="location" value="{{ $job->location }}" 
                   class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Salary</label>
            <input type="text" name="salary" value="{{ $job->salary }}" 
                   class="w-full p-2 border rounded">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            Update Job
        </button>
    </form>
</div>
@endsection
