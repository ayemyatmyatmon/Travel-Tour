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

Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');

Route::prefix('admin')->middleware('auth:admin_user')->namespace('backend')->group(function(){
    Route::get('/home','AdminUserController@home')->name('home');
    Route::resource('/adminuser','AdminUserController');
    Route::get('/adminuser/datatable/ssd','AdminUserController@ssd');

    Route::resource('/city','CityController');
    Route::get('/city/datatable/ssd','CityController@ssd');

    Route::resource('/bus','BusOperatorController');
    Route::get('/bus/datatable/ssd','BusOperatorController@ssd');

    Route::resource('/level','LevelController');
    Route::get('/level/datatable/ssd','LevelController@ssd');

    Route::resource('/bustype','BusTypeController');
    Route::get('/bustype/datatable/ssd','BusTypeController@ssd');

    Route::resource('/day','DayController');
    Route::get('/day/datatable/ssd','DayController@ssd');

    Route::resource('/schedule','BusScheduleController');
    Route::get('/schedule/datatable/ssd','BusScheduleController@ssd');

    Route::resource('/hotel','HotelController');
    Route::get('/hotel/datatable/ssd','HotelController@ssd');

    Route::resource('/package','PackageController');
    Route::get('/package/datatable/ssd','PackageController@ssd');

    Route::resource('/packagedetail','PackageDetailController');
    Route::get('/packagedetail/datatable/ssd','PackageDetailController@ssd');

    Route::get('/contactus','ContactUsController@contactus')->name('contactus');
    Route::get('/contactus/datatable/ssd','ContactUsController@ssd');

    Route::resource('/booking','BusController');
    Route::get('/booking/datatable/ssd','BusController@ssd');
});
