<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'api'],function (){
    Route::get('/tableTypes','TableTypeController@index');
    Route::get('/tableTypes/{tableTypeId}','TableTypeController@show');

    Route::get('/positions','PositionController@index');
    Route::get('/positions/{positionId}','PositionController@show');

    Route::get('/handRanges','handRangeController@index');
    Route::put('/handRanges','handRangeController@update');
});
