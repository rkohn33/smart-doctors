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
        ////////////Dummy Data for testing//////
        $input['salutation'] = 'Dr.';
        $input['first_name'] = 'Muhammad';
        $input['last_name']  = 'Ahmed';
        $input['speciality'] = 'Sleeping';
        $input['consultation_type']  = 'Audio';
        $input['website']     = 'www.com-wale.com';
        $input['bio']         = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Non recusandae voluptas ut. Quis qui consequuntur rerum vero explicabo architecto, eaque necessitatibus hic repudiandae ipsum ut quod, ea, accusamus quo accusantium.';
        $input['education[]']   = ['university National Mayor De san Marcos, Peru Medical Doctor, 2010',
                                   'university National Mayor De san Marcos, Peru Medical Doctor, 2010',
                                   'university National Mayor De san Marcos, Peru Medical Doctor, 2010'];

        $input['hospital_name[]'] = ['university abcd','university abcd','university abcd'];

        $input['hospital_details[]'] = ['Lorem ipsum dolor sit amet','Lorem ipsum dolor sit amet','Lorem ipsum dolor sit amet'];
        //////////// END Dummy Data for testing//////

        $data = $this->dataMapping($input);
        $validator = (new ProfileRequest())->createOrUpdate($data);
        if ($validator->fails()) {
            return redirect()->back()
                       ->withErrors($validator)
                       ->withInput();
        }
        $response = DoctorDetails::updateOrCreate(['user_id'=> Auth::user()->id],$data);
        return $response;
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
