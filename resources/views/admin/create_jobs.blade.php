@extends('admin.layout')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Add Job</h2>

    <form action="{{ route('admin.jobs.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf

        <label class="block mb-2">Job Title:</label>
        <input type="text" name="title" class="border p-2 w-full mb-4" required>

        <label class="block mb-2">Company Name:</label>
        <input type="text" name="company_name" class="border p-2 w-full mb-4" required>

        <label class="block mb-2">Education Level:</label>
        <input type="text" name="education" class="border p-2 w-full mb-4" required>

        <label class="block mb-2">Experience (Years):</label>
        <input type="text" name="experience" class="border p-2 w-full mb-4" required>

        <label class="block mb-2">Description:</label>
        <textarea name="description" class="border p-2 w-full mb-4" required></textarea>

        <label class="block mb-2">Location:</label>
        <input type="text" name="location" class="border p-2 w-full mb-4" required>

        <label class="block mb-2">Salary (Optional):</label>
        <input type="number" name="salary" class="border p-2 w-full mb-4">

        <!-- Buttons -->
        <div class="flex space-x-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save Job</button>
            <a href="{{ route('admin.jobs.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Back to Jobs</a>
        </div>
    </form>
</div>
@endsection
