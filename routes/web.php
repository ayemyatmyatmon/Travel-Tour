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

// Route::get('/', function () {
//     return view('frontend.home');
// });

Auth::routes();

Route::get('/admin/login','Auth\AdminLoginController@showLoginForm')->name('admin.login-form');
Route::post('/admin/login','Auth\AdminLoginController@login')->name('adminlogin');
Route::get('/', 'HomeController@index')->name('user.home');

Route::prefix('busticket')->group(function(){
    Route::get('/city/show/{id}','HomeController@show')->name('user.city.show');
    Route::get('/city/destination','HomeController@destination')->name('user.city.destination');
    Route::get('/package','HomeController@package')->name('user.package');
    Route::get('/packagedetail/show/{id}','HomeController@packageDetailShow')->name('user.packagedetail.show');
    Route::get('/hotel','HomeController@hotel')->name('user.hotel');
    Route::get('/contact','HomeController@contact')->name('contact');
    Route::post('/contactus/store','HomeController@contactUsStore')->name('contactus.store');
    Route::get('/aboutus','HomeController@aboutUs')->name('aboutus');
    Route::get('/currency','HomeController@currency')->name('currency');
    Route::get('/bus/index','BusController@index')->name('bus');
    Route::get('/bus/search','BusController@search')->name('bus.search');
    Route::get('/seatplan/{schedule_id}','BusController@seatPlan')->name('seatplan');
    Route::get('/booking','BusController@booking');
    Route::post('/booking/store','BusController@bookingStore')->name('bookingstore');
    Route::get('/booking/detail/{bookingdetail_id}','BusController@bookingDetail')->name('bookingdetail');
    Route::get('/print-your-ticket','BusController@printTicket')->name('printyourticket');
    Route::get('/print-your-ticket-show','BusController@printTicketShow')->name('print-ticket-show');

});


