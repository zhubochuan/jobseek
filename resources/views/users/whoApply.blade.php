@extends('users.e_default')
@section('title','profile')


@section('content')
<div style="height:100%;margin-top:10px;">
    <div style="height:100%;min-height:300px; width: 30%;background-color:white;float:left;margin-right:10%;">
        @auth
        <div class="card" style="width: 100%;">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <img src="{{url('images/type.png')}}" class="icon">
                    <a href="{{route('backhome')}}">Profile</a></li>
                <li class="list-group-item">
                    <img src="{{url('images/people.png')}}" class="icon">
                    <a href="{{route('jobs.show',['jobs'])}}">jobs</a></li>
                <li class="list-group-item">
                    <img src="{{url('images/company.png')}}" class="icon">
                    <a href="{{route('viewApply')}}">Application</a></li>
                <li class="list-group-item">
                    <img src="{{url('images/key.png')}}" class="icon">
                    <a href="#">Changed Password</a></li>
            </ul>
        </div>
        @endauth
    </div>
    <div style="height:100%;min-height:300px; width: 60%;background-color:white;float:left;">
        <!--loading different pages, let other pages extends this pages--->
        
        <!---application---->
        @include('users.viewWhoApply')

    </div>
</div>



@endsection