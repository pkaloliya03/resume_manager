@extends('admin.layout')

@section('content')
<div class="p-6">
    <h1 class="font-bold mb-6 text-center text-2xl text-gray-800">Registered Users</h1>

    <div class="overflow-x-auto bg-white p-6 shadow-lg rounded-lg">
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-800 text-white text-left">
                    <th class="p-3 border border-gray-300 text-center">ID</th>
                    <th class="p-3 border border-gray-300 text-center">First Name</th>
                    <th class="p-3 border border-gray-300 text-center">Middle Name</th>
                    <th class="p-3 border border-gray-300 text-center">Last Name</th>
                    <th class="p-3 border border-gray-300 text-center">Date Of Birth</th>
                    <th class="p-3 border border-gray-300 text-center">Age</th>
                    <th class="p-3 border border-gray-300 text-center">Gender</th>
                    <th class="p-3 border border-gray-300 text-center">Role</th>
                    <th class="p-3 border border-gray-300 text-center">Education</th>
                    <th class="p-3 border border-gray-300 text-center">Experience</th>
                    <th class="p-3 border border-gray-300 text-center">Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($users as $user)
                <tr class="border border-gray-300 hover:bg-gray-100 transition duration-200">
                    <td class="p-3 border border-gray-300 text-center">{{ $user->id }}</td>
                    <td class="p-3 border border-gray-300 text-center">{{ $user->first_name }}</td>
                    <td class="p-3 border border-gray-300 text-center">{{ $user->middle_name }}</td>
                    <td class="p-3 border border-gray-300 text-center">{{ $user->last_name }}</td>
                    <td class="p-3 border border-gray-300 text-center">
                        {{ \Carbon\Carbon::parse($user->dob)->format('d-m-Y') }}
                    </td>                    
                    <td class="p-3 border border-gray-300 text-center">{{ $user->age }}</td>
                    <td class="p-3 border border-gray-300 text-center">{{ $user->gender }}</td>
                    <td class="p-3 border border-gray-300 text-center">{{ $user->role }}</td>
                    <td class="p-3 border border-gray-300 text-center">
                        {{ $user->education ?? '-' }}
                    </td>
                    <td class="p-3 border border-gray-300 text-center">
                        {{ $user->experience ?? '-' }}
                    </td>
                    <td class="p-3 border border-gray-300 text-center">
                        <a href="{{ route('admin.users.show', $user->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-1 rounded shadow">
                            <i class="fas fa-eye"></i> View
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
