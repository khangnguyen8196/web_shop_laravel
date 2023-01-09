<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />

    <link rel="stylesheet" href="{{asset('admin/css/material-dashboard.css')}}">

</head>
<body>
    <div class="wrapper ">
        @include('layouts.include.admin_sidebar')
        <div class="main-panel">
            @include('layouts.include.admin_navbar')

            <div class="content">
                @yield('content')
            </div>
            @include('layouts.include.admin_footer')
        </div>
    </div>

    <script src="{{asset('admin/js/jquery.min.js')}}" defer></script>
    <script src="{{asset('admin/js/popper.min.js')}}" defer></script>
    <script src="{{asset('admin/js/bootstrap-material-design.min.js')}}" defer></script>
    <script src="{{asset('admin/js/perfect-scrollbar.jquery.min.js')}}" defer></script>
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    @yield('scripts')
</body>
</html>
