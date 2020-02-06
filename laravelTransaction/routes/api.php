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

Route::group(['prefix' => '/v1','middleware' => ['auth_api']], function() {

    Route::post('/store', array('as'=>'Save', 'uses'=>'TransactionController@store'));
    Route::get('/transactions', array('as'=>'Save', 'uses'=>'TransactionController@index'));


});
