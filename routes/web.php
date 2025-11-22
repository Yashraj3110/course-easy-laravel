<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


// in routes/web.php
Route::get('/home', function () {
    return view('pages.home');
})->name('home');
// in routes/web.php
Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/courses', function () {
    return view('pages.courses');
})->name('courses');

Route::get('/course/page', function () {
    return view('pages.coursedetail');
})->name('course.details');

Route::get('/course/player', function () {
    return view('pages.course-player');
})->name('course.player');

Route::get('/course/quiz', function () {
    return view('pages.course-quiz');
})->name('course.quiz');

Route::get('/course/discuss', function () {
    return view('pages.course-discuss');
})->name('course.discuss');


Route::get('/Dasboard', function () {
    return view('pages.Dashboards');
})->name('pages.dash');

Route::get('/sdash', function () {
    return view('Dashboards.student.home');
})->name('dashboard.student.home');

// My Courses
Route::get('/student/courses', function () {
    return view('Dashboards.student.my-courses');
})->name('dashboard.student.courses');

// Certificates
Route::get('/certificates', function () {
    return view('Dashboards.student.certificates');
})->name('dashboard.student.certificates');

Route::get('/settings', function () {
    return view('Dashboards.student.settings');
})->name('dashboard.student.settings');

Route::get('/discussions', function () {
    return view('Dashboards.student.discussions');
})->name('dashboard.student.discussions');

Route::get('/adash', function () {
    return view('Dashboards.admin.home');
})->name('dashboard.admin.home');

Route::get('/ausers', function () {
    return view('Dashboards.admin.users');
})->name('dashboard.admin.users');

Route::get('/content', function () {
    return view('Dashboards.admin.content');
})->name('dashboard.admin.content');

Route::get('/financials', function () {
    return view('Dashboards.admin.finance');
})->name('dashboard.admin.financials');

Route::get('/logs', function () {
    return view('Dashboards.admin.logs');
})->name('dashboard.admin.logs');



Route::get('/idash', function () {
    return view('Dashboards.instructor.home');
})->name('dashboard.instructor.home');

Route::get('/mycourses', function () {
    return view('Dashboards.instructor.mycourses');
})->name('dashboard.instructor.courses');

Route::get('/newcourses', function () {
    return view('Dashboards.instructor.newcourse');
})->name('dashboard.instructor.newcourses');

Route::get('/curriculam', function () {
    return view('Dashboards.instructor.curriculam');
})->name('dashboard.instructor.curriculam');

Route::get('/enrollments', function () {
    return view('Dashboards.instructor.enrollments');
})->name('dashboard.instructor.enrollments');

Route::get('/assignments', function () {
    return view('Dashboards.instructor.assignments');
})->name('dashboard.instructor.assignments');

Route::get('/messages', function () {
    return view('Dashboards.instructor.messages');
})->name('dashboard.instructor.messages');

Route::get('/reviews', function () {
    return view('Dashboards.instructor.reviews');
})->name('dashboard.instructor.reviews');

Route::get('/profile', function () {
    return view('Dashboards.instructor.profile');
})->name('dashboard.instructor.profile');

Route::get('/account', function () {
    return view('Dashboards.instructor.account');
})->name('dashboard.instructor.account');

Route::get('/analytics', function () {
    return view('Dashboards.instructor.analytics');
})->name('dashboard.instructor.analytics');

Route::get('/register', [AuthController::class, 'showLoginForm'])->name('register');
// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');
