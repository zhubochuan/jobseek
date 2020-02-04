<div class="outside">
    <div style="color:white;text-align:center; padding:30px;margin-bottom:10px;">
        <div class="alljobs_row1" style="color:white;text-align:center; padding:30px;">
            @include('layouts.search')
        </div>
    </div>
    <div class="row2">
        <div class="col1" style="background-color: #f1f1f1;">
            <div>
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
                                <img src="{{url('images/type.png')}}" alt="" class="icon"> Type:&nbsp;<span class="badge-primary">{{ $job['type'] }}</span>
                            </li>
                            <li class="list-group-item">
                                <img src="{{url('images/company.png')}}" alt="" class="icon"> {{ $job['company name'] }}<br>
                                <img src="{{url('images/pin.png')}}" alt="" class="icon"> {{ $job['city or suburb'] }}<br>
                                <img src="{{url('images/people.png')}}" alt="" class="icon"> {{ $job['company size'] }} &nbsp; people<br>
                            </li>
                        </ul>
                        <!----->
                        @include('sections.save')
                    </div>
                    @endforeach
                </div>
                <div>
                    {{$jobs->links() }}
                </div>
            </div>
        </div>
        <div class="col2" style="background-color: #f1f1f1;">
            <div style="background-color: white; padding:5px;">
                <h5>Classification:</h5>
                <div>
                    <strong>Selected classification:</strong>
                    @php

                    $current=DB::table('classification')->first();
                    if($current!=null)
                    {
                    $current=$current->name;
                    echo $current;
                    }
                    @endphp
                </div>
                @include('sections.classification')
            </div>
            <div style="margin-top:20px;background:white;padding:5px;">
                <h5>Type:</h5>
                <div>
                    <strong>Selected Type:</strong>
                    @php
                    $current=DB::table('types')->first();
                    if($current!=null)
                    {
                    $current=$current->name;
                    echo $current;
                    }
                    @endphp
                </div>
                @include('sections.type')
            </div>
        </div>

    </div>
</div>