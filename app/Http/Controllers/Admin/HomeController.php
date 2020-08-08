<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SmartDoctor\Users;

class HomeController extends Controller
{
    public function index()
    {
        $doctors_list = Users::where('utype','doctor')->orderBy('id','DESC')->paginate(10);
        return view('admin.home', compact('doctors_list'));
    }

    public function doctorApproval(Request $request)
    {
        $input = $request->all();
        if(!empty($request['id']))
        {
            $doc_approve = Users::where('id', $request['id']);
            if($input['approval'] == 'A'){
                $doc_approve->update(['approval' => 'P']);
                return redirect()->back()->with('success', 'Doctor Profile Rejected Succesfully!');
            }
            else{
                $doc_approve->update(['approval' => 'A']);
                return redirect()->back()->with('success', 'Doctor Profile Approved Succesfully!');
            }
        }
        
        return redirect()->back()->with('success', 'Doctor Profile Approved Succesfully!');
    }

    
}
