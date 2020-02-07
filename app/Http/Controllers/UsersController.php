<?php

namespace App\Http\Controllers;
use App\Models\Profile;
use App\Models\Experience;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job;
use Auth;
use Illuminate\Support\Facades\Request as FacadesRequest;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['show', 'create', 'store']
        ]);
    }
    //edit profile on emploer page and store
    public function profile(Request $request)
    {

        Auth::user()->profiles()->create([
            'logo' => $request->file('logo')->storeAs('images', 'filename.jpg', 'public_uploads'),
            'name' => $request->input('ename'),
            'company size' => $request->input('esize'),
            'city' => $request->input('ecity'),
            'classification' => $request->input('eclass'),
            'isreceive' => $request->input('ereceive'),
            'phone' => $request->input('enumber'),
            'introduction' => $request->input('eintro'),
            'address' => $request->input('eaddress'),
            'website' => $request->input('esite'),
        ]);

        return redirect()->back();
    }



    //Store exp
    public function storeExp(Request $request)
    {

        $exp = Auth::user()->experience()->create([
            'position' => $request->input('position'),
            'company' => $request->input('company'),
            'startTime' => $request->input('startTime'),
            'endTime' => $request->input('endTime'),
            'Position_status' => $request->input('Position_status'),
            'duty' => $request->input('duty'),
        ]);
        return $exp; //exp
    }

    //delete CV
    public function deleteCV()
    {
        Auth::user()->files()->delete();
        return redirect()->back();
    }


    //delete exp
    public function deleteExp($id)
    {
        $e = Experience::where('id', $id)->first();
        $e->delete();

        $users = Auth::user();
        return redirect()->back();
    }

    //seeker profile pages
    public function seekerhome()
    {
        $users = Auth::user();
        $exp = $users->experience()
            ->orderBy('created_at', 'desc')
            ->paginate(4);
        $r = $users->files()->get();


        return view('seeker.profile', ['users' => $users, 'exp' => $exp, 'r' => $r]);
    }

    //upload CV
    public function uploadfile($id, Request $request)  //users id
    {
        Auth::user()->files()->create([
            'path' => $request->file('resume')->store('resume'),

        ]);
        return redirect()->back();
    }

    //save phone number
    public function savephone($id, Request $request)
    {

        $user = User::find($id);

        $user->phone = $request->input('phone');

        $user->save();

        return $user->phone;
    }
    //save phone summary
    public function saveSummary($id, Request $request)
    {

        $user = User::find($id);

        $user->summary = $request->input('summary');

        $user->save();

        return $user->summary;
    }

    public function create()
    {
        return view('users.create');
    }

    //maybe need to change, pass users data here
    //profile  page
    public function show()  //this is employer homepage
    {


        if (Auth::user()->profiles()->find(1) == null) {
            return view('users.show2');
        } else {
            $user = Profile::orderBy('created_at', 'desc')->first();
            return view('users.show', ['u' => $user]);
        }
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
