<?php

namespace App\Http\Controllers\Auth;

// use Anhskohbo\NoCaptcha\Facades\NoCaptcha;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\PatientRegisterOTPNotification;
use Auth;
use DB;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Seshac\Otp\Otp;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    // }

    // /**
    //  * Create a new user instance after a valid registration.
    //  *
    //  * @param  array  $data
    //  * @return \App\Models\User
    //  */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }

    public function showRegistrationForm()
    {
        if (Auth::guard('web')->check()) {
            return view('patient.home');
        } else {
            return view('patient.auth.register');
        }
    }

    public function register(Request $request)
    {
        /// $response = NoCaptcha::verifyResponse($request->input('g-recaptcha-response'));
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
            'nid' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|max:255',
            'dob' => 'required',
            // 'latlong' => 'required',
            'password' => 'required|min:8',
            'policy' => 'required',
            'terms' => 'required',
            'approval' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'type' => 0,
                'validator_error' => 1,
                'msg' => $validator->errors(),
            ]);
        }

        $user = User::create([
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'email' => $request->email,
            'nid' => $request->nid,
            'dob' => $request->dob,
            'password' => Hash::make($request->password),
            // 'latlong' => str_replace(array('(', ')'), '', $request->latlong),
        ]);

        $otp = Otp::setValidity(30) // otp validity time in mins
            ->setLength(4) // Lenght of the generated otp
            ->setMaximumOtpsAllowed(10) // Number of times allowed to regenerate otps
            ->setOnlyDigits(true) // generated otp contains mixed characters ex:ad2312
        // ->setUseSameToken(true) // if you re-generate OTP, you will get same token
            ->generate($user->email, '0');

        $user->notify(new PatientRegisterOTPNotification($otp->token));

        if ($user) {
            DB::commit();
            return response()->json([
                'type' => 1,
            ]);
        } else {
            DB::rollback();
            return response()->json([
                'type' => 0,
                'msg' => "Patient is not register",
            ]);
        }
    }

    public function verifyOTPPatient(Request $request)
    {
        $optnumber = '';
        foreach ($request->otpnumber as $row) {
            $optnumber .= $row;
        }
        $verify = Otp::validate($request->otpemail, '0', $optnumber);
        if ($verify->status) {
            User::where('email', $request->otpemail)
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

    public function sendOTPPatient($email)
    {
        $user = User::where('email', $email)->first();
        $otp = Otp::setValidity(30) // otp validity time in mins
            ->setLength(4) // Lenght of the generated otp
            ->setMaximumOtpsAllowed(10) // Number of times allowed to regenerate otps
            ->setOnlyDigits(true) // generated otp contains mixed characters ex:ad2312
        // ->setUseSameToken(true) // if you re-generate OTP, you will get same token
            ->generate($email, '0');

        $user->notify(new PatientRegisterOTPNotification($otp->token));
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
