<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',function(){
    return view('welcome');
});
Route::group(['prefix' => 'doctor'], function(){
    Auth::routes();
    Route::post('/login', 'Auth\UserAuthController@login');
    Route::get('/signup',function(){
         return view('signup.doctor-signup');
    });
    Route::post('/signup', 'Doctor\RegistrationController@doctorRegister');
});

Route::group(['prefix' => 'patient'], function(){
    Auth::routes();
    Route::post('/login', 'Auth\UserAuthController@login');

});

Route::group(['middleware' => ['auth']], function () {

    Route::group(['prefix' => 'admin'], function(){
        Route::get('/home', 'Admin\HomeController@index');
    });
    Route::group(['prefix' => 'doctor'], function(){
        Route::get('/home', 'Doctor\HomeController@index');
        Route::get('/appointment', 'Doctor\AppointmentController@index');
        Route::get('/test', 'Doctor\ProfileController@updateOrCreate');
        Route::get('/availability', function () {
            return view('doctor.availability');
        });
        Route::get('/consultation', function () {
            return view('doctor.consultation');
        });
        Route::get('/wallet', function () {
            return view('doctor.wallet');
        });
        Route::get('/profile', 'Doctor\ProfileController@index');

    });

    Route::group(['prefix' => 'patient'], function(){
        Route::get('/home', 'Patient\HomeController@index');
    });
    Route::group(['prefix' => 'nurse'], function(){
        Route::get('/home', 'Nurse\HomeController@index');
    });

    Route::get('/video_chat', "twilio\VideoRoomsController@index");
    Route::prefix('room')->group(function() {
        Route::get('join/{roomName}', 'twilio\VideoRoomsController@joinRoom');
        Route::post('create', 'twilio\VideoRoomsController@createRoom');
    });

});


// Route::view('/', 'twilio.calls');
// Route::post('/call', 'twilio\VoiceController@initiateCall')->name('initiate_call');

        


Route::get('/logout','Auth\UserAuthController@logout');
