@extends('admin.layout')

@section('content')
<div class="p-6">
    <h1 class="font-bold mb-6 text-center text-2xl text-gray-800">Registered Users</h1>

    <div class="overflow-x-auto bg-white p-6 shadow-lg rounded-lg">
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-800 text-white text-left">
                    <th class="p-3 border border-gray-300">ID</th>
                    <th class="p-3 border border-gray-300">First Name</th>
                    <th class="p-3 border border-gray-300">Middle Name</th>
                    <th class="p-3 border border-gray-300">Last Name</th>
                    <th class="p-3 border border-gray-300">Age</th>
                    <th class="p-3 border border-gray-300">Gender</th>
                    <th class="p-3 border border-gray-300">Role</th>
                    <th class="p-3 border border-gray-300">Education</th>
                    <th class="p-3 border border-gray-300">Experience</th>
                    <th class="p-3 border border-gray-300 text-center">Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($users as $user)
                <tr class="border border-gray-300 hover:bg-gray-100 transition duration-200">
                    <td class="p-3 border border-gray-300">{{ $user->id }}</td>
                    <td class="p-3 border border-gray-300">{{ $user->first_name }}</td>
                    <td class="p-3 border border-gray-300">{{ $user->middle_name }}</td>
                    <td class="p-3 border border-gray-300">{{ $user->last_name }}</td>
                    <td class="p-3 border border-gray-300">{{ $user->age }}</td>
                    <td class="p-3 border border-gray-300">{{ $user->gender }}</td>
                    <td class="p-3 border border-gray-300">{{ $user->role }}</td>
                    <td class="p-3 border border-gray-300">{{ $user->education }}</td>
                    <td class="p-3 border border-gray-300">{{ $user->experience }}</td>
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
