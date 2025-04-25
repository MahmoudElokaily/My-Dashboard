<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Elokaily | @yield("title" , $title ?? "")</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('dashboardAssets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('dashboardAssets/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <style>
        .bg-login-image {
            background: url("{{ asset('dashboardAssets/images/default/main-logo.png') }}") !important;
            background-size: contain !important;
            background-position: center !important;
        }
        .bg-register-image {
            background: url("{{ asset('dashboardAssets/images/default/main-logo.png') }}") !important;
            background-size: contain !important;
            background-position: center !important;
        }
    </style>
    @stack('css')
</head>

<body class="bg-gradient-primary">

<div class="container">

   @section("content")
    @show

</div>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('dashboardAssets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('dashboardAssets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset("dashboardAssets/vendor/jquery-easing/jquery.easing.min.js")}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset("dashboardAssets/js/sb-admin-2.min.js")}}"></script>
@stack('js')

</body>

</html>
