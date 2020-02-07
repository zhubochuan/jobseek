@extends('layouts.default')
@section('title','my saved')
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
                    <a href="{{route('jobs.saved')}}">Saved jobs</a></li>
                <!---test this---->
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
        <h4>Saved Jobs</h4>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Classification</th>
                    <th scope="col">Type</th>
                    <th scope="col">Updating Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jobs as $job)
                <tr>
                    <td>{{$job['title']}}<br> <img src="{{url('images/pin.png')}}" alt="" class="icon">{{$job['city or suburb']}}</td>
                    <td>{{$job['classification']}}</td>
                    <td><span class="badge-primary">{{ $job['type'] }}</span></td>
                    <td>{{$job['updated_at']}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



@endsection