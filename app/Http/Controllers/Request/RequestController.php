<?php

namespace App\Http\Controllers\Request;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function requestMethod(Request $request)
    {
        $data = $request->all();
        $header =   ['Content-Type: application/json'];

        if($data['auth'] == 'true'){
            $header = 'Authorization: Bearer '.session('token');
        }

        $url = env('PORTAL_URL').$data['uri'];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        if($data['type'] == 'POST'){
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data['data']));
        }
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
        }

        curl_close($ch);
    }

    public function login(Request $request)
    {
        $data = $request->json()->all();
        
        $pac = [
                    "uri" => "api/login",
                    "type" => "POST",
                    "data" =>   [
                                    "email" => $data['email'],
                                    "password" => $data['password']
                                ]
                ];

        $response = $this->requestMethod($request);
    }
}
