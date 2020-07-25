<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Carbon\Carbon;
use App\SmartDoctor\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Request\User\UserRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class UserAuthController extends Controller
{
    use AuthenticatesUsers;
    public function __construct(){

        $this-> session = new UserSessionController();
    }

    public function login(Request $request)
    {
        $input = $request->all();
        $validator = (new UserRequest())->login($input);
        if ($validator->fails()) {
            return redirect()->back()
                       ->withErrors($validator)
                       ->withInput();
       }

       $user_exists = Users::where('email',$input['email'])
                                 ->where('utype',$input['user_type'])
                                ->first();
       if(!empty($user_exists)){
           $user_data = $user_exists->toArray();
           if(Hash::check($input['password'], $user_data['password'])){
               if($user_data['approval']!= 'A' && $user_data['utype'] == 'doctor'){
                    return redirect()->back()
                          ->withErrors(['password'=>'Your account is currently not active.']);
                 }
               $request->session()->regenerate();
               Auth::loginUsingId($user_data['id']);
               $this-> session->set($user_data);
               $prefix = strtolower(Auth::user()->utype);
               return redirect()->intended($prefix."/home");
           }
           else{
               return redirect()->back()
                   ->withErrors(['password'=>'Password is invalid.']);
                   
           }
       }
       else{
        return redirect()->back()
                   ->withErrors(['email'=>'Email is invalid']);
       }
    
    }
    public function logout(){
        $prefix = strtolower(Auth::user()->utype);
        Auth::logout();
        session()->flush();
        return redirect($prefix.'/login');

   }
}
