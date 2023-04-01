<?php

namespace App\Http\Controllers\Doctor\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:doctor')->except('logout');
    }
    public function showDoctorLoginForm()
    {
        if (Auth::guard('doctor')->check()) {
            return redirect()->route('doctor.dashboard');
        } else {
            return view('doctor.auth.login');
        }
    }

    public function doctorLogin(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);
        $email = $request->email;
        $password = $request->password;
        $rememberToken = $request->remember;

        // if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
        if (Auth::guard('doctor')->attempt(['email' => $email, 'password' => $password], $rememberToken)) {
            $user = \Auth::guard('doctor')->user();
            return redirect()->intended('/doctor');
        } else {
            return redirect()->back()->withInput($request->only('email', 'remember'))->with('error', 'Invalid email or password');
        }

    }

    public function logout(Request $request)
    {
        Auth::guard('doctor')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // return redirect()->route('doctor.login.view');
        return $request->wantsJson()
        ? new JsonResponse([], 204)
        : redirect()->route('doctor.login.view');
    }

}
