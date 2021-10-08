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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group(['middleware' => ['json.response']], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:api');

    // public routes
    Route::post('/login', 'Api\UserController@login')->name('login.api');

    // private routes
    Route::middleware('auth:api')->group(function () {
        Route::get('/logout', 'Api\UserController@logout')->name('logout.api');
    });
});
