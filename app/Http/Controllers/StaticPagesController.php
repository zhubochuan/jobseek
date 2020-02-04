<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Job;
use App\Models\Classification;
use App\Models\Type;
use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    function __construct()
    {
    }

    public function home(Job $job, Request $request)  //list 5 latest jobs on home page
    {
      

        //Every time back to the home page, reset selected classification history and type history
        $classification = new Classification;
        $selected_class = Classification::find(1);
        if ($selected_class != null) {
            $selected_class->name = null;
            $selected_class->save();
        }
        ////type reset
        $type = new Type;
        $selected_type = Type::find(1);
        if ($selected_type != null) {
            $selected_type->name = null;
            $selected_type->save();
        }

        $jobs = Job::orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        return view('static_pages/home', compact('jobs'));
    }

    public function job() //job page
    {
        //Every time back to the home page, reset selected classification histroy
        $classification = new Classification;
        $selected_class = Classification::find(1);
        if ($selected_class != null) {
            $selected_class->name = null;
            $selected_class->save();
        }
        ////type reset
        $type = new Type;
        $selected_type = Type::find(1);
        if ($selected_type != null) {
            $selected_type->name = null;
            $selected_type->save();
        }

        $jobs = Job::paginate(6);
        $cjob = Job::distinct('classification')->orderBy('classification')->get();
        $tjob = Job::distinct('type')->orderBy('type')->get();
        return view('static_pages/job', compact('jobs', 'cjob', 'tjob'));
    }

    public function classjob($class) //show job as classification
    {
        //store selected classification into db
        $classification = new Classification;
        $selected = Classification::find(1);
        if ($selected == null) {
            $classification->name = $class;
            $classification->save();
        } else {
            $selected->name = $class;
            $selected->save();
        }
        $jobs = Job::where('classification', $class)
            ->paginate(6);

        $cjob = Job::distinct('classification')->orderBy('classification')->get();
        $tjob = Job::distinct('type')->orderBy('type')->get();

        return view('static_pages/job', compact('jobs', 'cjob', 'tjob'));
    }

    public function typejob($type) //show job as type under selected classification
    {
        //store selected type into db
        $t = new Type;
        $selected = Type::find(1);
        if ($selected == null) {
            $t->name = $type;
            $t->save();
        } else {
            $selected->name = $type;
            $selected->save();
        }


        //if class==null or if class!=null
        $selected = Classification::find(1);
        if ($selected == null) {
            $jobs = Job::where('type', $type)
                ->paginate(6);
        } else {
            $jobs = Job::where('type', $type)
                ->where('classification', $selected['name'])
                ->paginate(6);
        }
        $cjob = Job::distinct('classification')->orderBy('classification')->get();
        $tjob = Job::distinct('type')->orderBy('type')->get();

        return view('static_pages/job', compact('jobs', 'cjob', 'tjob'));
    }

    public function jobDetail($id)   //after click job title link
    {
        $jobs = Job::Where('id', $id)
            ->get();
        return view('static_pages/jobDetail', compact('jobs'));
    }
    public function about()  //about page
    {
        return view('static_pages/about');
    }

    public function search(Request $request)  //search function, under selected classification and type
    {
        $builder = Job::query();

        //title or company name
        if ($search = $request->input('title_name')) {
            $like = '%' . $search . '%';
            $builder->where(function ($query) use ($like) {
                $query->where('title', 'like', $like)
                    ->orWhere('company name', 'like', $like);
            });
        }

        //suburb
        if ($search2 = $request->input('city')) {
            $builder->where('city or suburb', $search2);
        }

        //classification
        $classification = new Classification;
        $selected_class = Classification::find(1)->name;
        if ($selected_class != null) {
            $builder->where('classification', $selected_class);
        }

        //type
        $type = new Type;
        $selected_type = Type::find(1)->name;
        if ($selected_type != null) {
            $builder->where('type', $selected_type);
        }


        $jobs = $builder->paginate(6);
        $cjob = Job::distinct('classification')->orderBy('classification')->get();
        $tjob = Job::distinct('type')->orderBy('type')->get();

        return view('static_pages/job', compact('jobs', 'cjob', 'tjob'));
    }

    //save jobs
    public function save($id, Request $request)
    {

        $savejob = Job::Where('id', $id)
            ->get();
        $user = $request->user();
        if ($user->saveJobs()->find($id)) {
            return [];
        }

        $user->saveJobs()->attach($savejob);

        return [];
    }
    //cancel jobs
    public function dissave($id, Request $request)
    {
        $savejob = Job::Where('id', $id)
            ->get();
        $user = $request->user();
        $user->saveJobs()->detach($savejob);

        return [];
    }
    //display user saved jobs
    public function displaySave(Request $request)
    {
        $jobs = $request->user()->saveJobs()->paginate(16);

        return view('sections.saved', ['jobs' => $jobs]);
    }
}
