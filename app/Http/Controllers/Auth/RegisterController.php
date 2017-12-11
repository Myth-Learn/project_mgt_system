<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use App\SocialProvider;
use App\Mail\EmailVerification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Auth;
use Mail;
use DB;
use Socialite;
use Session;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        if (Auth::guest()) {
            return view('sign-up');
        } else {
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
    }

    public function getCities(Request $request)
    {
        return DB::table('cities')->where('country_code', '=', $request->country_code)->pluck('name');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required|max:10|min:10|unique:users',
            'country_code' => 'required|string',
            'city' => 'required|string',            
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        Session::flash('Success', 'Registered! But kindly verify your email to login');
        
        $user = User::create([
            'user_role' => $data['user_role'],
            'name' => $data['name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'country_code' => $data['country_code'],
            'city' => $data['city'],            
            'password' => bcrypt($data['password']),
            'verify_token' => Str::random(40),
        ]);

        if(array_key_exists("provider", $data) && array_key_exists("provider_id", $data)) {
            $user->socialProviders()->create(
                ['provider_id' => $data['provider_id'], 'provider' => $data['provider']]
            );
        }

        Session::forget('phone_number');
        Session::forget('userName');
        Session::forget('userEmail');
        Session::forget('provider');
        Session::forget('providerID');

        $thisUser = User::findOrFail($user->id);
        $this->sendVerifyEmail($thisUser);
        return $user;
    }

    public function sendVerifyEmail($thisUser)
    {
        mail::to($thisUser['email'])->send(new EmailVerification($thisUser));
    }

    public function sendEmailDone($email, $verify_token)
    {
        $user = User::where(['email' => $email, 'verify_token' => $verify_token])->first();

        if ($user) {
            User::where(['email' => $email, 'verify_token' => $verify_token])->update(['verify_token' => 1]);
            return redirect(route('login'));            
        } else {
            return 'User not found';
        }
    }

    /**
     * Redirect the user to the authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();
        } catch(\Exception $e) {
            return redirect('/');
        }

        // Check if we have logged provider
        $socialProvider = SocialProvider::where('provider_id', $socialUser->getId())->first();
        if(!$socialProvider) {
            Session::put('userName', $socialUser->getName());
            Session::put('userEmail', $socialUser->getEmail());
            Session::put('provider', $provider);
            Session::put('providerID', $socialUser->getId());
            Session::flash('Success', 'Your social details are linked, Kindly procced further to register');            
            return redirect('/');
        } else {
            Session::flash('Warning', 'Your account is already registered with us. Try signin!');
            return redirect('/login');            
        }
    }

    public function sendOTP(Request $request)
    {
        $this->validate($request, [
            'phone_number' => 'required|unique:users,phone_number'
        ]);
        $phone_number = $request->get('phone_number');
        $nexmo = app('Nexmo\Client');
        $verification = $nexmo->verify()->start([
            'number' => '91' . $phone_number,
            'brand'  => 'P-HUB'
        ]);
        if($verification){
            Session::put('OTPverification', $verification);
            Session::put('phone_number', $phone_number);          
            return view('verify-otp', ["phone_number" => $phone_number]);
        }
        return redirect()->route('register');
    }

    public function cancelOTP($resend = false)
    {
        if(Session::has('OTPverification') && Session::has('phone_number'))
        {
            $nexmo = app('Nexmo\Client');
            $verification = Session::get('OTPverification');
            $cancel = $nexmo->verify()->cancel($verification);           
            Session::forget('OTPverification');
            if($resend) 
            {
                return true;    
            }
            Session::forget('phone_number'); 
        }
        return redirect()->route('register');
    }

    public function resendOTP()
    {
        if($this->cancelOTP(true))
        {
            if(Session::has('phone_number'))
            {
                $phone_number = Session::get('phone_number');
                $nexmo = app('Nexmo\Client');
                $verification = $nexmo->verify()->start([
                    'number' => '91' . $phone_number,
                    'brand'  => 'P-HUB'
                ]);
                if($verification)
                {
                    Session::put('OTPverification', $verification);
                    Session::put('phone_number', $phone_number);
                    return view('verify-otp', ["phone_number" => $phone_number]);
                }
            }
        }
        return redirect()->route('register');
    }

    public function verifyOTP(Request $request)
    {
        if(Session::has('OTPverification') && Session::has('phone_number'))
        {
            $otp = $request->get('otp');
            $nexmo = app('Nexmo\Client');
            $verification = Session::get('OTPverification');
            $phone_number = Session::get('phone_number');
            if($nexmo->verify()->check($verification, $otp))
            {
                Session::forget('OTPverification');
                $roles = Role::all();
                $countries = DB::table('countries')->get();
                return view('sign-up', ["phone_number" => $phone_number], compact('roles', 'countries'));
            }
        }
        return redirect()->route('register');
    }
}
