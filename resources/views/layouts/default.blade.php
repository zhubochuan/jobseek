<!DOCTYPE html>
<html>

<head>
    <title>@yield('title', 'Kola App')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script type="text/javascript" src="{{asset('js/vue.js')}}"></script>
</head>

<body>
    <script src="{{ mix('js/app.js') }}"></script>
    @include('layouts._header')
    <div class="container">
        @yield('content')
    </div>
    @include('layouts._footer')
</body>

</html>