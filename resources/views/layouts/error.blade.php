<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset ('assets/vendors/feather/feather.css')}}">
    <link rel="stylesheet" href="{{ asset ('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('assets/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset ('assets/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('assets/vendors/typicons/typicons.css')}}">
    <link rel="stylesheet" href="{{ asset ('assets/vendors/simple-line-icons/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{ asset ('assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{ asset ('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">

    <link rel="stylesheet" href="{{ asset ('assets/css/style.css')}}">
    <!-- endinject -->

    <link rel="stylesheet" href="{{ asset ('assets/vendors/jquery-toast-plugin/jquery.toast.min.css')}}">

    <link rel="shortcut icon" href="{{ asset ('assets/images/favicon.png')}}"/>
    <title>@yield('title') | {{ config('app.name') }}</title>
</head>
<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center text-center error-page bg-primary">
            <div class="row flex-grow">
                @yield('content')
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<script src="{{ asset ('assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{ asset ('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>

<script src="{{ asset ('assets/js/off-canvas.js')}}"></script>
<script src="{{ asset ('assets/js/template.js')}}"></script>
<script src="{{ asset ('assets/js/settings.js')}}"></script>
<script src="{{ asset ('assets/js/hoverable-collapse.js')}}"></script>
<script src="{{ asset ('assets/js/todolist.js')}}"></script>
<script src="{{ asset ('assets/js/setting.js')}}"></script>
<!-- JS Libraies -->
<script src="{{asset('assets/vendors/jquery-validation/dist/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/vendors/jquery-validation/dist/additional-methods.min.js')}}"></script>
<script src="{{asset('assets/vendors/jquery-toast-plugin/jquery.toast.min.js')}}"></script>

<script src="{{asset('assets/router/router.js')}}"></script>
<script src="{{asset('assets/router/routes.js')}}"></script>
<script src="{{asset('assets/router/index.js')}}"></script>


<script type="module">
    import applications from '/services/applications/App.service.js'

    applications.Index(`/api/helpers/departments`).then(function (data) {
        /* $.each(data, function (id, value) {
             let html = `<option value="${value.deCode}">${value.attributes.department}</option>`
             $('.deId').append(html)
         });*/
    })
</script>
</body>
</html>
