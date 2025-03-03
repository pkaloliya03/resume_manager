
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduNeuroHRx</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="w-full max-w-lg bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center mb-4">User Registration</h2>

        <!-- Show Validation Errors -->
        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Oops! </strong>
            <ul class="mt-2">
                @foreach ($errors->all() as $error)
                <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


        <form id="registrationForm" method="POST" action="{{ route('register') }}">
            @csrf

            <div class="grid grid-cols-3 gap-2 mb-3">
                <div>
                    <label class="block font-semibold">First Name</label>
                    <input type="text" name="first_name" class="w-full h-8 p-2 border rounded" required>
                </div>
                <div>
                    <label class="block font-semibold">Middle Name</label>
                    <input type="text" name="middle_name" class="w-full h-8 p-2 border rounded">
                </div>
                <div>
                    <label class="block font-semibold">Last Name</label>
                    <input type="text" name="last_name" class="w-full h-8 p-2 border rounded" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="block font-semibold">Date of Birth</label>
                <input type="date" name="dob" class="w-full h-8 p-2 border rounded" required>
            </div>

            <div class="mb-3">
                <label class="block font-semibold">Age</label>
                <input type="number" name="age" class="w-full h-8 p-2 border rounded" required>
            </div>

            <div class="mb-3">
                <label class="block font-semibold">Gender</label>
                <select name="gender" class="w-full border rounded h-10 p-2">
                    <option value="">Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="block font-semibold">Email</label>
                <input type="email" name="email" class="w-full h-8 p-2 border rounded" required>
            </div>

            <div class="mb-3 relative">
                <label class="block font-semibold">Password</label>
                <div class="relative">
                    <input type="password" name="password" id="password" class="w-full h-8 p-2 pr-10 border rounded" required>
                    <button type="button" onclick="togglePassword('password', 'togglePasswordIcon')" class="absolute right-2 top-2">
                        <i id="togglePasswordIcon" class="fa fa-eye-slash text-gray-600"></i>
                    </button>
                </div>
            </div>

            <div class="mb-3 relative">
                <label class="block font-semibold">Confirm Password</label>
                <div class="relative">
                    <input type="password" name="password_confirmation" id="confirmPassword" class="w-full h-8 p-2 pr-10 border rounded" required>
                    <button type="button" onclick="togglePassword('confirmPassword', 'toggleConfirmPasswordIcon')" class="absolute right-2 top-2">
                        <i id="toggleConfirmPasswordIcon" class="fa fa-eye-slash text-gray-600"></i>
                    </button>
                </div>
                <p id="passwordError" class="text-red-500 text-sm hidden">Passwords do not match or must be at least 8 characters</p>
            </div>

            <div class="flex gap-3 mb-3">
                <label class="flex-1 p-2 text-center bg-blue-500 text-white rounded cursor-pointer">
                    <input type="radio" id="studentBtn" name="role" value="student" class="hidden"> Student
                </label>
                <label class="flex-1 p-2 text-center bg-green-500 text-white rounded cursor-pointer">
                    <input type="radio" id="employeeBtn" name="role" value="employee" class="hidden"> Employee
                </label>
            </div>

            <div id="studentFields" class="hidden mb-3">
                <label class="block font-semibold">Education Qualification</label>
                <select name="education" id="education" class="w-full h-10 px-3 border rounded">
                    <option value="">Select</option>
                    <option value="10th">10th</option>
                    <option value="Diploma/12th">Diploma/12th</option>
                    <option value="Graduation">Graduation</option>
                    <option value="Post-Graduation">Post-Graduation</option>
                </select>
            </div>

            <div id="employeeFields" class="hidden mb-3">
                <label class="block font-semibold">Experience (in years)</label>
                <input type="text" name="experience" id="experience" class="w-full h-8 p-2 border rounded">
            </div>

            <button type="submit" id="register" class="w-full p-2 bg-blue-600 text-white rounded">Register</button>
        </form>
    </div>

    <script>
        document.getElementById("studentBtn").addEventListener("change", function() {
            document.getElementById("studentFields").classList.remove("hidden");
            document.getElementById("employeeFields").classList.add("hidden");
            document.getElementById("experience").value = ""; // Clear experience field
        });

        document.getElementById("employeeBtn").addEventListener("change", function() {
            document.getElementById("employeeFields").classList.remove("hidden");
            document.getElementById("studentFields").classList.add("hidden");
            document.getElementById("education").value = ""; // Clear education field
        });

        function togglePassword(inputId, iconId) {
            let inputField = document.getElementById(inputId);
            let icon = document.getElementById(iconId);
            if (inputField.type === "password") {
                inputField.type = "text";
                icon.classList.replace("fa-eye-slash", "fa-eye");
            } else {
                inputField.type = "password";
                icon.classList.replace("fa-eye", "fa-eye-slash");
            }
        }
    </script>
</body>

</html>