<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/users', 'UserController@store');
Route::post('/login', 'UserController@login');

Route::post('/games', 'GameController@store');
Route::post('/categories', 'CategoryController@store');

Route::post('/unsubscribeUser', 'UnsubscribeController@remoteUnsubscribe');