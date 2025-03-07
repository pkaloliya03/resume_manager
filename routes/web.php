<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminUserController;


Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/jobs', function () {
    return view('jobs');
})->name('jobs');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/admin/register', function () {
    return view('admin.admin_register');
})->name('admin.register');

Route::post('/admin/register', [AdminAuthController::class, 'register'])->name('admin.register.submit');

Route::get('/admin/login', function () {
    return view('admin.admin_login');
})->name('admin.login');

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
Route::middleware(['auth:admin'])->group(function () {
    Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/layout', function () {
        return view('admin.layout');
    })->name('admin.layout');
});

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/layout', [AdminDashboardController::class, 'index'])->name('admin.layout');
});

Route::get('/admin/users', function () {
    return view('admin.users');
})->name('admin.users');

Route::prefix('admin')->group(function () {
    Route::get('/users', [AdminUserController::class, 'showUsers'])->name('admin.users.index');
    Route::get('/users/{id}', [AdminUserController::class, 'singleUser'])->name('admin.users.show');
    Route::get('/users/{id}/edit', [AdminUserController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/users/{id}', [AdminUserController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/users/{id}', [AdminUserController::class, 'deleteUser'])->name('admin.users.destroy');
});




