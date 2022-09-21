<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Log In | Hyper - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset("admin/assets/images/favicon.ico")}}">


    <!-- App css -->
    <link href="{{asset('admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/assets/css/app-creative.min.css')}}" rel="stylesheet" type="text/css" id="light-style"/>
    <link href="{{asset('admin/assets/css/app-creative-dark.min.css')}}" rel="stylesheet" type="text/css"
          id="dark-style"/>

</head>

<body class="authentication-bg" data-layout-config='{"darkMode":false}'>

<div class="account-pages mt-5 mb-5">
    @yield('content')
    <!-- end container -->
</div>
<!-- end page -->

<footer class="footer footer-alt">
    2022 © Hyper - Kenshin.com
</footer>

<!-- bundle -->
<script src="{{asset('admin/assets/js/vendor.min.js')}}"></script>
<script src="{{asset('admin/assets/js/app.min.js')}}"></script>

</body>
</html>
