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
                                ->first();
       if(!empty($user_exists)){

           $user_data = $user_exists->toArray();
           if(Hash::check($input['password'], $user_data['password'])){
               $request->session()->regenerate();
               Auth::loginUsingId($user_data['id']);
               $this-> session->set($user_data);
               $prefix = strtolower(Auth::user()->utype);
               return redirect()->intended($prefix."/home");
           }
           else{
               return redirect()->back()
                   ->withErrors(['password'=>'Invalid password.']);
                   
           }
       }
       
       else{
        return redirect()->back()
                   ->withErrors(['email'=>'Invalid email']);
       }
    
    }
    public function logout(){
      
        Auth::logout();
        session()->flush();
        return redirect('/login');

   }
}
