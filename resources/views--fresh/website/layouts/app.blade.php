<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8"/>
    <link rel="shortcut icon" href="{{ url('assets/images/site-logo.png') }}" type="image/x-icon"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=1"/>
    <title>@yield('title')</title>
    <!-- / Style Files \ -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&display=swap"
          rel="stylesheet">
    <link href="{{ url('assets/css/fontawesome.css') }}" rel="stylesheet"/>
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ url('assets/css/owl.carousel.min.css') }}" rel="stylesheet"/>
    <link href="{{ url('assets/css/global.css') }}" rel="stylesheet"/>
    @yield('pagecss')
    <link href="{{ url('assets/jquery-toastr/toastr.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ url('assets/javascripts/jquery.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ url('assets/jquery-toastr/toastr.js') }}"></script>
</head>
<body>
<div id="wrapper">
    @include('website.layouts.header')
    @yield('content')
    @include('website.layouts.footer')
</div>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="wdisplay: none;">
    @csrf
</form>
<!-- / Script Files \ -->
<script src="{{ url('assets/javascripts/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/javascripts/owl.carousel.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/javascripts/global.js') }}" type="text/javascript"></script>
@yield('pagejs')
</body>
<!-- ProProfs Chat code starts -->
<div id="l2s_trk" style="z-index:99;">add chat to your website</div>
<script type="text/javascript">   var l2s_pht = escape(location.protocol);
    if (l2s_pht.indexOf("http") == -1) l2s_pht = 'http:';
    (function () {
        document.getElementById('l2s_trk').style.visibility = 'hidden';
        var l2scd = document.createElement('script');
        l2scd.type = 'text/javascript';
        l2scd.async = true;
        l2scd.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'live2support.com/js/lsjs1.php?stid=39027&jqry=Y&l2stxt=';
        var l2sscr = document.getElementsByTagName('script')[0];
        l2sscr.parentNode.insertBefore(l2scd, l2sscr);
    })();  </script><!-- ProProfs Chat code closed -->
</html>
