<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') |  Dashboard Template</title>

    <!-- CSRF Token -->
    <<meta name="csrf-token" content="{{ csrf_token() }}">
    @include('layouts.admin.head-css')
</head>
<body>
    <div class="wrapper ">
        @include('layouts.admin.sidebar')
        <div class="main-panel">
            @include('layouts.admin.navbar')

            <div class="content">
                @yield('content')
            </div>
            @include('layouts.admin.footer')
        </div>
    </div>
    @include('layouts.admin.vendor-scripts')
    {{-- <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
    

</body>
</html>
