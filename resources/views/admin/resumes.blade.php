@extends('admin.layout')

@section('content')
<div class="p-6">
    <h1 class="font-bold mb-6 text-center text-2xl text-gray-800">Uploaded Resumes</h1>

    <div class="overflow-x-auto bg-white p-6 shadow-lg rounded-lg">
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-800 text-white text-left">
                    <th class="p-3 border border-gray-300 text-center">User ID</th>
                    <th class="p-3 border border-gray-300 text-center">Uploaded By</th>
                    <th class="p-3 border border-gray-300 text-center">Filename</th>
                    <th class="p-3 border border-gray-300 text-center">View</th>
                    <th class="p-3 border border-gray-300 text-center">Delete</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($resumes as $resume)
                <tr class="border border-gray-300 hover:bg-gray-100 transition duration-200">
                    <td class="p-3 border border-gray-300 text-center">{{ $resume->user ? $resume->user->id : 'Unknown' }}</td>
                    <td class="p-3 border border-gray-300 text-center font-bold">
                        {{ $resume->user ? $resume->user->first_name . ' ' . $resume->user->middle_name . ' ' . $resume->user->last_name : 'Unknown' }}
                    </td>
                    <td class="p-3 border border-gray-300 text-center">{{ basename($resume->file_path) }}</td>
                    <td class="p-3 border border-gray-300 text-center">
                        @php
                            $fileExtension = pathinfo($resume->file_path, PATHINFO_EXTENSION);
                            $fileUrl = Storage::url($resume->file_path); // Ensure correct public URL
                        @endphp
                    
                        @if ($fileExtension === 'pdf')
                            <!-- Open PDFs directly in the browser -->
                            <a href="{{ asset($resume->file_path) }}" target="_blank" class="bg-green-500 hover:bg-green-600 text-white px-4 py-1 rounded shadow">
                                <i class="fas fa-eye"></i> View
                            </a>
                        @elseif (in_array($fileExtension, ['doc', 'docx']))
                            <!-- Open Word files in Google Docs Viewer -->
                            <a href="https://docs.google.com/gview?url={{ url($fileUrl) }}&embedded=true" target="_blank" class="bg-green-500 hover:bg-green-600 text-white px-4 py-1 rounded shadow">
                                <i class="fas fa-eye"></i> View
                            </a>
                        @else
                            <!-- Show a generic download link for unsupported file types -->
                            <a href="{{ asset($resume->file_path) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-1 rounded shadow" download>
                                <i class="fas fa-download"></i> Download
                            </a>
                        @endif
                    </td>                                        
                    <td class="p-3 border border-gray-300 text-center">
                        <form action="{{ route('admin.resumes.destroy', $resume->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this resume?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-1 rounded shadow">
                                <i class="fas fa-trash"></i> Delete
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