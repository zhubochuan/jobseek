<table class="table">
    <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Classification</th>
            <th scope="col">Type</th>
            <th scope="col">Closing Date</th>
        </tr>
    </thead>
    <tbody>
        @if($jobs->count()==0)
        @include('share.empty')
        @endif

        @foreach($jobs as $job)
        <tr>
            <th scope="row">{{$job->title}}</th>
            <td>{{$job['classification']}}</td>
            <td>{{$job['type']}}</td>
            <td>{{$job['closing date']}}</td>
        </tr>
        @endforeach

    </tbody>
</table>