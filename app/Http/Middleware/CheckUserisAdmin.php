<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserisAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        error_log("CheckUserisAdmin");
        error_log($request->path());
        if(strtolower($request->session()->get("user_role")) == 'admin') {
            return $next($request);
        }
        return redirect()->route("home");
    }
}
