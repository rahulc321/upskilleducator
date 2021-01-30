<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Job Portal for job seeker and job givers">
    <meta name="author" content="ICHD">
    <link rel="shortcut icon" href="{{ url('assets/images/site-logo.png') }}" type="image/x-icon"/>
    <title>@yield('title')</title>
    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{ url('admin-assets/plugins/morris/morris.css') }}">
    <link href="{{ url('admin-assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('admin-assets/css/core.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('admin-assets/css/components.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('admin-assets/css/icons.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('admin-assets/css/pages.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('admin-assets/css/responsive.css') }}" rel="stylesheet" type="text/css"/>
@yield('css')
<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script>
        var resizefunc = [];
    </script>
    <script src="{{ url('admin-assets/js/modernizr.min.js') }}"></script>
    <script src="{{ url('admin-assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('admin-assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('admin-assets/js/detect.js') }}"></script>
    <script src="{{ url('admin-assets/js/fastclick.js') }}"></script>
    <script src="{{ url('admin-assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ url('admin-assets/js/jquery.blockUI.js') }}"></script>
    <script src="{{ url('admin-assets/js/waves.js') }}"></script>
    <script src="{{ url('admin-assets/js/wow.min.js') }}"></script>
    <script src="{{ url('admin-assets/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ url('admin-assets/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ url('admin-assets/plugins/notifyjs/js/notify.js') }}"></script>
    <script src="{{ url('admin-assets/plugins/notifications/notify-metro.js') }}"></script>
    <script src="{{ url('admin-assets/plugins/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ url('admin-assets/plugins/waypoints/lib/jquery.waypoints.js') }}"></script>
    <script src="{{ url('admin-assets/plugins/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ url('admin-assets/plugins/raphael/raphael-min.js') }}"></script>
    <script src="{{ url('admin-assets/plugins/jquery-knob/jquery.knob.js') }}"></script>
    <script src="{{ url('admin-assets/js/jquery.core.js') }}"></script>
    @yield('js')
</head>
<body class="fixed-left" style="scroll-behavior: smooth;">
<!-- Begin page -->
<div id="wrapper">
    @include('admin.layouts.header')
    @include('admin.layouts.sidebar')
    @include('admin.layouts.flash')
    <div class="content-page">
        <div class="content">
            <div class="container">
                @yield('content')
            </div>
        </div>
        @include('admin.layouts.footer')
    </div>
</div>
<form id="logout" action="{{ url(\App\Utils\AppConstant::ADMIN_URL.'signout') }}" method="POST" style="display: none;">
    @csrf
</form>
<script src="{{ url('admin-assets/js/jquery.app.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function ($) {
        $('.counter').counterUp({
            delay: 100,
            time: 1200
        });
        $(".knob").knob();
    });
</script>
</body>
</html>
