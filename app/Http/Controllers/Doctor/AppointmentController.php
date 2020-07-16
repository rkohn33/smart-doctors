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
                                  ->paginate(10);
    
        return view('doctor.appointment',compact('appointments'));
     
        
     }
}
