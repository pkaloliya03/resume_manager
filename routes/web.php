<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\AdminJobController;


Route::get('/', function () {
    return view('index');
})->name('home');

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

Route::get('/forgot-password', function () {
    return view('auth.forgot_password');
})->name('password.request');
Route::post('/password-verify', [AuthController::class, 'verifyEmail'])->name('password.verify');
Route::get('/reset-password', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/password-update', [AuthController::class, 'updatePassword'])->name('password.update');

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/home', function () {
        return view('admin.admin_home');
    })->name('admin.home');
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

Route::prefix('admin')->group(function () {
    Route::get('/resumes', [ResumeController::class, 'index'])->name('admin.resumes');
    Route::delete('/resumes/{id}', [ResumeController::class, 'destroy'])->name('admin.resumes.destroy');
});

// Admin Job Management Routes
Route::prefix('admin')->group(function () {
    Route::get('/jobs', [JobController::class, 'index'])->name('admin.jobs.index');
    Route::get('/jobs/create', [JobController::class, 'create'])->name('admin.jobs.create');
    Route::post('/jobs', [JobController::class, 'store'])->name('admin.jobs.store');
    Route::get('/jobs/{id}/edit', [JobController::class, 'edit'])->name('admin.jobs.edit');
    Route::put('/jobs/{id}', [JobController::class, 'update'])->name('admin.jobs.update');
    Route::delete('/jobs/{id}', [JobController::class, 'destroy'])->name('admin.jobs.destroy');
    Route::get('/jobs/applications', [JobController::class, 'viewApplications'])->name('admin.jobs.applications');
});

// Public Job Listing and Application Routes
Route::get('/jobs', [JobController::class, 'showJobs'])->name('jobs.list');
Route::get('/job/view/{id}', [JobController::class, 'view'])->name('job_view');

// Job Application Routes (No Middleware)
Route::get('/apply/{job}', [JobController::class, 'apply'])->name('job.apply');
Route::post('/apply/{job}', [JobController::class, 'submitApplication'])->name('job.submitapplication');
Route::get('/check-application/{job}', [JobController::class, 'checkApplication'])->name('job.checkApplication');

// Resume Upload
Route::post('/resume/store', [ResumeController::class, 'store'])->name('resume.store');

// Admin Job Applications Handling
Route::prefix('admin')->group(function () {
    Route::get('/applications', [AdminJobController::class, 'applications'])->name('admin.applications');
    Route::post('/applications/{id}/approve', [AdminJobController::class, 'approve'])->name('admin.applications.approve');
    Route::post('/applications/{id}/reject', [AdminJobController::class, 'reject'])->name('admin.applications.reject');
    Route::delete('/applications/{id}', [AdminJobController::class, 'destroy'])->name('admin.applications.destroy');
});

