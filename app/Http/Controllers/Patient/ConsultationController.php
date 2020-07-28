<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\SmartDoctor\Appointments;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Twilio\VideoRoomsController;

class ConsultationController extends Controller
{
    public function __construct(){
        $this-> video_chat = new VideoRoomsController();
    }
    public function index(Request $request)
    {
        $input = $request ->all();
        $join_room = $rooms = [];
        $appointments = Appointments::where('patient_id',Auth::user()->id)
                                ->where('appointment.status','Pending')
                                ->whereDate('appointment',today())
                                ->leftJoin('users as u','u.id','=','appointment.doc_id')
                                ->get(['appointment.*','u.firstname','u.lastname'])
                                ->toArray();
        foreach($appointments as  $app){
             $rooms[] =  $app['doc_id'].'_'.$app['firstname'].'-'.Auth::user()->id;
        }
        $data = $request->all();
        $available_rooms = $this-> video_chat-> index($rooms);
        if(!empty($input['room']))
        {
           $join_room     = $this-> video_chat-> joinRoom($input['room']);
        }
        return view('twilio.room', ['rooms' => $available_rooms,'join_room'=>$join_room]);
    }
}
