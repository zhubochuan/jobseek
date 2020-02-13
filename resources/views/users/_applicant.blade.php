@extends('users.e_default')
@section('title','Applicants Detail')
@section('content')

<div class="outside">
    <div>
        <div class="row1">
            <h3> Applicant Details</h3>
        </div>
        <div class="row2">
            <div class="col1">
                <span>Fullname:{{$user['name']}}</span><br>
                <span>Email:{{$user['email']}}</span><br>
                @foreach($app as $a)
                <span>Application Date: {{$a->created_at}}</span><br>
                @endforeach
                <span>Personally Summary:</span><br>
                <textarea name="" id="" cols="30" rows="10">
                {{$user['summary']}}
                </textarea><br>
                <span>Links:</span><br>
                <h5>Working experience:</h5>
                <div>

                    @foreach($exp as $e)
                    <p> Position: {{$e['position']}} </p>
                    <p> Duty: {{$e['duty']}} </p>
                    <p>company:{{$e['company']}}</p>
                    <p>start-end time: {{$e['startTime']}}---{{$e['endTime']}}</p>
                    @endforeach
                </div>

            </div>
            <div class="col2">
                <h2>Job Detail</h2>
                <!-----job user app--->
                <h3>{{$job['title']}}</h3>
                <p>{{$job['classification']}}</p>
                <p>post date:{{$job['created_at']}}</p>
                <p>close at:{{$job['closing date']}}</p>
                <p>location:{{$job['location']}}</p>
                <p>salary:{{$job['salary']}}</p>
                <p>type:{{$job['type']}}</p>
            </div>

        </div>
    </div>
</div>


@endsection