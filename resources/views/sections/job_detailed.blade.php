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
                <div><img class="logo" src="{{url($job['company logo'])}}" alt="company logo"></div>
                Posted:{{$job['craeted_at']}}<br>
                <img class="icon" src="{{url('images/pin.png')}}" alt="">{{$job['city or suburb']}}<br>
                Classification: {{$job['classification']}}<br>
                <span class="badge-primary">{{$job['type']}}</span>
            </div>
            @endforeach
        </div>
    </div>
</div>