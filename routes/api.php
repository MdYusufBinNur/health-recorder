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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/', function (){
    return 'Api Running';
});
Route::post('/login','Api\AuthController@login');
Route::post('/register','Api\AuthController@register');
Route::get('/user','Api\AuthController@user')->middleware('auth:api');
Route::resource('doctors','Admin\DoctorController');
Route::resource('hospitals','Admin\HospitalController');
Route::resource('departments','Admin\DepartmentController');
Route::apiResource('schedules','Admin\ScheduleController');
Route::resource('appointments','Admin\AppointmentController');
Route::post('doctor','Admin\DoctorController@destroy');
Route::post('hospital','Admin\HospitalController@destroy');
Route::post('department','Admin\DepartmentController@destroy');
Route::post('schedule','Admin\ScheduleController@destroy');
Route::post('appointment','Admin\AppointmentController@destroy');
Route::get('doctors','Admin\ApiController@getDoctors');
Route::get('donors','Admin\ApiController@getDonors');
Route::get('sliders','Admin\ApiController@getSliders');
Route::get('ambulances','Admin\ApiController@getAmbulances');
Route::get('doctor/{id}','Admin\ApiController@getDoctorWiseHospital');
Route::get('hospitals','Admin\ApiController@getHospitals');
Route::get('hospital/{id}','Admin\ApiController@getHospitalDetails');
Route::get('appointment/{id}','Admin\ApiController@getAppointmentList');
Route::get('schedule/{id}','Admin\ApiController@getScheduleList');
Route::get('/indexInfo', 'Admin\ApiController@getIndexInfo');
