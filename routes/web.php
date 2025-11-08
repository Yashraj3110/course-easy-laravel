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

Route::get('/register', [AuthController::class, 'showLoginForm'])->name('register');
// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');
