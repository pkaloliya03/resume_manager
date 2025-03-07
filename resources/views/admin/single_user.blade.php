<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">User Details</h2>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td>{{ $user->id }}</td>
            </tr>
            <tr>
                <th>First Name</th>
                <td>{{ $user->first_name }}</td>
            </tr>
            <tr>
                <th>Middle Name</th>
                <td>{{ $user->middle_name }}</td>
            </tr>
            <tr>
                <th>Last Name</th>
                <td>{{ $user->last_name }}</td>
            </tr>
            <tr>
                <th>Age</th>
                <td>{{ $user->age }}</td>
            </tr>
            <tr>
                <th>Gender</th>
                <td>{{ $user->gender }}</td>
            </tr>
            <tr>
                <th>Role</th>
                <td>{{ $user->role }}</td>
            </tr>
            <tr>
                <th>Education</th>
                <td>{{ $user->education }}</td>
            </tr>
            <tr>
                <th>Experience</th>
                <td>{{ $user->experience }}</td>
            </tr>
        </table>

        <!-- Update Button -->
        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">Update</a>

        <!-- Delete Button -->
        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?');">
                Delete
            </button>
        </form>

        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back to Users</a>
    </div>
</body>
</html>
