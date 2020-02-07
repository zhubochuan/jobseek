<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <a class="navbar-brand" href="{{route('backhome')}}" style="color: white;">Employer Page</a>

    <!----job functions--->

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-itme">
                <a class="nav-link" href="{{ route('backhome') }}" style="color: white;"><span class="border border-info" style="padding: 2px;font-size:20px;">Home</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{ route('postjob') }}" style="color: white;"><span class="border border-info" style="padding: 2px;font-size:20px;">post a job</span></a>
            </li>

        </ul>


        <!-- login start -->
        <!--sth still need change here-->
        @guest
        <a href="{{ route('register') }}" style="color:white;">Sign up</a>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="{{ route('login') }}" style="color:white;">Log in</a>
        &nbsp;
        @endguest


        @auth
        <div class="dropdown" style="padding-right:50px;">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <!--sth still need change here-->
                <span class="border border-info" style="padding:2px;color:white;">{{ Auth::user()->name }}</span>&nbsp;&nbsp;
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                <a href="{{route('backhome')}}" class="dropdown-item">MyHomePage</a>
                <a href="" class="dropdown-item" href="">Jobs</a>
                <a href="" class="dropdown-item" href="">Applications</a>

                <a class="dropdown-item" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    logout
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
        @endauth
        <!-- login end -->
    </div>
</nav>