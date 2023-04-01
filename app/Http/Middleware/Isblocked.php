<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Isblocked
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request,Closure $next): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (
                Auth::getDefaultDriver() == 'admin' &&
                Auth::guard('admin')->check() &&
                Auth::guard($guard)->user()->is_blocked == '1'
            ) {
                Auth::guard('admin')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()
                    ->route('admin.login.view')
                    ->with('error', 'Your account is blocked');
            }

            if (
                Auth::getDefaultDriver() == 'doctor' &&
                Auth::guard('doctor')->check() &&
                Auth::guard($guard)->user()->is_blocked == '1'
            ) {
                Auth::guard('doctor')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()
                    ->route('doctor.login.view')
                    ->with('error', 'Your account is blocked');
            }

            if (
                Auth::getDefaultDriver() == 'web' &&
                Auth::guard('web')->check() &&
                     Auth::guard($guard)->user()->is_blocked == '1'

            ) {
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()
                    ->route('login')
                    ->with('error', 'Your account is blocked');
            }

    }
        return $next($request);
    }
}
