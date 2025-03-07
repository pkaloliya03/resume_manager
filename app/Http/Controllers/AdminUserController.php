<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminUserController extends Controller
{
    public function showUsers()
    {
        $users = DB::table('users')->get();
        return view('admin.users', ['users' => $users]);
    }

    public function singleUser(string $id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        if (!$user) {
            abort(404, 'User not found');
        }

        return view('admin.single_user', ['user' => $user]);
    }

    public function editUser($id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        if (!$user) {
            return redirect()->route('admin.users.index')->with('error', 'User not found.');
        }

        return view('admin.update_user', compact('user')); // Use 'admin.update_user' instead of 'admin.edit_user'
    }


    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'age' => 'required|integer',
            'gender' => 'required|string',
            'education' => 'nullable|string|max:255',
            'experience' => 'nullable|string|max:255',
        ]);

        DB::table('users')->where('id', $id)->update([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'age' => $request->age,
            'gender' => $request->gender,
            'education' => $request->education,
            'experience' => $request->experience,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function deleteUser($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
