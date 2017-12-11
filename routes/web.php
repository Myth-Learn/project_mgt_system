<?php

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

Route::get('/', 'Auth\RegisterController@showRegistrationForm');
Auth::routes();
Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');
Route::post('/phone_number', 'Auth\RegisterController@sendOTP')->name('user.phonenumber.submit');
Route::get('cancel-otp', 'Auth\RegisterController@cancelOTP');
Route::get('resend-otp', 'Auth\RegisterController@resendOTP');
Route::post('/OTP', 'Auth\RegisterController@verifyOTP')->name('user.verifyOTP.submit');
Route::get('/country/cities', 'Auth\RegisterController@getCities');
Route::get('verify/{email}/{token}', 'Auth\RegisterController@sendEmailDone')->name('sendEmailDone');
Route::get('/admin', 'AdminController@show')->name('admin');
Route::post('/admin/userState/{id}', 'AdminController@userState');
Route::get('/project_uploader', function () {
    return view('layouts.project_uploader');
});
Route::get('/engineer', function () {
    return view('layouts.engineer');
});
Route::get('/company', function () {
    return view('layouts.company');
});
