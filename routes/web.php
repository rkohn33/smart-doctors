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

// Admin Login Signup Routes
Route::group(['prefix' => 'admin'], function(){
    Auth::routes();
    Route::post('/login', 'Auth\UserAuthController@login');
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
    Route::get('/signup',function(){
        return view('signup.patient-signup');
   });
   Route::post('/signup', 'Patient\RegistrationController@patientRegister');
});

Route::group(['middleware' => ['auth']], function () {

    Route::group(['prefix' => 'admin'], function(){
        Route::get('/home', 'Admin\HomeController@index');
        Route::post('/approval', 'Admin\HomeController@doctorApproval'); 

    });
    Route::group(['prefix' => 'doctor'], function(){
        Route::get('/home', 'Doctor\HomeController@index');
        Route::get('/appointment', 'Doctor\AppointmentController@index');
        Route::get('/get/appointment', 'Doctor\AppointmentController@getAppointmentsByDate');
        Route::post('/schedule/update', 'Doctor\ScheduleController@updateOrCreate');
        Route::get('/get/schedule', 'Doctor\ScheduleController@index');
        Route::post('/profile/update', 'Doctor\ProfileController@updateOrCreate');
        Route::get('/availability', function () {
            return view('doctor.availability');
        });
        Route::get('/consultation/{patient_id?}','Doctor\ConsultationController@startConsultation');
  
        Route::get('/profile', 'Doctor\ProfileController@index');
        Route::get('/wallet','Doctor\WalletController@index');
        Route::get('/get/earning','Doctor\WalletController@getEarnings');
    });

    Route::group(['prefix' => 'patient'], function(){
        Route::get('/home', function () {
            return view('patient.home');
        });
        Route::post('/create/appointment','Patient\AppointmentController@createAppointment');

        Route::get('/list', function () {
            return view('patient.doctor-list');
        });

        Route::get('/consultation', function () {
            return view('patient.consultation');
        });

        Route::get('/profile', function () {
            return view('patient.profile');
        });

        Route::get('/start-call', 'Patient\ConsultationController@index');
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
