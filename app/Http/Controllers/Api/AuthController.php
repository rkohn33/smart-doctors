<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use User;
use Carbon\Carbon;

class AuthController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function login(Request $request)
    {
        $login_type = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $request->merge([
            $login_type => $request->input('login')
        ]);

        if (!Auth::attempt($request->only($login_type, 'password')))
        {
            $response = array();
            $response['code'] = 404;
            $response['message'] = 'These credentials do not match our records.';
            return response()->json($response);
        }

        $user = $request->user();
        $tokenResult = $user->createToken('test');
        $token = $tokenResult->token;
        $token->save();

        $response = array();
        $response['code'] = 200;
        $response['user'] = auth()->user();
        $response['access_token'] = $tokenResult->accessToken;
        $response['token_type'] = 'Bearer';
        $response['expires_at'] = Carbon::parse($tokenResult->token->expires_at)->toDateTimeString();
        $response['message'] = 'Login Successfully.';
        return response()->json($response);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        $response = array();
        $response['code'] = 200;
        $response['message'] = 'Successfully logged out';
        return response()->json($response);
    }

    public function user(Request $request)
    {
        $response = array();
        $response['code'] = 200;
        $response['data'] = $request->user();
        $response['message'] = 'User Information';
        return response()->json($response);
    }
}
