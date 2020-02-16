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
Route::get('/jobDetail/{id}', 'StaticPagesController@jobDetail')->name('jobDetail'); //show job details
Route::get('/about', 'StaticPagesController@about')->name('about');
Route::get('/classjob/{class}', 'StaticPagesController@classjob')->name('classification_job');
Route::get('/typejob/{type}', 'StaticPagesController@typejob')->name('type_classification_job');
Route::post('/search', 'StaticPagesController@search')->name('search');

//save jobs,remove jobs,display saved jobs, apply jobs
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::post('jobs/{id}/save', 'StaticPagesController@save')->name('jobs.save');  //save job
    Route::delete('jobs/{id}/save', 'StaticPagesController@dissave')->name('jobs.dissave');
    Route::get('jobs/savedjobs', 'StaticPagesController@displaySave')->name('jobs.saved'); //saved
    Route::get('seekerhome', 'UsersController@seekerhome')->name('seeker.home');
    Route::post('savephone/{id}', 'UsersController@savephone')->name('phone.save');  //update phone number
    Route::post('saveSummary/{id}', 'UsersController@saveSummary')->name('summary.save');  //update summary
    Route::post('storeExp/{id}', 'UsersController@storeExp')->name('storeExp'); //store Exp
    Route::delete('deleteExp/{id}', 'UsersController@deleteExp')->name('deleteExp'); //delete Exp
    Route::post('uploadfile/{id}', 'UsersController@uploadfile')->name('file_upload'); //upload file
    Route::delete('deleteCV', 'UsersController@deleteCV')->name('deleteCV');  //delete CV
    Route::post('jobs/{id}/apply', 'StaticPagesController@apply')->name('jobs.apply'); //apply jobs
    Route::get('jobs/{id}/goapplypage', 'StaticPagesController@applypage')->name('jobs.applypage'); //apply page
    Route::get('jobs/appliedjobs', 'StaticPagesController@applied')->name('jobs.applied'); //applied jobs
    Route::delete('jobs/{id}/removeApply', 'StaticPagesController@disapply')->name('disapply'); //disapply
});

Auth::routes(['verify' => true]);  //verify email

//users
Route::resource('users', 'UsersController');

//only employer
Route::get('post/job', 'UsersController@postJob')->name('postjob')->middleware('employer');
Route::get('backhome', 'UsersController@show')->name('backhome')->middleware('employer');  //home page
Route::resource('jobs', 'JobsController');
Route::get('editpage/{id}', 'UsersController@goedit')->name('goedit'); //edit
Route::post('updatejobpage/{id}', 'JobsController@updatejob')->name('updatejobpage'); //update or delete page , after click edit button on editpage
Route::delete('deletejob/{id}', 'JobsController@delete')->name('deletejob');
Route::post('eprofile', 'UsersController@profile')->name('eprofile');  //edit prifle on employer pages
Route::get('headershow', 'JobsController@hshow')->name('eshow'); //saved jobs on e_header page 
Route::get('viewapply', 'UsersController@viewApply')->name('viewApply'); //viewApply
Route::get('applier/detail/{uid}/{jid}/{aid}', 'UsersController@applierDetail')->name('applier_detail'); //applier detail

//mail
Route::get('send', 'StaticPagesController@html_email');

//linkedIn 
Route::get('linkedin', function () {
    return view('auth.login');
});

Route::get('/redirect', 'SocialAuthLinkedinController@redirect');
Route::get('/callback', 'SocialAuthLinkedinController@callback');

//share on linkedin
Route::get('sharejob/{job}', 'JobsController@share')->name('linkedin.share');