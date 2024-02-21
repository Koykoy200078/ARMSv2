<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link href="{{ asset('assets/css/icone91f.css') }}" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

    <!-- Select2 CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.min.css') }}">

    <!-- Datatables CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatables.min.css') }}">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/feather.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">



</head>

<body>

    @yield('content')

    <div class="sidebar-overlay" data-reff=""></div>

    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Feather Js -->
    <script src="{{ asset('assets/js/feather.min.js') }}"></script>

    <!-- Slimscroll -->
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>

    <!-- Select2 Js -->
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>

    <!-- Datatables JS -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>

    <!-- counterup JS -->
    <script src="{{ asset('assets/js/jquery.waypoints.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>

    <!-- Apexchart JS -->
    <script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>

</html>