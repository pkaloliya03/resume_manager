@extends('admin.layout')

@section('content')
    <div class="p-6">
        <h1 class="font-bold mb-6 text-center text-2xl text-gray-800">Job Applications</h1>

        <div class="overflow-x-auto bg-white p-6 shadow-lg rounded-lg">
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-800 text-white text-left">
                        <th class="p-3 border border-gray-300 text-center">User ID</th>
                        <th class="p-3 border border-gray-300 text-center">User Name</th>
                        <th class="p-3 border border-gray-300 text-center">Company</th>
                        <th class="p-3 border border-gray-300 text-center">Job Title</th>
                        <th class="p-3 border border-gray-300 text-center">Resume</th>
                        <th class="p-3 border border-gray-300 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($applications as $application)
                        <tr class="border border-gray-300 hover:bg-gray-100 transition duration-200">
                            <td class="p-3 border border-gray-300 text-center">{{ $application->user->id }}</td>
                            <td class="p-3 border border-gray-300 text-center">
                                {{ $application->user->first_name }} {{ $application->user->last_name }}
                            </td>
                            <td class="p-3 border border-gray-300 text-center">{{ $application->job->company_name }}</td>
                            <td class="p-3 border border-gray-300 text-center">{{ $application->job->title }}</td>
                            <td class="p-3 border border-gray-300 text-center">
                                @if ($application->user->resume)
                                    <a href="{{ Storage::url($application->user->resume->file_path) }}" target="_blank"
                                        class="bg-green-500 hover:bg-green-600 text-white px-4 py-1 rounded shadow">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                @else
                                    <span class="text-red-500">No Resume Uploaded</span>
                                @endif
                            </td>
                            <td class="p-3 border border-gray-300 text-center">
                                <form action="{{ route('admin.applications.destroy', $application->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this application?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-1 rounded shadow">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
