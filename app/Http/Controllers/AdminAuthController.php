<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:8|confirmed',
        ]);

        // Create Admin
        Admin::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Flash success message
        return redirect()->route('admin.login')->with('success', 'Registered successfully! Please login.');
    }


    public function showLoginForm()
    {
        return view('admin.admin_login');
    }

    // Handle login request
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Attempt login using email and password
        $admin = Admin::where('email', $request->email)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return back()->with('error', 'Invalid email or password.');
        }

        // Login the admin
        Auth::guard('admin')->login($admin);

        // Redirect to dashboard
        return redirect()->route('admin.layout')->with('success', 'Login successful!');
    }


    // Admin logout
    public function logout()
    {
        Session::flush();
        return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
    }
}
