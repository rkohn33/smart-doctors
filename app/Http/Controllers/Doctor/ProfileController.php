<?php

namespace App\Http\Controllers\Doctor;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SmartDoctor\Doctor\DoctorDetails;

class ProfileController extends Controller
{
    public function index(){

       $profile = optional(DoctorDetails::where('user_id',Auth::user()->id)
                                 ->first())->toArray();
       if(!empty($profile))
       {
           return view('doctor.profile',compact('profile'));
       }
       abort(404);
       
    }
    public function updateOrCreate()
    {
        
    }
}
