<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Job;
use App\Models\JobApplication;

class AdminAuthController extends Controller
{
    // Admin Registration
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:8|confirmed',
        ]);

        // Create Admin
        $admin = Admin::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Auto-login the admin after registration (optional)
        Auth::guard('admin')->login($admin);

        // Redirect to dashboard
        return redirect()->route('admin.home')->with('success', 'Registration successful! Welcome to the admin panel.');
    }

    // Show Login Form
    public function showLoginForm()
    {
        return view('admin.admin_login');
    }

    // Handle Admin Login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Attempt login using Laravel's built-in method
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.home')->with('success', 'Login successful!');
        }

        return back()->with('error', 'Invalid email or password.');
    }

    // Admin Logout
    public function logout()
    {
        Auth::guard('admin')->logout(); // Proper logout method
        return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
    }
    
    // Admin Dashboard
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalJobs = Job::count();
        $totalApplications = JobApplication::count(); 

        return view('admin.admin_home', compact('totalUsers', 'totalJobs', 'totalApplications'));
    }
}
