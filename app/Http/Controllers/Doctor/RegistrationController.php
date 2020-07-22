<?php

namespace App\Http\Controllers\Doctor;

use App\SmartDoctor\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\SmartDoctor\Doctor\DoctorDetails;

class RegistrationController extends Controller
{
    public function doctorRegister(Request $request)
    {
        $input = $request ->all();
        $users_id = $this->createUser($input);
        $input['user_id']   = $users_id;
        $users_id = $this->createProfile($input);
        return redirect()->back();
    }
    public function createProfile($input){

        $data['salutation'] = 'Dr.';
        $data['first_name'] = $input['first_name'];
        $data['last_name']  = $input['last_name'] ;
        $data['user_id']    = $input['user_id'];
        $data['speciality'] = $input['speciality'];
        $data['created_at']  = now();
        $data['updated_at']  = now();
        $id = DoctorDetails::create($data)->id;
        return $id;
    }
    public function createUser($data){

           $details['firstname'] = $data['first_name'];
           $details['lastname']  = $data['last_name'];
           $details['email']     = $data['email'];
           $details['phone']     = $data['phone'];
           $details['password']  = Hash::make($data['password']);
           $details['address1']  = $data['address'];
           $details['country']   = 'India';
           $details['state']     = $data['state'];
           $details['city']      = $data['city'];
           $details['zip']       = $data['postal_code'];
           $details['utype']     = 'doctor';
           $details['approval']     = 'P';
           $details['CreatedTime']  = now();
           return Users::create($details)->id;
       
    }
}
