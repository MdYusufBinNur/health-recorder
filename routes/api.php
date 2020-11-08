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
