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

Route::group(['prefix' => '/v1','middleware' => ['api_test']], function() {

    Route::post('/booking', array('as'=>'Save', 'uses'=>'BookingController@store'));
    Route::get('/booking', array('as'=>'Save', 'uses'=>'BookingController@index'));


});
