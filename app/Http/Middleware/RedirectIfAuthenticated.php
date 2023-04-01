<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string...$guards)
    {
        // dd('RedirectIfAuthenticated');

        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {

            // if (Auth::guard($guard)->check()) {
            //     return redirect(RouteServiceProvider::HOME);
            // }
            if (Auth::getDefaultDriver() == 'admin' && Auth::guard('admin')->check()) {
                return redirect('/admin/dashboard');
            }
            if (Auth::getDefaultDriver() == 'doctor' && Auth::guard('doctor')->check()) {
                return redirect('/doctor/dashboard');
            }
            if (Auth::getDefaultDriver() == 'web' && Auth::guard('web')->check()) {
                // return redirect(RouteServiceProvider::HOME);
                return redirect('/dashboard');
            }

        }

        return $next($request);
    }
}
