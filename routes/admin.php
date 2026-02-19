<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Admin Dashboard
Route::get('/adash', fn() => view('Dashboards.admin.home'))
    ->name('dashboard.admin.home');

Route::get('/ausers', [AdminController::class, 'users'])
    ->name('dashboard.admin.users');

Route::get('/content', [AdminController::class, 'content'])
    ->name('dashboard.admin.content');

Route::get('/financials', fn() => view('Dashboards.admin.finance'))
    ->name('dashboard.admin.financials');

Route::get('/logs', fn() => view('Dashboards.admin.logs'))
    ->name('dashboard.admin.logs');
