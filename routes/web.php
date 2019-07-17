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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

#CRUDアプリ

Route::resource('makers', 'MakersController');
Route::resource('users', 'UsersController');


#メール送信
Route::get('mail', 'MailController@index');
Route::post('mail','MailController@confirm');
Route::post('mail/complete','MailController@complete');
 
