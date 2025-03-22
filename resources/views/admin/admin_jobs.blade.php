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
                    <th class="p-3 border border-gray-300 text-center">ID</th>
                    <th class="p-3 border border-gray-300 text-center">Title</th>
                    <th class="p-3 border border-gray-300 text-center">Company</th>
                    <th class="p-3 border border-gray-300 text-center">Education</th>
                    <th class="p-3 border border-gray-300 text-center">Experience</th>
                    <th class="p-3 border border-gray-300 text-center">Location</th>
                    <th class="p-3 border border-gray-300 text-center">Salary</th>
                    <th class="p-3 border border-gray-300 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($jobs as $job)
                <tr class="border border-gray-300 hover:bg-gray-100 transition duration-200">
                    <td class="p-3 border border-gray-300 text-center">{{ $job->id }}</td>
                    <td class="p-3 border border-gray-300 text-center">{{ $job->title }}</td>
                    <td class="p-3 border border-gray-300 text-center font-bold">{{ $job->company_name }}</td>
                    <td class="p-3 border border-gray-300 text-center">{{ $job->education }}</td>
                    <td class="p-3 border border-gray-300 text-center">{{ $job->experience }}</td>
                    <td class="p-3 border border-gray-300 text-center">{{ $job->location }}</td>
                    <td class="p-3 border border-gray-300 text-center font-bold">
                        @if(preg_match('/\d/', $job->salary)) 
                            {!! preg_replace('/(\d[\d,.]*)/', '₹$1', $job->salary) !!}
                        @else 
                            {{ $job->salary ?? 'N/A' }}
                        @endif
                    </td>                                                           
                    <td class="p-3 border border-gray-300 text-center">
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
