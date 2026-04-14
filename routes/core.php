<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Public / Core Pages


Route::get('/', fn() => redirect('/home'));

Route::get('/home', function () {
    $latestEnrollment = null;
    if (Auth::check()) {
        $role = Auth::user()->role;
        if ($role === 'admin') return redirect()->route('dashboard.admin.home');
        if ($role === 'instructor') return redirect()->route('dashboard.instructor.home');
        
        // Fetch latest enrollment for student
        $latestEnrollment = \App\Models\Enrollment::where('user_id', Auth::id())
            ->with('course')
            ->latest()
            ->first();
    }

    $featuredCourses = \App\Models\Course::with('tutor')
        ->where('approval', 'approved')
        ->where('status', 'published')
        ->latest()
        ->take(3)
        ->get();

    return view('pages.home', compact('featuredCourses', 'latestEnrollment'));
})->name('home');

Route::fallback(fn() => redirect('/home'));

// These routes are now handled dynamically in student.php/instructor.php
// Route::get('/courses', fn() => view('pages.courses'))->name('courses');
// Route::get('/course/page', fn() => view('pages.coursedetail'))->name('course.details');

// General Dashboard
Route::get('/Dasboard', fn() => view('pages.Dashboards'))->name('pages.dash');

// Authentication Routes
use App\Http\Controllers\AuthController;
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/register', [AuthController::class, 'register'])->name('register');
