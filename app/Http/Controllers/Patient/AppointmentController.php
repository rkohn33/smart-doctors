<?php

namespace App\Http\Controllers\Patient;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SmartDoctor\Appointments;    
use App\Http\Requests\Patient\AppointmentRequest;

class AppointmentController extends Controller
{
    public function createAppointment(Request $request){

        $input       = $request->all();
        $validator = (new AppointmentRequest())->create($input);
        if ($validator->fails()) {
            returnResponse(
                $code = 0,
                $message = "Resolve the errors to update profile",
                $errors = $validator->errors()->messages()
            );
        }
        $data        = $this->dataMapping($input);    
        $appointment = Appointments::create($data)->id;
        return returnResponse(
            $code = 1000,
            $data = [],
            $message = "Appointment Created Successfully"
        );


    }
    public function dataMapping($input){
        
        $data['doc_id']       = $input['doctor_id'];
        $data['patient_id']   = Auth::user()->id;
        $data['appointment']  = $input['appointment'];
        $data['symptoms']     = $input['symptoms'];
        $data['status']       = 'Pending';
        $data['payment']      = 'Pending';
        return $data;

    }
}
