<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Lang;

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
    protected function authenticated(Request $request, $user)
    {
        $role = $user->user_role;
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

    public function showLoginForm()
    {
        return view('sign-in');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /** Method override to send correct error messages
    * Get the failed login response instance.
    *
    * @param \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    protected function sendFailedLoginResponse(Request $request)
    {
        
        if ( ! User::where('email', $request->email)->first() ) {
            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors([
                    $this->username() => Lang::get('auth.email'),
                ]);
        }

        if ( ! User::where('email', $request->email)->where('verify_token', 1)->first() ) {
            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors([
                    $this->username() => Lang::get('auth.inactive'),
                ]);
        }

        if ( ! User::where('email', $request->email)->where('status', 1)->first() ) {
            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors([
                    $this->username() => Lang::get('auth.deactive'),
                ]);
        }

        if ( ! User::where('email', $request->email)->where('password', bcrypt($request->password))->first() ) {
            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors([
                    'password' => Lang::get('auth.password'),
                ]);
        }
    }

    protected function credentials(Request $request)
    {   
	    return ['email' => $request->{$this->username()}, 'password' => $request->password, 'verify_token' => 1, 'status' => 1];
    }
}
