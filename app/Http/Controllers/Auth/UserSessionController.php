<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserSessionController extends Controller
{
    public function set($data){
        
        $this->setUserData($data);
     }
     public function setUserData($data){

        Session::put('user_id',$data['id']);
        Session::put('user_email',$data['email']);
        Session::put('user_mobile_no',$data['phone']);
        Session::put('user_type',$data['utype']);
    }
}
