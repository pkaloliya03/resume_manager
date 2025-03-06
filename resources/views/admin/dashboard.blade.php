<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduNeuroHRx</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white p-5 space-y-6">
            <h2 class="text-2xl font-bold">Admin Panel</h2>
            <nav>
                <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Home</a>
                <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">Users</a>
                <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">Jobs/Recruiters</a>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="block w-full text-left py-2 px-4 rounded hover:bg-gray-700">Logout</button>
                </form>

            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            @yield('content')
        </div>
    </div>
</body>

</html>