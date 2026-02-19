<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Session;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Support\Facades\Auth;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = Auth::user();

        // Store required user details in session
        Session::put('user', [
            'id'    => $user->id,
            'name'  => $user->name,
            'email' => $user->email,
            'role'  => $user->role,
        ]);

        // Redirect based on role
        return match ($user->role) {
            'superadmin' => redirect()->route('dashboard.admin.home'),
            'instructor' => redirect()->route('dashboard.instructor.home'),
            'student'    => redirect()->route('home'),
            default      => redirect('/home'),
        };
    }
}
