<?php

namespace App\Http\Controllers\Doctor;

use App\SmartDoctor\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\SmartDoctor\Doctor\DoctorDetails;
use App\Http\Requests\Request\User\UserRequest;
use App\Http\Controllers\DocumentUploadController;

class RegistrationController extends Controller
{
    public function doctorRegister(Request $request)
    {
        $input = $request ->all();
        $validator = (new UserRequest())->register($input);
        if ($validator->fails()) {
            return redirect()->back()
                       ->withErrors($validator)
                       ->withInput();
       }
        $document_paths = $this->uploadDocuments($request);
        $data      =  array_merge($document_paths,$input);
        $users_id = $this->createUser($data);
        $input['user_id']   = $users_id;
        $users_id = $this->createProfile($input);
        return redirect()->back()->with('success', 'Register Succesfully!');
    }

    public function uploadDocuments($request)
    {
        $medical_registration = $medical_degree = $medical_proof = "";
        $document = new DocumentUploadController();
        if($request->hasFile('medical_registration')){ 
            $name = 'medical_registration_'.uniqid().'.'.$request->file('medical_registration')->extension();
            $medical_registration = $document-> documentUpload($request,$name,'medical_registration','doctors_documents');
        }
        if($request->hasFile('medical_degree')){ 
            $name = 'medical_degree_'.md5(uniqid()).'.'.$request->file('medical_degree')->extension();
            $medical_registration = $document-> documentUpload($request,$name,'medical_degree','doctors_documents');
        }
        if($request->hasFile('medical_proof')){ 
            $name = 'medical_proof_'.md5(uniqid()).'.'.$request->file('medical_proof')->extension();
            $medical_registration = $document-> documentUpload($request,$name,'medical_proof','doctors_documents');
        }
        return ['medical_registration_path'=>$medical_registration,'medical_degree_path'=>$medical_degree,'medical_proof_path'=>$medical_proof];
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
           $details['medical_registration']  = $data['medical_registration_path'];
           $details['medical_proof']       = $data['medical_proof_path'];
           $details['medical_degree']       = $data['medical_degree_path'];
           $details['utype']     = 'doctor';
           $details['approval']     = 'P';
           $details['CreatedTime']  = now();
           return Users::create($details)->id;
       
    }
}
