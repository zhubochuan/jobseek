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
Route::get('/classjob/{class}', 'StaticPagesController@classjob')->name('classification_job');
Route::get('/typejob/{type}', 'StaticPagesController@typejob')->name('type_classification_job');
Route::post('/search', 'StaticPagesController@search')->name('search');

//save jobs,remove jobs,display saved jobs
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::post('jobs/{id}/save', 'StaticPagesController@save')->name('jobs.save');
    Route::delete('jobs/{id}/save', 'StaticPagesController@dissave')->name('jobs.dissave');
    Route::get('jobs/savedjobs', 'StaticPagesController@displaySave')->name('jobs.saved');
});

Auth::routes(['verify' => true]);

//users
Route::resource('users', 'UsersController');

//only employer
Route::get('post/job', 'UsersController@postJob')->name('postjob')->middleware('employer');
Route::get('backhome','UsersController@show')->name('backhome')->middleware('employer');
Route::resource('jobs', 'JobsController');
Route::get('editpage/{id}','UsersController@goedit')->name('goedit');
Route::post('updatejobpage/{id}','JobsController@updatejob')->name('updatejobpage');
Route::delete('deletejob/{id}','JobsController@delete')->name('deletejob');

