<!---who detail application page---->
<div style="height:100%;min-height:300px; width: 60%;background-color:white;float:left;">
    <h4>Applications</h4>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Applicant</th>
                <th scope="col">Title</th>
                <th scope="col">Closing Date</th>
            </tr>
        </thead>
        <tbody>
            <!---below need to be changed------->
            <!---pass user and job here---->
            <tr>
                
                <td><a href="{{route('applier_detail',['uid'=>$a_user['id'],'jid'=>$a_job['id'],'aid'=>$aid ])}}"><span style="font-weight:bold;font-size:15px;">{{$a_user['name']}} </span></a></td>
                <td>{{$a_job['title']}}</td>
                <td>{{$a_job['closing date']}}</td>
            </tr>
        </tbody>
    </table>
</div>