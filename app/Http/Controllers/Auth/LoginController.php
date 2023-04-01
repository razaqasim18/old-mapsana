<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/patient/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        // $this->middleware('guest:doctor')->except('logout');
    }

    public function showLoginForm()
    {
        if (Auth::guard('web')->check()) {
            return redirect()->route('patient.dashboard');
        } else {
            return view('patient.auth.login');
        }
    }

    public function login(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);
        $email = $request->email;
        $password = $request->password;
        $rememberToken = $request->remember;

        // if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
        if (Auth::guard('web')->attempt(['email' => $email, 'password' => $password], $rememberToken)) {
            $user = \Auth::guard('web')->user();
            return redirect()->intended('/patient/dashboard');
        } else {
            return redirect()->back()->withInput($request->only('email', 'remember'))->with('error', 'Invalid email or password');
        }

    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // return redirect()->route('doctor.login.view');
        return $request->wantsJson()
        ? new JsonResponse([], 204)
        : redirect()->route('login');
    }

}
