@extends('admin.layout')

@section('content')
<div class="p-6">
    <h1 class="font-bold mb-6 text-center text-2xl text-gray-800">Contact Messages</h1>

    <div class="overflow-x-auto bg-white p-6 shadow-lg rounded-lg">
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-800 text-white text-left">
                    <th class="p-3 border border-gray-300 text-center">ID</th>
                    <th class="p-3 border border-gray-300 text-center">Name</th>
                    <th class="p-3 border border-gray-300 text-center">Phone</th>
                    <th class="p-3 border border-gray-300 text-center">Email</th>
                    <th class="p-3 border border-gray-300 text-center">Message</th>
                    <th class="p-3 border border-gray-300 text-center">Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($contacts as $contact)
                <tr class="border border-gray-300 hover:bg-gray-100 transition duration-200">
                    <td class="p-3 border border-gray-300 text-center">{{ $contact->id }}</td>
                    <td class="p-3 border border-gray-300 text-center font-bold">{{ $contact->name }}</td>
                    <td class="p-3 border border-gray-300 text-center">{{ $contact->phone }}</td>
                    <td class="p-3 border border-gray-300 text-center">{{ $contact->email }}</td>
                    <td class="p-3 border border-gray-300 text-center">{{ $contact->message }}</td>
                    <td class="p-3 border border-gray-300 text-center">
                        <form action="{{ route('admin.contacts.delete', $contact->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?');">
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
