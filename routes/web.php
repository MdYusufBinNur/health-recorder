<?php

use Illuminate\Support\Facades\Auth;
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
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::middleware(['checkRole:admin'])->group(function () {
        Route::resource('hospitals', 'HospitalController');
        Route::resource('doctors', 'DoctorController');
        Route::resource('ambulances', 'AmbulanceController');
        Route::resource('donors', 'DonorController');
    });
    Route::middleware(['checkRole:doctor'])->group(function () {
        Route::resource('appointments', 'HospitalController');
    });
});


