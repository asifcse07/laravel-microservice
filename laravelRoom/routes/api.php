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

Route::group(['prefix' => '/v1','middleware' => ['room_api']], function() {

    Route::post('/store', array('as'=>'Save', 'uses'=>'RoomController@store'));
    Route::get('/rooms', array('as'=>'Save', 'uses'=>'RoomController@index'));


});
