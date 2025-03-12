@extends('admin.layout')

@section('content')
<div class="p-6">
    <h1 class="font-bold mb-4 text-center text-xl">Registered Users</h1>
    <div class="overflow-x-auto bg-white p-4 shadow-md rounded-lg">
        <table class="table-auto w-full border border-gray-300">
            <thead class="bg-gray-200">
                <tr class="border border-gray-300">
                    <th class="p-2 border border-gray-300">ID</th>
                    <th class="p-2 border border-gray-300">First Name</th>
                    <th class="p-2 border border-gray-300">Middle Name</th>
                    <th class="p-2 border border-gray-300">Last Name</th>
                    <th class="p-2 border border-gray-300">Age</th>
                    <th class="p-2 border border-gray-300">Gender</th>
                    <th class="p-2 border border-gray-300">Role</th>
                    <th class="p-2 border border-gray-300">Education</th>
                    <th class="p-2 border border-gray-300">Experience</th>
                    <th class="p-2 border border-gray-300">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="border border-gray-300">
                    <td class="p-2 border border-gray-300">{{ $user->id }}</td>
                    <td class="p-2 border border-gray-300">{{ $user->first_name }}</td>
                    <td class="p-2 border border-gray-300">{{ $user->middle_name }}</td>
                    <td class="p-2 border border-gray-300">{{ $user->last_name }}</td>
                    <td class="p-2 border border-gray-300">{{ $user->age }}</td>
                    <td class="p-2 border border-gray-300">{{ $user->gender }}</td>
                    <td class="p-2 border border-gray-300">{{ $user->role }}</td>
                    <td class="p-2 border border-gray-300">{{ $user->education }}</td>
                    <td class="p-2 border border-gray-300">{{ $user->experience }}</td>
                    <td class="p-2 border border-gray-300">
                        <a href="{{ route('admin.users.show', $user->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded">View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
