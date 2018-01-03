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

Route::get('/', 'GameController@index')->name('home');




Route::get('/login', 'UserController@login')->name('login');
Route::post('/login', 'UserController@authenticate')->name('authentication');
Route::get('/logout', 'UserController@logout')->name('logout');

Route::post('/downloads', 'GameController@downloads');

Route::get('/subscribe', 'SubscribeController@index')->name('subscribe');

Route::get('/unsubscribe', 'SubscribeController@unsubscribe')->name('unsubscribe');
Route::get('/subscription', 'SubscribeController@create')->name('subscription');
Route::post('/subscription', 'SubscribeController@sendRequest')->name('request');
Route::get('/subscribeConfirm', 'SubscribeController@subscribeConfirm')->name('subscribeConfirm');
Route::post('/subscribeConfirm', 'SubscribeController@confirmSubscription')->name('confirmSubscription');
Route::get('/greetings', 'SubscribeController@greetings')->name('greetings');
Route::get('/deleteConfirm', 'SubscribeController@deleteConfirm')->name('deleteConfirm');

Route::get('/game')->name('game');
Route::get('/game/{id}', 'FileController@getFile');


Route::get('/encrypt', 'SubscribeController@encrypt');
