@extends('admin.layout')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold text-center text-600 mb-6">User Details</h2>
    
    <table class="table-auto w-full border-collapse border border-gray-300 bg-white shadow-md">
        <tr class="border border-gray-300">
            <th class="p-2 border border-gray-300">ID</th>
            <td class="p-2 border border-gray-300 text-center">{{ $user->id ?? '-' }}</td>
        </tr>
        <tr class="border border-gray-300">
            <th class="p-2 border border-gray-300">First Name</th>
            <td class="p-2 border border-gray-300 text-center">{{ $user->first_name ?? '-' }}</td>
        </tr>
        <tr class="border border-gray-300">
            <th class="p-2 border border-gray-300">Middle Name</th>
            <td class="p-2 border border-gray-300 text-center">{{ $user->middle_name ?? '-' }}</td>
        </tr>
        <tr class="border border-gray-300">
            <th class="p-2 border border-gray-300">Last Name</th>
            <td class="p-2 border border-gray-300 text-center">{{ $user->last_name ?? '-' }}</td>
        </tr>
        <tr class="border border-gray-300">
            <th class="p-2 border border-gray-300">Date Of Birth</th>
            <td class="p-2 border border-gray-300 text-center">
                {{ $user->dob ? \Carbon\Carbon::parse($user->dob)->format('d-m-Y') : '-' }}
            </td>
        </tr>        
        <tr class="border border-gray-300">
            <th class="p-2 border border-gray-300">Age</th>
            <td class="p-2 border border-gray-300 text-center">{{ $user->age ?? '-' }}</td>
        </tr>
        <tr class="border border-gray-300">
            <th class="p-2 border border-gray-300">Gender</th>
            <td class="p-2 border border-gray-300 text-center">{{ $user->gender ?? '-' }}</td>
        </tr>
        <tr class="border border-gray-300">
            <th class="p-2 border border-gray-300">Role</th>
            <td class="p-2 border border-gray-300 text-center">{{ $user->role ?? '-' }}</td>
        </tr>
        <tr class="border border-gray-300">
            <th class="p-2 border border-gray-300">Education</th>
            <td class="p-2 border border-gray-300 text-center">{{ $user->education ?? '-' }}</td>
        </tr>
        <tr class="border border-gray-300">
            <th class="p-2 border border-gray-300">Experience</th>
            <td class="p-2 border border-gray-300 text-center">{{ $user->experience ?? '-' }}</td>
        </tr>
    </table>

    <!-- Buttons Section -->
    <div class="mt-4 flex space-x-4">
        <a href="{{ route('admin.users.edit', $user->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Update</a>
        
        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded" 
                onclick="return confirm('Are you sure you want to delete this user?');">
                Delete
            </button>
        </form>

        <a href="{{ route('admin.users.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Back to Users</a>
    </div>
</div>
@endsection
