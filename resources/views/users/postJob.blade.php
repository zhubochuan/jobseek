@extends('users.e_default')

@section('title','postjob')
@section('content')
<!---This page is used to post job---->
<form action="{{route('jobs.store')}}" method="POST">
    {{ csrf_field() }}
    <h1>post job</h1>
    <div class="form-group">
        <label for="job_title">Job Title</label><span class="star">*</span>
        <input type="text" class="form-control" id="job_title" name="job_title" required>
    </div>
    <br>
    <label for="job_city">City</label><span class="star">*</span>
    <select class="form-control" required name="job_city" id="job_city">
        <option>Sydney</option>
        <option>Melbourne</option>
        <option>Adelaide</option>
        <option>Brisbane</option>
        <option>Perth</option>
        <option>Hobert</option>
    </select>
    <br>
    <div class="form-group">
        <label for="job_location">Location (Optional)</label>
        <input type="text" class="form-control" id="job_location" id="location" name="location">
        <small id="job_location" class="form-text text-muted">you can enter suburb name, street name or detailed address.</small>
    </div>
    <br>
    <label for="job_type">Type</label><span class="star">*</span>
    <select class="form-control" required id="job_type" name="job_type">
        <option>Full Time</option>
        <option>Part Time</option>
    </select>
    <br>
    <label for="job_classification">Classification</label><span class="star">*</span>
    <select class="form-control" required id="job_classification" name="job_classification">
        <option>Computer|Internet</option>
        <option>Gaming</option>
    </select>
    <br>


    <!---salary--choose only one method -->
    <label for="job_salary">Salary</label><span class="star">*</span>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="range" value="1">
        <label class="form-check-label" for="job_salary">Usage Range</label>
    </div>
    <script>
        $(function() {
            var indexs = 0;
            $("#range").click(function() {
                if ($(this).attr("checked")) {
                    $("#method1").show();
                    $("#method2").hide();
                } else {
                    $("#method1").hide();
                    $("#method2").show();
                }
            });
        });
    </script>
    <input type="text" class="col-auto my-1" id="method1" name="method" placeholder="enter number">
    

    <select class="col-auto my-1" name="method" id="method2">
        <option selected>Choose...</option>
        <option>$0-$20,000</option>
        <option>$20,001-$40,000</option>
        <option>$40,001-$60,000</option>
        <option>$60,001-$80,000</option>
        <option>$80,001-$100,000</option>
        <option>$100,001-$150,000</option>
        <option>$150,001-$200,000</option>
        <option>>$20,001</option>



    </select>
    <br>
    <!--consider use rich input---->
    <div class="form-group purple-border">
        <label for="job_description">Description</label><span class="star">*</span>
        <textarea class="form-control" id="job_description" rows="3" required name="job_des" id="job_des"></textarea>
    </div>
    <br>
    <!--consider use date picker--->
    <div class="form-group">
        <label for="job_title">Closing Date (optional)</label>
        <input type="text" class="form-control" id="job_title" placeholder="yyyy-mm-dd" id="close" name="close">
        <small>Deadline for new applicants.</small>
    </div>


    <br>
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>



@endsection