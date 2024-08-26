<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset ('/assets/vendors/feather/feather.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/FontAwesome-pro/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('/assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{ asset ('/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset ('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset ('/assets/css/vertical-layout-brown/style.css')}}">
    <!-- endinject -->

    <title>@yield('title') | {{ config('app.name') }}</title>
</head>
<body>
<div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    @include('layouts.header')

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        @include('layouts.menu')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @yield('content')
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:../../partials/_footer.html -->
            @include('layouts.footer')
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{ asset ('assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{ asset ('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset ('assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>
<script src="{{ asset ('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset ('assets/js/off-canvas.js')}}"></script>
<script src="{{ asset ('assets/js/hoverable-collapse.js')}}"></script>
<script src="{{ asset ('assets/js/template.js')}}"></script>
<script src="{{ asset ('assets/js/settings.js')}}"></script>
<script src="{{ asset ('assets/js/todolist.js')}}"></script>
<script src="{{ asset ('assets/js/setting.js')}}"></script>
<!-- endinject -->

<!-- JS Libraies -->
<script src="{{asset('assets/vendors/jquery-validation/dist/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/vendors/jquery-validation/dist/additional-methods.min.js')}}"></script>
<!-- Custom js for this page-->
<!-- End custom js for this page-->
@yield('scripts')
</body>
</html>
