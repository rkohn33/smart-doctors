<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SmartDoctor\Appointments;
use Auth;

class WalletController extends Controller
{
     public function index(Request $request){
         
        $input = $request->all();
        $date = !empty($input['date']) ? $input['date']: date('Y-m-d');
        $available_amount = $this-> availableBalanceForPayout();
        $earning   = $this->earningByDate($date);
        return view('doctor.wallet',compact('available_amount','earning'));                            
     }

     public function availableBalanceForPayout(){

        $amount_available_for_payout = 0;
        $wallet_amount = Appointments::from('appointment as ap')
                    ->leftJoin('payments as p','p.apid','=','ap.apid')
                    ->leftJoin('payments_payout as pp','pp.doc_id','=','ap.doc_id')
                    ->where('ap.doc_id',Auth::user()->id) 
                    ->where('ap.status','Completed')
                    ->selectRaw('IFNULL(SUM(p.amount),0) as payments_sum,IFNULL(SUM(pp.amount),0) as payout_sum')
                    ->first()->toArray();
        if(!empty($wallet_amount)){
            $amount_available_for_payout = $wallet_amount['payments_sum'] - $wallet_amount['payout_sum'];
        }

        return $amount_available_for_payout;

     }

     public function getEarnings(Request $request){

        $input     = $request->all();
        $date      = !empty($input['date']) ? $input['date']: date('Y-m-d');
        $date      = \DateTime::createFromFormat('Y-m-d', $date);
        if(!$date) {
            return returnResponse(
                $code = 1000,
                $data = [],
                $message = "No records found!"
            );
        } 
        $earning   = $this->earningByDate($date);
        return returnResponse(
            $code = 1000,
            $data = $earning,
            $message = "Successfull"
        );

     }

     public function earningByDate($date){

        $earnings = Appointments::from('appointment as ap')
                                ->leftJoin('payments as p','p.apid','=','ap.apid')
                                ->where('ap.doc_id',Auth::user()->id) 
                                ->where('ap.status','Completed')
                                ->whereDate('p.created_at','>=',$date)
                                ->get(['p.pid','p.amount','p.created_at as date'])
                                ->toArray();
        return $earnings;
     }
}
