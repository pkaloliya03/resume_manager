@extends('admin.layout')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h2 class="text-2xl font-bold mb-6">Admin Dashboard</h2>

        <div class="grid grid-cols-3 gap-6">
            <div class="bg-blue-500 text-white p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold">Total Users</h3>
                <p class="text-3xl font-bold">{{ $totalUsers }}</p>
            </div>

            <div class="bg-green-500 text-white p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold">Total Jobs</h3>
                <p class="text-3xl font-bold">{{ $totalJobs }}</p>
            </div>

            <div class="bg-purple-500 text-white p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold">Total Applications</h3>
                <p class="text-3xl font-bold">{{ $totalApplications }}</p>
            </div>
        </div>
    </div>
@endsection
