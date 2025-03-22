<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduNeuroHRx - Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center mb-6">Admin Login</h2>

        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <p class="text-red-500 text-center">{{ session('error') }}</p>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- Password Field with Toggle -->
            <div class="mb-4 relative">
                <label class="block text-gray-700">Password</label>
                <div class="relative">
                    <input type="password" name="password" id="password" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 pr-10">
                    <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-3 flex items-center">
                        <svg id="toggleIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                            <circle cx="12" cy="12" r="3"/>
                        </svg>
                    </button>
                </div>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Login</button>
        </form>

        <p class="text-center mt-3">
            Don't have an account? <a href="{{ route('admin.register') }}" class="text-blue-600 font-semibold">Register here</a>
        </p>
    </div>

    <script>
        function togglePassword() {
            let passwordField = document.getElementById("password");
            let icon = document.getElementById("toggleIcon");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                icon.innerHTML = '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><path d="M12 15c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3"/>'; // Open Eye Icon
            } else {
                passwordField.type = "password";
                icon.innerHTML = '<path d="M17.94 17.94A10.06 10.06 0 0 1 12 20c-7 0-11-8-11-8s1.63-3.38 5-5m6-3c7 0 11 8 11 8s-1.2 2.48-3.73 4.4"/><line x1="1" y1="1" x2="23" y2="23"/>'; // Closed Eye Icon
            }
        }
    </script>
</body>

</html>
