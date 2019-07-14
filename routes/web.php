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
Route::resource('users', 'UsersController');
Route::resource('makers', 'MakersController');
Route::get('maker/new', 'MakersController@create')->name('maker.new');
Route::post('maker' ,'MakersController@store')->name('maker.store');

Route::get('maker/{id}', 'MakersController@show')->name('maker.show');
Route::get('maker/edit/{id}', 'MakersController@edit')->name('maker.edit');
Route::post('maker/update/{id}', 'MakersController@update')->name('maker.update');
Route::delete('maker/{id}' ,'MakersController@destroy')->name('maker.destroy');



#メール送信
Route::get('mail', 'MailController@index');
Route::post('mail','MailController@confirm');
Route::post('mail/complete','MailController@complete');
 
