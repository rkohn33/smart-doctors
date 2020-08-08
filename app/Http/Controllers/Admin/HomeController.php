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

    
}
