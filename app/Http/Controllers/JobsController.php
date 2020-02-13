<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Auth;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

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
    //header
    public function hshow()  //display jobs of users have post from header
    {
        $jobs = Auth::user()->jobs()
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $user = Auth::user();


        return view('users.showjob', compact('user', 'jobs'));
    }

    public function store(Request $request)  //post job
    {

        $this->validate($request, [
            'job_title' => 'required|max:50',
            'job_city' => 'required',
            'job_type' => 'required',
            'job_classification' => 'required',
            'job_des' => 'required'
        ]);


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


        return view('users.editjob', compact('jobs', 'users'));
    }

    //update eidt
    public function updatejob(Request $request, $id)
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
        $users = Auth::user();

        return view('users.show', ['u' => $users]); //pass users as u
    }
    //delete job
    public function delete($id)
    {
        Auth::user()->jobs()->find($id)->delete();
        $users = Auth::user();


        return view('users.show', ['u' => $users]);
    }

    //share on linkedIn
    public function share(Request $request, Job $job)
    {
        $user = Auth::user();

        $client = new Client([
            'base_uri' => "https://api.linkedin.com",
            'timeout' => 5.0,
            'headers' => [
                'Authorization' => 'Bearer ' . $user->linkedin_token,
                'Accept' => 'application/json',
            ],
        ]);

        // Call linkedin post article API' POST 
        try {
            $response = $client->post('/v2/ugcPosts', [
                'body' => json_encode([
                    "author" => "urn:li:person:" . $user->linkedin_id,
                    "lifecycleState" => "PUBLISHED",
                    "specificContent" => [
                        "com.linkedin.ugc.ShareContent" => [
                            "shareCommentary" => [
                                "text" => "New Job Post! " . $job->title
                            ],
                            "shareMediaCategory" => "ARTICLE",
                            "media" => [
                                [
                                    "status" => "READY",
                                    "description" => [
                                        "text" => $job->description
                                    ],
                                    "originalUrl" => route('jobDetail', ['id' => $job->id]),
                                    "title" => [
                                        "text" => $job->title
                                    ]
                                ]
                            ]
                        ]
                    ],
                    "visibility" => [
                        "com.linkedin.ugc.MemberNetworkVisibility" => "PUBLIC"
                    ]

                ])
            ]);
        } catch (RequestException $exception) {
            session()->flash('warning', 'something error!!');

            return $exception;
        }

        session()->flash('success', 'share success!!');

        return redirect()->route('jobDetail', ['id' => $job->id]);
    }
}
