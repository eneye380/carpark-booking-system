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

Route::get('/', function () {
    return view('welcome');
});





Route::resource('users', 'UsersController');

Route::group(['middleware'=>'visitors'], function () {
    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/admin', 'AdminController@show');

    Route::post('/login-me', 'LoginMeController@login')->name('login-me');

    Route::post('/admin', 'AdminController@login')->name('admin');
});

Route::group(['middleware'=>'loggedin'], function () {
    Route::get('/carowner','CarOwnerController@index');
    Route::get('/admin-view', 'AdminController@adminView');
    Route::resource('/admin/parkinglots', 'ParkingLotController');
    Route::resource('/admin/pricings', 'PricingController');
    Route::resource('/admin/bookings', 'BookingController');
    Route::delete('/booking/{id}', 'SpaceController@remove');
    Route::get('/carowner/parkinglots/{id}','SpaceController@display');
    Route::post('/carowner/parkinglots','SpaceController@book');
    Route::get('/carowner/booking/{id}','SpaceController@ticket');
});

Route::post('/logout', 'LoginMeController@logout');
