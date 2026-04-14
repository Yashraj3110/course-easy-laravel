<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string ...$roles): mixed
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();
        if (!in_array($user->role, $roles)) {
            abort(403, 'Unauthorized. You do not have access to this area.');
        }

        // If user is instructor but not approved, redirect to or block access
        if ($user->role === 'instructor' && !$user->is_approved) {
             // We can redirect to a specific "Wait for Approval" page or just abort.
             // Given the project structure, let's just show an error message for now.
             abort(403, 'Your instructor account is pending approval by the admin.');
        }

        return $next($request);
    }
}
