<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// Student Dashboard Home
Route::get('/sdash', fn() => view('Dashboards.student.home'))
    ->name('dashboard.student.home');

// My Courses
Route::get('/student/courses', fn() => view('Dashboards.student.my-courses'))
    ->name('dashboard.student.courses');

// Certificates
Route::get('/certificates', fn() => view('Dashboards.student.certificates'))
    ->name('dashboard.student.certificates');

// Settings
Route::get('/settings', fn() => view('Dashboards.student.settings'))
    ->name('dashboard.student.settings');

// Discussions
Route::get('/discussions', fn() => view('Dashboards.student.discussions'))
    ->name('dashboard.student.discussions');

// Update Student Profile
Route::put('/student/profile', [StudentController::class, 'update'])
    ->name('student.profile.update');
