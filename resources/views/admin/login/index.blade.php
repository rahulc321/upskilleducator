<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin-assets theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    <link rel="shortcut icon" href="{{ url('assets/images/site-logo.png') }}" type="image/x-icon"/>
    <title>Upskill Admin Login</title>
    <link href="{{ url('admin-assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('admin-assets/css/core.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('admin-assets/css/components.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('admin-assets/css/icons.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('admin-assets/css/pages.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('admin-assets/css/responsive.css') }}" rel="stylesheet" type="text/css"/>
    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
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
</head>
<body>
   <div id="particles-js"></div> <!-- stats - count particles --> <div class="count-particles1"> 
     </div>
   <!-- particles.js lib - https://github.com/VincentGarreau/particles.js --> 
   <script src="//cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
   <!-- stats.js lib --> <script src="//threejs.org/examples/js/libs/stats.min.js"></script>

<style type="text/css">
    /* ---- reset ---- */ body{ margin:0; font:normal 75% Arial, Helvetica, sans-serif; } canvas{ display: block; vertical-align: bottom; } /* ---- particles.js container ---- */ #particles-js{ position:absolute; width: 100%; height: 100%;
            background: linear-gradient(to right, #ff0965 0%, #ff6d12 100%);
       ; background-size: cover; background-position: 50% 50%; } /* ---- stats.js ---- */ .count-particles{ background: #000022; position: absolute; top: 48px; left: 0; width: 80px; color: #13E8E9; font-size: .8em; text-align: left; text-indent: 4px; line-height: 14px; padding-bottom: 2px; font-family: Helvetica, Arial, sans-serif; font-weight: bold; } .js-count-particles{ font-size: 1.1em; } #stats, .count-particles{ -webkit-user-select: none; margin-top: 5px; margin-left: 5px; } #stats{ border-radius: 3px 3px 0 0; overflow: hidden; } .count-particles{ border-radius: 0 0 3px 3px; }
</style>

<script type="text/javascript">
    particlesJS("particles-js", {"particles":{"number":{"value":80,"density":{"enable":true,"value_area":800}},"color":{"value":"#ffffff"},"shape":{"type":"circle","stroke":{"width":0,"color":"#000000"},"polygon":{"nb_sides":5},"image":{"src":"img/github.svg","width":100,"height":100}},"opacity":{"value":0.5,"random":false,"anim":{"enable":false,"speed":1,"opacity_min":0.1,"sync":false}},"size":{"value":3,"random":true,"anim":{"enable":false,"speed":40,"size_min":0.1,"sync":false}},"line_linked":{"enable":true,"distance":150,"color":"#ffffff","opacity":0.4,"width":1},"move":{"enable":true,"speed":6,"direction":"none","random":false,"straight":false,"out_mode":"out","bounce":false,"attract":{"enable":false,"rotateX":600,"rotateY":1200}}},"interactivity":{"detect_on":"canvas","events":{"onhover":{"enable":true,"mode":"repulse"},"onclick":{"enable":true,"mode":"push"},"resize":true},"modes":{"grab":{"distance":400,"line_linked":{"opacity":1}},"bubble":{"distance":400,"size":40,"duration":2,"opacity":8,"speed":3},"repulse":{"distance":200,"duration":0.4},"push":{"particles_nb":4},"remove":{"particles_nb":2}}},"retina_detect":true});var count_particles, stats, update; stats = new Stats; stats.setMode(0); stats.domElement.style.position = 'absolute'; stats.domElement.style.left = '0px'; stats.domElement.style.top = '0px';
</script>



<div class="account-pages1"></div>
<div class="clearfix"></div>
@if(Session::has('success'))
    <script type="text/javascript">
        $.Notification.notify("success", "top right", "Success Notification", "{!! session('success') !!}");
    </script>
@endif
@if(Session::has('error'))
    <script type="text/javascript">
        $.Notification.notify("error", "top right", "Error Notification", "{!! session('error') !!}");
    </script>
@endif

<div class="wrapper-page">
    <div class=" card-box">
        <div class="panel-heading text-center">
            <img src="{{ url('assets/images/site-logo.png') }}" alt="upskill educator">
        </div>
        <div class="panel-body">
            <form class="form-horizontal m-t-20" action="{{ url(\App\Utils\AppConstant::ADMIN_URL.'auth') }}"
                  id="login" method="post">
                @csrf
                @if ($errors->has('email'))
                    <div class="form-group text-center">
                        <div class="col-xs-12">
                            <span class="validation-error-label">
                                {{ $errors->first('email') }}
                            </span>
                        </div>
                    </div>
                @endif
                @if ($errors->has('password'))
                    <div class="form-group text-center">
                        <div class="col-xs-12">
                            <span class="validation-error-label">
                                {{ $errors->first('password') }}
                            </span>
                        </div>
                    </div>
                @endif
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="email" required name="email" placeholder="Username"
                               value="{{ old('email') }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" required name="password" placeholder="Password">
                    </div>
                </div>
                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">
                            Log In
                        </button>
                    </div>
                </div>
                <div class="form-group m-t-30 m-b-0">
                    <div class="col-sm-12">
                        <!--<a href="javascript:void(0)" class="text-dark" data-toggle="modal"-->
                        <!--   data-target="#forgotPassword">-->
                        <!--    <i class="fa fa-lock m-r-5"></i>-->
                        <!--    Forgot your password ?-->
                        <!--</a>-->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="forgotPassword" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form action="{{ url('forgot-password/admin?'.csrf_token()) }}" method="post">
            @csrf
            <input type="hidden" name="order_id" id="uuid">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Forgot Password</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="emailAddress">Enter Email: <span class="validation-error-label">*</span></label>
                        <input type="email" name="email" required class="form-control" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-pink btn-block text-uppercase waves-effect waves-light">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->






<script type="text/javascript" src="{{ url('admin-assets/plugins/parsleyjs/parsley.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#login').parsley();
    });
</script>
</body>
</html>
