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


Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

#CRUDアプリ

Route::resource('makers', 'MakersController');
Route::resource('liquors', 'LiquorsController');
Route::resource('users', 'UserController');


#メール送信
Route::get('mail', 'MailController@index');
Route::post('mail','MailController@confirm');
Route::post('mail/complete','MailController@complete');
 
