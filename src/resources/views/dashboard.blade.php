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
    <link href="{{asset("dashboardAssets/vendor/fontawesome-free/css/all.min.css")}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('dashboardAssets/css/sb-admin-2.min.css')}}" rel="stylesheet">
    @stack("css")

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    @include("dashboard::inc.sidebar")

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            @include("dashboard::inc.topbar")

            <!-- Begin Page Content -->
            <div class="container-fluid">

                @section("content")
                @show

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        @include("dashboard::inc.footer")


    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{route("dashboard.logout")}}">Logout</a>
            </div>
        </div>
    </div>
</div>
{{--jquery--}}
<script src="{{asset('dashboardAssets/js/jquery/jquery-3.7.1.min.js.js')}}"></script>

<!-- Include Chart.js from CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('dashboardAssets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('dashboardAssets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('dashboardAssets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('dashboardAssets/js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{asset('dashboardAssets/vendor/chart.js/Chart.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('dashboardAssets/js/demo/chart-area-demo.js')}}"></script>
<script src="{{asset('dashboardAssets/js/demo/chart-pie-demo.js')}}"></script>

@stack('js')

</body>

</html>
