@extends('users.e_default')

@section('title','jobDetail')
@section('content')
<div class="outside">
    <div>
        <div class="row1">
            Home / {{$jobs['title']}}
        </div>
        <div class="row2">
            <div class="col1">
                <h1>{{$jobs['title']}}</h1>
                <img class="icon" src="{{url('images/company.png')}} " alt="">{{$jobs['company name']}}<br>
                {{$jobs['content']}}
            </div>
            <div class="col2">
                <h2>Job Detail</h2>
                <div><img class="logo" src="" alt="company logo"></div>
                Posted:{{$jobs['created_at']}}<br>
                <img class="icon" src="{{url('images/pin.png')}}" alt="">{{$jobs['city or suburb']}}<br>
                Classification: {{$jobs['classification']}}<br>
                <span class="badge-primary">{{$jobs['type']}}</span>
                <hr>
                
                <a href="{{ route('goedit',['id'=>$jobs['id']]) }}" type="button"><button class="btn btn-success">Edit</button></a>
            </div>

        </div>
    </div>
</div>
@endsection