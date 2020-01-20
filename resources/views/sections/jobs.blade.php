<div>
    <h2 class="text-primary">Latest Jobs</h2>
</div>
<div class="job">
    @foreach ($jobs as $job)
    <div class="card" style="width: 100%; margin-bottom:10px;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <h5 class="text-primary" style="display: inline;"><a href="{{route('jobDetail',['id'=>$job['id']])}}">{{ $job['title'] }}<a></h5>
                <span style="float: right;">time</span><br>
                {{ $job['classification'] }}<br>
                {{ $job['type'] }}<br>
            </li>
            <li class="list-group-item">
                {{ $job['company name'] }}<br>
                {{ $job['city'] }}<br>
                {{ $job['company size'] }}<br>
            </li>
        </ul>
    </div>
    @endforeach


</div>