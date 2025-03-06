<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();

        return view('admin.dashboard', compact('totalUsers'));
    }
}
