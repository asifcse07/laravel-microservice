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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
//Route::post('/register', array('as'=>'Save', 'uses'=>'UserController@create'));
Route::group(['prefix' => '/v1'], function() {

    Route::post('/register', array('as'=>'Save', 'uses'=>'UserController@create'));
    Route::post('/login', array('as'=>'Login', 'uses'=>'UserController@login'));



});

Route::group(['prefix' => '/v1','middleware' => ['auth:api']], function() {

    Route::post('/booking', array('as'=>'Save', 'uses'=>'BookingController@store'));
    Route::get('/booking', array('as'=>'show', 'uses'=>'BookingController@index'));

    Route::post('/transaction', array('as'=>'Save', 'uses'=>'TransactionController@store'));
    Route::get('/transactions', array('as'=>'show', 'uses'=>'TransactionController@index'));

    Route::post('/logout', array('as'=>'Logout', 'uses'=>'UserController@logout'));


});
