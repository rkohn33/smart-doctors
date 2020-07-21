<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function showLoginForm()
    {  
        if(request()->getRequestUri() == '/doctor/login'){
            return view('auth.doctor-login');
        }
        else if(request()->getRequestUri() == '/patient/login'){
            return view('auth.patient-login');
        }
        else if(request()->getRequestUri() == '/nurse/login'){
            return view('auth.nurse-login');
        }
        else if(request()->getRequestUri() == '/admin/login'){
            return view('auth.admin-login');
        }
       
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
