@extends('admin.layout')

@section('content')
    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg p-6 mt-5">
        <h2 class="text-2xl font-bold text-center text-600 mb-6">Edit User</h2>

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-1">First Name</label>
                <input type="text" name="first_name" class="w-full p-2 border rounded-lg focus:outline-blue-500"
                    value="{{ $user->first_name }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-1">Middle Name</label>
                <input type="text" name="middle_name" class="w-full p-2 border rounded-lg focus:outline-blue-500"
                    value="{{ $user->middle_name }}">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-1">Last Name</label>
                <input type="text" name="last_name" class="w-full p-2 border rounded-lg focus:outline-blue-500"
                    value="{{ $user->last_name }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-1">Date of Birth</label>
                <input type="text" name="dob" class="w-full p-2 border rounded-lg focus:outline-blue-500"
                    value="{{ old('dob', \Carbon\Carbon::parse($user->dob)->format('d-m-Y')) }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-1">Age</label>
                <input type="number" name="age" class="w-full p-2 border rounded-lg focus:outline-blue-500"
                    value="{{ $user->age }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-1">Gender</label>
                <select name="gender" class="w-full p-2 border rounded-lg focus:outline-blue-500">
                    <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                    <option value="Other" {{ $user->gender == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-1">Role</label>
                <select name="role" id="role" class="w-full p-2 border rounded-lg focus:outline-blue-500" required>
                    <option value="student" {{ $user->role == 'student' ? 'selected' : '' }}>Student</option>
                    <option value="employee" {{ $user->role == 'employee' ? 'selected' : '' }}>Employee</option>
                </select>
            </div>            

            <div class="mb-4" id="educationField">
                <label class="block text-gray-700 font-semibold mb-1">Education</label>
                <select name="education" id="education" class="w-full p-2 border rounded-lg focus:outline-blue-500">
                    <option value="">Select</option>
                    <option value="10th" {{ $user->education == '10th' ? 'selected' : '' }}>10th</option>
                    <option value="Diploma/12th" {{ $user->education == 'Diploma/12th' ? 'selected' : '' }}>Diploma/12th</option>
                    <option value="Graduation" {{ $user->education == 'Graduation' ? 'selected' : '' }}>Graduation</option>
                    <option value="Post-Graduation" {{ $user->education == 'Post-Graduation' ? 'selected' : '' }}>Post-Graduation</option>
                </select>
            </div>            

            <div class="mb-4" id="experienceField">
                <label class="block text-gray-700 font-semibold mb-1">Experience</label>
                <input type="text" name="experience" id="experience" class="w-full p-2 border rounded-lg focus:outline-blue-500"
                    value="{{ $user->experience }}">
            </div>

            <div class="flex justify-between">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
                    Update
                </button>
                <a href="{{ route('admin.users.index') }}"
                    class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
                    Cancel
                </a>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            function toggleFields() {
                let role = document.getElementById("role").value;
                let educationField = document.getElementById("educationField");
                let experienceField = document.getElementById("experienceField");
                let educationSelect = document.getElementById("education");
                let experienceInput = document.getElementById("experience");

                if (role === "student") {
                    educationField.style.display = "block";
                    educationSelect.setAttribute("required", "required");

                    experienceField.style.display = "none";
                    experienceInput.removeAttribute("required");
                    experienceInput.value = "";
                } else if (role === "employee") {
                    experienceField.style.display = "block";
                    experienceInput.setAttribute("required", "required");

                    educationField.style.display = "none";
                    educationSelect.removeAttribute("required");
                    educationSelect.value = "";
                }
            }

            document.getElementById("role").addEventListener("change", toggleFields);
            toggleFields();
        });
    </script>
@endsection
