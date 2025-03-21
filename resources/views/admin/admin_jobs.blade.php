@extends('admin.layout')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="font-bold mb-6 text-center text-2xl text-gray-800">Manage Jobs</h1>

    @if(session('success'))
    <div class="bg-green-500 text-white p-3 mb-4 rounded shadow">
        {{ session('success') }}
    </div>
    @endif

    <div class="overflow-x-auto bg-white p-6 shadow-lg rounded-lg">
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-800 text-white text-left">
                    <th class="py-3 px-4">ID</th>
                    <th class="py-3 px-4">Title</th>
                    <th class="py-3 px-4">Company</th>
                    <th class="py-3 px-4">Education</th>
                    <th class="py-3 px-4">Experience</th>
                    <th class="py-3 px-4">Location</th>
                    <th class="py-3 px-4">Salary</th>
                    <th class="py-3 px-4 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($jobs as $job)
                <tr class="border border-gray-300 hover:bg-gray-100 transition duration-200">
                    <td class="py-3 px-4">{{ $job->id }}</td>
                    <td class="py-3 px-4 font-semibold">{{ $job->title }}</td>
                    <td class="py-3 px-4">{{ $job->company_name }}</td>
                    <td class="py-3 px-4">{{ $job->education }}</td>
                    <td class="py-3 px-4">{{ $job->experience }}</td>
                    <td class="py-3 px-4">{{ $job->location }}</td>
                    <td class="py-3 px-4">
                        @if(preg_match('/\d/', $job->salary)) 
                            {!! preg_replace('/(\d[\d,.]*)/', '₹$1', $job->salary) !!}
                        @else 
                            {{ $job->salary ?? 'N/A' }}
                        @endif
                    </td>                                                           
                    <td class="py-3 px-4 text-center">
                        <div class="flex justify-center space-x-3">
                            <a href="{{ route('admin.jobs.edit', $job->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded shadow text-sm transition">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.jobs.destroy', $job->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this job?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded shadow text-sm transition">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6 text-center">
        <a href="{{ route('admin.jobs.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded shadow text-lg transition">
            <i class="fas fa-plus"></i> Add New Job
        </a>
    </div>
</div>
@endsection
