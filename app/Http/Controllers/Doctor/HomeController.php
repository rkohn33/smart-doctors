<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\SmartDoctor\Doctor\DoctorDetails;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        // if(!$this->checkProfileCompleted())
        // {
        //    abort(404);
        // }
        $profile = optional(DoctorDetails::where('user_id',Auth::user()->id)
                                 ->first())->toArray();
        return view('doctor.dashboard', compact('profile'));
    }

    public function checkProfileCompleted(){
         if(!Session::has('doctor_details_id'))
         {
            $id = optional(DoctorDetails::where('user_id',Auth::user()->id)
                            ->first(['id']))->id;
            if(!empty($id)){
                Session::put('doctor_details_id',$id);
                return true;
            }
            return false;
         }
         return true;
    }
}
