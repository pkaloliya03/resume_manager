@extends('admin.layout')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="font-bold mb-4 text-center text-xl">Manage Jobs</h1>

    @if(session('success'))
    <div class="bg-green-500 text-white p-3 mb-4">
        {{ session('success') }}
    </div>
    @endif

    <div class="overflow-x-auto bg-white p-4 shadow-md rounded-lg">
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead class="bg-gray-200 text-gray-700">
                <tr class="border border-gray-300">
                    <th class="py-3 px-4 text-left">ID</th>
                    <th class="py-3 px-4 text-left">Title</th>
                    <th class="py-3 px-4 text-left">Company</th>
                    <th class="py-3 px-4 text-left">Education</th>
                    <th class="py-3 px-4 text-left">Experience</th>
                    <th class="py-3 px-4 text-left">Location</th>
                    <th class="py-3 px-4 text-left">Salary</th>
                    <th class="py-3 px-4 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jobs as $job)
                <tr class="border border-gray-300">
                    <td class="py-3 px-4">{{ $job->id }}</td>
                    <td class="py-3 px-4 font-semibold">{{ $job->title }}</td>
                    <td class="py-3 px-4">{{ $job->company_name }}</td>
                    <td class="py-3 px-4">{{ $job->education }}</td>
                    <td class="py-3 px-4">{{ $job->experience }}</td>
                    <td class="py-3 px-4">{{ $job->location }}</td>
                    <td class="py-3 px-4">₹{{ number_format($job->salary, 2) ?? 'N/A' }}</td>
                    <td class="py-3 px-4 text-center flex justify-center space-x-2">
                        <a href="{{ route('admin.jobs.edit', $job->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded text-sm">Edit</a>
                        <form action="{{ route('admin.jobs.destroy', $job->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded text-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <br>
    <a href="{{ route('admin.jobs.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add New Job</a>
</div>
@endsection
