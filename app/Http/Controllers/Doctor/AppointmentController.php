<?php

namespace App\Http\Controllers\Doctor;

use Auth;
use Illuminate\Http\Request;
use App\SmartDoctor\Appointments;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    public function index(Request $request){
        $input = $request->all();
        $appointments = Appointments::where('doc_id',Auth::user()->id)
                                       ->where('appointment.status','Pending')
                                       ->whereDate('appointment',today())
                                       ->leftJoin('users as u','u.id','=','appointment.patient_id')
                                       ->select(['appointment.*','u.firstname','u.lastname'])
                                       ->orderBy('appointment','ASC')
                                       ->paginate(10);
        $next_appointments = optional(Appointments::where('doc_id',Auth::user()->id)
                                  ->leftJoin('users as u','u.id','=','appointment.patient_id')
                                  ->where('appointment','>',now())
                                  ->where('appointment','<',now()->addDay(1))
                                  ->orderBy('appointment','ASC')
                                  ->first(['appointment','patient_id','u.firstname','u.lastname']))->toArray();
        return view('doctor.appointment',compact('appointments','next_appointments'));
     
        
     }
}
