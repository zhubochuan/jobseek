@php
$user=Auth::user();
$apply = false;
if($user) {
$apply = boolval($user->applyJobs()->find($job->id));
}
@endphp


@auth
@if($apply)
<button id="adis{{$job['id']}}" class="btn btn-secondary">Already Appplied</button>
@else
<a href="{{route('jobs.applypage',['id'=>$job['id']])}}" id="a{{$job['id']}}"><button class="btn btn-primary">Apply</button></a>
@endif


@endauth