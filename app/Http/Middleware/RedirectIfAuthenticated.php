<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $role = Auth::user()->user_role;
            switch ($role) {
                case 1:
                    return redirect()->intended('/admin');
                    break;
                case 2:
                    return redirect()->intended('/project_uploader');
                    break;
                case 3:
                    return redirect()->intended('/engineer');
                    break;
                case 4:
                    return redirect()->intended('/company');
                    break;
            }
        }

        return $next($request);
    }
}
