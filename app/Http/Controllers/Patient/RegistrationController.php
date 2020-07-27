<?php

namespace App\Http\Controllers\Patient;

use App\SmartDoctor\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Patient\PatientRequest;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function patientRegister(Request $request)
    {
        $input = $request ->all();
        $validator = (new PatientRequest())->register($input);
        if ($validator->fails()) {
            return redirect()->back()
                       ->withErrors($validator)
                       ->withInput();
       }

        $users_id = $this->createUser($input);
        $input['user_id']   = $users_id;
        return redirect()->back()->with('success', 'Register Succesfully!');
    }

    public function createUser($data){
        $details['firstname'] = $data['first_name'];
        $details['lastname']  = $data['last_name'];
        $details['email']     = $data['email'];
        $details['phone']     = $data['phone'];
        $details['password']  = Hash::make($data['password']);
        $details['utype']     = 'patient';
        $details['approval']     = 'A';
        $details['CreatedTime']  = now();
        return Users::create($details)->id;
    }
}
