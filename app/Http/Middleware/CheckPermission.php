<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$permissions)
{
    // Assuming you store the user ID in the session during login
    $userId = session('user_id');

    if (!$userId) {
        return abort(403, 'Unauthorized action.');
    }

    $user = User::find($userId);

    foreach ($permissions as $permission) {
        if ($user->can($permission)) {
            return $next($request);
        }
    }

    return abort(403, 'Unauthorized action.');
}
}
