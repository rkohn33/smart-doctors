<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['prefix' => 'auth'], function(){
    Route::post('login', 'Api\AuthController@login');
    Route::post('register', 'Api\AuthController@register');
    Route::post('password-reset', 'Api\AuthController@password_reset');
    Route::post('password-reset-check-token', 'Api\AuthController@password_reset_check_toke');
    Route::post('password-reset-process', 'Api\AuthController@password_reset_process');
});


Route::group(['middleware' => 'auth:api'], function () {
    Route::post('user', 'Api\AuthController@user');
});