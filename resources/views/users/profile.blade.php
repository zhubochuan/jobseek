
<form action="{{route('eprofile')}}" enctype="multipart/form-data" method="post">

    {{csrf_field() }}
    <div class="card" style="width: 100%;">
        <div class="card-header">
            Profile
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Business name <br><input type="text" value="{{$u['name']}}" name="ename" class="form-control"></li>
            <li class="list-group-item">Introduction <br><textarea name="eintro" id="" cols="50" rows="10">{{$u['introduction']}}</textarea></li>
            <li class="list-group-item">
                Classification<br>
                <select name="eclass" id="" class="custom-select">
                    <option value="Computer | Internet">Computer/Internet</option>
                    <option value="Telecommunication">Telecommunication</option>
                    <option value="Gaming">Gaming</option>
                    <option value="Accounting">Accounting</option>
                    <option value="Financial Industry">Financial Industry</option>
                    <option value="Banking">Banking</option>
                    <option value="Insurance">Insurance</option>
                    <option value="Advertising | Arts | Media | Exhibitions">Advertising/Arts/Media/Exhibitions</option>
                    <option value="Real Estate | Property Management">Real Estate/Property Management</option>
                    <option value="Sales">Sales</option>
                    <option value="Engineering | Construction | Decoration">Engineering/Construction/Decoration</option>
                    <option value="Land | Property Management">Land/Property Management</option>
                    <option value="household | Interior Design">houshold/Interio Design</option>
                    <option value="Education | Traning | Agency">Education/Training/Agency</option>
                    <option value="Legal | Advie">Legal/Advice</option>
                    <option value="Other">Other</option>
                </select>
            </li>
            <li class="list-group-item" class="custom-select">Company size
                <select name="esize" id="">
                    <option value="1-9">1-9</option>
                    <option value="10-100">10-100</option>
                    <option value="100-500">100-500</option>
                    <option value="500+">500+</option>
                </select>
            </li>
            <li class="list-group-item">City
                <select name="ecity" id="" class="custom-select">
                    <option value="perth">perth</option>
                    <option value="melbourne">Melbourne</option>
                    <option value="Sydney">Sydney</option>
                </select>
            </li>

            <li class="list-group-item">Detailed Address
                <br><input name="eaddress" type="text" class="form-control" value="{{$u['address']}}">
            </li>
            <li class="list-group-item">Website
                <br><input name="esite" type="text" class="form-control" value="{{$u['website']}}">
            </li>
            <li class="list-group-item">Phone number
                <br><input name="enumber" type="text" class="form-control" value="{{$u['phone']}}">
            </li>
            <li class="list-group-item"><input name="ereceive" type="checkbox" value="1">send a copy to my mail when I receive a new application</li>
            <li class="list-group-item"><input type="file" name="logo">choose a logo</li>
            <li class="list-group-item">
                <div style="border:solid 1px grey;width:200px; height:200px;"><img style="width:200px; height:200px;" src="{{url('uploads/images/filename.jpg')}}" alt="logo"></div>
            </li>
            <li class="list-group-item"><input type="submit" value="submit" class="btn btn-success"></li>

        </ul>
    </div>
</form>
