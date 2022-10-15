<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>Hyper - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset("admin/assets/images/favicon.ico")}}">

    <!-- third party css -->
    <link href="{{asset("admin/assets/css/vendor/jquery-jvectormap-1.2.2.css")}}" rel="stylesheet" type="text/css"/>
    <!-- third party css end -->

    <!-- App css -->
    <link href="{{asset('admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/assets/css/app-creative.min.css')}}" rel="stylesheet" type="text/css" id="light-style"/>
    <link href="{{asset('admin/assets/css/app-creative-dark.min.css')}}" rel="stylesheet" type="text/css"
          id="dark-style"/>
    @stack("css")

</head>

<body class=""
      data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
<div class="wrapper">
    @include('admin.layouts.sidebar')
    <div class="content-page">
        <div class="content">
            @include('admin.layouts.header')
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        @include('admin.layouts.footer')
    </div>
</div>
@include("admin.layouts.rightbar")

<!-- bundle -->
<script src="{{asset('admin/assets/js/vendor.min.js')}}"></script>
<script src="{{asset('admin/assets/js/app.min.js')}}"></script>

<!-- third party js -->
{{--<script src="{{asset('admin/assets/js/vendor/apexcharts.min.js')}}"></script>--}}
<script src="{{asset('admin/assets/js/vendor/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('admin/assets/js/vendor/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- third party js ends -->

<!-- demo app -->
{{--<script src="{{asset('admin/assets/js/pages/demo.dashboard.js')}}"></script>--}}
<script src="{{asset('vendor/sweetalert2/sweetalert2@11.js')}}"></script>

<!-- end demo js-->
@stack('script')
</body>
</html>
