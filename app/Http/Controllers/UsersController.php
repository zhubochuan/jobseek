<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job;
use Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['show', 'create', 'store']
        ]);
    }



    public function create()
    {
        return view('users.create');
    }

    //maybe need to change, pass users data here
    public function show()  //this is employer homepage
    {
        return view('users.show');
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        $user = Auth::user();
        return  view('users.editpage', compact('user'));
    }
    //go edit
    public function goedit($id)
    {
        $jobs = Job::Where('id', $id)
            ->get();
        return  view('users.editpage', compact('jobs'));
    }

    public function update(User $user, Request $request)
    {
        $this->authorize('update', $user);
    }

    //post jobs
    public function postJob(Job $job, User $user)
    {

        return view('users.postJob');
    }
    //edit jobs
    public function editJob(Job $job)
    {
        return;
    }
    //delete jobs
    public function deleteJob(Job $job)
    {
    }
}
