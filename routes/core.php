<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Public / Core Pages


Route::get('/home', function () {
    if (Auth::check()) {
        $role = Auth::user()->role;

        return match ($role) {
            'superadmin' => redirect()->route('dashboard.admin.home'),
            'instructor' => redirect()->route('dashboard.instructor.home'),
            'student'    => view('pages.home'),
            default      => view('pages.home'),  // fallback
        };
    }

    return view('pages.home'); // show homepage to guests
})->name('home');


Route::fallback(function () {
    return redirect('/home');
});

Route::get('/courses', fn() => view('pages.courses'))->name('courses');

Route::get('/course/page', fn() => view('pages.coursedetail'))->name('course.details');

Route::get('/course/player', fn() => view('pages.course-player'))->name('course.player');

Route::get('/course/quiz', fn() => view('pages.course-quiz'))->name('course.quiz');

Route::get('/course/discuss', fn() => view('pages.course-discuss'))->name('course.discuss');

// General Dashboard
Route::get('/Dasboard', fn() => view('pages.Dashboards'))->name('pages.dash');
