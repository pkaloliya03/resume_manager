<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Edit User</h2>
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Middle Name</label>
                <input type="text" name="middle_name" class="form-control" value="{{ $user->middle_name }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Date of Birth</label>
                <input type="text" name="dob" class="form-control" 
                    value="{{ old('dob', \Carbon\Carbon::parse($user->dob)->format('d-m-Y')) }}" required>
            </div>                        

            <div class="mb-3">
                <label class="form-label">Age</label>
                <input type="number" name="age" class="form-control" value="{{ $user->age }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Gender</label>
                <select name="gender" class="form-control">
                    <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                    <option value="Other" {{ $user->gender == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Role</label>
                <input type="text" name="role" class="form-control" value="{{ $user->role }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Education</label>
                <input type="text" name="education" class="form-control" value="{{ $user->education }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Experience</label>
                <input type="text" name="experience" class="form-control" value="{{ $user->experience }}">
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancel</a>
            <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-secondary">Back to Users</a>
        </form>
    </div>
</body>

</html>
