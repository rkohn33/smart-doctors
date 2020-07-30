<?php

namespace App\Http\Controllers\Doctor;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SmartDoctor\Doctor\DoctorDetails;
use App\Http\Requests\Doctor\ProfileRequest;

class ProfileController extends Controller
{
    public function index(){

        $profile = optional(DoctorDetails::where('user_id',Auth::user()->id)
                                 ->first())->toArray();
        return view('doctor.profile',compact('profile'));
       
    }
    public function updateOrCreate(Request $request)
    {
        $input = $request->all();

        $data = $this->dataMapping($input);
        $validator = (new ProfileRequest())->createOrUpdate($data);
        if ($validator->fails()) {
            returnResponse(
                $code = 0,
                $message = "Resolve the errors to update profile",
                $errors = $validator->errors()->messages()
            );
        }
        $response = DoctorDetails::updateOrCreate(['user_id'=> Auth::user()->id],$data);
        return returnResponse(
            $code = 1000,
            $data = [],
            $message = "Profile Updated Successfully"
        );
    }

    public function dataMapping($input){

        $data['education']  = $data['employment'] = [];
        $data['salutation'] = $input['salutation'];
        $data['first_name'] = $input['first_name'];
        $data['last_name']  = $input['last_name'] ;
        $data['speciality'] = $input['speciality'];
        $data['consultation_type']  = $input['consultation_type'];
        $data['website']     = $input['website'];
        $data['bio']         = $input['bio'];
        $data['profile_pic'] = '';
        foreach($input['education[]'] as $key => $education)
        {
            $index = $key + 1;
            $data['education']['education_'.$index]['detail'] = $education; 
        }
        foreach($input['hospital_name[]'] as $key => $hospital)
        {
            $index = $key + 1;
            $data['employment']['hospital_'.$index]['name'] = $hospital; 
            $data['employment']['hospital_'.$index]['detail'] = $input['hospital_details[]'][$key];
        }
        $data['education'] = !empty($data['education']) ? json_encode($data['education']): ''; 
        $data['employment'] = !empty($data['employment']) ? json_encode($data['employment']): ''; 
        $data['created_at']  = now();
        $data['updated_at']  = now();
        return $data;

    }
}
