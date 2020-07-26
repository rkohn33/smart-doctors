<?php

namespace App\Http\Controllers\Doctor;

use App\SmartDoctor\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Twilio\VideoRoomsController;

class ConsultationController extends Controller
{
    public function __construct(){
        $this-> video_chat = new VideoRoomsController();
    }
    public function startConsultation($patient_id){

        $patient_id   = base64_decode($patient_id);
        $patient_details = optional(Users::where('users.id',$patient_id)->where('users.utype','patient')
                                   ->join('appointment as app',function($q) use($patient_id){
                                        $q->on('app.patient_id','=','users.id')
                                          ->where('app.doc_id',Auth::user()->id)
                                          ->whereDate('app.appointment',now());
                                   })
                                   ->first(['users.firstname','users.lastname','app.symptoms',
                                            'users.gender','users.dob']))->toArray();
        if(!empty($patient_details)){
            $roomName     = Auth::user()->id.'_'.Auth::user()->firstname.'-'.$patient_id;
            $room_created = $this-> video_chat-> createRoom($roomName);
            $join_room     = $this-> video_chat-> joinRoom($roomName);
            return view('doctor.consultation',compact('join_room','patient_details'));
        }
        abort(500, 'Something went wrong');
      
    }
}
