@extends('layouts.default')
@section('title','jobseeker profile')


@section('content')
<div style="height:100%;margin-top:10px;">
    <div style="height:100%;min-height:300px; width: 30%;background-color:white;float:left;margin-right:10%;">
        
        <div class="card" style="width: 100%;">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <img src="{{url('images/type.png')}}" class="icon">
                    <a href="{{route('seeker.home')}}">My Profile</a></li>
                <li class="list-group-item">
                    <img src="{{url('images/people.png')}}" class="icon">
                    <a href="{{route('jobs.saved')}}">Saved jobs</a></li>   <!---test this---->
                <li class="list-group-item">
                    <img src="{{url('images/company.png')}}" class="icon">
                    <a href="#">Applications</a></li>
                <li class="list-group-item">
                    <img src="{{url('images/key.png')}}" class="icon">
                    <a href="#">Changed Password</a></li>
            </ul>
        </div>
        
    </div>
    <div style="height:100%;min-height:300px; width: 60%;background-color:white;float:left;">
        <!--loading different pages, let other pages extends this pages--->
        <!--seeker home page---->
        @include('seeker._profile')

    </div>
</div>



@endsection