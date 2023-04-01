<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::getDefaultDriver() == 'doctor' && Auth::guard($guard)->check()) {
                $status = Auth::guard($guard)->user()->status;
                if ($status == 0 || $status == 1 || $status == 3) {
                    $message = '';
                    $alert = 'danger';
                    switch ($status) {
                        case '0':
                            $alert = 'alert alert-primary';
                            $message = 'Your account is not verified';
                            break;
                        case '1':
                            $alert = 'alert alert-warning';
                            $message = 'Your account is not approved by admin';
                            break;
                        case '3':
                            $alert = 'alert alert-danger';
                            $message = 'Your account is blocked by admin';
                            break;
                        default:
                            $message = '';
                            break;
                    };
                    Auth::guard('doctor')->logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return redirect()
                        ->route('doctor.login.view')
                        ->withInput($request->only('email', 'remember'))
                        ->with('error', $message)
                        ->with('alert', $alert);
                }
            }

            if (Auth::getDefaultDriver() == 'web' && Auth::guard($guard)->check()) {
                $status = Auth::guard($guard)->user()->status;
                if ($status == 0 || $status == 1 || $status == 3) {
                    $message = '';
                    $alert = 'danger';
                    switch ($status) {
                        case '0':
                            $alert = 'alert alert-primary';
                            $message = 'Your account is not verified';
                            break;
                        case '1':
                            $alert = 'alert alert-warning';
                            $message = 'Your account is not approved by admin';
                            break;
                        case '3':
                            $alert = 'alert alert-danger';
                            $message = 'Your account is suspended by admin';
                            break;
                        default:
                            $message = '';
                            break;
                    };
                    Auth::guard('web')->logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return redirect()
                        ->route('login')
                        ->withInput($request->only('email', 'remember'))
                        ->with('error', $message)
                        ->with('alert', $alert);
                }
            }

            return $next($request);
        }
    }
}
