<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center mb-4">Reset Password</h2>

        @if(session('error'))
        <div class="mb-3 p-2 bg-red-100 text-red-600 rounded text-center">
            {{ session('error') }}
        </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="email" value="{{ $email }}">

            <!-- New Password Field -->
            <div class="mb-3 relative">
                <label class="block font-semibold mb-1">New Password</label>
                <div class="relative">
                    <input type="password" name="password" id="password" class="w-full h-10 p-2 border rounded pr-10" required>
                    <button type="button" onclick="togglePassword('password', 'toggleNewPass')" class="absolute inset-y-0 right-3 flex items-center">
                        <svg id="toggleNewPass" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                            <circle cx="12" cy="12" r="3"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Confirm Password Field -->
            <div class="mb-3 relative">
                <label class="block font-semibold mb-1">Confirm Password</label>
                <div class="relative">
                    <input type="password" name="password_confirmation" id="confirm_password" class="w-full h-10 p-2 border rounded pr-10" required>
                    <button type="button" onclick="togglePassword('confirm_password', 'toggleConfirmPass')" class="absolute inset-y-0 right-3 flex items-center">
                        <svg id="toggleConfirmPass" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                            <circle cx="12" cy="12" r="3"/>
                        </svg>
                    </button>
                </div>
            </div>

            <button type="submit" class="w-full p-2 bg-blue-600 text-white rounded">Reset Password</button>
        </form>
    </div>

    <script>
        function togglePassword(inputId, iconId) {
            let passwordField = document.getElementById(inputId);
            let icon = document.getElementById(iconId);

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
