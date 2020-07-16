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
       if(!empty($profile))
       {
           return view('doctor.profile',compact('profile'));
       }
       abort(404);
       
    }
    public function updateOrCreate(Request $request)
    {
        $input = $request->all();
        $data['salutation'] = 'Mr.';
        $data['first_name'] = 'Muhammad';
        $data['last_name']  = 'Ahmed';
        $data['speciality'] = 'Sleeping';
        $data['consultation_type']  = 'Audio';
        $data['website']     = 'www.com-wale.com';
        $data['bio']         = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Non recusandae voluptas ut. Quis qui consequuntur rerum vero explicabo architecto, eaque necessitatibus hic repudiandae ipsum ut quod, ea, accusamus quo accusantium.';
        $data['education']   = 'Audio';
        $data['employment']  = 'Audio';
        $data['created_at']  = now();
        $data['updated_at']  = now();
        //$validate = (new ProfileRequest())->createOrUpdate($input);

        
    }
}
