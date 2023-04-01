<?php

namespace App\Http\Controllers\Doctor\Auth;

use Anhskohbo\NoCaptcha\Facades\NoCaptcha;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Notifications\DoctorRegisterOTPNotification;
use Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Seshac\Otp\Otp;

class RegisterContoller extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/doctor/login';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showDoctorRegistrationForm()
    {
        if (Auth::guard('doctor')->check()) {
            return view('doctor.home');
        } else {
            return view('doctor.auth.register');
        }
    }

    public function registerDoctor(Request $request)
    {
        // $response = NoCaptcha::verifyResponse($request->input('g-recaptcha-response'));
        // if (!$response) {
        //     $array = [
        //         "grecaptcharesponse" => ["The Captcha field is required."],
        //     ];
        //     $obj = (object) $array;
        //     return response()->json([
        //         'type' => 0,
        //         'validator_error' => 1,
        //         'msg' => $obj,
        //     ]);
        // }
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'nid' => 'required|unique:doctors|max:255',
            'reg_no' => 'required|unique:doctors|max:255',
            'email' => 'required|unique:doctors|max:255',
            'dob' => 'required',
            // 'latlong' => 'required',
            'password' => 'required|min:8',
            'policy' => 'required',
            'terms' => 'required',
            'approval' => 'required',
            // 'g-recaptcha-response' => 'required|captcha',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'type' => 0,
                'validator_error' => 1,
                'msg' => $validator->errors(),
            ]);
        }

        $user = Doctor::create([
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'email' => $request->email,
            'nid' => $request->nid,
            'dob' => $request->dob,
            'reg_no' => $request->reg_no,
            'password' => Hash::make($request->password),
            // 'latlong' => str_replace(array('(', ')'), '', $request->latlong),
        ]);

        $otp = Otp::setValidity(30) // otp validity time in mins
            ->setLength(4) // Lenght of the generated otp
            ->setMaximumOtpsAllowed(10) // Number of times allowed to regenerate otps
            ->setOnlyDigits(true) // generated otp contains mixed characters ex:ad2312
        // ->setUseSameToken(true) // if you re-generate OTP, you will get same token
            ->generate($user->email, '1');

        $user->notify(new DoctorRegisterOTPNotification($otp->token));

        if ($user) {
            DB::commit();
            return response()->json([
                'type' => 1,
            ]);
        } else {
            DB::rollback();
            return response()->json([
                'type' => 0,
                'msg' => "Doctor is not register",
            ]);
        }
    }

    public function verifyOTPDoctor(Request $request)
    {
        $optnumber = '';
        foreach ($request->otpnumber as $row) {
            $optnumber .= $row;
        }
        $verify = Otp::validate($request->otpemail, '1', $optnumber);
        if ($verify->status) {
            Doctor::where('email', $request->otpemail)
                ->update([
                    'email_verified_at' => date('Y-m-d H:i:s'),
                    'status' => 1,
                ]);
            return response()->json([
                'type' => 1,
            ]);
        } else {
            return response()->json([
                'type' => 0,
                'msg' => $verify->message,
            ]);
        }
    }

    public function sendOTPDoctor($email)
    {
        $user = Doctor::where('email', $email)->first();
        $otp = Otp::setValidity(30) // otp validity time in mins
            ->setLength(4) // Lenght of the generated otp
            ->setMaximumOtpsAllowed(10) // Number of times allowed to regenerate otps
            ->setOnlyDigits(true) // generated otp contains mixed characters ex:ad2312
        // ->setUseSameToken(true) // if you re-generate OTP, you will get same token
            ->generate($email, '1');

        $user->notify(new DoctorRegisterOTPNotification($otp->token));
        if ($user) {
            return response()->json([
                'type' => 1,
                'msg' => "4 digit code is send to your email",
            ]);
        } else {
            return response()->json([
                'type' => 0,
                'msg' => "Something went wrong",
            ]);
        }
    }

}
