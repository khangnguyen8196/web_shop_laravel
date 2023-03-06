<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:type" content="website" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') |  Shop_K</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!--Styles -->
    <link rel="stylesheet" href="{{asset('frontend/assets/fonts/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap5.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/custom.css')}}">
    @yield('css')
</head>
<body>
    <div id="app">
        @include('layouts.front_end.header')
        <main class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <aside>
                            @section('sidebar')
                                @include('layouts.front_end.sidebar')
                            @show
                        </aside>
                    </div>
                    <div class="col-8">
                        <div class="content">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </main>
        @include('layouts.front_end.footer')
    </div>

    <!-- Scripts -->
    <script src="{{asset('frontend/js/bootstrap.bundle.js')}}" ></script>
    <script src="{{asset('frontend/js/jquery-3.6.3.js')}}" ></script>
    <script src="{{asset('frontend/js/js_auth.js')}}" ></script>

</body>
</html>
