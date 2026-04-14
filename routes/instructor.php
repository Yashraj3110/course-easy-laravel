<?php

use App\Http\Controllers\InstructorController;
use App\Http\Controllers\InstructorProfileController;
use Illuminate\Support\Facades\Route;

// Instructor Dashboard
Route::get('/idash', [InstructorController::class, 'home'])
    ->name('dashboard.instructor.home');


Route::middleware('auth')->group(function () {

    Route::get('/mycourses', [InstructorProfileController::class, 'myCourses'])
        ->name('dashboard.instructor.courses');
    Route::get('/instructor/courses/create', [InstructorProfileController::class, 'create'])->name('courses.create');
    Route::get('/instructor/courses/{course}/edit', [InstructorProfileController::class, 'course_edit'])
        ->name('courses.edit');

    Route::get('/instructor/courses/{course}', [InstructorProfileController::class, 'show']);

    Route::post('/instructor/courses', [InstructorProfileController::class, 'store']); // CREATE

    Route::post('/instructor/courses/{course}', [InstructorProfileController::class, 'updatecourse']); // UPDATE
});

Route::get('/instructor/quizzes', [InstructorProfileController::class, 'quiz_index'])
    ->name('instructor.quizzes.index');

Route::get('/instructor/quizzes/{quiz}/fetch', [InstructorProfileController::class, 'quiz_fetch'])
    ->name('instructor.quizzes.fetch');

Route::post('/instructor/quizzes/store', [InstructorProfileController::class, 'quiz_store'])
    ->name('instructor.quizzes.store');

Route::post('/instructor/quizzes/{quiz}/update', [InstructorProfileController::class, 'quiz_update'])
    ->name('instructor.quizzes.update');
    

Route::get('/curriculum', fn() => view('Dashboards.instructor.curriculum'))
    ->name('dashboard.instructor.curriculum');

Route::get('/analytics', [InstructorController::class, 'analytics'])->name('dashboard.instructor.analytics');
Route::get('/enrollments', [InstructorController::class, 'enrollments'])->name('dashboard.instructor.enrollments');
Route::get('/reviews', [InstructorController::class, 'reviews'])->name('dashboard.instructor.reviews');

Route::middleware(['auth'])->group(function () {
    Route::get('/instructor/profile', [InstructorProfileController::class, 'edit'])->name('dashboard.instructor.profile');
    Route::post('/instructor/profile', [InstructorProfileController::class, 'update'])->name('instructor.profile.update');
});
