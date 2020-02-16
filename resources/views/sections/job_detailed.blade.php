@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if(session()->has($msg))
<div class="flash-message">
    <p class="alert alert-{{ $msg }}">
        {{ session()->get($msg) }}
    </p>
</div>
@endif
@endforeach


<div class="outside">
    <div>
        @foreach($jobs as $job)
        <div class="row1">
            Home / {{$job['title']}}
        </div>
        <div class="row2">
            <div class="col1">
                <h1>{{$job['title']}}</h1>
                <img class="icon" src="{{url('images/company.png')}} " alt="">{{$job['company name']}}<br>
                {{$job['content']}}
            </div>
            <div class="col2">
                <h2>Job Detail</h2>
                <div><img class="logo" src="{{url('uploads/images/filename.jpg')}}" alt="company logo"></div>
                Posted:{{$job['created_at']}}<br>
                <img class="icon" src="{{url('images/pin.png')}}" alt="">{{$job['city or suburb']}}<br>
                Classification: {{$job['classification']}}<br>
                <span class="badge-primary">{{$job['type']}}</span>
                <hr>
                @include('sections.save')
                @include('sections.apply')
                @include('sections.share')
            </div>

            @endforeach
        </div>
    </div>
</div>