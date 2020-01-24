<span class="span_green" style="color: white;font-weight:bold;">All</span>
@if(count($tjob)==0)
@include('share.empty')
@endif

<div class="selected">
    @foreach($tjob as $t)
    <a href="{{route('type_classification_job',['type'=>$t['type']])}}">{{$t['type']}}</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    @endforeach
</div>