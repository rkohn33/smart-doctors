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
    return redirect('/login');
});

Auth::routes();
Route::post('/login', 'Auth\UserAuthController@login');

Route::group(['middleware' => ['auth']], function () {

    Route::group(['prefix' => 'admin'], function(){
        Route::get('/home', 'Admin\HomeController@index');
    });
    Route::group(['prefix' => 'doctor'], function(){
        Route::get('/home', 'Doctor\HomeController@index');
        Route::get('/dashboard', function () {
            return view('doctor.dashboard');
        });
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

});

Route::get('/logout','Auth\UserAuthController@logout');
