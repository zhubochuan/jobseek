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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('jobs', 'JobApi@job');
    Route::get('jobs/{id}', 'JobApi@jobByid');
    Route::post('jobs', 'JobApi@jobSave');
    Route::put('jobs/{id}', 'JobApi@jobUpdate');
    Route::delete('jobs/{id}', 'JobApi@jobDelete');
});
