<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <a class="navbar-brand" href="{{ route('/') }}" style="color: white;">Kola job</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('/') }}"  style="color: white;">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('job') }}"  style="color: white;">Jobs</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <!--signup signin etc-->
            @if (Route::has('login'))
            <div class="top-right links">
                @auth
                <a href="{{ url('/home') }}" class="badge badge-primary">myHome</a>
                @else
                <a href="{{ route('login') }}" class=" badge badge-primary">Login</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="badge badge-primary">Register</a>
                @endif
                @endauth
            </div>
            @endif

        </form>
    </div>
</nav>