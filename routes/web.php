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

Route::get('/', 'StaticPagesController@home')->name('/');
Route::get('/job', 'StaticPagesController@job')->name('job');
Route::get('/jobDetail/{id}', 'StaticPagesController@jobDetail')->name('jobDetail');
Route::get('/about', 'StaticPagesController@about')->name('about');
Route::get('/classjob/{class}','StaticPagesController@classjob')->name('classification_job');
Route::get('/typejob/{type}','StaticPagesController@typejob')->name('type_classification_job');
Route::post('/search','StaticPagesController@search')->name('search');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');  //log in home 


