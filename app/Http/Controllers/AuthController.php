<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show Register Form
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validate Input
        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'age' => 'required|integer|min:1',
            'gender' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:student,employee',
            'education' => $request->role === 'student' ? 'required|string|max:255' : 'nullable',
            'experience' => $request->role === 'employee' ? 'required|string|max:255' : 'nullable',
        ]);

        // Check if user already exists
        if (User::where('email', $request->email)->exists()) {
            return redirect()->back()->withErrors(['email' => 'This email is already registered.'])->withInput();
        }

        // Create User
        User::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'dob' => $request->dob,
            'age' => $request->age,
            'gender' => $request->gender,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'education' => $request->role === 'student' ? $request->education : null,
            'experience' => $request->role === 'employee' ? $request->experience : null,
        ]);

        // ✅ Redirect to login with success message
        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
    }



    // Show Login Form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validate user input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Attempt login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home'); // Redirect to index.blade.php on success
        }

        // If authentication fails, return back with error
        return back()->withErrors(['email' => 'Invalid email or password'])->withInput();
    }

    // Handle Logout

    public function logout(Request $request)
    {
        Auth::logout(); // Log the user out

        // Invalidate the session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logged out successfully!');
    }
}
