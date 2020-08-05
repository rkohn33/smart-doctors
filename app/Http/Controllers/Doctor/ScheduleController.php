<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\SmartDoctor\Doctor\DoctorSchedule;

class ScheduleController extends Controller
{
    public function index(Request $request){
       $input = $request->all();
       ////Date format should bhi Y-m-d;
       $date = !empty($input['date']) ? $input['date']: date('Y-m-d');
       $schedule_data = DoctorSchedule::where('doc_id',Auth::user()->id)->where('date',$date)
                               ->get()->toArray();
        return returnResponse(
            $code = 1000,
            $data = $schedule_data,
            $message = ""
        );
        
    }

    public function updateOrCreate(Request $request)
    {
        $input = $request->all(); //uncomment if fuctional;
        //////Dummy Data //////////
        // $input = '[{
        //     "date":"2020-07-31",
        //     "timings":["09:00","10:00"],
        //     "session_charge":150,
        //     "shift_type":"Morning"
        //     }, 
        //     {
        //     "date":"2020-07-31",
        //     "timings":["13:00","14:00"],
        //     "session_charge":150,
        //     "shift_type":"Evening"
        //     }]';

         $schedule_data = json_decode($input,true);
         if(!empty($schedule_data)){
             if(!empty($schedule_data[0]['date'])){
                DoctorSchedule::where('doc_id',Auth::user()->id)->where('date',$schedule_data[0]['date'])
                                  ->delete();
             }
            foreach($schedule_data as $key => $data)
            {
                foreach($data['timings'] as $key1 => $time){
                    $split_time = explode(':',$time);
                    $end_time   = $split_time[0].':'.'59';
                    $insert_data[$key][$key1]['doc_id']    = Auth::user()->id; 
                    $insert_data[$key][$key1]['date']      = $data['date'];
                    $insert_data[$key][$key1]['shift'] = $data['shift_type'];
                    $insert_data[$key][$key1]['from_time'] = $time;
                    $insert_data[$key][$key1]['to_time']   = $end_time;
                    $insert_data[$key][$key1]['session_charges'] = $data['session_charge'];
                    $insert_data[$key][$key1]['created_at'] = now();
                    $insert_data[$key][$key1]['updated_at'] = now();
                }
            }

            foreach($insert_data as $insert)
            {
               $insert = DoctorSchedule::insert($insert);   
            }
        }
         return returnResponse(
            $code = 1000,
            $data = [],
            $message = "Schedule Updated Successfully"
        );
            
    }
}
