<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminJobController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\ContactController;

Route::view('/', 'index')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
Route::view('/dashboard', 'dashboard')->name('dashboard');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::view('/forgot-password', 'auth.forgot_password')->name('password.request');
Route::post('/password-verify', [AuthController::class, 'verifyEmail'])->name('password.verify');
Route::get('/reset-password', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/password-update', [AuthController::class, 'updatePassword'])->name('password.update');

Route::get('/jobs', [JobController::class, 'showJobs'])->name('jobs.list');
Route::get('/job/view/{id}', [JobController::class, 'view'])->name('job_view');

Route::post('/resume/store', [ResumeController::class, 'store'])->name('resume.store');

Route::get('/apply/{job}', [JobController::class, 'apply'])->name('job.apply');
Route::post('/apply/{job}', [JobController::class, 'submitApplication'])->name('job.submitapplication');
Route::get('/check-application/{job}', [JobController::class, 'checkApplication'])->name('job.checkApplication');

Route::get('/admin/register', function () {
    return view('admin.admin_register');
})->name('admin.register');
Route::post('/admin/register', [AdminAuthController::class, 'register'])->name('admin.register.submit');

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    Route::get('/home', [AdminAuthController::class, 'dashboard'])->name('admin.home');

    Route::prefix('users')->group(function () {
        Route::get('/', [AdminUserController::class, 'showUsers'])->name('admin.users.index');
        Route::get('/{id}', [AdminUserController::class, 'singleUser'])->name('admin.users.show');
        Route::get('/{id}/edit', [AdminUserController::class, 'editUser'])->name('admin.users.edit');
        Route::put('/{id}', [AdminUserController::class, 'updateUser'])->name('admin.users.update');
        Route::delete('/{id}', [AdminUserController::class, 'deleteUser'])->name('admin.users.destroy');
    });

    Route::prefix('resumes')->group(function () {
        Route::get('/', [ResumeController::class, 'index'])->name('admin.resumes');
        Route::delete('/{id}', [ResumeController::class, 'destroy'])->name('admin.resumes.destroy');
    });

    Route::prefix('jobs')->group(function () {
        Route::get('/', [JobController::class, 'index'])->name('admin.jobs.index');
        Route::get('/create', [JobController::class, 'create'])->name('admin.jobs.create');
        Route::post('/', [JobController::class, 'store'])->name('admin.jobs.store');
        Route::get('/{id}/edit', [JobController::class, 'edit'])->name('admin.jobs.edit');
        Route::put('/{id}', [JobController::class, 'update'])->name('admin.jobs.update');
        Route::delete('/{id}', [JobController::class, 'destroy'])->name('admin.jobs.destroy');
        Route::get('/applications', [JobController::class, 'viewApplications'])->name('admin.jobs.applications');
    });

    Route::prefix('applications')->group(function () {
        Route::get('/', [AdminJobController::class, 'applications'])->name('admin.applications');
        Route::post('/{id}/approve', [AdminJobController::class, 'approve'])->name('admin.applications.approve');
        Route::post('/{id}/reject', [AdminJobController::class, 'reject'])->name('admin.applications.reject');
        Route::delete('/{id}', [AdminJobController::class, 'destroy'])->name('admin.applications.destroy');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::delete('/delete-resume', [UserDashboardController::class, 'deleteResume'])->name('delete.resume');
});

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    Route::get('/contacts', [ContactController::class, 'index'])->name('admin.contacts');
    Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('admin.contacts.delete');
});
    