<span class="span_green" style="color: white;font-weight:bold;">All</span>
@if(count($cjob)==0)
@include('share.empty')
@endif

<div class="selected">
    @foreach($cjob as $c)
    <a href="{{route('classification_job',['class'=>$c['classification']])}}">{{$c['classification']}}</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    @endforeach
</div>