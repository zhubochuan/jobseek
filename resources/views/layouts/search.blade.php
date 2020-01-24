<div style="margin:0 auto;width:90%;">
    <form action="{{route('search')}}" method="POST">
        {{ csrf_field() }}
        <span class="badge badge-secondary">Keywords:</span>
        <input name="title_name" type="text" placeholder="Title/Company Name" style=" width: 40%;padding: 12px 20px;margin: 8px 0;box-sizing: border-box;">
        <span class="badge badge-secondary">City:</span>
        <input name="city" type="text" placeholder="Sydney" style=" width: 40%; padding: 12px 20px; margin: 8px 0;box-sizing: border-box;">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>