<?php

namespace App\Http\Responses;

use App\Contracts\FailedLoginResponse as FailedLoginResponseContract;

class FailedLoginResponse implements FailedLoginResponseContract
{
    public function toResponse($request)
    {
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Invalid credentials. Please try again.'
            ], 422);
        }

        return back()->withErrors([
            'email' => 'Invalid credentials'
        ]);
    }
}
