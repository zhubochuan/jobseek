<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Validator;

class JobApi extends Controller
{
    public function job()
    {
        return response()->json(Job::get(), 200);
    }
    public function jobByid($id)
    {
        $job = Job::find($id);
        if (is_null($job)) {
            return response()->json('Record not found!', 404);
        }
        return response()->json(Job::find($id), 200);
    }
    public function jobSave(Request $request)
    {
        $rules = [
            'title' => 'required|min:3',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $job = Job::create($request->all());
        return response()->json($job, 201);
    }
    //update
    public function jobUpdate(Request $request, $id)
    {
        $job = Job::find($id);
        if (is_null($job)) {
            return response()->json('Record not found!', 404);
        }
        $job->update($request->all());
        return response()->json($job, 200);
    }
    public function jobDelete(Request $request, $id)
    {
        $job = Job::find($id);
        if (is_null($job)) {
            return response()->json('Record not found!', 404);
        }
        $job->delete();
        return response()->json(null, 204);
    }
}
