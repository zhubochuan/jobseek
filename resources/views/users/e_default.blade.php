<!DOCTYPE html>
<html>

<head>
    <title>@yield('title', 'Employer')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body>
    <script src="{{ mix('js/app.js') }}"></script>
    @include('users.e_header')
    <div class="container">
        @yield('content')
    </div>
    @include('layouts._footer')
</body>

</html>