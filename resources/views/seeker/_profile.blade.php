<!---phone number---->

<!----pass data--users and exp on this page----->

{{ csrf_field() }}
<div class="card" style="width: 100%;margin-bottom:30px;" id="app">
  <div class="card-header">
    <h3>Phone Number</h3>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
      <!----edit here----->
      <p v-if="!isShow">{{$users['phone']}}</p>
      <input type="button" value="Edit" @click="saveAndcancel()" v-if="!isShow" class="btn btn-primary">
      <input type="text" v-if="isShow" id="phone" name="phone" v-model="message">
      <div style="margin-top:10px;">
        <input type="button" v-if="isShow" value="Save" class="btn btn-success" @click="save()">
        <input type="button" v-if="isShow" value="Cancel" class="btn btn-secondary" @click="saveAndcancel()">
      </div>
    </li>


  </ul>
</div>
<!--vue asyn--phone--->
<script type="text/javascript">
  var app = new Vue({
    el: "#app",
    data: {
      message: "phone number",
      isShow: false, //phone
    },
    methods: {
      saveAndcancel: function() {
        this.isShow = !this.isShow;
      },
      save: function() {
        var that = this;
        axios.post("{{route('phone.save',['id'=>$users->id])}}", {
          phone: that.message
        }).then(function(response) {
          that.message = response;
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
        })
      },

    },
  })
</script>


<!---summary--->
<div class="card" style="width: 100%;margin-bottom:30px;" id="app2">
  <div class="card-header">
    <h3>Summary</h3>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
      <!----edit here----->
      <p v-if="!isShow">{{$users['summary']}}</p>
      <textarea name="summary" id="summary" cols="30" rows="10" v-if="isShow" v-model="message">{{$users['summary']}}</textarea>
      <br><input type="button" value="Edit" @click="saveAndcancel()" v-if="!isShow" class="btn btn-primary">

      <div style="margin-top:10px;">
        <input type="button" v-if="isShow" value="Save" class="btn btn-success" @click="save()">
        <input type="button" v-if="isShow" value="Cancel" class="btn btn-secondary" @click="saveAndcancel()">
      </div>
    </li>

  </ul>
</div>


<!--vue asyn--summary--->
<script type="text/javascript">
  var app = new Vue({
    el: "#app2",
    data: {
      message: "personal summary",
      isShow: false,
    },
    methods: {
      saveAndcancel: function() {
        this.isShow = !this.isShow;
      },
      save: function() {
        var that = this;
        axios.post("{{route('summary.save',['id'=>$users->id])}}", {
          summary: that.message
        }).then(function(response) {
          that.message = response;
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
        })
      },

    },
  })
</script>


<!----personal links---->
<!---keep this------>
<div class="card" style="width: 100%;margin-bottom:30px;">
  <div class="card-header">
    <h3>Personal Links</h3>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">text</li>
    <li class="list-group-item">Edit</li>
  </ul>
</div>


<!----working experience---->
<!---do----->
<div class="card" style="width: 100%;margin-bottom:30px;" id="app3">
  <div class="card-header">
    <h3>Working Experience</h3>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
      <!----edit here----->
      @foreach($exp as $e)

      <div v-if="!isShow">
        <span>{{$e['position']}}</span> <span style="margin-left:10px;">&copy;{{$e['company']}}</span>
        <br>
        <span>{{$e['startTime']}}</span>---- <span>{{$e['endTime']}}</span> <span style="margin-left:10px;">
          @if($e['Position_status']=='1')
          In Position
          @endif
        </span>
        <br>
        <div>{{$e['duty']}}</div>
        <br>
        <!--click and remove---->
        <form action="{{route('deleteExp',['id'=>$e['id']])}}" method="post">
          {{ method_field('DELETE') }}
          {{csrf_field() }}
          <input type="submit" value="Delete" class="btn btn-danger">
          <!-- <input type="button" value="Delete" class="btn btn-danger" @click="deleteme({{$e['id']}})"> -->
        </form>
        <br>
        <hr>
      </div>
      @endforeach

      <!--hide form----->
      <div name="form" id="form" v-if="isShow">


        <label for="">Position</label><br>
        <input type="text" value="" id="position" name="position" v-model="message2" value="message2"><br>
        <label for="">Company</label><br>
        <input type="text" value="" id="company" name="company" v-model="message3"><br>
        <label for="">Start Time</label><br>
        <input type="date" value="" v-model="message4" name="startTime"><br>
        <label for="">End Time</label><br>
        <input type="date" value="" v-model="message5" name="endTime"><br>
        <input type="checkbox" value="1" v-model="message6" name="Position_status">in position
        <br>
        <label for="">Job Duties</label><br>
        <textarea name="" id="" cols="30" rows="10" v-model="message7" name="duty"></textarea><br>

      </div>
      <!---end hide form------>
      <br><input type="button" value="Add working experience" @click="add()" v-if="!isShow" class="btn btn-success" style="width:100%;">

      <div style="margin-top:10px;">
        <input type="button" v-if="isShow" value="Save" class="btn btn-success" @click="save()">
        <input type="button" v-if="isShow" value="Cancel" class="btn btn-secondary" @click="add()">
      </div>
    </li>

  </ul>
</div>


<!--vue asyn--working exp--->
<script type="text/javascript">
  var app = new Vue({
    el: "#app3",
    data: {
      message: "experience",
      exp_id: "1",
      message2: "position",
      message3: "company",
      message4: "startTime",
      message5: "endTime",
      message6: "Postion_status",
      message7: "duty",

      isShow: false,
    },
    methods: {
      add: function() {
        this.isShow = !this.isShow;
      },
      deleteme: function(p) { //error here, try other solution to remove
        console.log(p);
        axios.delete("{{route('deleteExp',['id'=>1])}}").then(function(response) {

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
        })
      },

      save: function() {
        var that = this;
        axios.post("{{route('storeExp',['id'=>$users->id])}}", {
          position: that.message2,
          company: that.message3,
          startTime: that.message4,
          endTime: that.message5,
          Position_status: that.message6,
          duty: that.message7,
        }).then(function(response) {

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
        })
      },

    },
  })
</script>


<!---education experience------->
<div class="card" style="width: 100%;margin-bottom:30px;">
  <div class="card-header">
    <h3>Education Experience</h3>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">text</li>
    <li class="list-group-item">Edit</li>
  </ul>
</div>


<!---Resume------>
<!---do----->
<div class="card" style="width: 100%;margin-bottom:30px;" id="resume">
  <div class="card-header">
    <h3>Resume</h3>
  </div>
  <ul class="list-group list-group-flush">
    <div>
      @foreach($r as $ru)
      <p><span style="color:red;">submitted resume</span>: {{$ru['path']}}</p>
      @endforeach
    </div>
    <li class="list-group-item"><button class="btn btn-info" @click="add()" v-if="!show">Edit</button></li>
    <!--upload area------->
    <form action="{{route('file_upload',['id'=>$users['id']])}}" enctype="multipart/form-data" method="post">
      {{csrf_field() }}
      <div v-if="show">
        <input type="file" name="resume">
      </div>
      <li class="list-group-item">
        <input type="submit" class="btn btn-success" v-if="show" value="upload">
        <button class="btn btn-secondary" @click="add()" v-if="show">Cancel</button>
      </li>
    </form>
  </ul>
</div>

<li class="list-group-item" style="margin-top:-40px;">
  <form action="{{route('deleteCV')}}" method="post">
    {{ method_field('DELETE') }}
    {{csrf_field() }}
    <input type="submit" value="Delete" class="btn btn-danger">
  </form>
</li>


<script>
  var app = new Vue({
    el: "#resume",
    data: {
      show: false,

    },


    methods: {
      add: function() {
        this.show = !this.show;
      },


    }
  })
</script>


<!---portfolio---->
<div class="card" style="width: 100%;margin-bottom:30px;">
  <div class="card-header">
    <h3>Portfolio</h3>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">text</li>
    <li class="list-group-item">Edit</li>
  </ul>
</div>