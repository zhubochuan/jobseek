<div style="background-color: #00CED1;height:300px;margin:10px;">
    <div style="color:white;text-align:center; padding:30px;">
        <h1>Find Your Next Job Here</h1>
        <h3>No.1 Job Board In Australia</h3>
    </div>
    @include('layouts.search')
</div>

<div style="text-align:center;">
    Latest 5 jobs
</div>
<div class="job">
    @if(count($jobs)==0)
    @include('share.empty')
    @endif
    @foreach ($jobs as $job)
    <div class="card" style="width: 100%; margin-bottom:10px;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <h3 class="text-primary" style="display: inline;"><a href="{{route('jobDetail',['id'=>$job['id']])}}">{{ $job['title'] }}<a></h3>
                <span style="float: right;">{{$job->created_at->diffForHumans()}}</span><br>
                <h6>{{ $job['classification'] }}</h6>
                <img src="images/type.png" alt="" class="icon"> Type:&nbsp;<span class="badge-primary">{{ $job['type'] }}</span>
            </li>
            <li class="list-group-item">
                <img src="images/company.png" alt="" class="icon"> {{ $job['company name'] }}<br>
                <img src="images/pin.png" alt="" class="icon"> {{ $job['city or suburb'] }}<br>
                <img src="images/people.png" alt="" class="icon"> {{ $job['company size'] }} &nbsp; people<br>
            </li>
        </ul>
    </div>
    @endforeach


</div>