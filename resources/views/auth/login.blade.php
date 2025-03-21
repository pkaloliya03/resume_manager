<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center mb-4">User Login</h2>

        <!-- Success Message -->
        @if(session('success'))
        <div class="mb-3 p-2 bg-green-100 text-green-600 rounded">
            {{ session('success') }}
        </div>
        @endif

        <!-- Error Message -->
        @if ($errors->any())
        <div class="mb-3 p-2 bg-red-100 text-red-600 rounded">
            <p>{{ $errors->first('email') }}</p>
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label class="block font-semibold">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full h-8 p-2 border rounded" required>
            </div>
            <div class="mb-3">
                <label class="block font-semibold">Password</label>
                <input type="password" name="password" class="w-full h-8 p-2 border rounded" required>
            </div>

            <!-- Forgot Password Link -->
            <div class="text-right mb-3">
                <a href="{{ route('password.request') }}" class="text-blue-600 text-sm font-semibold hover:underline">Forgot Password?</a>
            </div>

            <button type="submit" class="w-full p-2 bg-blue-600 text-white rounded">Login</button>
        </form>

        <p class="text-center mt-3">
            Don't have an account? <a href="{{ route('register') }}" class="text-blue-600 font-semibold">Register here</a>
        </p>
    </div>
</body>

</html>
