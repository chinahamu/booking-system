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

Route::get('/', function () {
    return redirect("/login");
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/calendar', 'CalendarController@index')->name('calendar');
Route::get('/reserve', 'ReserveController@index')->name('reserve');
Route::any('/regist_reserve', 'RegistReserveController@index')->name('regist_reserve');
Route::any('/comp', 'RegistReserveController@comp')->name('comp');
Route::get('/mailable/send', 'RegistReserveController@MailNotification');