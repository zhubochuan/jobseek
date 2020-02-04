@php
$user=Auth::user();
$saved = false;
if($user) {
$saved = boolval($user->saveJobs()->find($job->id));
}
@endphp


@auth
@if($saved)
<button id="dis{{$job['id']}}" class="btn btn-danger">remove</button>
@else
<button id="{{$job['id']}}" class="btn btn-warning">Save</button>
@endif

<script>
    $(document).ready(function() {
        $("#{{$job['id']}}").click(function() { //find button id
            axios.post("{{route('jobs.save',['id'=>$job->id])}}")
                .then(function() {
                    swal('success', '', 'success');
                    location.reload();
                }, function(error) {
                    if (error.response && error.response.status === 401) {
                        swal('login please', '', 'error');
                    } else if (error.response && (error.response.data.msg || error.response.data.message)) {
                        swal(error.response.data.msg ? error.response.data.msg : error.response.data.message, '', 'error');
                    } else {
                        swal('system error', '', 'error');
                    }
                });
        });
        ///cancel
        $("#dis{{$job['id']}}").click(function() {
            axios.delete("{{ route('jobs.dissave',['id' => $job->id]) }}")
                .then(function() {
                    swal('remove success', '', 'success')
                        .then(function() {
                            location.reload();
                        });
                });
        });

    });
</script>
@endauth