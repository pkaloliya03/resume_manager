<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduNeuroHRx</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center mb-4">Forgot Password</h2>

        @if(session('error'))
        <div class="mb-3 p-2 bg-red-100 text-red-600 rounded text-center">
            {{ session('error') }}
        </div>
        @endif

        <form method="POST" action="{{ route('password.verify') }}">
            @csrf
            <div class="mb-3">
                <label class="block font-semibold">Enter Your Email</label>
                <input type="email" name="email" class="w-full h-8 p-2 border rounded" required>
            </div>

            <button type="submit" class="w-full p-2 bg-blue-600 text-white rounded">Verify Email</button>
        </form>

        <p class="text-center mt-3">
            Remembered your password? <a href="{{ route('login') }}" class="text-blue-600 font-semibold">Login here</a>
        </p>
    </div>
</body>

</html>
