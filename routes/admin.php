<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('dashboard.admin.')->group(function () {

    Route::get('/home',       [AdminController::class, 'home'])->name('home');
    Route::get('/users',      [AdminController::class, 'users'])->name('users');
    Route::post('/users/{user}/toggle-role', [AdminController::class, 'userToggleRole'])->name('users.toggleRole');
    Route::post('/users/{user}/approve',     [AdminController::class, 'userApprove'])->name('users.approve');
    Route::delete('/users/{user}',           [AdminController::class, 'userDestroy'])->name('users.destroy');

    Route::get('/content',                          [AdminController::class, 'content'])->name('content');
    Route::post('/courses/{course}/approve',        [AdminController::class, 'approveCourse'])->name('courses.approve');
    Route::post('/courses/{course}/reject',         [AdminController::class, 'rejectCourse'])->name('courses.reject');

    Route::get('/financials', [AdminController::class, 'finance'])->name('financials');
    Route::get('/logs',       [AdminController::class, 'logs'])->name('logs');
});

/* ── Kept for backward compat (old /adash url) ─────────────────── */
Route::get('/adash', function () {
    return redirect()->route('dashboard.admin.home');
})->middleware(['auth', 'role:admin']);
