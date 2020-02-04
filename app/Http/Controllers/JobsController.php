<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Auth;


use Illuminate\Http\Request;


class JobsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function show(User $user)  //display jobs of users have post
    {
        $jobs = Auth::user()->jobs()
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $user = Auth::user();


        return view('users.showjob', compact('user', 'jobs'));
    }

    public function store(Request $request)  //post job
    {

        $jobs = Auth::user()->jobs()->create([
            'title' => $request->input('job_title'),
            'city or suburb' => $request->input('job_city'),
            'location' => $request->input('location'),
            'type' => $request->input('job_type'),
            'classification' => $request->input('job_classification'),
            'salary' => $request->input('method'),
            'description' => $request->input('job_des'),
            'closing date' => $request->input('close'),
        ]);
        $users = Auth::user();

        // $jobs=Job::where('title',$request->input('job_title'))->take(1)->get();

        return view('users.editjob', compact('jobs', 'users'));
    }

    //update eidt
    public function updatejob(Request $request,$id)
    {

        $job = Auth::user()->jobs()->find($id);
        $job->title = $request->input('job_title');
        $job['city or suburb'] = $request->input('job_city');
        $job->location = $request->input('location');
        $job->type = $request->input('job_type');
        $job->classification = $request->input('job_classification');
        $job->salary = $request->input('method');
        $job->description = $request->input('job_des');
        $job['closing date'] = $request->input('close');

        $job->save();

        return view('users.show');
    }
    //delete job
    public function delete($id)
    {
        Auth::user()->jobs()->find($id)->delete();
        
        return view('users.show');
    }
}
