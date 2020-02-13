@extends('layouts.default')
@section('title', 'job Detail')
@section('content')


@include('share._messages')


@foreach($jobs as $job)
<!---$jobs---->
<form action="{{route('jobs.apply',['id'=>$job['id']])}}" method="post">
    <!-- {{ method_field('DELETE') }} -->
    {{csrf_field() }}
    <div class="outside">
        <div>

            <div class="">
                <h3 style="color: royalblue;">Apply for Job</h3>
                <p>Tips: you can upload resume and portfolio under "my profile", and choose to send to employers when apply for jobs.</p>
            </div>
            <div class="">
                <div class="col1">
                    <input type="checkbox" value="1">Allow emloyer to see my phone number <br>
                    <input type="checkbox" value="1">Attach Resume <br>
                    <div>
                        <!--display resume file name here----->

                    </div>
                    <br>
                    <label for="">Message</label><br>
                    <textarea name="" id="" cols="50" rows="10" placeholder="what you want to say...."></textarea>
                    <br><br>
                    <input type="submit" class="btn btn-primary" value="submit">
</form>
<form action="{{route('disapply',['id'=>$job['id']])}}" method="post">
    {{ method_field('DELETE') }}
    {{csrf_field() }}

    @php
    $user=Auth::user();
    $apply = false;
    if($user) {
    $apply = boolval($user->applyJobs()->find($job->id));
    }
    @endphp


    @auth
    @if($apply)
    <br>
    <input type="submit" value="delete" class="btn btn-danger">
    @endif


    @endauth
</form>

</div>


<div class="col2">
    <h2>Job Detail</h2>
    <h4>{{$job['title']}}</h4>
    <div><img class="logo" src="" alt="company logo"></div>
    Posted:{{$job['created_at']}}<br>
    <img class="icon" src="{{url('images/pin.png')}}" alt="">{{$job['city or suburb']}}<br>
    Classification: {{$job['classification']}}<br>
    <span class="badge-primary">{{$job['type']}}</span>
    <hr>
    @include('sections.save')
    @include('sections.apply')
</div>

@endforeach
</div>
</div>
</div>
@stop