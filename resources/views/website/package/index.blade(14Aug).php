@extends('website.layouts.app')

@section('title')
    Package - Up Skill Educator
@endsection

 
@section('content')
    
   
    <link href="./Package_files/bootstrap.min.css" rel="stylesheet">
   
    <link href="./Package_files/font-awesome.min.css" rel="stylesheet">
    <!--page animatio start-->
      
    <style>
        .abtcomp p{
            font: 16px/27px "OpenSans",sans-serif;
        }
         .abtcomp li{
            font: 16px/27px "OpenSans",sans-serif;
        }
        .owl-carousel .owl-item img{
            display: initial;
        }
        .item img {
            max-width: 255px;
            max-height: 255px;
        }


        *html .item img {
            width: expression((this.width/this.height)>=1?255:'auto');
            height: expression((this.width/this.height)<1?255:'auto');
        }
        .profile-img {
            width: 25px;
            border: 1px solid #f26a21;
            border-radius: 100%;
        }
        .no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url(/images/loader.gif) center no-repeat #fff;
    background-size: 200px auto;
}
    </style>
    <script>
    var AlterNativeImg = "/Images/peerNoImage.png";
        function OnImageError(me) {

                me.src = AlterNativeImg;
                return true;

        }
    </script>

    <main id="main-content">
        <div class="innerbanner" style="background-image: url({{ url('assets/images/product-banner.jpg') }});">
            <div class="container">
                <h1>Package</h1>
                <div class="breadcrumbs">
                    <a href="{{ url('/') }}">Home</a>
                    <i class="fas fa-caret-right"></i>
                    <span>Package</span>
                </div>
            </div>
        </div>
      
<section id="packageprice">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="news-h wow fadeInUp" style="padding: 30px 0px 0px; visibility: visible; animation-name: fadeInUp; text-align: justify;">
                    <h2>Plans <b>Pricing</b></h2>
                </div>
            </div>
        </div>
        <div class="pricing-table light-grey-bg padding-100">
            <div class="row">
                @foreach($packages as $package)
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <form method="post" action="https://www.webinarplanet.com/add-to-cart">
                            <div class="price-box">
                                <div class="price-head">
                                    <i class="fa fa-rocket" aria-hidden="true"></i>
                                    <h5>{{$package->title}}</h5>
                                    @if($package->price !=0)
                                    <span class="price"> ${{$package->price}}</span>
                                    @endif
                                </div>
                                <hr>
                                   {!! $package->overview !!}
                                
                               @if($package->price ==0)
                                 
                                <button type="button" data-toggle="modal" data-target="#myModal" pack-name="{{$package->title}}" class="site-btn pack">Send Query</button>

                                @else 
                                 <a href="{{url('add-package/'.$package->url_name.'?'.csrf_token()) }}" class="site-btn">Buy Now</a>
                                 @endif
                            </div>
                        </form>
                    </div>
                  @endforeach
            </div>
        </div>
    </div>
</section>
<div class="container">
   
  

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Send Message</h4>
        </div>
        <div class="modal-body">
            <div class="packname"></div>
        <form action="{{url('/query') }}" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="form-group">
              <label>Name</label>
              <input type="text" required class="form-control" name="fname">
          </div>

          <div class="form-group">
              <label>Message</label>
              <textarea  required=""  name="message" rows="4" cols="50" class="form-control"> 
                </textarea>
          </div>
          <input type="hidden" name="pack_name" id="packname">
          <div class="form-group">
               
               <button class="site-btn" type="submit">Submit</button>
          </div>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
    </div>

<script type="text/javascript">
    $(document).ready(function(){
        $('.pack').click(function(){
            var packName= $(this).attr('pack-name');
            $('.packname').html('<h4> Package Name : '+packName+'</h4>');
            $('#packname').val(packName);
            //alert(packName);
        });
    });
</script>




    <style type="text/css">
        body {
    margin: 0 auto;
    /*font-family: 'Roboto-Medium', 'Roboto-Bold',Roboto-Light;*/
}

a, p, span {
    font-size: 14px;
}
/**brandongrotesque black**/
.cart-btn2 {
    background: url(../images/cart-icon.png) no-repeat;
    text-indent: -999px;
    width: 31px;
    height: 26px;
    overflow: hidden;
    float: right;
    margin-right: 5px;
}
@font-face {
    font-family: 'BrandonGrotesque-Black';
    src: url('../fonts/BrandonGrotesque-Black.eot') format('embedded-opentype');
}

@font-face {
    font-family: 'BrandonGrotesque-Black';
    src: url('../fonts/BrandonGrotesque-Black.otf') format('opentype');
}

@font-face {
    font-family: 'BrandonGrotesque-Black';
    src: url('../fonts/BrandonGrotesque-Black.svg') format('svg');
}

@font-face {
    font-family: 'BrandonGrotesque-Black';
    src: url('../fonts/BrandonGrotesque-Black.ttf') format('truetype');
}

@font-face {
    font-family: 'BrandonGrotesque-Black';
    src: url('../fonts/BrandonGrotesque-Black.woff') format('woff');
}

/**PTSerif regular**/
@font-face {
    font-family: 'PTSerif-Regular';
    src: url('../fonts/PTSerif-Regular.eot') format('embedded-opentype');
}

@font-face {
    font-family: 'PTSerif-Regular';
    src: url('../fonts/PTSerif-Regular.svg') format('svg');
}

@font-face {
    font-family: 'PTSerif-Regular';
    src: url('../fonts/PTSerif-Regular.ttf') format('truetype');
}

@font-face {
    font-family: 'PTSerif-Regular';
    src: url('../fonts/PTSerif-Regular.woff') format('woff');
}
/**roboto regular**/
@font-face {
    font-family: 'Roboto-Regular';
    src: url('../fonts/Roboto-Regular.eot') format('embedded-opentype');
}

@font-face {
    font-family: 'Roboto-Regular';
    src: url('../fonts/Roboto-Regular.svg') format('svg');
}

@font-face {
    font-family: 'Roboto-Regular';
    src: url('../fonts/Roboto-Regular.ttf') format('truetype');
}

@font-face {
    font-family: 'Roboto-Regular';
    src: url('../fonts/Roboto-Regular.woff') format('woff');
}
/**roboto medium**/
@font-face {
    font-family: 'Roboto-Medium';
    src: url('../fonts/Roboto-Medium.eot') format('embedded-opentype');
}

@font-face {
    font-family: 'Roboto-Medium';
    src: url('../fonts/Roboto-Medium.svg') format('svg');
}

@font-face {
    font-family: 'Roboto-Medium';
    src: url('../fonts/Roboto-Medium.ttf') format('truetype');
}

@font-face {
    font-family: 'Roboto-Medium';
    src: url('../fonts/Roboto-Medium.woff') format('woff');
}
/**roboto bold**/
@font-face {
    font-family: 'Roboto-Bold';
    src: url('../fonts/Roboto-Bold.eot') format('embedded-opentype');
}

@font-face {
    font-family: 'Roboto-Bold';
    src: url('../fonts/Roboto-Bold.svg') format('svg');
}

@font-face {
    font-family: 'Roboto-Bold';
    src: url('../fonts/Roboto-Bold.ttf') format('truetype');
}

@font-face {
    font-family: 'Roboto-Bold';
    src: url('../fonts/Roboto-Bold.woff') format('woff');
}
/**roboto light**/
@font-face {
    font-family: 'Roboto-Light';
    src: url('../fonts/Roboto-Light.eot') format('embedded-opentype');
}

@font-face {
    font-family: 'Roboto-Light';
    src: url('../fonts/Roboto-Light.svg') format('svg');
}

@font-face {
    font-family: 'Roboto-Light';
    src: url('../fonts/Roboto-Light.ttf') format('truetype');
}

@font-face {
    font-family: 'Roboto-Light';
    src: url('../fonts/Roboto-Light.woff') format('woff');
}

/**header start**/

/*.ImageReportLogo {
    max-width: 125px;
    max-height: 125px;
}


*html .ImageReportLogo {
    width: expression((this.width/this.height)>=1?125:'auto');
    height: expression((this.width/this.height)<1?125:'auto');
}*/
.modal-dialog .modal-content .modal-header {
    
    background: linear-gradient(to right, #ff2670 0%, #ff6c36 100%) !important;
}
.header_tbg {
    background-color: #035b96;
    line-height: 0;
    padding: 18px 0;
    z-index:9;
    position:relative;
}

    .header_tbg .head-top-left ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

        .header_tbg .head-top-left ul li {
            display: inline-block;
            padding: 0 15px 0 0;
        }

            .header_tbg .head-top-left ul li a {
                text-decoration: none;
                color: #fefefe;
                font-family: Roboto-Medium;
            }

                .header_tbg .head-top-left ul li a span {
                    margin-right: 5px;
                    color: #ffffff;
                }

    .header_tbg .head-top-right {
        text-align: right;
    }

        .header_tbg .head-top-right ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

            .header_tbg .head-top-right ul li {
                display: inline-block;
                padding: 0 0 0 8px;
            }

                .header_tbg .head-top-right ul li a {
                    text-decoration: none;
                    color: #ffffff;
                    font-family: Roboto-Medium;
                }



                    .header_tbg .head-top-right ul li a span {
                        margin-left: 5px;
                        color: #ffffff;
                    }

/**drop down**/

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #9a9a9a;
    min-width: 145px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    top: 38px;
    right: 0;
}

    .dropdown-content a {
        color: black;
        padding: 12px 12px;
        text-decoration: none;
        display: block;
        text-align: left;
    }

        .dropdown-content a:hover {
            /*background-color: #f26a21;*/
            background-color: #1fc8db;
            background-image: linear-gradient(84deg, #02a8fa 10%, #1fc8db 60%, #17cfd1 75%);
        }

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
/**header end**/


/***********************
    menu start
    **********/
.menu-area {
    padding: 20px 0;
    position: absolute;
    z-index: 8;
    right: 0;
    left: 0;
}

.menu nav {
    text-align: right;
    padding: 10px 0 0 0;
    position: relative;
}

    .menu nav ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

        .menu nav ul li {
            display: inline-block;
            padding: 0 12px;
        }

            .menu nav ul li a {
                color: #fff;
                text-decoration: none;
                font-family: roboto-regular;
                font-size: 15px;
                padding: 40px 0;
            }

                .menu nav ul li a.active {
                    color: #009af4; /*#a8d5f3;*/
                }

                .menu nav ul li a:hover {
                    color: #009af4;
                }

            .menu nav ul li > ul.submenu:hover {
                border: 0;
                padding: 0;
            }

            .menu nav ul li:hover {
                border: 1px solid #009af4; /*#035b96;*/
                padding: 0 11px;
            }

ul.sub-menu li:hover {
    border: 0 !important;

}

.menu nav ul li a span {
    color: #035b96;
    font-size: 18px;
}

    .menu nav ul li a span.sertext i {
        transform: rotate(80deg);
    }


.cart {
    position: relative;
    top: 3px;
}

    .cart a span {
        position: relative;
    }

        .cart a span label {
            position: absolute;
            right: -3px;
            bottom: 12px;
            z-index: 9;
            left: 0;
            font-size: 12px;
            color: #fff;
        }

        .cart a span:after {
            background-color: #2d5b96;
            width: 25px;
            height: 25px;
            content: '';
            display: block;
            border-radius: 50%;
            position: absolute;
            top: -24px;
            right: -12px;
            bottom: 0;
        }
        .menuicon .cart a span:after {
    top: -13px;
    right: -10px;
}

        .cart a span i {
            font-size: 22px;
            color: #035b96;
        }


/***********************
                            menu end
                               **********/
/****sub menu start****/
ul.sub-menu {
    position: absolute;
    background-color: rgba(240,242,247,1); /*rgba(0,0,0,0.8);*/
    left: 0;
    width: 100%;
    /*max-width: 250px;*/
    z-index: 99;
    /*column-count: 3;
    -webkit-column-count: 3;*/
    border-top: 2px solid #007bff;
    display: none;
}

.menu nav ul li:hover ul.sub-menu {
    display: block;
}
    .menu nav ul li:hover ul.sub-menu li a {
        color: #0f0f0f !important;
    }
    ul.hero-topics {
        box-sizing: border-box;
        list-style: none;
        width: 100%;
        padding: 2em 10%;
        margin: 0;
        position: absolute;
        left: 0;
        right: 0;
    }

    ul.hero-topics li {
        position: relative;
        width: 20%;
        height: auto;
        box-sizing: border-box;
        margin: 0;
        opacity: .8;
        transition-property: opacity;
        transition-duration: .5s;
        z-index: 1;
        display: block;
        float: left;
        padding: 4px
    }

        ul.hero-topics li:nth-child(6) {
            margin-left: 10%
        }

        ul.hero-topics li .square {
            margin-top: 100%
        }

    ul.hero-topics a.front, ul.hero-topics a.back {
        display: block;
        position: absolute;
        top: 5%;
        left: 5%;
        width: 90%;
        height: 90%;
        box-sizing: border-box;
        padding: 1.3em .5em 2em;
        color: #fff;
        text-align: center;
        text-decoration: none;
        border-radius: 20%
    }

    ul.hero-topics a.front {
        z-index: 2;
        padding-top: 20%;
        color: rgba(255,255,255,.7);
        transition-property: color,transform;
        transition-duration: .2s
    }

    ul.hero-topics .two-line a.front {
        padding-top: 15%
    }

    ul.hero-topics a.front .fa, ul.hero-topics a.front .fas, ul.hero-topics a.front .fal, ul.hero-topics a.front .svg-inline--fa, ul.hero-topics a.front .svg-inline--fas, ul.hero-topics a.front .svg-inline--fal {
        display: block;
        font-size: 4em;
        transition-property: opacity;
        transition-duration: .2s;
        margin-bottom: .15em;
        color: #fff
    }

    ul.hero-topics a.back {
        font-family: proxima-nova,lato,sans-serif;
        font-weight: 300;
        font-size: 1.4em;
        visibility: hidden;
        opacity: 0;
        transform: scale(.5);
        transition-property: transform,visibility,opacity;
        transition-duration: .4s;
        width: 116%;
        height: 116%;
        left: -8%;
        top: -8%;
        padding-top: 50%
    }

    ul.hero-topics li:hover {
        opacity: 1;
        z-index: 2
    }

        ul.hero-topics li:hover .front, ul.hero-topics li.label-visible .front {
            color: transparent;
            transform: scale(.9)
        }

        ul.hero-topics li:hover .back, ul.hero-topics li.label-visible .back {
            z-index: 5;
            visibility: visible;
            opacity: 1;
            transform: scale(1);
            transition-property: transform,visibility,opacity;
            transition-duration: .2s
        }

    ul.hero-topics li.label-visible .back {
        transition-duration: .5s
    }

    ul.hero-topics li.blue1 a {
        background-color: #3598db;
        background-color: rgba(53,152,219,.8)
    }

    ul.hero-topics li.blue2 a {
        background-color: #00a2ff;
        background-color: rgba(0,162,255,.8)
    }

    ul.hero-topics li.blue3 a {
        background-color: #5299c7;
        background-color: rgba(0,162,255,.8)
    }

    ul.hero-topics li.orange1 a {
        background-color: #e77e23;
        background-color: rgba(231,126,35,.8)
    }

    ul.hero-topics li.green1 a {
        background-color: #2ecd71;
        background-color: rgba(46,205,113,.8)
    }

    ul.hero-topics li.green2 a {
        background-color: #1bbc98;
        background-color: rgba(27,188,152,.8)
    }

    ul.hero-topics li.brown1 a {
        background-color: #98925e;
        background-color: rgba(152,146,94,.8)
    }

    ul.hero-topics li.yellow1 a {
        background-color: #f1c40f;
        background-color: rgba(241,196,15,.8)
    }

    ul.hero-topics li.red1 a {
        background-color: #eb4c3d;
        background-color: rgba(235,76,61,.8)
    }

    ul.hero-topics li.grey1 a {
        background-color: #34495e;
        background-color: rgba(52,73,94,.8)
    }



ul.sub-menu li {
    display: block !important;
    text-align: left;
    padding: 1px 10px !important;
    /*border-bottom: 1px solid #565656;*/
}

    ul.sub-menu li:last-child {
        /*border-bottom:0;*/
    }

    ul.sub-menu li a {
        color: #d4d4d4 !important;
        padding: 0 !important;
        font-size: 14px !important;
    }

        ul.sub-menu li a:hover {
            color: #035b96 !important;
        }
/*******************
    banner section start
    ***************/
.banner {
    position: relative;
}

.pos-rel {
    position: relative;
}

.banner-half {
    text-align: center;
    background-color: #fff;
    width: 100%;
    display: block;
    margin: 0 auto;
    padding: 30px 0;
    right: 0;
    left: 0;
    border-radius: 5px;
    color: #fff;
    z-index: 9;
}

.item figure.img-box img {
    /*height: 495px;*/
    width: 100%;
}


.justify-content-end li {
    padding: 0px 15px;
}

@media (min-width: 768px) {
    .order-md-1 {
        -ms-flex-order: 1;
        order: 1;
        /* margin: 20%; */
        /* top: 50%; */
        /* left: 50%; */
        /* padding: 164px 30px; */
        padding: 200px 0px 200px 0px;
    }
}

.gallery_section {
    width: 100%;
    font-family: Roboto-Medium, sans-serif;
}

    .gallery_section .abc {
        padding: 0;
        margin: 0;
        width: 100%;
        list-style: none;
    }

.gallery_section {
    width: 100%;
}

.abc > li {
    float: left;
    width: 33.33%;
}

.g_text {
    font-size: 25px;
    text-transform: uppercase;
    color: #fff;
}

.gmid_text {
    font-size: 13px;
}

.btn-info:hover {
    color: #000;
    background-color: #fff;
    border-color: #117a8b;
}

.btn-info {
    font-size: 13px;
    color: #000;
    background-color: #fff;
    border-color: #117a8b;
}

.container01 {
    position: relative;
    width: 100%;
}

    .container01:hover {
    }

.image {
    display: block;
    width: 100%;
    height: auto;
}

.overlay {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    height: 100%;
    width: 100%;
    opacity: 0;
    transition: .5s ease;
    background-color: #1acbab6e;
}

.container01:hover .overlay {
    opacity: 1;
}

.text {
    color: white;
    font-size: 20px;
    position: absolute;
    top: 50%;
    left: 49%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    text-align: center;
}

.mask {
    font-family: roboto-regular, sans-serif;
    margin:-50px 0 0 0;
}

    .mask h5 {
        color: #fff;
        font-size: 30px;
        font-weight: normal;
    }

    .mask h1 {
        color: #d2d2d2;
        font-size: 50px;
        font-weight: normal;
    }

    .mask p {
        color: #fff;
        font-size: 20px;
    }
/**webinar planet banner start***/
.bannerbackg {
    background-image: url(/images/banner01.jpg);
    background-position: 50% 50%;
    height: 100%;
    width: 100%;
    background-repeat: no-repeat;
    min-height: 760px;
    position: relative;
    background-size:cover;
}
.bannerbackg1 {
    /*background-image: url(/images/banner01.jpg);*/
    /*background-image: url("/images/inner/breadcrumb_bg.jpg");*/
    background-position: 50% 50%;
    height: 20%;
    width: 100%;
    background-repeat: no-repeat;
    min-height: 130px;
    position: relative;
    padding: 130px 0 0 0;
}
.btn-distancs .btn-info {
    background-color: #035b96 !important;
}

.btn-distancs .btn-default {
    background-color: #fff !important;
}
/*******************
    banner section end
    ***************/
/******
    banner below section
    *******/
.stude-enroll {
    margin: 0 25px 0 0;
}

    .stude-enroll ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

        .stude-enroll ul li {
            display: inline-block;
            text-align: left;
            line-height: normal;
        }

            .stude-enroll ul li span.active {
                color: #ff5900;
            }

            .stude-enroll ul li span {
                font-family: Roboto-Regular;
                color: #403942;
                font-size: 20px;
                font-weight: bold;
                cursor: pointer;
            }


                .stude-enroll ul li span:hover {
                    color: #ff5900;
                }

                .stude-enroll ul li span ~ p {
                    color: #00ddc4;
                    font-family: roboto-medium;
                    font-size: 14px;
                    margin: 0;
                }

                .stude-enroll ul li span i {
                    font-size: 35px;
                    margin: 0 15px 0 0;
                    color: #fff;
                }

                .stude-enroll ul li span img {
                    margin: 0 15px 0 0;
                }

.bor-l {
    border-left: 1px solid #444444;
    padding: 0 0 0 15px;
}

/** checkout start***/
.paypalbox {
    border: 1px solid #d6d6d6;
    border-radius: 5px;
    font-family: roboto-regular;
    /*margin: 10px 0 50px 0;*/
}

    .paypalbox h4 {
        font-size: 18px;
        margin: 0;
        padding: 10px 0;
    }

.paycheckout {
    text-align: center;
}

.paypalbox p {
    margin: 0;
    padding: 5px 15px;
}

.paybor {
    border-bottom: 1px solid #d6d6d6;
    width: 100%;
    margin: 0 auto;
}

.PaymentImg {
    margin: 0 0 30px 0;
}


/**paymentgate section start**/
.paygathe button {
    padding: 0;
    margin: 0;
}

    .paygathe button h3 {
        font-size: 16px;
        font-family: roboto-bold;
        margin: 0;
        text-transform: capitalize;
        color: #444444;
    }


/***welcome to webinar latest start***/
.webinar planet {
    font-family: Roboto-Medium;
}

    .webinar planet h1 {
        font-size: 25px;
        text-align: center;
        margin: 0;
    }

#latestnews {
    padding: 70px 0;
}

.webinar planet .nav-tabs {
    border-bottom: 0;
    margin: 40px 0 0 0;
}

    .webinar planet .nav-tabs .nav-item {
        margin-bottom: 0;
        background-color: #e9e8e8;
    }

.webinar planet li.nav-item {
    margin: 0;
}

.webinar planet .nav-tabs .nav-item a {
    color: #444444;
    padding: 10px 58px;
    border-left: 1px solid #fff;
}

.webinar planet .nav-link.active {
    font-weight: bold;
    /*color: #0be3ff;*/
}

.webinar planet .tab-content {
    margin: 40px 0 0 0;
}

    .webinar planet .tab-content > .tab-pane p {
        font-size: 14px;
        font-family: Roboto-Regular;
        color: #444444;
        text-align: justify;
    }
/***welcome to webinar latest end***/
/****
    Latest and News
    ***/
/*#latestnews .item-control {
    display: inline-block;
    position: absolute;
    right: 15px;
    top: 10px;
}

    #latestnews .item-control > a {
        color: #ffffff;
        display: inline-block;
        margin-left: 10px;
        background-color: #1fc8db;
        background-image: linear-gradient(84deg, #02a8fa 10%, #1fc8db 60%, #17cfd1 75%);
        width: 30px;
        height: 30px;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        flex-direction: row;
        border-radius: 3px;
        font-family: Roboto-Medium;
    }

.CheckOutSection .btn-primary {
    padding: 10px 8px;
    font-size: 12px;
    font-weight: normal;
    font-family: roboto-regular;
}



.news-h h2 {
    font-family: Roboto-Regular;
}

    .news-h h2 b {
        font-family: Roboto-Bold;
        font-size: 35px;
        font-weight: bold;
    }

    .news-h h2:after {
        content: "";
        display: block;
        border-bottom: 2px solid #00e5ba;
        width: 100%;
        max-width: 45px;
        margin: 23px 0 30px 0;
    }

.event01 {
    font-family: Roboto-Regular;
}

    .event01 span {
        color: #cccccc;
        font-size: 12px;
    }

        .event01 span i {
            color: #cccccc;
        }

.event02 p {
    font-size: 16px;
    font-family: Roboto-Medium;
    margin: 0;
    padding: 10px 0;
    letter-spacing: 1px;
}

.event03 span {
    background-color: #f7f7f7;
    padding: 5px 10px;
    border-radius: 3px;
    color: #cccccc;
    font-family: roboto-regular;
    font-size: 12px;
}*/
/****change password****/
.newchange h2 {
    font-family: Roboto-Regular;
    text-align: center;
}

    .newchange h2 b {
        font-family: Roboto-Bold;
        font-size: 35px;
        font-weight: bold;
    }

    .newchange h2:after {
        content: "";
        display: block;
        border-bottom: 2px solid #00e5ba;
        width: 100%;
        max-width: 150px;
        margin: 23px auto;
    }

.ResetPassword {
    font-family: Roboto-Regular;
    background-color: #f5f5f5;
    box-shadow: 0px 4px 15px #d6d6d6;
}

    .ResetPassword p {
        margin: 0;
        font-size: 12px;
        text-align: justify;
    }

        .ResetPassword p span {
            color: #33b5e5;
        }

    .ResetPassword .form-control {
        font-size: 14px;
        padding: 10px 5px;
    }

    .ResetPassword button.btn-info {
        background-color: #1fc8db;
        background-image: linear-gradient(84deg, #02a8fa 10%, #1fc8db 60%, #17cfd1 75%);
    }
/***
    event start
    **/
.eventimg01 {
    background-image: url(/images/newsevent/event01.jpg);
    width: 99px;
    height: 89px;
    text-align: center;
    margin: 0 0 20px 0;
}

    .eventimg01 h1 {
        margin: 0;
        font-family: roboto-bold;
        padding: 12px 0 0 0;
    }

    .eventimg01 p {
        color: #cccccc;
        font-family: roboto-regular;
        font-size: 12px;
    }

.evenimg01 p a {
    font-size: 16px;
    font-family: Roboto-Medium;
    margin: 0;
    padding: 0 0 15px 0;
    letter-spacing: 1px;
    color: #333;
}

    .evenimg01 p a:hover {
        color: #f26a21;
    }

.evenimg02 span {
    color: #a9a7a7;
    font-family: roboto-regular;
    font-size: 14px;
}

/***
    latest video
    ****/
.latestvideo {
    font-family: Roboto-Medium;
}

.latestpara {
    margin: 10px 0 0 0;
}

    .latestpara p {
        margin: 0;
        font-size: 15px;
    }

p.textgrey {
    color: #7f7f7f;
    font-family: roboto-regular;
    margin: 10px 0 0 0;
}

.viewbtn {
    margin: 35px 0 0 0;
}


    .viewbtn a {
        color: #000;
        font-family: roboto-medium;
        font-size: 14px;
        text-decoration: none;
    }

        .viewbtn a span {
            margin: 0 0 0 25px;
        }


.viewbtn1 {
    margin: 10px 0 0 0;
}

    .viewbtn1 a {
        color: #000;
        font-family: roboto-medium;
        font-size: 14px;
        text-decoration: none;
    }

        .viewbtn1 a span {
            margin: 0 0 0 25px;
        }

.viewbtn2 {
    margin: 10px 0 0 0;
}

    .viewbtn2 a {
        color: #000;
        font-family: roboto-medium;
        font-size: 14px;
        text-decoration: none;
    }

        .viewbtn2 a span {
            margin: 0 0 0 25px;
        }

/***
            about css
            ***/
#abtbg {
    font-family: Roboto-Regular;
    padding: 35px 0;
}




/*.abth3 h3 {
    color: #bbbbbb;
    font-size: 14px;
    font-family: roboto-regular;
    letter-spacing: 5px;
}

span.round:before {
    content: "";
    display: inline-block;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background-color: #00e3ba;
}

span.round:after {
    content: "";
    display: inline-block;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background-color: #00e3ba;
}

.abtcomp {
    font-family: Roboto-Regular;
    padding: 0;
}

    .abtcomp h1 {
        font-family: Roboto-Regular;
        font-size: 45px;
        font-weight: normal;
        margin: 0;
    }

        .abtcomp h1 span {
            color: #0edcc7;
            font-size: 25px;
            font-family: roboto-bold;
        }

p.abttex {
    font-size: 20px;
}

    p.abttex:after {
        content: "";
        display: block;
        border-bottom: 2px solid #00e3ba;
        width: 100%;
        max-width: 50px;
        margin: 30px 0;
    }

.abtlist ul {
    list-style: none;
    padding: 0;
}

    .abtlist ul li {
        font-size: 15px;
        line-height: 25px;
    }

        .abtlist ul li:before {
            content: "";
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: #00e3ba;
            margin: 0 10px 0 0;
        }*/

.procheck {
    padding: 0 0 0 20px;
}

.cuslogo{
    width:180px;
}


.courselistform {
    background-color: #e3f0f7;
    padding: 20px 10px;
    height: auto;
    min-height: 400px;
}
.getquote {
    padding: 145px 0 0 0;
    text-align: center;
    font-family: roboto-regular;
    color: #fff;
    letter-spacing: 1px;
}

.registerform {
    width: 100%;
    max-width: 350px;
    margin: 0 auto;
    padding: 0 10px 0 10px;
}

    .registerform .form-group {
        margin: 0 0 3px 0;
    }

        .registerform .form-group input, .registerform .form-group select {
            font-size: 13px;
            font-family: Roboto-Regular;
        }

.img-box .carousel-caption {
    top: 43%;
    bottom: 0;
    padding: 0 0;
    position: absolute;
}

    .img-box .carousel-caption .dropdownlist {
        /*background-color: #fff;*/
        position: relative;
    }

.subbtn {
    margin: 15px 0 0 0;
}

    .subbtn button {
        background-color: #ff5c11 !important;
        border: 0;
        padding: 12px 30px;
        width: 100%;
        font-size: 17px;
        font-family: roboto-medium;
    }

        .subbtn button:hover {
            background-color: #b13800;
        }

/*********
        category on banner start
        **********/
.bancategorylist {
    display: flex;
    border-right: 1px solid #d6d6d6;
    height: 100%;
    min-height: 57px;
}

    .bancategorylist .banicon {
        margin: auto 0;
        padding: 5px 0 0 0;
    }

        .bancategorylist .banicon span i {
            color: #f26a21;
            font-size: 20px;
        }

.bansearch {
    background-color: #1fc8db;
    background-image: linear-gradient(84deg, #02a8fa 10%, #1fc8db 60%, #17cfd1 75%);
    padding: 14px 0;
}

    .bansearch button {
        font-size: 20px;
        font-family: roboto-regular;
        color: #fff;
        background-color: transparent;
        border: 0;
    }

        .bansearch button:focus {
            outline: 0;
        }

    .bansearch span i {
        font-size: 20px;
        color: #fff;
    }

.banbrowse {
    color: #212529;
    font-family: roboto-bold;
    text-align: left;
    padding: 6px 0 0 15px;
}

    .banbrowse p {
        margin: 0;
        font-size: 14px;
    }

    .banbrowse h4 {
        margin: 0;
        font-size: 20px;
        color: #f26a21;
    }

.baninput {
    padding: 0 0;
    position: absolute;
    width: 100%;
}

.bandecrip {
    height: 100%;
    background-color: #fff;
    width: 100%;
    min-height: 105px;
    margin: 0 0 0 0;
    border-top: 1px solid #000;
    display: none;
}

.baninput input {
    width: 100%;
    height: 100%;
    min-height: 58px;
    border: 0;
    font-family: roboto-regular;
    font-size: 14px;
    color: #585858;
    padding: 0 10px;
}

    .baninput input:focus {
        outline: none;
    }

.banlistservice ul {
    list-style: none;
    padding: 0;
    margin: 10px 0 0 0;
}

    .banlistservice ul li {
        margin: 0 0 10px 0;
    }

        .banlistservice ul li a {
            font-family: Roboto-Medium;
            font-size: 14px;
            color: #06273e;
        }

            .banlistservice ul li a span img {
                width: 20px;
            }

/*********
        category on banner end
        **********/
/*********
    cart category
    **********/
.dropdownlistone {
    background-color: #fff;
    position: absolute;
    right: 0;
    width: 100%;
    top: 90px;
    display: none;
    z-index: 9;
}

.bancategorylistone {
    display: flex;
    border-right: 1px solid #d6d6d6;
    height: 100%;
    min-height: 57px;
    position: relative;
}

    .bancategorylistone .baniconone {
        margin: auto 0;
        padding: 5px 0 0 0;
    }

        .bancategorylistone .baniconone span i {
            color: #f26a21;
            font-size: 20px;
        }

.bansearchone {
    background-color: #197baf;
    background-image: linear-gradient(84deg, #02a8fa 10%, #2f90f4 60%, #2f90f4 75%);
    padding: 4px 5px;
    right: 0;
    position: absolute;
}

    .bansearchone button {
        font-size: 20px;
        font-family: roboto-regular;
        color: #fff;
        box-shadow: none;
        border: none;
        background-color: transparent;
    }

        .bansearchone button:focus {
            outline: none;
        }

    .bansearchone span i {
        font-size: 20px;
        color: #fff;
    }

.banbrowseone {
    color: #212529;
    font-family: roboto-bold;
    text-align: left;
    padding: 6px 0 0 15px;
}

    .banbrowseone p {
        margin: 0;
        font-size: 14px;
    }

    .banbrowseone h4 {
        margin: 0;
        font-size: 20px;
        color: #f26a21;
    }

.baninputone {
    padding: 10px 0 0 0;
    position: absolute;
    right: 0;
    left: 0;
}

.bandecripone {
    height: 100%;
    background-color: #fff;
    width: 100%;
    min-height: 105px;
    margin: 0 0 0 0;
    border-top: 1px solid #000;
    /*display: none;*/
}

.baninputone input {
    width: 100%;
    height: 100%;
    min-height: 38px;
    border: 0;
    font-family: roboto-regular;
    font-size: 14px;
    color: #585858;
    max-width: 355px;
    float: right;
    padding: 0 10px;
}

    .baninputone input:focus {
        outline: none;
    }

.banlistserviceone ul {
    list-style: none;
    padding: 0;
}

    .banlistserviceone ul li a {
        font-family: Roboto-Medium;
        font-size: 14px;
    }

        .banlistserviceone ul li a span img {
            width: 20px;
        }


/******  
    why us start
            *******/
#whyus {
    padding: 35px 0 70px 0;
    font-family: Roboto-Medium;
}

#teachersec {
    padding: 70px 0 0 0;
}

.searchcategoryleft {
    background-color: rgba(224,87,83,0.8);
    width: 100%;
    height: auto;
    min-height: 600px;
    display: inline-block;
}

.searchyour {
    color: #fff;
    font-family: roboto-regular;
    padding: 0 50px;
    position: absolute;
    top: 20%;
    bottom: 0;
}

    .searchyour form label {
        color: #fff;
        font-size: 16px;
        font-style: italic;
    }

    .searchyour h1 {
        font-size: 38px;
        margin: 0 0 25px 0;
    }

.searchbt .btn-outline-warning {
    background-color: #fff !important;
    color: #000 !important;
    font-family: roboto-medium;
    text-transform: uppercase;
}

.searchyour .md-form input.form-control {
    color: #fff;
    font-size: 14px;
}

.popularcourse {
    font-family: Roboto-Medium;
}

    .popularcourse h1 {
        font-size: 30px;
        text-align: center;
        margin: 0;
    }

    .popularcourse p {
        font-size: 14px;
        font-family: Roboto-Regular;
        color: #444444;
        text-align: center;
        margin: 30px 150px;
    }

.populardes {
    position: relative;
}

.pophowto {
    font-family: Roboto-Light;
}

    .pophowto h1 {
        font-size: 28px;
        font-weight: normal;
        margin: 0;
        letter-spacing: 1px;
    }

    .pophowto h3 {
        font-size: 18px;
        font-weight: normal;
        margin: 0;
        letter-spacing: 1px;
        padding: 25px 0 0 0;
    }

    .pophowto h5 {
        font-size: 14px;
        margin: 0;
        padding: 20px 0;
    }

    .pophowto p {
        font-weight: bold;
        margin: 0;
        font-size: 14px;
        text-align: justify;
        min-height: 60px;
    }

.popularbottom {
    position: absolute;
    bottom: 0;
    left: 0;
    min-height: 51px;
    right: 0;
}

    .popularbottom ul {
        list-style: none;
        font-size: 14px;
        margin: 0;
        padding: 0 10px;
    }

        .popularbottom ul li {
            display: inline-block;
            color: #918c8c;
            margin: 0 5px 0 0;
        }

            .popularbottom ul li span.star {
                color: #fcd937;
            }



#pointershape {
    width: 65px;
    height: 40px;
    position: absolute;
    background: #035b96;
    top: 0px;
    left: 15px;
    display: flex;
    align-items: center;
    flex: 0 0 auto;
}

    #pointershape span {
        color: #fff;
        text-align: center;
        margin: 0 0 0 10px;
    }

    #pointershape:after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 0;
        height: 0;
    }

    #pointershape:before {
        content: "";
        position: absolute;
        right: -20px;
        bottom: 0;
        width: 0;
        height: 0;
        border-left: 20px solid #035b96;
        border-top: 20px solid transparent;
        border-bottom: 20px solid transparent;
    }

/
/*.whybg {
    background-image: url(/images/whyus_banner01.jpg);
    height: 100%;
    min-height: 860px;
    position: absolute;
    top: -80px;
    width: 100%;
    background-repeat: no-repeat;
    background-position: 50% 50%;
}

.abtbtn {
    padding: 70px 0 0 0;
}

    .abtbtn span.btn-primary {
        background-color: #1fc8db;
        background-image: linear-gradient(84deg, #02a8fa 10%, #1fc8db 60%, #17cfd1 75%);
        border: 0;
        margin: 0 25px 0 0;
    }

.phonebg {
    background-image: url(/images/phone.png);
    width: 100%;
    height: 100%;
    background-repeat: repeat;
    min-height: 945px;
    background-size: cover;
    max-width: 440px;
}

.whyhed {
    margin: 115px 0 40px 0;
    text-align: center;
}


    .whyhed h3 {
        color: #bbbbbb;
        font-size: 14px;
        font-family: roboto-regular;
        letter-spacing: 5px;
    }

    .whyhed p {
        font-size: 40px;
        font-family: roboto-regular;
        color: #fff;
        letter-spacing: 1px;
    }

.whylist {
    margin: 15px 0 25px 0;
}

    .whylist h4 {
        font-family: roboto-bold;
        color: #fff;
        font-size: 20px;
        text-align: left;
        margin: 0;
    }

    .whylist p {
        font-family: roboto-regular;
        font-size: 15px;
        color: #8cc8f4;
        text-align: left;
        margin: 10px 0 0 0;
    }*/
.p-d {
    padding: 0 !important;
}

/***********
        Best Product
        **********/
.box-bg {
    max-width: 270px;
    height: auto;
    background-color: #f5f5f5;
    width: 100%;
    min-height: 290px;
    border-radius: 5px;
}

.carthead {
    padding: 15px 20px;
    text-align: center;
    height: auto;
    min-height: 130px;
}

    .carthead p {
        color: #212529;
        font-size: 14px;
        font-family: roboto-regular;
        margin: 0;
    }

    .carthead h1 {
        font-size: 14px;
        color: #9f9f9f;
        margin: 10px 0;
    }

    .carthead span {
        color: #fdd734;
        font-family: robot-regular;
        font-size: 14px;
    }





.cartbg {
    background-color: #fff;
    height: 40px;
    width: 40px;
    border-radius: 50%;
    position: relative;
    margin: 25px 0 0 -10px;
}



    .cartbg span {
        position: absolute;
        left: 0;
        right: 0;
        margin: 0 auto;
        display: block;
        text-align: center;
        top: 10%;
        font-size: 20px;
        color: #bbbbbb;
    }

.carimg {
    padding: 0;
}

    .carimg img {
        /*display: block;
        margin: 0 auto;
        max-width: 165px;*/
    }

.activebg {
    background-color: #fff;
    box-shadow: 0px 7px 18px #d6d6d6;
    transition: 0.5s all linear;
}

.box-bg:hover {
    background-color: #fff;
    box-shadow: 0px 7px 18px #d6d6d6;
    transition: 0.5s all linear;
}

/****counter start***/
#contersec {
    padding: 35px 0 0 0;
}

.counterbg {
    background-image: url(/images/counterbg.jpg);
    background-position: 50% 50%;
    background-size: cover;
    background-repeat: no-repeat;
    height: auto;
}

.counterlist {
    margin: 0;
    font-family: roboto-medium;
    color: #fff;
}

    .counterlist ul {
        padding: 0;
        margin: 0;
        list-style: none;
        line-height: normal;
    }

        .counterlist ul li {
            width:32.4%;
            display: inline-block;
            padding: 0 60px;
            margin: 35px 0;
            line-height: normal;
            border-right: 1px solid #dbdbdb;
            text-align: center;
        }

            .counterlist ul li p {
                margin: 0;
                font-size: 20px;
                letter-spacing: 1px;
            }

            .counterlist ul li:last-child {
                border-right: 0;
            }
/****counter end***/
/***latest blog start***/
#latestblog {
    padding: 70px 0 70px 0;
}

.bolgcontent {
    font-family: Roboto-Regular;
}

    .bolgcontent h1 {
        font-size: 20px;
    }

    .bolgcontent ul {
        padding: 0;
        margin: 12px 0 12px 0;
        line-height: normal;
        font-size: 14px;
    }

        .bolgcontent ul li {
            list-style: none;
            display: inline-block;
            line-height: normal;
            padding: 0;
            margin: 0 10px 0 0;
        }

            .bolgcontent ul li span {
                color: #b6b6b6;
            }

.m-left {
    margin-left: 10px;
}

.bolgcontent p {
    margin: 0;
}
/***latest blog end***/
/***
    faq
    ******/
#faq {
    margin: 0 0 30px 0;
}

.faqhed {
    margin: 100px 0 0 0;
    text-align: center;
}


    .faqhed h3 {
        color: #bbbbbb;
        font-size: 14px;
        font-family: roboto-regular;
        letter-spacing: 5px;
        margin: 0 0 15px 0;
    }

    .faqhed h2 {
        font-family: Roboto-Regular;
        font-size: 40px;
        margin: 0;
    }

        .faqhed h2 b {
            font-family: Roboto-Bold;
            font-weight: bold;
        }


.faqtab .nav-pills .nav-link.active, .faqtab .nav-pills .show > .nav-link {
    border-bottom: 2px solid #035b96;
    background-color: transparent;
    color: #000;
    border-radius: 0;
    font-family: roboto-regular;
    font-size: 14px;
    width: 100%;
    padding: 0 0 18px 0;
    text-transform: uppercase;
}

#faq .card-header a h4 {
    color: #161616 !important;
    font-size: 16px;
    margin: 0 0 0 15px;
}

.news-h p.para {
    font-family: roboto-regular;
    margin: -20px 0 20px 0;
}


.faqtab .nav-pills .nav-link {
    border-radius: .25rem;
    font-size: 14px;
    font-family: roboto-regular;
    color: #c9c9c9;
    padding: 0 0 0 0;
    text-transform: uppercase;
}

.faqtab .tab-content > .tab-pane {
    padding: 50px 0 0 0;
}

.faqtab ul li.nav-item {
    padding: 50px 0 0 0;
    text-align: center;
    margin: 0 auto;
}

.faqpara {
}

    .faqpara h4 {
        font-family: roboto-regular;
        font-size: 20px;
    }

    .faqpara p {
        font-size: 14px;
        font-family: roboto-regular;
        color: #908e8e;
        margin: 0 0 40px 0;
    }

.faqlinkq a {
    color: #000;
    font-family: roboto-bold;
    font-size: 14px;
    text-decoration: none;
}

.faqlinkq span {
    margin: 0 0 0 10px;
}

#faq .card-header {
    font-family: Roboto-Regular;
}

    #faq .card-header a h4 {
        color: #161616 !important;
    }

#faq .card-body {
    font-family: roboto-regular;
    background-color: rgba(0,0,0,.5);
}
/***browse start****/
#brwserbenefit {
    background-color: #f7f7f7;
    margin: 100px 0 0 0;
    padding: 0 0 60px 0;
}

.browhed {
    margin: 100px 0 60px 0;
    text-align: center;
}


    .browhed h3 {
        color: #bbbbbb;
        font-size: 14px;
        font-family: roboto-regular;
        letter-spacing: 5px;
        margin: 0 0 15px 0;
    }

    .browhed h2 {
        font-family: Roboto-Regular;
        font-size: 40px;
        margin: 0;
    }

        .browhed h2 b {
            font-family: Roboto-Bold;
            font-weight: bold;
        }

.browsebox {
    width: 100%;
    max-width: 270px;
    height: auto;
    min-height: 350px;
    background-color: #fff;
}

    .browsebox.active {
        box-shadow: 0px 7px 18px #d6d6d6;
        transition: 0.5s all linear;
    }

    .browsebox:hover {
        /*box-shadow: 0px 7px 18px #d6d6d6;*/
        transition: 0.5s all linear;
    }

.brwhedp {
    padding: 25px 0 0 25px;
}

    .brwhedp h4 {
        font-family: roboto-regular;
        font-size: 14px;
        margin: 0;
        text-align: justify;
        color: #4186ac;
    }

    .brwhedp p {
        padding: 25px 0 0 0;
    }


.listing-grid .bormana {
    bottom: 0 !important;
    background-color: rgba(0,0,0,0.5);
    width: 100%;
}

.listing-grid .brwhedp {
    padding: 0 5px 0 5px !important;
    font-family: roboto-regular;
    margin: 15px 0;
}

    .listing-grid .brwhedp p {
        margin: 0;
        padding: 2px 0;
        color: #212529;
    }

.listing-list .brwhedp p {
    margin: 0;
    padding: 0 0;
    color: #252525;
}

.listing-grid .brwhedp p:last-child {
    border-bottom: 0;
}

.brwhedp p span {
    font-family: roboto-medium;
    color: #bbbbbb;
    font-weight: normal;
    margin: 0 0 0 0;
    font-size: 12px;
}

.browsimg {
    background-size: contain;
    background-image: url(/images/brow01.png);
    background-repeat: no-repeat;
    background-position: 50% 50%;
    width: 100%;
    display: block;
    min-height: 208px;
    height: auto;
    position: relative;
}

.browsimg1 {
    background-image: url(/images/brow02.png);
    background-repeat: no-repeat;
    background-position: 50% 50%;
    width: 100%;
    display: block;
    min-height: 208px;
    height: auto;
    position: relative;
}

.browsimg2 {
    background-image: url(/images/brow03.png);
    background-repeat: no-repeat;
    background-position: 50% 50%;
    width: 100%;
    display: block;
    min-height: 208px;
    height: auto;
    position: relative;
}

.browsimg3 {
    background-image: url(/images/brow04.png);
    background-repeat: no-repeat;
    background-position: 50% 50%;
    width: 100%;
    display: block;
    min-height: 208px;
    height: auto;
    position: relative;
}

.bormana {
    position: absolute;
    bottom: 20px;
    left: 0;
    right: 0;
    padding: 0 15px;
}

.browbtn {
    padding: 0 0 0 0;
}

    .browbtn span.btn-primary {
        background-color: #1fc8db;
        background-image: linear-gradient(84deg, #02a8fa 10%, #1fc8db 60%, #17cfd1 75%);
        border: 0;
        margin: 0 25px 0 0;
        padding: 5px 15px;
        font-family: roboto-regular;
        font-size: 14px;
    }

.browstar {
    position: absolute;
    bottom: 0;
    right: 0;
    left: 0;
    background: rgba(0,0,0,0.5);
    width: 100%;
    padding: 5px 0;
}

    .browstar span i {
        color: #ffc926;
    }

.browstar1 {
    padding: 5px 0 0 0;
}

    .browstar1 p {
        margin: 0;
        color: #fff;
        font-family: roboto-regular;
        text-transform: uppercase;
        font-size: 12px;
    }

        .browstar1 p span {
            font-size: 12px;
            margin: 0 0 0 10px;
        }

.brwocate {
    padding: 50px 0 0 0;
}

    .brwocate a {
        color: #999898;
        font-family: roboto-bold;
        font-size: 13px;
        text-transform: uppercase;
    }

/***new program details start***/
.newprogrambox {
    width: 100%;
    height: auto;
    background-color: #fff;
    padding: 0 0;
    min-height: 200px;
    box-shadow: 0px 0 15px #d6d6d6;
}

.leftbox {
    border-right: 2px dashed #f26a21;
    height: 100%;
    width: 100%;
    min-height: 200px;
    font-family: Roboto-Regular;
    padding: 15px 15px;
}

    .leftbox h5 {
        font-size: 13px;
        margin: 0;
    }

        .leftbox h5 span {
            margin: 0 5px 0 0;
            color: #f26a21;
        }

        .leftbox h5 ~ p {
            padding: 0 0 0 20px;
        }

.rightbox {
    padding: 15px 0 0 0;
    font-family: Roboto-Regular;
}

    .rightbox .purchaselist {
        padding: 0 5px;
    }

        .rightbox .purchaselist ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

            .rightbox .purchaselist ul li {
                font-size: 14px;
                margin: 0 0 0 0;
            }

/* The container */
.customcheck {
    display: block;
    position: relative;
    padding-left: 25px;
    margin-bottom: 6px;
    cursor: pointer;
    font-size: 14px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

    /* Hide the browser's default checkbox */
    .customcheck input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }

/* Create a custom checkbox */
.checkmarkone {
    position: absolute;
    top: 0;
    left: 0;
    height: 20px;
    width: 20px;
    background-color: transparent;
    border: 1px solid #d6d6d6;
}

/* On mouse-over, add a grey background color */
.customcheck:hover input ~ .checkmarkone {
    background-color: #e4e4e4;
}

/* When the checkbox is checked, add a blue background */
.customcheck input:checked ~ .checkmarkone {
    background-color: #1fc8db;
    background-image: linear-gradient(84deg, #02a8fa 10%, #1fc8db 60%, #17cfd1 75%);
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmarkone:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.customcheck input:checked ~ .checkmarkone:after {
    display: block;
}

/* Style the checkmark/indicator */
.customcheck .checkmarkone:after {
    left: 8px;
    top: 3px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
/***new program details end***/
/***program details video option***/
.customradio {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 2px;
    cursor: pointer;
    font-size: 14px;
    color: #f69663;
    font-family: roboto-ragular;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

    /* Hide the browser's default radio button */
    .customradio input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

/* Create a custom radio button */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 20px;
    width: 20px;
    background-color: #eee;
    border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.customradio:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.customradio input:checked ~ .checkmark {
    background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the indicator (dot/circle) when checked */
.customradio input:checked ~ .checkmark:after {
    display: block;
}

/* Style the indicator (dot/circle) */
.customradio .checkmark:after {
    top: 6px;
    left: 7px;
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: white;
}

.programvideod {
    margin: 0 0 15px 0;
}




/****
    client icon
    ****/
.clienthead {
    text-align: center;
    border-bottom: 2px solid #0f5d8e;
}

.clienticonbox {
    width: 100%;
    max-width: 165px;
    height: 100%;
    min-height: 180px;
    background-color: #fff;
    border-right: 2px solid #f7f7f7;
}

    .clienticonbox.active {
        background-color: #1fc8db;
        background-image: linear-gradient(84deg, #02a8fa 10%, #1fc8db 60%, #17cfd1 75%);
        color: #fff;
        position: absolute;
        left: 0;
        right: 0;
        margin: 0 auto;
    }

    .clienticonbox:hover {
        background-color: #1fc8db;
        background-image: linear-gradient(84deg, #02a8fa 10%, #1fc8db 60%, #17cfd1 75%);
        color: #fff;
        position: absolute;
        left: 0;
        right: 0;
        margin: 0 auto;
    }

    .clienticonbox:after {
        content: "";
        width: 0;
        height: 0;
        border-left: 15px solid transparent;
        border-right: 15px solid transparent;
        border-bottom: 25px solid #0cb8ea;
        top: -24px;
        position: absolute;
        left: 0;
        right: 0;
        margin: 0 auto;
        display: none;
    }

.ind-cen {
    text-align: center;
}


.clienttop {
    padding: 45px 0 0 0;
}

    .clienttop img {
        width: 70px !important;
        margin: 0 auto;
        display: block;
    }

    .clienttop p {
        margin: 40px 0 0 0;
        font-size: 14px;
        font-family: roboto-regular;
    }

.rightboxone {
    padding: 0 0 0 0;
    margin: 0;
}

.purquanti .quanhead h5 {
    font-size: 16px;
    margin: 0;
}

.addcartbtn {
    text-align: right;
    padding: 0 15px 0 0;
}

    .addcartbtn input.btn-primary {
        padding: 6px 25px;
        margin: 0;
        background-color: #1fc8db;
        background-image: linear-gradient(84deg, #2f90f4 10%, #57adf2c4 60%, #4db5e8 75%);
    }

.purquanti .quaninpu input {
    padding: 2px 0;
    width: 100%;
    max-width: 90px;
}
/*****
        what say about
        ****/
#whatsay {
    padding: 95px 0 0 0;
}

.blockquotebox {
    border: 2px solid #eeeeee;
    height: 100%;
    min-height: 196px;
    width: 100%;
    border-radius: 5px;
    margin: 0 0 15px 0;
}

.blocktext {
    padding: 30px 0 0 30px;
}

    .blocktext p {
        font-family: roboto-regular;
        font-size: 15px;
        font-style: italic;
        color: #717171;
        margin: 0;
    }

.blockt {
    margin: 25px 0 0 0;
}

    .blockt a {
        color: #00e3be;
        font-size: 14px;
        font-family: roboto-regular;
    }

    .blockt span {
        margin: 0 10px 0 0;
    }

.blockquoteicon {
    position: relative;
}

    .blockquoteicon span {
        background-color: #ffffff;
        height: 50px;
        width: 50px;
        border-radius: 50%;
        position: absolute;
        top: 5px;
        right: 4%;
        margin: 0 auto;
        display: block;
    }

        .blockquoteicon span i {
            margin: 6px 0 0 6px;
            color: #cccccc;
            font-size: 30px;
        }

/****pagenitaion start css****/
.Pagination-buttom {
    float: right;
}

.pagination-container ul li {
    padding: 4px 11px;
}

    .pagination-container ul li a {
        font-size: 14px;
        color: #444444;
        font-family: roboto-regular;
    }

    .pagination-container ul li.active {
        color: #01ddc3;
    }

    .pagination-container ul li.PagedList-skipToNext {
        /*border: 1px solid #01ddc3;*/
        border-radius: 0;
        background-color: #1fc8db;
        background-image: linear-gradient(84deg, #02a8fa 10%, #1fc8db 60%, #17cfd1 75%);
        padding: 2px 12px;
    }

    .pagination-container ul li.PagedList-skipToPrevious {
        /*border: 1px solid #01ddc3;*/
        border-radius: 0;
        background-color: #1fc8db;
        background-image: linear-gradient(84deg, #02a8fa 10%, #1fc8db 60%, #17cfd1 75%);
        padding: 2px 12px;
    }


/*******
            client sponsors
            ******/
#clisponsors {
    margin: 45px 0 100px 0;
}

.clientsponsors ul {
    list-style: none;
    text-align: center;
    line-height: normal;
    margin: 0;
}

    .clientsponsors ul li {
        display: inline-block;
        border-right: 1px solid #eeeeee;
        padding: 0 15px;
        margin: 0;
        line-height: normal;
    }

        .clientsponsors ul li:last-child {
            border-right: 0;
        }

/*******
            send message section
            *******/
#sendmessage {
    background-color: rgb(73, 182, 236); /*rgba(224,87,83,0.8);*/
    height: auto;
    min-height: 500px;
}
    .lableName {
        border-bottom: 0px solid #fff;
    }
.sendhed {
    margin: 100px 0 60px 0;
    text-align: center;
}


    .sendhed h3 {
        color: #b14915;
        font-size: 14px;
        font-family: roboto-regular;
        letter-spacing: 5px;
        margin: 0 0 15px 0;
    }

    .sendhed h2 {
        font-family: Roboto-Regular;
        font-size: 30px;
        margin: 0;
        color: #fff;
    }



#sendmessage .form-control {
    color: #fff;
    font-family: Roboto-Regular;
}

.sendhed h2 b {
    font-family: Roboto-Bold;
    font-weight: bold;
}

.contact-bg {
}

    .contact-bg .card {
        box-shadow: none;
        background-color: transparent;
    }

    .contact-bg .card-body {
        padding: 50px 50px;
    }

    .contact-bg .md-form {
        padding: 0 25px;
    }

    .contact-bg .card .md-form label {
        padding: 0 25px;
        font-family: roboto-medium;
        color: #fff;
        font-size: 14px;
    }

    .contact-bg .btn-block {
        background-color: #fff !important;
        width: 100%;
        max-width: 170px;
        margin: 65px auto 0 auto;
        font-family: roboto-bold;
        font-size: 13px;
    }


        .contact-bg .btn-block span {
            color: #00ebb1;
            margin: 0 0 0 5px;
        }

/********
            Get in touch
            ********/
#getin {
    background-image: url(/images/getin_bg.jpg);
    width: 100%;
    height: 100%;
    min-height: 740px;
    background-repeat: repeat;
    background-position: 50% 50%;
    background-size: cover;
    margin: 50px 0 0 0;
}

.conbg .form-control {
    font-family: roboto-regular;
    font-size: 14px;
    border: 0;
    border-bottom: 1px solid #d6d6d6;
}

.getinimg {
    padding: 0 0;
    background-color: #171716d4;
}

.getinhed {
    margin: 0 0 0 0;
}


    .getinhed h3 {
        color: #fff;
        font-size: 14px;
        font-family: roboto-regular;
        letter-spacing: 5px;
        margin: 0 0 15px 0;
    }

    .getinhed h2 {
        font-family: Roboto-Regular;
        font-size: 45px;
        margin: 0;
        padding: 0 0 35px 0;
    }

        .getinhed h2 b {
            font-family: Roboto-Bold;
            font-weight: bold;
            color: #fff;
        }

    .getinhed p {
        font-size: 15px;
        color: #fff;
        font-family: roboto-regular;
        margin: 0 0 25px 0;
    }

.getinbg {
    background-image: url(/images/ellipse01.png);
    height: 60px;
    width: 60px;
    background-repeat: no-repeat;
    position: relative;
    margin: 0 0 35px 0;
}

    .getinbg span {
        position: absolute;
        left: 0;
        right: 0;
        margin: 0 auto;
        text-align: center;
        top: 30%;
    }

        .getinbg span i {
            color: #fff;
            font-size: 25px;
        }

.getintext {
    margin: 0 0 35px 0;
}

    .getintext p {
        color: #fff;
        font-family: roboto-regular;
        margin: 0 0 1px 0;
    }

/***
    news letter start
    ***/
#newsletter {
    background-image: url('/images/letusinform.jpg');
    background-repeat: repeat;
    background-position: 50% 50%;
    background-size: cover;
    width: 100%;
    height: 100%;
    min-height: 280px;
}

.newdec {
    padding: 90px 0 0 0;
}

.newstext p {
    color: #fff;
    font-size: 33px;
    font-family: roboto-light;
    text-align: center;
    margin: 0 0 25px 0;
}

.newsform {
    width: 100%;
    max-width: 560px;
    margin: 0 auto;
    display: block;
}

    .newsform .form-control:focus {
        outline: none;
        box-shadow: none;
        border-color: #fff;
    }


    .newsform form .input-group input {
        background-color: transparent;
        height: 100%;
        min-height: 50px;
        border-right: 0;
        font-size: 14px;
        font-family: roboto-light;
    }

    .newsform form .input-group .input-group-append span {
        background-color: #e67428;
        border: 0;
        color: #fff;
        font-size: 25px;
        padding: 0 30px;
        cursor: pointer;
    }

    .newsform form .input-group input-placeholder {
        color: #fff;
    }


/****search course start***/
.serachteachimg {
    background-image: url(/images/searchcourse.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: 50% 50%;
    width: 100%;
    height: auto;
    min-height: 600px;
}
/****search course end***/
/*** footer start*****/
#comfooter {
    background-color: #4b4b4b;
    background-image: url(/images/footerimg.jpg);
    background-repeat: no-repeat;
    background-position: 0 100%;
    background-size: cover;
}



.footerleft p.foottext {
    font-size: 16px;
    font-family: roboto-light;
    color: #fff;
    text-align: justify;
    margin: 30px 0 20px 0;
}

.footerhead {
    padding: 50px 0 0 0;
    border-bottom: 1px solid #eeeeee;
}

.footernav ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

    .footernav ul li {
        display: block;
        margin: 0 0 5px 0;
    }

        .footernav ul li a {
            color: #fff;
            text-decoration: none;
            font-family: Roboto-Regular;
            font-size: 15px;
        }

            .footernav ul li a span {
                color: #009af4;
                margin: 0 5px 0 0;
            }

.foot-h h2 {
    font-family: Roboto-Regular;
    color: #fff;
}

    .foot-h h2 b {
        font-family: Roboto-Bold;
        font-size: 23px;
        font-weight: bold;
    }

    .foot-h h2:after {
        content: "";
        display: block;
        border-bottom: 2px solid #02acf6;
        width: 100%;
        max-width: 45px;
        margin: 20px 0 35px 0;
    }

.footergal ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

    .footergal ul li {
        display: inline-block;
    }

        .footergal ul li img {
            width: 80px;
        }

            .footergal ul li img:last-child {
                margin-top: 3px;
                border-radius: 5px;
            }

.footsocial {
    padding: 0 0 32px 0;
}

    .footsocial ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

        .footsocial ul li {
            background-image: url(/images/ellipse01.png);
            width: 30px;
            height: 30px;
            background-position: 50% 50%;
            background-size: cover;
            background-repeat: no-repeat;
            position: relative;
            display: inline-block;
            margin: 0 5px 0 0;
        }

            .footsocial ul li a span {
                position: absolute;
                color: #fff;
                font-size: 15px;
                left: 0;
                right: 0;
                text-align: center;
                top: 15%;
            }

.foote-pd {
    padding: 0 0 0 80px !important;
}

.footemail a {
    font-family: roboto-regular;
    text-decoration: none;
    color: #fff;
    font-size: 16px;
}

.foobtn {
    padding: 0 0 0 0;
    text-align: right;
}

.footsub input.form-control {
    padding: 0 5px 0 5px;
    text-align: left;
    height: auto;
    min-height: 48px;
    font-family: Roboto-Regular;
    font-size: 14px;
}

.foobtn span.btn-primary {
    background-color: #197baf;
    background-image: linear-gradient(84deg, #02a8fa 10%, #2f90f4 60%, #2f90f4 75%);
    border: 0;
    margin: 0 0 0 0;
    padding: 15px 50px;
    font-size: 14px;
    font-family: roboto-regular;
    position: absolute;
    right: 0;
    top: 94px;
}

.footcopy {
    padding: 30px 0 0 0;
    margin: 0 0 45px 0;
}

.footcright p {
    font-family: roboto-light;
    font-size: 15px;
    margin: 0;
    color: #fff;
}

    .footcright p span {
        margin: 0 0 0 5px;
    }

.footlicense ul {
    list-style: none;
    margin: 0;
    padding: 0;
    text-align: right;
}

    .footlicense ul li {
        display: inline-block;
        margin: 0 10px 0 0;
    }

        .footlicense ul li a {
            text-decoration: none;
            color: #acacac;
            font-family: roboto-medium;
            font-size: 14px;
        }
/*** footer end*****/
/****
    update css
    *****/

.menuicon {
    display: none;
}

#topcontrol i {
    font-size: 25px;
    bottom: 0;
    color: #f26a21;
    position: absolute;
    top: 25px;
    right: 0;
}

.banner-box {
    position: relative;
}

    .banner-box::before {
        content: "";
        position: absolute;
        top: 0px;
        left: 0px;
        right: 0px;
        width: 100%;
        height: 100%;
        background-color: #fafafa;
        opacity: .3;
    }

    .banner-box .banner-caption {
        position: absolute;
        top: 50%;
        left: 50%;
        z-index: 2;
        transform: translate(-50%, -50%);
    }

        .banner-box .banner-caption h2 {
            margin-top: 0;
            color: #fff;
            font-size: 2.5em;
            padding-bottom: 5px;
        }

        .banner-box .banner-caption h3 {
            margin-top: 0;
            color: #fff;
            font-size: 2em;
            font-weight: 300;
            padding-bottom: 5px;
        }

    .banner-box .img-box {
        width: 100%;
        display: block;
        height: 100%;
        overflow: hidden;
        margin: 0;
        position: relative;
    }

        .banner-box .img-box::before {
            content: "";
            position: absolute;
            top: 0px;
            left: 0px;
            right: 0px;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .banner-box .img-box > img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

    .banner-box .owl-carousel {
        position: relative;
    }

        .banner-box .owl-carousel .owl-controls {
            background: #ddd;
            margin-top: 0px;
        }

            .banner-box .owl-carousel .owl-controls .owl-nav {
                position: absolute;
                width: 100%;
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
                color: white;
                font-size: 2.500em;
                padding: 0px 10px;
                top: 50%;
                left: 50%;
                -webkit-transform: translate(-50%, -50%);
                -moz-transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
            }

                .banner-box .owl-carousel .owl-controls .owl-nav .owl-prev {
                    float: left;
                }

                .banner-box .owl-carousel .owl-controls .owl-nav .owl-next {
                    float: right;
                }

            .banner-box .owl-carousel .owl-controls .owl-dots {
                height: 20px;
                position: absolute;
                bottom: 25px;
                left: 0px;
                right: 0px;
                text-align: center;
            }

                .banner-box .owl-carousel .owl-controls .owl-dots .owl-dot {
                    border-radius: 50%;
                    margin: 3px;
                    display: inline-block;
                    width: 12px;
                    height: 12px;
                    background-color: #fff;
                }

                    .banner-box .owl-carousel .owl-controls .owl-dots .owl-dot.active {
                        background-color: #00c3c9;
                    }



.item-control {
    display: inline-block;
    position: absolute;
    right: 15px;
    /* top: 0; */
    bottom: 15px;
}

    .item-control > a {
        color: #ffffff;
        display: inline-block;
        margin-left: 10px;
        background-color: #035b96;
        width: 30px;
        height: 30px;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        flex-direction: row;
        border-radius: 3px;
        font-family: Roboto-Medium;
    }


/***client slider start**/
#ClientSlider .owl-nav {
    position: relative;
    display: block;
}

    #ClientSlider .owl-nav .owl-prev {
        position: absolute;
        bottom: 75px;
    }

        #ClientSlider .owl-nav .owl-prev i, #ClientSlider .owl-nav .owl-next i {
            color: #e4e4e4;
        }

    #ClientSlider .owl-nav .owl-next {
        position: absolute;
        right: 0;
        bottom: 75px;
    }


#ClientSlider .owl-carousel .owl-dots.disabled, #ClientSlider .owl-carousel .owl-nav.disabled {
    display: block;
}
.price-box {
    margin-top: 12px;
}
/***client slider end**/
/*.banner {
    width: 100px;
    height: 100px;
    position: relative;
    animation: mymove 3s infinite;
    animation-direction: alternate;
}


@keyframes mymove {
    0% {
        left: -100px;
        top: 0px;
    }

    100% {
        left: 200px;
        top: 0px;
    }
}*/
/*****inner page*****/
.inner-banner {
    text-align: center;
    padding: 130px 0px 0 0;
    background-position: 50% 50%;
    height: auto;
    width: 100%;
    background-repeat: no-repeat;
    min-height: 130px;
    position: relative;
    margin: 130px 0 0 0;
}

    .inner-banner > .img-box {
        height: 100%;
        width: 100%;
        background-image: url("/images/inner/breadcrumb_bg.jpg");
        /*background-color: #007bff;*/
        background-position: 50% 50%;
        background-size: cover;
        background-repeat: no-repeat;
        min-height: 260px;
        position: absolute;
        bottom: 0;
    }

.breadcrumbone {
    position: absolute;
    left: 0;
    right: 0;
    top: 45%;
    bottom: 0;
}

    .breadcrumbone h2 {
        font-family: Roboto-bold;
        font-size: 26px;
        color: #fff;
        margin: 10px 10px 20px 10px;
    }

    .breadcrumbone ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

        .breadcrumbone ul li {
            display: inline-block;
            background-color: #444444;
            padding: 0 12px;
            border-radius: 3px;
            margin: 0 2px;
        }

            .breadcrumbone ul li:hover {
                background-color: #00dcc3;
            }

.breadactive {
    background-color: #009aeb !important;
}

.breadcrumbone ul li a {
    text-decoration: none;
    color: #fff;
    font-family: roboto-regular;
    font-size: 13px;
}

/***customer order detail start***/
.corderdetails {
    font-family: Roboto-Regular;
    border: 1px solid #d6d6d6;
    padding: 15px 10px;
    margin: 15px 0 30px 0;
    border-radius: 5px;
}

.custordlist h5 {
    font-weight: 600;
    font-size: 16px;
}

.custordlist p {
    margin: 0 0 5px 0;
}

.ordli {
    font-family: Roboto-Regular;
}

    .ordli ul {
        padding: 0;
        list-style: none;
        line-height: 0;
    }

        .ordli ul li {
            display: inline-block;
            font-size: 14px;
        }

            .ordli ul li span {
                font-weight: 600;
            }

.CustomerOrderHistory {
    font-family: Roboto-Regular;
    border: 1px solid #d6d6d6;
    border-radius: 5px;
    margin: 0 0 30px 0;
}


.custOrder_header {
    background-color: #ebebeb;
    padding: 15px 15px;
}

    .custOrder_header h4 {
        font-size: 14px;
        margin: 0;
        font-weight: 600;
    }


.acc-ord-detail {
    padding: 10px 0;
}

    .acc-ord-detail #frmCustomer-order-details {
        float: right;
    }

.myorddec p {
    font-size: 14px !important;
}

.CustomerOrderHis_body {
    padding: 15px 15px;
}

.His_Box {
    padding: 15px 0;
}

.CustomerOrderHis_body h5 {
    font-size: 18px;
}

.cusorde p {
    margin: 0;
}
/***customer order detail end***/
/***About page****/
.abtright .abtbtn a.btn-primary {
    background-color: #1fc8db;
    background-image: linear-gradient(84deg, #02a8fa 10%, #1fc8db 60%, #17cfd1 75%);
    width: 100%;
    font-family: Roboto-Regular;
}

    .abtright .abtbtn a.btn-primary span {
        font-size: 14px;
    }

.abtus {
    margin: 80px 0 0 0;
}

.abtdeimg {
    padding: 2px 0 0 4px;
}

    .abtdeimg p {
        padding: 6px 0 0 0;
    }

.abtpara {
    font-family: roboto-regular;
    text-align: justify;
}

    .abtpara p {
        color: #949494;
        font-size: 15px;
    }


.teacherslide ul {
    list-style: none;
    padding: 0;
}

    .teacherslide ul li {
        display: inline-block;
        margin: 0;
        position: relative;
    }

        .teacherslide ul li img {
            width: 274px;
        }

.abtlim {
    margin: 20px 0 0 0;
}

    .abtlim p {
        font-family: roboto-regular;
        color: #7d7d7d;
        text-align: justify;
        margin: 10px 0 10px 0;
    }

.gridtext {
    font-family: Roboto-Regular;
    color: #fff;
    padding: 0;
}

    .gridtext h4 {
        font-size: 16px;
        margin: 0;
        font-weight: 600;
    }

    .gridtext p {
        margin: 0;
        font-size: 14px;
    }


.gridlistsub {
    margin: 100px auto 0 auto;
}

    .gridlistsub ul {
        list-style: none;
    }

        .gridlistsub ul li {
            display: inline-block;
            background-color: #fff;
            padding: 5px 8px;
            text-align: center;
            border-radius: 50%;
            width: 35px;
            height: 35px;
        }

            .gridlistsub ul li a span {
                color: #00dcc3;
            }

.teacherslide .overlayone {
    display: flex;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    height: 100%;
    width: 100%;
    opacity: 0;
    transition: .5s ease;
    background-image: linear-gradient(84deg, rgba(2,168,250,0.8) 10%, rgba(31,200,219,0.8) 60%, rgba(23,207,219,0.8) 75%);
}

.abtleftcal {
}

    .abtleftcal span {
        color: #adadad;
        font-size: 13px;
        font-family: roboto-regular;
        margin: 0 5px 0 0;
    }

        .abtleftcal span i {
            font-size: 12px;
        }

    .abtleftcal p {
        color: #080808;
        font-size: 14px;
        font-family: roboto-regular;
        margin: 5px 0 0 0;
    }


.teacherslide ul li:hover .overlayone {
    opacity: 1;
}

.abtview {
    margin: 20px 0 0 0;
}

    .abtview p a {
        font-family: roboto-medium;
        color: #2d2d2d;
        font-size: 14px;
        font-weight: 500;
    }

        .abtview p a:hover {
            text-decoration: underline;
            color: #00e3be;
        }

        .abtview p a ~ span {
            color: #00e3be;
            margin: 0 0 0 10px;
        }
/***padding***/
.pl {
    padding-left: 0 !important;
}

.pr {
    padding-right: 0 !important;
}


/***blog content start***/
#contentblog {
    margin: -15px 0 0 0;
    display: none;
}

.contentbbg {
    background-color: #035b96;
    padding: 60px 0;
}

.bcontentt p {
    font-size: 14px;
    color: #fff;
    font-family: roboto-regular;
    font-style: italic;
}

.bcontentt h5 {
    color: #fff;
    font-family: roboto-medium;
    font-size: 18px;
}

    .bcontentt h5 span {
        font-size: 14px;
    }

        .bcontentt h5 span a {
            color: #fff;
        }
/***blog content end***/
/***payment received start***/
.payrecbox {
    border: 1px solid #b7b7b7;
    height: auto;
    min-height: 54px;
    padding: 15px 15px;
    margin: 0 0 20px 0;
    border-radius: 5px;
    font-family: roboto-regular;
}

    .payrecbox h3 {
        font-size: 20px;
        font-family: roboto-bold;
    }


    .payrecbox p {
        margin: 0;
    }

        .payrecbox p span .fa-check {
            color: #009c06;
        }

        .payrecbox p span .fa-times {
            color: #af1408;
        }
/***payment received end***/

/****payment method start***/


/* Create a custom radio button */
.customradiotwo {
    display: block;
    position: relative;
    padding-left: 20px;
    margin-bottom: 2px;
    cursor: pointer;
    font-size: 14px;
    color: #f69663;
    font-family: roboto-ragular;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

    /* Hide the browser's default radio button */
    .customradiotwo input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    .customradiotwo img {
        margin: -10px 0 0 0;
    }

.checkmarktwo {
    position: absolute;
    top: 0;
    left: 0;
    height: 15px;
    width: 15px;
    background-color: #eee;
    border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.customradiotwo:hover input ~ .checkmarktwo {
    background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.customradiotwo input:checked ~ .checkmarktwo {
    background-color: #1fc8db;
    background-image: linear-gradient(84deg, #02a8fa 10%, #1fc8db 60%, #17cfd1 75%);
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmarktwo:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the indicator (dot/circle) when checked */
.customradiotwo input:checked ~ .checkmarktwo:after {
    display: block;
}

/* Style the indicator (dot/circle) */
.customradiotwo .checkmarktwo:after {
    top: 5px;
    left: 5px;
    width: 5px;
    height: 5px;
    border-radius: 50%;
    background: white;
}



.payrecboxone {
    /*border: 1px solid #b7b7b7;*/
    height: auto;
    min-height: 54px;
    padding: 0;
    margin: 0 0 0 0;
    border-radius: 5px;
    font-family: roboto-regular;
}

    .payrecboxone h3 {
        font-size: 20px;
        font-family: roboto-bold;
    }


    .payrecboxone p {
        margin: 0 0 5px 0;
    }

.oaygrad {
    background-color: #1fc8db;
    background-image: linear-gradient(84deg, #02a8fa 10%, #1fc8db 60%, #17cfd1 75%);
    height: auto;
    min-height: 225px;
    border-radius: 5px;
    font-family: roboto-regular;
}

.payrecboxtwo {
    background-color: #fff;
    margin: 5px 20px;
    height: auto;
    padding: 0 0 0 10px;
    min-height: 200px;
}

    .payrecboxtwo h3 {
        font-size: 20px;
        font-family: roboto-bold;
        text-align: center;
    }


    .payrecboxtwo p {
        margin: 0;
    }


.payinpu input.form-control, .payinpu select.form-control {
    font-size: 14px;
    padding: 0 7px;
    border-radius: 0;
    background-color: #f5f5f5;
    display: inline-block;
}

    .payinpu select.form-control:not([size]):not([multiple]) {
        height: calc(1.4rem + 2px);
    }

.payinpu label {
    font-size: 14px;
}

.payinpu .btn-primary {
    background-color: #1fc8db;
    background-image: linear-gradient(84deg, #02a8fa 10%, #1fc8db 60%, #17cfd1 75%);
    padding: 10px 40px;
}

.payright {
    float: right;
}

    .payright span {
        color: #17838e;
        font-size: 18px;
    }

#paymentreceived {
    margin: 0 0 30px 0;
}

    #paymentreceived .card[class*=border] {
        border: 1px solid #dedede;
    }

.payrecboxone p label {
    margin: 10px 30px 10px 0;
    padding: 0;
}

.paytfooter {
    padding: 0 0 20px 15px;
    font-family: roboto-regular;
}

.paywith h4 {
    margin: 0;
    font-size: 16px;
}

.paywith p {
    margin: 0;
    font-size: 12px;
}

.payfooimg img {
    float: right;
}

.formbtn {
    margin: 5px 0 0 -5px !important;
}

.payinpu .form-group {
    margin: 0;
}
/****payment method end***/
/* Listing list & grid*/
.listing-list .listing, .listing-grid .listlistbox {
    display: none;
}

.listing-list .listlistbox {
    display: block;
}

.coulis {
    /*box-shadow: 0 0 13px #d6d6d6;*/
    padding: 5px 0 5px 10px;
    width: 100%;
    max-width: 240px;
}

    .coulis h4 {
        font-size: 14px;
        margin: 0;
        font-family: roboto-bold;
        color: #252525;
    }

    .coulis span {
        margin: 0 5px 0 0;
        font-size: 12px;
        color: #00dcd2;
    }

.cougraphic span {
    background-color: #01ddc3;
    color: #fff;
    padding: 10px 12px;
    font-size: 13px;
    border-radius: 3px;
}

.listlist {
    font-family: Roboto-Regular;
    padding: 10px 0 0 0;
}

.coursede img {
    margin: 0 auto;
    display: block;
}

.coursedeacc {
    font-family: Roboto-Regular;
    border-bottom: 1px solid #eaeaea;
    margin: 0 0 10px 0;
}

    .coursedeacc span.count {
        font-size: 35px;
        color: #e4e4e4;
        line-height: normal;
    }

    .coursedeacc h5.heade {
        margin: 0;
        font-size: 18px;
    }

.coursepurchase {
    font-family: Roboto-Regular;
}

    .coursepurchase h6 {
        font-size: 13px;
        text-transform: uppercase;
        color: #6f6f6f;
    }

    .coursepurchase .courbox {
        background-color: #f4f4f4;
        width: 100%;
        height: 100%;
        min-height: 200px;
        border: 1px solid #d6d6d6;
    }

.corboxlist ul {
    list-style: none;
    padding: 0;
}

.corboxlist {
    padding: 5px 5px;
}

    .corboxlist ul li {
        display: inline-block;
        font-size: 14px;
        padding: 10px 0 10px 0;
        border-bottom: 1px solid #e8e8e8;
        width: 100%;
    }

.checkOutHeader p {
    font-family: Roboto-Regular !important;
}

.corboxlist ul li:last-child {
    /*border-bottom: 3px solid #e8e8e8;*/
}

.corboxlist ul li span {
    color: #3f616d;
}

    .corboxlist ul li span input {
        width: 100%;
        max-width: 50px;
        text-align: center;
    }

.cortotal {
    font-family: Roboto-Regular;
}

    .cortotal h3 {
        font-size: 18px;
        font-weight: 600;
    }

.pd {
    padding: 0 !important;
}

.cortotal span {
    margin: 0 0 0 50px;
}

.coursedeacc .coumin {
    background-color: #f7f7f7;
    padding: 5px 15px;
}

.coursedeacc span.byj {
    color: #01e1bc;
}

.coursedetab {
    margin: 0 auto;
    display: table;
}

    .coursedetab .nav-pills .nav-link.active, .coursedetab .nav-pills .show > .nav-link {
        color: #fff;
        background-color: #1fc8db;
        background-image: linear-gradient(84deg, #02a8fa 10%, #1fc8db 60%, #17cfd1 75%);
        font-family: roboto-regular;
        text-transform: uppercase;
        font-size: 14px;
    }

    .coursedetab .nav-link {
        display: block;
        padding: .5rem 1rem;
        background-color: #f7f7f7;
        color: #bdbdbd;
        font-family: roboto-regular;
        text-transform: uppercase;
        font-size: 14px;
    }

li.nav-item {
    margin: 0 0 0 5px;
}


.coursedelect ul {
    list-style: none;
    padding: 0;
    font-family: Roboto-Medium;
}

    .coursedelect ul li {
        color: #b9b9b9;
        font-size: 16px;
        border-bottom: 1px solid #f1f1f1;
        padding: 0 0 10px 0;
    }

        .coursedelect ul li span {
            color: #000;
            margin: 0 5px;
        }

.courdestar {
    margin: 25px 0;
}

    .courdestar span {
        float: right;
        font-size: 14px;
        color: #06e2c8;
        font-family: roboto-bold;
    }

    .courdestar ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

        .courdestar ul li {
            display: inline-block;
        }

            .courdestar ul li span {
                color: #f9c91f;
            }

.news-h h2 > span > sup {
    background-color: #03a9f8;
    color: #fff;
    padding: 6px 10px;
    font-size: 12px;
    border-radius: 3px;
    position: relative;
    top: 0;
    text-transform: uppercase;
}

.courselist {
    padding: 80px 0 0 0;
}

.coulistgrid {
    font-family: Roboto-Regular;
    display: contents;
}

    .coulistgrid span {
        font-size: 14px;
        color: #6d6d6d;
        margin: 0 15px 0 0;
    }

    .coulistgrid select {
        border: 0;
        background-color: #f7f7f7;
        border: 1px solid;
        font-size: 14px;
        font-weight: 600;
    }

        .coulistgrid select:focus {
            box-shadow: none;
            background-color: #f7f7f7;
        }

        .coulistgrid select.form-control {
            width: 100%;
            max-width: 155px;
        }

.listing {
    margin-bottom: 60px;
    display: flex;
    background: #ffffff;
    color: #000000;
}

    .listing .icon-svg {
        fill: #6ebe3b;
    }

    .listing .image {
        width: 31%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgba(228, 228, 228, 0.5);
    }

        .listing .image a:hover {
            opacity: .7;
        }

        .listing .image img {
            max-width: 100%;
        }

    .listing .detail {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        width: 69%;
        border: 1px solid #e4d9d1;
        margin: 10px;
        padding: 20px 25px;
    }

        .listing .detail h4 {
            line-height: 30px;
            margin-top: 0;
            font-family: 'Lato', sans-serif;
            font-weight: 900;
            font-size: 16px;
            text-transform: uppercase;
            font-style: normal;
            position: relative;
            padding-bottom: 20px;
        }

            .listing .detail h4:after {
                content: "";
                display: inline-block;
                width: 50px;
                height: 3px;
                background: #6ebe3b;
                position: absolute;
                left: 0;
                bottom: 0;
            }

            .listing .detail h4 a {
                display: inline-block;
            }

                .listing .detail h4 a:hover {
                    color: #c1452b;
                }

        .listing .detail p {
            font-size: 15px;
            line-height: 26px;
        }

        .listing .detail .chef-social-links {
            text-align: right;
        }

            .listing .detail .chef-social-links li {
                display: inline-block;
                margin-left: 15px;
            }

                .listing .detail .chef-social-links li a {
                    font-size: 18px;
                    display: inline-block;
                }

                    .listing .detail .chef-social-links li a:hover {
                        color: #c1452b;
                        transform: scale(1.5);
                    }

    .listing .meta-listing {
        display: flex;
        justify-content: space-between;
    }

        .listing .meta-listing .post-meta {
            flex: 1;
            margin-bottom: 0;
        }

            .listing .meta-listing .post-meta li {
                margin-right: 12px;
            }

                .listing .meta-listing .post-meta li:last-child {
                    margin-right: 0;
                }

        .listing .meta-listing .rating-box {
            flex: 1;
            padding: 0;
            text-align: right;
        }

.recipe-listing .listing {
    margin-bottom: 30px;
}





.listing-list .listing .detail h4 {
    padding-bottom: 10px;
}

.listing-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: inherit;
}

    .listing-grid .listing {
        text-align: center;
        flex-direction: column;
        width: 31%;
        margin: 0 5px;
        border: 1px solid #d6d6d6;
        box-shadow: 0 5px 10px #d6d6d6;
        padding: 15px 0;
        margin: 05px 5px 10px 5px;
    }

        .listing-grid .listing .image,
        .listing-grid .listing .detail {
            width: auto;
        }

        .listing-grid .listing .detail {
            padding: 20px 15px;
        }

            .listing-grid .listing .detail h4 {
                margin-bottom: 15px;
            }

                .listing-grid .listing .detail h4:after {
                    left: 50%;
                    margin-left: -25px;
                }

            .listing-grid .listing .detail p {
                display: none;
            }

            .listing-grid .listing .detail .meta-listing {
                flex-direction: column;
            }

                .listing-grid .listing .detail .meta-listing .post-meta {
                    margin-bottom: 15px;
                }

.banner-add {
    text-align: center;
    width: 100%;
    margin-bottom: 40px;
}

    .banner-add img {
        max-width: 100%;
    }

.page-nav {
    width: 100%;
}

.recipe-set .listing-buttons {
    float: right;
    display: inline-block;
    /*background: #f8f6f5;*/
    overflow: hidden;
    position: relative;
    z-index: 6666;
    margin-bottom: 20px;
    padding-left: 20px;
}

    .recipe-set .listing-buttons span {
        cursor: pointer;
        display: inline-block;
        text-align: center;
        width: 35px;
        height: 33px;
        line-height: 27px;
        border: 1px solid #e4d9d1;
        color: #9e938e;
        transition: 0.2s all ease-in-out;
    }

        .recipe-set .listing-buttons span:hover {
            background: #01ddc3;
            border-color: #01ddc3;
            color: #ffffff;
        }

.page-nav {
    width: 100%;
}

    .page-nav li {
        display: inline-block;
        margin-right: 10px;
    }

        .page-nav li a:hover {
            background: transparent;
        }

    .page-nav .current a {
        background: transparent;
    }

    .page-nav li a {
        display: inline-block;
        width: 38px;
        height: 38px;
        line-height: 36px;
        border: 1px solid #e4d9d1;
        background: #ffffff;
        font-family: 'Lora', serif;
        font-weight: 600;
        text-align: center;
        color: #696969;
        font-size: 18px;
    }

.recipe-set .listing-buttons .grid {
    margin-right: 3px;
}

.recipe-set .listing-buttons .current {
    background: #01ddc3;
    border-color: #01ddc3;
    color: #ffffff;
}

.recipe-set .listing-buttons span i {
    margin: 8px 0 0 0;
}

.courselistform form label {
    font-family: roboto-regular;
    text-transform: uppercase;
    font-size: 13px;
    /*color: #444444;*/
}

.courselistform .form-control:focus {
    box-shadow: none !important;
    background-color: #f7f7f7;
    outline: none;
}

.courselistform form label ~ select, .courselistform form label ~ input {
    border: 0;
    background: #f7f7f7;
    font-family: roboto-regular;
    font-size: 13px;
    color: #a0a0a0;
    margin: 0 0 5px 0;
}

.gridlistreview {
    border-bottom: 1px solid #e5e5e5;
    margin: 0 0 15px 0;
    font-family: roboto-medium;
    color: #f26a21;
}
/*.getbooimg img{
    margin:0 auto;
    display:block;
}*/

.CartNoItem {
    text-align: center;
    color: #c5bbbb;
}

.abcd {
    display: none;
}

.BodyBellow {
    padding: 15px 0 !important;
    text-align: center;
    font-family: roboto-bold;
}

    .BodyBellow label {
        font-size: 16px !important;
        font-weight: 600;
    }

.checkOutHeader p {
    margin: 0 !important;
}

.gridlistreview h5 {
    font-size: 14px;
    font-family: Roboto-Bold;
    text-transform: uppercase;
    text-align: justify;
}

/* Listing list & grid ends---------*/

/***privacy policy start***/
#privacypolicy {
    margin: 30px 0 30px 0;
}

.priv-waves {
    box-shadow: 0 3px 8px #cecece;
    background: #f3f3f3;
    height: 100%;
    min-height: 500px;
}

.privcypara p {
    font-size: 14px;
    color: #808080;
    font-family: roboto-regular;
    text-align: justify;
}

.privcypara ul {
    list-style-type: none;
    font-family: roboto-regular;
    padding: 0 15px;
}

    .privcypara ul li {
        font-size: 14px;
    }

        .privcypara ul li span {
            padding: 0 10px 0 0;
            color: #00dcc3;
        }

.privcypara h5 {
    font-family: roboto-regular;
    font-size: 18px;
    text-align: center;
    font-weight: 600;
    margin: 0 0 20px 0;
}



.loginbox .modal-dialog.modal-notify.modal-warning .badge, .loginbox .modal-dialog.modal-notify.modal-warning .modal-header {
    /*  background-image: url(../images/login-bg.png);*/
    height: auto;
    min-height: 135px;
    margin: 0 auto;
    width: 100%;
    display: block;
    /*background-color: transparent !important;*/
    background-color: #17487a;
    position: relative;
    background-repeat: repeat;
    background-size: cover;
    background-position: 50% 50%;
}

.logoimg img {
    position: absolute;
    right: 0;
    left: 0;
    top: -11px;
    bottom: 0;
    margin: 0 auto;
    display: block;
    width: 140px;
    border-radius: 5px;
}

.signinn {
    position: relative;
}


    .signinn p {
        font-family: Roboto-Regular;
        font-size: 12px;
        color: #171717;
        text-align: center;
        font-weight: 600;
        position: absolute;
        left: 0;
        right: 0;
        top: 6px;
        background-color: #fff;
        width: 100%;
        max-width: 107px;
        margin: 0 auto;
    }

.loginbox .modal-body {
    padding-bottom: 0 !important;
}

.signfooter {
    text-align: center;
    margin: -25px 0 -15px 0;
}

    .signfooter p {
        text-align: center;
        margin: 0;
        font-family: roboto-regular;
        color: #989898;
    }

.loginbox .md-form .prefix ~ input, .md-form .prefix ~ textarea {
    font-family: roboto-regular;
    font-size: 14px;
    color: #a9a9a9;
}


.forgotSection a.btn-link {
    margin: 0;
    color: #0078b3 !important;
    font-family: roboto-regular;
}

.loginbox .modal.show .modal-dialog {
    -webkit-transform: translate(0,0);
    transform: translate(0,25%);
    width: 100%;
    max-width: 430px;
}

.loginbox .md-form {
    margin-top: 10px;
}

.loginbox .modal-dialog.modal-notify .close {
    background-color: #1fc8db;
    background-image: linear-gradient(84deg, #17487a 10%, #17487a 60%, #17487a 75%);
    position: absolute;
    top: 0;
    right: 0;
    height: 30px;
    width: 30px;
}

    .loginbox .modal-dialog.modal-notify .close span {
        font-size: 30px;
        top: 0;
        position: absolute;
        right: 0;
        left: 0;
    }

.loginbox .md-form .prefix ~ label {
    margin-left: 2.5rem;
    font-family: roboto-regular;
    font-size: 14px;
}

.loginbox .modal-dialog.modal-notify .close:focus {
    outline: 0;
}


.signfooter .btn-primary {
    background-color: #1fc8db;
    background-image: linear-gradient(84deg, #01547db0 10%, #0b4f7cc7 60%, #17487a 75%);
    width: 100%;
    font-family: roboto-regular;
    font-size: 14px;
}

.loginbox .modal-footer {
    border-top: 0;
    padding-top: 0;
}

.myordesearch {
    position: relative;
}

.myorl h4 {
    font-family: roboto-regular;
    font-size: 25px;
}

.input-search {
    width: 100%;
    position: absolute;
    max-width: 500px;
}

.icon {
    position: absolute;
    top: 5px;
    padding: 0 5px;
}

.input-field {
    width: 100%;
    padding: 0 20px;
    outline: none;
}

.myordselect .form-group {
    font-family: roboto-regular;
    margin: 0 0 30px 0;
}

.myordselect .form-control {
    width: 100%;
    max-width: 200px;
    display: inline-block;
    background-color: #efefef;
    border: 0;
    border-radius: 0;
    font-size: 14px;
    padding: 0 0 0 5px;
    margin: 0 0 0 5px;
}

/***myorder box start****/
#myorder {
    padding: 30px 0;
}

.myorderbox {
    background-color: #efefef;
    padding: 5px 10px;
    border-radius: 5px;
}

    .myorderbox .myordjan {
        font-family: Roboto-Regular;
    }

        .myorderbox .myordjan p {
            margin: 0 0 0 0;
        }

        .myorderbox .myordjan ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

            .myorderbox .myordjan ul li {
                display: inline-block;
            }

                .myorderbox .myordjan ul li a {
                    color: #111111;
                    text-decoration: none;
                }

                    .myorderbox .myordjan ul li a:hover {
                        color: cornflowerblue;
                        transition: all 0.5s linear;
                    }

.myorbox {
    border: 1px solid #d6d6d6;
    border-radius: 5px;
}

.myrefhead {
    font-family: Roboto-Bold;
}

    .myrefhead h3 {
        font-size: 20px;
        margin: 0;
    }

    .myrefhead p {
        font-size: 14px;
        font-family: roboto-regular;
    }

.myimg img {
    width: 80px;
}

.myorddec {
    font-family: Roboto-Regular;
}

    .myorddec p {
        margin: 0 0 3px 0;
    }

    .myorddec button {
        padding: 6px 10px;
        margin: 0;
    }

.myordrefund {
    padding: 20px 20px;
}

.myordbtn {
    position: absolute;
    right: 20px;
    bottom: 0;
}

    .myordbtn button.btn-primary, .myordbtn button.btn-default {
        padding: 10px 0;
        display: block;
        width: 100%;
        max-width: 250px;
        font-family: roboto-regular;
    }

/***myorder box end****/
/*-- 
   15. Checkout Page Css
------------------------------*/
.checkout-coupon input {
    border: 1px solid #999999;
    color: #555;
    padding: 5px 10px;
    width: auto;
    font-family: Roboto-Regular;
}

    .checkout-coupon input:focus {
        outline: none;
    }

.checkout-coupon .button-apply-coupon {
    margin: -5px 0 0 10px;
    padding: 7.2px 11px;
}

.shoping-checkboxt-title {
    border-bottom: 1px solid #dddddd;
    font-size: 24px;
    font-weight: 500;
    margin-bottom: 30px;
    padding-bottom: 15px;
    font-family: Roboto-Regular;
}

.single-form-row {
    margin-bottom: 24px !important;
}

    .single-form-row select {
        background-color: #e6e6e6;
        border-radius: 0;
        border: 0;
        font-size: 14px;
    }

    .single-form-row label {
        font-size: 14px;
        margin-bottom: 2px;
    }

        .single-form-row label span.required {
            color: red;
        }

    .single-form-row input {
        border: none;
        color: #4a4a4a;
        font-size: 14px;
        padding: 15px 8px;
        width: 100%;
        background-color: #e6e6e6;
        font-family: roboto-regular;
    }

        .single-form-row input:focus {
            background-color: transparent;
            outline: none;
            border: 1px solid #e6e6e6;
        }

        .single-form-row input::focus {
            outline: none;
        }

#customtraing {
    margin: 0 0 30px 0;
}

    #customtraing .single-form-row textarea {
        border: none;
        color: #4a4a4a;
        font-size: 14px;
        padding: 15px 8px;
        width: 100%;
        background-color: #e6e6e6;
        font-family: roboto-regular;
        height: 100%;
        min-height: 130px;
    }

    #customtraing .single-form-row select {
        font-family: roboto-regular;
        height: 100%;
        min-height: 50px;
    }

        #customtraing .single-form-row select:focus {
            border: 0;
            outline: 0;
            box-shadow: none;
            background-color: #e6e6e6;
        }

    #customtraing .single-form-row {
        margin-bottom: 10px !important;
    }

        #customtraing .single-form-row input {
            padding: 12px 8px;
        }

.single-form-row textarea {
    border: 1px solid #999999;
    color: #555555;
    padding: 12px;
    width: 100%;
    font-size: 14px;
}

.single-form-row.m-0 {
    margin: 0 !important;
    font-family: Roboto-Regular;
}

.billing-details-wrap {
    font-family: Roboto-Regular;
}

.checkout-box-wrap {
    font-family: Roboto-Regular;
}

    .checkout-box-wrap p {
        font-size: 14px;
    }

    .checkout-box-wrap .ship-box-info {
        display: block;
    }

.account-create {
    display: none;
}

    .account-create .creat-pass > span {
        color: red;
    }

.nice-select select {
    height: 35px;
    width: 100%;
    font-size: 14px;
    padding: 0 1px;
    color: #555;
    font-family: roboto-regular;
    /*border: 1px solid #999;*/
}



.your-order-wrap {
    background: #f6f6f6;
}

.your-order-table {
    padding: 20px 30px;
}

    .your-order-table table {
        width: 100%;
    }

        .your-order-table table th, .your-order-table table td {
            border-bottom: 1px solid #d8d8d8;
            border-right: medium none;
            font-size: 14px;
            padding: 15px 0;
            text-align: center;
        }

        .your-order-table table th {
            border-top: medium none;
            font-weight: normal;
            text-align: center;
            text-transform: uppercase;
            vertical-align: middle;
            white-space: nowrap;
            width: 250px;
        }

        .your-order-table table .shipping > th {
            vertical-align: top;
        }

.payment-method {
    padding: 20px 30px;
}

.payment-accordion h3 a {
    color: #333333;
    font-size: 15px;
    font-weight: 500;
    padding-left: 31px;
    position: relative;
    text-decoration: none;
    text-transform: capitalize;
}

    .payment-accordion h3 a:before, .payment-accordion h3 a:after {
        content: "\f067";
        font-family: "FontAwesome";
        display: inline-block;
        font-size: 14px;
        left: 0;
        position: absolute;
        top: 0px;
    }

    .payment-accordion h3 a img {
        height: 60px;
        display: block;
    }

.payment-accordion h3.open a:after {
    content: "\f068";
}

.payment-accordion p {
    font-size: 14px;
    padding-left: 20px;
}

.order-button-payment {
    margin-top: 30px;
}

    .order-button-payment input {
        background: #3083b3;
        border: medium none;
        color: #ffffff;
        font-size: 14px;
        font-weight: 600;
        padding: 12px;
        text-transform: uppercase;
        width: 100%;
        -webkit-transition: 0.4s;
        transition: 0.4s;
    }

        .order-button-payment input:hover {
            background: #000000;
            color: #ffffff;
        }

.checkpayment .card {
    box-shadow: none;
    padding: 30px 0 0 0;
    font-family: Roboto-Regular;
}

    .checkpayment .card .card-header {
        background-color: transparent;
        width: 100%;
        max-width: 500px;
        margin: 0 auto;
        padding: 0;
    }

/***profile start css***/
#profilesec {
    font-family: Roboto-Regular;
    /*position: relative;
    padding: 20px 0;*/
}

.proimgd {
    display: flex;
}

.bxshd {
    box-shadow: 5px 8px 18px #d6d6d6;
}

.prodetai {
    font-family: Roboto-Regular;
    margin: auto 15px;
}

    .prodetai h3 {
        margin: 0;
        font-size: 18px;
    }

.proeditbtn {
    font-family: Roboto-Regular;
    position: absolute;
    bottom: 0;
    right: 50%;
}

    .proeditbtn .btn-default {
        background-color: #1fc8db;
        background-image: linear-gradient(84deg, #02a8fa 10%, #1fc8db 60%, #17cfd1 75%);
        padding: 5px 30px;
    }

.prodec {
    padding: 20px 0;
}

.prolist {
    font-family: Roboto-Regular;
}

    .prolist ul {
        list-style: none;
        padding: 0;
    }

        .prolist ul li {
            display: block;
            font-size: 14px;
            border-bottom: 1px solid #d6d6d6;
        }

            .prolist ul li span {
                margin: 0 5px 0 0;
            }

                .prolist ul li span.emailpd {
                    padding: 0 0 0 15px;
                }

                .prolist ul li span i {
                    color: #f26a21;
                }

/*******************/
.prbxd {
    font-family: Roboto-Regular;
}

    .prbxd .modal-header .close {
        background: #000000;
        position: absolute;
        right: 0;
        top: 0;
        width: 35px;
        height: 35px;
    }

.proform {
    padding: 10px 20px;
}

    .proform .form-control {
        margin: 0 0 8px 0 !important;
        border-radius: 0;
        height: 35px;
        background-color: #f2f2f2;
        border: 0;
        font-size: 14px;
    }

        .proform .form-control:focus {
            outline: 0;
            border: 1px solid #f2f2f2;
            box-shadow: none;
            background-color: #fff;
        }

.prbxd .btn-unique {
    background-color: #1fc8db;
    background-image: linear-gradient(84deg, #02a8fa 10%, #1fc8db 60%, #17cfd1 75%);
}

.prbxd .modal-header .close span {
    position: absolute;
    top: 8px;
    color: #fff;
}

.modal-dialog .modal-content .modal-header {
    background-color: #00dcc3;
}

    .modal-dialog .modal-content .modal-header h4 {
        font-size: 20px;
        color: #fff;
    }

.page-content {
    margin-top: 40px;
}

.page-profile .profile-wrapper {
    overflow: hidden;
    padding: 0 0 40px 0;
}

.page-profile .profile-cover {
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    height: 100%;
    background-color: #1bcbd7;
    min-height: 300px;
    position: relative;
}

.probd {
    position: absolute;
    width: 100%;
    bottom: 0;
    background: #f1f1f1;
    padding: 5px 0;
    text-align: center;
}

.prbtnde .btn-default {
    padding: 5px 20px;
    background-color: #1fc8db;
    background-image: linear-gradient(84deg, #02a8fa 10%, #1fc8db 60%, #17cfd1 75%);
}

.probox {
    background-color: #f1f1f1;
    padding: 0 0 10px 0;
    width: 100%;
    max-width: 200px;
    margin: 0 auto;
}

.page-profile .profile-cover .btn-upload-cover {
    position: relative;
    right: 0;
}

.disbox {
    background-color: #1fc8db;
    background-image: linear-gradient(84deg, #02a8fa 10%, #1fc8db 60%, #17cfd1 75%);
    color: #fff;
    padding: 5px 15px;
}

    .disbox span i {
        font-size: 18px;
    }

.disboxone h4 {
    margin: 0;
}

.disboxone p {
    margin: 0;
}

.page-profile .profile-cover .btn-upload-cover margin {
    top: 11px;
    right: 30px;
}

.page-profile .profile-cover .btn-display-profile {
    display: none;
    position: absolute;
    top: 10px;
    margin-left: 10px;
}

.page-profile .profile-image-wrapper {
    float: left;
    width: 250px;
    background: #00dcc3;
    top: 0;
    left: 0;
    padding-top: 23px;
    -moz-transition: ease-in-out 0.3s;
    -o-transition: ease-in-out 0.3s;
    -webkit-transition: ease-in-out 0.3s;
    transition: ease-in-out 0.3s;
}

    .page-profile .profile-image-wrapper.absolute {
        position: absolute !important;
    }

    .page-profile .profile-image-wrapper > img {
        border-radius: 50%;
        left: 50%;
        transform: translate(-50%, 0%);
        width: 80px;
        height: 80px;
        border: 3px solid #fff;
        position: relative;
        box-shadow: 1px 3px 5px #209fbf;
    }

    .page-profile .profile-image-wrapper .profile-info {
        margin-top: 20px;
        margin-bottom: 20px;
    }

        .page-profile .profile-image-wrapper .profile-info .profile-name {
            color: #fff;
            text-align: center;
            font-weight: bold;
            line-height: .8;
        }

        .page-profile .profile-image-wrapper .profile-info .profile-position {
            color: #fff;
            line-height: .05;
            font-size: 11px;
            text-align: center;
        }

    .page-profile .profile-image-wrapper .profile-actions {
        background: #f2f2f2;
        padding: 10px 0;
        text-align: center;
    }

        .page-profile .profile-image-wrapper .profile-actions .btn {
            background-color: #1fc8db;
            background-image: linear-gradient(84deg, #02a8fa 10%, #1fc8db 60%, #17cfd1 75%);
            padding: 5px 12px;
        }

            .page-profile .profile-image-wrapper .profile-actions .btn span {
                margin: 0 0 0 5px;
            }

    .page-profile .profile-image-wrapper .btn-close-toggled-profile {
        display: none;
        position: absolute;
        top: 0;
        right: 0;
    }

.page-profile .profile-content {
    margin-left: 250px;
}

    .page-profile .profile-content .profile-menus-wrapper {
        background: rgba(0, 0, 0, 0.5);
        margin-top: -50px;
        position: relative;
        top: 0px;
        height: 50px;
    }

        .page-profile .profile-content .profile-menus-wrapper .profile-menus {
            margin-top: -50px;
        }

            .page-profile .profile-content .profile-menus-wrapper .profile-menus .list-inline {
                float: left;
                margin-top: 16px;
                margin-left: 13px;
            }

                .page-profile .profile-content .profile-menus-wrapper .profile-menus .list-inline > li {
                    padding-right: 0;
                    padding-left: 0;
                }

                    .page-profile .profile-content .profile-menus-wrapper .profile-menus .list-inline > li > a {
                        color: #fff;
                        padding: 8px;
                        -moz-transition: ease-in-out 0.3s;
                        -o-transition: ease-in-out 0.3s;
                        -webkit-transition: ease-in-out 0.3s;
                        transition: ease-in-out 0.3s;
                    }

                        .page-profile .profile-content .profile-menus-wrapper .profile-menus .list-inline > li > a:hover {
                            background: rgba(0, 0, 0, 0.5);
                        }

            .page-profile .profile-content .profile-menus-wrapper .profile-menus .btn-upload-cover {
                margin-top: 11px;
                margin-right: 20px;
            }

.page-profile .profile-content-wrapper {
    background: #fff;
    margin-left: -20px;
}

.page-profile .overlay {
    position: inherit;
}

.page-profile .profie-about-content {
    padding: 20px;
    background: #fff;
}

    .page-profile .profie-about-content > div {
        border-bottom: 1px solid #ecf0f5;
    }

        .page-profile .profie-about-content > div:not(:first-child) {
            padding-top: 10px;
        }

        .page-profile .profie-about-content > div .title {
            font-size: 11px;
            font-weight: bold;
        }

        .page-profile .profie-about-content > div .content {
            margin-top: -5px;
        }

.page-profile .profile-about {
    background: #fff;
    padding: 10px;
    padding-bottom: 0;
}

    .page-profile .profile-about > h5 {
        font-weight: bold;
    }

    .page-profile .profile-about .icon {
        font-size: 15px;
        margin-right: 10px;
    }

    .page-profile .profile-about .basic-info {
        font-size: 11px;
    }

    .page-profile .profile-about address.basic-info {
        margin-top: -32px;
        display: block;
        margin-left: 25px;
    }

.page-profile .profile-account-menus {
    background: #fff;
    padding: 10px;
    padding-bottom: 0;
    margin-top: -20px;
}

    .page-profile .profile-account-menus .icon {
        font-size: 15px;
        margin-right: 10px;
    }

    .page-profile .profile-account-menus > h5 {
        font-weight: bold;
        margin-top: 15px;
    }

    .page-profile .profile-account-menus ul > li {
        padding-top: 5px;
        padding-bottom: 5px;
    }

        .page-profile .profile-account-menus ul > li > a {
            font-size: 12px;
            color: inherit;
        }

.page-profile .profile-containter {
    float: left;
    width: 100%;
    border-left: 1px solid #ecf0f5;
    padding: 0 20px 20px 20px !important;
}

@media screen and (min-width: 1080px) {
    .page-profile .profile-containter {
        padding: 20px;
    }
}

@media screen and (max-width: 1199px) {
    .page-profile .profile-menus-wrapper .profile-menus {
        margin-top: 0;
        margin-left: 0;
    }
}

@media screen and (max-width: 1079px) {
    .page-profile .profile-image-wrapper {
        opacity: 0;
        display: none;
        position: absolute;
        left: -250px;
        z-index: 11;
        margin-left: 10px;
    }

    .page-profile .btn-display-profile {
        display: block !important;
    }

    .page-profile .profile-content {
        margin-left: 0;
    }

    .page-profile .profile-menus-wrapper .profile-menus {
        margin-top: 0 !important;
        margin-left: 0;
    }

    .page-profile .profile-containter {
        margin-top: 20px;
    }

    .page-profile .profile-about {
        display: none;
    }

    .page-profile .profile-account-menus {
        display: none;
    }
}

@media screen and (max-width: 991px) {
    .counterlist ul li {
        padding: 0 10px;
    }

    .text {
        color: white;
        font-size: 20px;
        /* position: absolute; */
        /* top: 100px; */
        /* right: 0; */
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        text-align: center;
        width: 100%;
        /*margin: 80px 0 0 160px;*/
    }

    .page-profile .profile-options-wrapper {
        padding-right: 20px;
    }

        .page-profile .profile-options-wrapper .search {
            width: 100%;
            max-width: 100%;
        }

            .page-profile .profile-options-wrapper .search:focus {
                width: 100%;
            }

        .page-profile .profile-options-wrapper .profile-menus .list-inline {
            width: 100%;
            text-align: center;
            margin-top: 20px;
        }
}

@media screen and (max-width: 819px) {
    .page-profile .profile-menus-wrapper {
        margin-top: 0 !important;
        background: #fff !important;
        height: auto !important;
    }

    .page-profile .profile-menus {
        position: relative;
        top: -16px;
    }

        .page-profile .profile-menus .list-inline {
            width: 100%;
            background: #fff;
            margin-left: 0 !important;
            margin-bottom: 4px;
        }

            .page-profile .profile-menus .list-inline > li {
                display: block;
                width: 100%;
            }

                .page-profile .profile-menus .list-inline > li > a {
                    display: block;
                    width: 100%;
                    color: inherit !important;
                    -moz-transition: ease-in-out 0.1s !important;
                    -o-transition: ease-in-out 0.1s !important;
                    -webkit-transition: ease-in-out 0.1s !important;
                    transition: ease-in-out 0.1s !important;
                }

                    .page-profile .profile-menus .list-inline > li > a padding {
                        top: 10px;
                        bottom: 10px;
                    }

                    .page-profile .profile-menus .list-inline > li > a:hover {
                        color: #fff !important;
                    }

    .page-profile .btn-upload-cover {
        position: absolute !important;
        top: -33px;
        margin-right: 10px !important;
    }

    .page-profile .profile-containter {
        margin-top: 0;
    }
}

@media screen and (max-width: 549px) {
    .btnSearchSearch {
        display: none;
    }

    .bansearch {
        max-width: 36px !important;
    }

    .page-profile .profile-options-wrapper .profile-menus {
        margin-left: 38px;
    }

        .page-profile .profile-options-wrapper .profile-menus .list-inline {
            margin-left: 80px;
            width: 100%;
        }

            .page-profile .profile-options-wrapper .profile-menus .list-inline > li {
                width: 100%;
            }

                .page-profile .profile-options-wrapper .profile-menus .list-inline > li > a {
                    display: block;
                }
}


/****pricing start section***/
/******************************************************************************* 21.Price ********************************************************************************************/
.pricing-table {
    text-align: center;
    display: inline-block;
    width: 100%;
    font-family: Roboto-Regular;
    padding: 0 0 40px 0;
}

.price-box {
    padding: 40px 25px 40px 25px;
    transition: ease-in-out all 0.5s;
    -o-transition: ease-in-out all 0.5s;
    border: 1px solid #d6d6d6;
    box-shadow: 0 3px 7px #d6d6d6;
}

    /*.price-box.active {
        color: #fff;
        box-shadow: 0 4px 4px rgba(0, 0, 0, 0.1);
    }*/

    .price-box:hover {
        background-color: #009aeb;
        background-image: linear-gradient(to right, #ff2670 0%, #ff6c36 100%);
        color: #fff;
        box-shadow: 0 4px 4px rgba(0, 0, 0, 0.1);
    }#009aeb

        .price-box:hover .medium {
            background: #333;
            color: #fff;
        }

.price-head .fa {
    display: inherit;
    font-size: 40px;
    margin: 0 0 20px 0;
}

.price-head {
    font-size: 24px;
    text-transform: uppercase;
    font-weight: bold;
    height: 100%;
    min-height: 150px;
}

    .price-head ~ .list-unstyled {
        height: 100%;
        min-height: 220px;
        padding: 20px 0 0 0;
    }

    .price-head i {
        color: #f26a21;
    }

    .price-head h5 {
        font-size: 18px;
    }

    .price-head h6 {
        font-size: 14px;
        margin: 10px 0 0 0;
    }

    .price-head .price {
        font-size: 20px;
    }


.pricing-table .devider {
    background: #d9d9d9 none repeat scroll 0 0;
    height: 1px;
    margin: 20px auto;
    width: 30px;
}


.price-box.active li {
    color: #fff;
}

.price-box ul {
    margin-bottom: 15px;
}

.price-box.active .devider {
    background: #fff;
}

.pricing-table ul {
    width: 100%;
}

.pricing-table .price-box li {
    padding: 10px 0;
    font-size: 14px;
    text-align: center;
    border-bottom: 1px solid #ececec;
}

    .pricing-table .price-box li:last-child {
        border-bottom: 0;
    }

.pricing-table.style-1 .price-box.active button {
    color: #fff;
    border: 2px solid #fff;
}

.pricing-table.style-1 .price-box.active ul {
    color: #fff;
}

@media ( max-width: 767px ) {
    .pophowto p {
        margin: 0 0 60px 0;
    }

    .marg-cen {
        text-align: center;
        margin: 20px 0 0 0;
    }

    .teacherslide {
        margin: 0 auto;
        text-align: center;
    }

    .leftbox {
        text-align: center;
        border-right: 0;
        min-height: 150px;
    }

    .purquanti .quanhead h5 {
        padding: 0 0 10px 0;
        font-weight: bold;
    }

    .mycrmar {
        margin: 0 0 0 15px;
    }

    .CartDelete span {
        padding: 0 8px 0px 15px !important;
    }

    /*.gridlistreview h5{
        text-align:center;
    }*/

    .rightbox .purchaselist ul {
        padding-left: 25px;
    }

    .purquanti .quaninpu input {
        margin: 0 auto;
    }

    .rightboxone {
        padding: 0 0 20px 0;
    }

    .addcartbtn {
        text-align: center;
    }

    .rightbox {
        border-top: 1px solid #d6d6d6;
        padding: 15px 15px 0 15px;
    }

    .purquanti {
        text-align: center;
    }

    .pricing-table.style-2 .plan-price, .price-head .price, .pricing-table.style-3 .plan-price, .pricing-table.style-4 .plan-price, .pricing-table.style-8 .plan-price, .pricing-table.style-7 .pricing-head span {
        font-size: 60px !important;
    }

    .price-head .fa {
        font-size: 40px !important;
    }
}

@media ( min-width: 768px ) and ( max-width: 1023px) {
    .price-box {
        padding: 20px 10px 10px;
    }

    .price-head, .price-head .price {
        font-size: 18px;
    }
}
/************ 21.1 Price Style 1 **************/
.pricing-table.style-2 .price-box {
    border: 2px solid #d9d9d9;
}

    .pricing-table.style-2 .price-box:hover {
        border-color: #e60647;
    }

    .pricing-table.style-2 .price-box:hover {
        background: transparent;
    }

.pricing-table .plan-type {
    font-family: Raleway;
    font-size: 18px;
    font-weight: 600;
    transition: ease-in-out all 0.5s;
    -webkit-transition: ease-in-out all 0.5s;
    -ms-transition: ease-in-out all 0.5s;
    -o-transition: ease-in-out all 0.5s;
    color: #131114;
}

.pricing-table.style-2 .price-box li {
    padding: 5px 0;
}

.pricing-table.style-2 .plan-price {
    font-family: vidaloka;
    font-size: 60px;
    color: #131114;
    font-weight: 400;
}

.pricing-table .plan-price span {
    font-size: 24px;
    font-family: vidaloka;
}

.pricing-table.style-2 .month {
    color: #999;
    text-transform: uppercase;
}

.pricing-table.style-2 .price-box > p {
    font-size: 13px;
    line-height: normal;
    padding: 25px 0;
}

.pricing-table.style-2 ul {
    border-top: 1px solid #e2e2e2;
    padding-top: 20px;
    margin-bottom: 33px;
}

.pricing-table.style-2 .price-box:hover button {
    background-image: -moz-linear-gradient( -40deg, rgb(230,6,71) 0%, rgb(241,26,58) 51%, rgb(255,54,46) 100%);
    background-image: -webkit-linear-gradient( -40deg, rgb(230,6,71) 0%, rgb(241,26,58) 51%, rgb(255,54,46) 100%);
    background-image: -ms-linear-gradient( -40deg, rgb(230,6,71) 0%, rgb(241,26,58) 51%, rgb(255,54,46) 100%);
    color: #fff;
}

.pricing-table.style-2 .price-box:hover .plan-price {
    color: #e60647;
    transition: ease-in-out all 0.5s;
    -webkit-transition: ease-in-out all 0.5s;
    -ms-transition: ease-in-out all 0.5s;
    -o-transition: ease-in-out all 0.5s;
}

.pricing-table.style-2 .price-box:hover ul {
    border-color: #e60647;
    transition: ease-in-out all 0.5s;
    -webkit-transition: ease-in-out all 0.5s;
    -ms-transition: ease-in-out all 0.5s;
    -o-transition: ease-in-out all 0.5s;
}

.pricing-table.style-2 button {
    background: #131114;
    color: #fff;
}

.pricing-table.style-2 .price-box:hover .plan-type {
    color: #131114;
}

.proali {
    text-align: right;
}

@media ( max-width: 767px ) {
    .pricing-table.style-2 .price-box {
        margin-bottom: 30px;
    }

    .proali {
        text-align: justify;
    }
}

@media ( min-width: 768px ) and ( max-width: 1023px) {
    .pricing-table.style-2 .price-box {
        margin-bottom: 30px;
    }
}

/****
    Responsive css
    ****/
@media (max-width:1366px ) {
    .item figure.img-box img {
        /*height: 431px;
        width: 100%;*/
    }
}

.searchfirst {
    display: none;
}

.cartone {
    display: none !important;
}

@media (max-width:991px) {
    .dropdown-content {
        top: 53px;
    }

    .listing-grid .listing {
        width: 45%;
    }

    .cartone {
        display: block !important;
    }

    .searchfirst {
        display: block;
        position: absolute;
        top: -8px;
        width: 18px;
    }

    .menu nav ul li a {
        padding: 0 0;
    }

    .newdec {
        padding: 70px 0 0 0;
    }

    .newstext p {
        font-size: 25px;
    }

    .contact-bg .card-body {
        padding: 0 0 25px 0;
    }

    .contact-bg .md-form {
        padding: 0 0;
    }

    .contact-bg .card .md-form label {
        padding: 0 0;
    }

    .cartbg {
        height: 30px;
        width: 30px;
        margin: 25px 0 0 -20px;
    }

    .getinbg {
        margin: 15px 0 0 -20px !important;
    }

    .carimg img {
        width: 120px;
    }

    .cartbg span {
        font-size: 15px;
    }

    .carthead p, .carthead span {
        font-size: 12px;
    }


    .whybg {
        
    }

    .whyhed {
        margin: 30px 0 30px 0;
    }

    .menu nav {
        display: none;
        padding: 0 0 0 0;
        position: absolute;
        top: 61px;
        background-color: #026352;
        width: 100%;
        z-index: 999999;
        box-shadow: 0 12px 15px #353535;
    }

        .menu nav ul li:hover ul.sub-menu {
            display: block;
            position: relative;
            top: 10px;
        }

    .faqtab .nav-pills .nav-link.active, .faqtab .nav-pills .show > .nav-link {
        font-size: 15px;
    }

    .faqtab .nav-pills .nav-link {
        font-size: 14px;
        background-color: #227fc2;
        padding: 5px 10px;
        color: #fff;
    }

    #whatsay {
        padding: 50px 0 40px 0;
    }

    .blockquoteicon span {
        top: -25px;
    }

    .sendhed {
        margin: 50px 0 50px 0;
        text-align: center;
    }

    #sendmessage {
        padding: 0 0 50px 0;
    }

    .menu nav ul li {
        display: block;
        text-align: left;
        padding: 10px 15px;
        border-bottom: 1px solid #f5f5f5;
    }

        .menu nav ul li:last-child {
            border-bottom: none;
        }

    .menuicon {
        display: block;
        text-align: right;
        margin: 0 0 0 0;
    }

        .menuicon span {
            font-size: 30px;
            color: #035b96;
        }

    .menu {
        position: relative;
        bottom: 0;
    }

    .cart a span label {
        right: 0;
        left: 15px;
    }

    .sear {
        display: none !important;
    }

    .cart {
        position: absolute !important;
        top: -45px !important;
        right: 20px;
    }

    .news-h h2, .news-h h2 b {
        font-size: 25px;
    }

    .eventimg01 {
        width: 70px;
        height: 65px;
        text-align: center;
        margin: 0 0 20px 0;
        background-position: 50% 50%;
        background-size: cover;
    }

        .eventimg01 h1 {
            margin: 0;
            font-family: roboto-bold;
            padding: 5px 0 0 0;
            font-size: 30px;
        }

    .stude-enroll {
        margin: 0;
    }

    .phonebg {
        width: 100%;
        height: 100%;
        background-position: 50% 20%;
        background-size: contain;
        background-image: none;
    }

    .registerform .form-group {
        margin: 0 0 5px 0;
    }

        .registerform .form-group input, .registerform .form-group select {
            padding: 10px 10px;
        }

    .registerform textarea.form-control {
        min-height: 120px !important;
    }

    #abtbg {
        padding: 0 0 20px 0;
    }

    .getquote {
        color: black;
        padding: 45px 0 0 0;
    }

        .getquote h4 {
            padding: 0 0 15px 0;
            font-size: 30px;
        }

        .getquote h2 {
            font-size: 20px;
        }

        .getquote p {
            padding: 0 20px;
        }

    .registerform {
        padding: 0 !important;
        width: 100%;
        max-width: none;
    }

    .subbtn button {
        padding: 15px 0;
        max-width: 250px;
        margin: 30px auto 0 auto;
        display: block;
    }

    /*#abtbg {
        padding: 0;
    }*/

    .abtbtn span.btn-primary {
        margin: 0 15px 0 0;
        display: inline;
        padding: 10px 8px;
    }

    .abtbtn {
        padding: 15px 0 0 0;
        margin: 0 0 115px 0;
    }
}

@media (max-width:767px) {
    .abc > li {
        width: 100%;
    }

    .counterlist ul li div.counter h1 {
        font-size: 23px;
    }

    .counterlist ul li {
        padding: 0 0;
    }

    .counterlist ul {
        text-align: center;
    }

        .counterlist ul li p {
            font-size: 14px;
        }

    .dropdown-content {
        top: 32px;
    }

    .paypalbox p {
        text-align: center;
    }

    .PaymentImg img {
        margin: 0 auto;
        display: block;
    }

    .PaymentImg ~ .btn-primary {
        text-align: center;
    }

    .baninput {
        padding: 0 0;
        position: absolute;
        width: 100%;
        top: 12px;
        right: -52px;
    }

        .baninput input {
            width: 100%;
            height: 100%;
            min-height: 35px;
            border: 0;
            font-family: roboto-regular;
            font-size: 14px;
            color: #585858;
            padding: 0 10px;
        }


    .bansearch {
        background-color: #1fc8db;
        background-image: linear-gradient(84deg, #02a8fa 10%, #1fc8db 60%, #17cfd1 75%);
        padding: 6px 0;
        width: 100%;
        max-width: 97px;
        position: absolute;
        right: -15px;
        top: 10px;
    }

        .bansearch button {
            font-size: 15px;
            font-family: roboto-regular;
            color: #fff;
        }

    .coursedelect img {
        margin: 0 auto;
        display: block;
    }

    .listlist img.img-cart {
        text-align: center;
        margin: 0 auto;
    }

    .abtbtn span.btn-primary {
        padding: 12px 25px !important;
    }

    .coulis {
        padding: 10px 0 17px 15px;
    }

    .ind-cen {
        text-align: justify;
        padding: 10px 0 0 0;
    }

    .cougraphic span {
        margin: 0 15px;
    }

    .abtdeimg {
        text-align: center;
    }

    .abtbtn {
        margin: 0;
    }

    .col-md-7 [text-align] {
        text-align: inherit;
    }

    .abtlim {
        text-align: center;
    }

    .footernav {
        margin: 0 !important;
    }

    .abth3 h3, .abtcomp h1 {
        text-align: center;
    }

    .img-box .carousel-caption {
        top: 30%;
    }

    .myordbtn {
        position: static;
        margin: 0 0 0 -5px;
    }

    ul.sub-menu {
        column-count: auto;
        position: static;
    }

    .menu {
        top: 0;
    }

        .menu nav {
            top: 52px;
        }

    .box-bg {
        margin: 0 auto;
    }

    .cartbg {
        height: 40px;
        width: 40px;
        margin: 5px 0 5px 15px;
    }

    .carimg img {
        width: 165px;
    }

    .cartbg span {
        font-size: 20px;
    }

    .carthead p, .carthead span {
        font-size: 18px;
    }


    #whyus {
        margin: 0 0 0 0;
    }

    /*#bestproduct {
        padding-top: 510px !important;
        margin: 1350px 0 0 0 !important;
    }*/

    .price-box {
        margin: 5px 0;
    }

    .footlicense {
        float: left;
    }

    .foobtn {
        text-align: inherit !important;
    }

    .getinbg {
        margin: 0 auto !important;
    }

    .getintext {
        text-align: center;
    }

    .foote-pd {
        padding: 0 !important;
    }

    .abtbtn {
        text-align: center;
        margin: 0 0 25px 0;
    }

    .getinhed {
        text-align: center;
    }

    .whybg {
        background-image: none;
    }

    .whyhed p {
        color: #000;
    }

    .whylist h4 {
        color: #000;
        text-align: inherit !important;
    }

    .whylist p {
        color: #bbbbbb;
        text-align: inherit !important;
    }

    .subbtn button {
        padding: 10px 0;
        max-width: inherit;
    }

    .phonebg {
        width: 100%;
        height: 100%;
        background-position: 50% 20%;
        background-size: contain;
        width: 396px !important;
        height: 850px !important;
        margin: 0 auto;
    }

    #abtbg {
        padding: 50px 0 0 0;
    }

    .getquote h2 {
        font-size: 25px;
    }

    .getquote p {
        padding: 0 15px;
    }

    .registerform {
        padding: 30px 0 0 0;
    }

    .eventimg01 {
        width: 99px;
        height: 89px;
        text-align: center;
        margin: 0 0 20px 0;
        background-position: 50% 50%;
        background-size: cover;
    }

        .eventimg01 h1 {
            margin: 0;
            font-family: roboto-bold;
            padding: 12px 0 0 0;
            font-size: 40px;
        }

    .news-h h2, .news-h h2 b {
        font-size: 35px;
    }

    .viewbtn {
        margin: 15px 0 15px 30px;
        text-align: center;
    }

    .viewbtn1 {
        margin: 15px 0 15px 0px;
        text-align: center;
    }

    .bor-l {
        border-left: 0;
    }

    .stude-enroll {
        text-align: justify;
        margin: 0 0 5px 0;
    }

    .banner-half {
        bottom: -100px;
        padding: 10px 20px;
    }

    .popularcourse p {
        margin: 30px 0;
    }
}

@media(max-width:575px) {
    .foot-h h2 {
        padding-left: 15px;
    }

    .webinar planet .nav-tabs {
        border-bottom: 0;
        margin: 40px 0 0 50px;
    }

    .img-box .carousel-caption {
        top: 20%;
    }

    .baninput {
        right: 0;
    }

    .dropdown-content {
        top: 39px;
    }

    .footernav ul {
        padding-left: 15px;
    }

    .foobtn span.btn-primary {
        right: 14px;
    }
}

@media (max-width:480px) {
    .webinar planet .nav-tabs {
        margin: 0;
    }

    .listing-grid .listing {
        width: 100%;
    }

    .menu {
        top: -10px;
    }

    .dropdown-content {
        top: 53px;
    }

    .recipe-set .listing-buttons {
        position: absolute;
        top: -40px;
        right: 0;
    }




    .phonebg {
        height: auto !important;
        min-height: 708px;
    }

    .abtbtn {
        margin: 0;
        padding: 10px 0px 30px 0 !important;
    }

    .abtus {
        margin: 30px 0 0 0;
    }

    .faqfre {
        margin: -55px 0 0 0;
    }


    .item-control {
        right: 15px;
        top: -100px;
    }

    #getin {
        margin: 0;
    }

    #sendmessage {
        margin: 40px 0 0 0;
    }

    .getinimg {
        padding: 30px 0;
    }

    .img-box .carousel-caption {
        top: 30%;
    }

    .footsub {
        padding: 0 20px;
    }

    .newsl {
        text-align: center;
    }

    .bansearch {
        /*padding:0;*/
    }

    .baninput {
        padding: 0;
    }

    .newdec {
        /*padding: 20px 0 0 0;*/
    }

    .browsebox {
        margin: 0 auto;
    }

    .faqtab .nav-pills .nav-link.active, .faqtab .nav-pills .show > .nav-link {
        font-size: 13px;
    }

    .faqtab .nav-pills .nav-link {
        font-size: 13px;
    }

    #bestproduct {
        padding-top: 0 !important;
    }

    .webinar planet .nav-tabs {
        display: block;
    }

    .banner-half {
        
    }


    #latestnews {
        padding: 30px 0 75px 0;
    }

    .phonebg {
        width: 290px !important;
    }

    .getquote {
        padding: 20px 0 0 0 !important;
    }

    .registerform {
        padding: 0 25px 0 25px;
    }

    .getquote h2 {
        font-size: 18px;
    }

    .getquote p {
        padding: 0 15px;
        font-size: 12px;
        margin: 0 0 5px 0;
    }

    .form-group textarea.form-control {
        height: 100%;
        min-height: 60px !important;
    }

    #abtbg {
        padding: 0 0 0 0;
    }
}
/*----------------------------------------*/
/*  19. About pages Area
/*----------------------------------------*/
.about-feature {
    background: #f5f5f5;
}

.feature-icon {
    float: left;
    margin-right: 10px;
}

    .feature-icon i {
        font-size: 50px;
        display: block;
        position: relative;
        color: #63c672;
        transition: 0.4s;
        margin-bottom: 30px;
    }

.feature-text {
    padding-left: 65px;
}

    .feature-text h4 {
        text-transform: uppercase;
        margin-bottom: 10px;
        font-size: 22px;
    }

    .feature-text p {
        font-size: 16px;
    }


.reviews {
    font-family: sans-serif;
}

.rating-star {
    color: #f7f71d;
}

.star-rating {
    font-size: 0;
    white-space: nowrap;
    display: inline-block;
    /* width: 250px; remove this */
    height: 25px;
    overflow: hidden;
    position: relative;
    background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjREREREREIiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=');
    background-size: contain;
}

    .star-rating i {
        opacity: 0;
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        /* width: 20%; remove this */
        z-index: 1;
        background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjRkZERjg4IiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=');
        background-size: contain;
    }

    .star-rating input {
        -moz-appearance: none;
        -webkit-appearance: none;
        opacity: 0;
        display: inline-block;
        /* width: 20%; remove this */
        height: 100%;
        margin: 0;
        padding: 0;
        z-index: 2;
        position: relative;
    }

        .star-rating input:hover + i,
        .star-rating input:checked + i {
            opacity: 1;
        }

    .star-rating i ~ i {
        width: 40%;
    }

        .star-rating i ~ i ~ i {
            width: 60%;
        }

            .star-rating i ~ i ~ i ~ i {
                width: 80%;
            }

                .star-rating i ~ i ~ i ~ i ~ i {
                    width: 100%;
                }

::after,
::before {
    height: 100%;
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    text-align: center;
    vertical-align: middle;
}

.star-rating.star-5 {
    width: 125px;
}

    .star-rating.star-5 input,
    .star-rating.star-5 i {
        width: 20%;
    }

        .star-rating.star-5 i ~ i {
            width: 40%;
        }

            .star-rating.star-5 i ~ i ~ i {
                width: 60%;
            }

                .star-rating.star-5 i ~ i ~ i ~ i {
                    width: 80%;
                }

                    .star-rating.star-5 i ~ i ~ i ~ i ~ i {
                        width: 100%;
                    }

.star-rating.star-3 {
    width: 150px;
}

    .star-rating.star-3 input,
    .star-rating.star-3 i {
        width: 33.33%;
    }

        .star-rating.star-3 i ~ i {
            width: 66.66%;
        }

            .star-rating.star-3 i ~ i ~ i {
                width: 100%;
            }
            
@media all and (max-width:991px) {
li.cart {
    disply:none!important;
}
ul.hero-topics {
    padding: 2em 0%;
}
.mask h1 {
    font-size: 44px;
}
ul.hero-topics a.front {
    z-index: 2;
    padding-top: 8%;
}
.stude-enroll ul li span {
    font-size: 16px;
}
#section_0{    padding-top: 50px;}
}
@media all and (max-width:767px) {
.header_tbg .head-top-left ul li a {
    font-size: 0px;
}
.header_tbg .head-top-left ul li a span {
    font-size: 14px;
}
.header_tbg {
    padding: 10px 0;

}
.bannerbackg {
    margin-top: 50px;
}
.mask h1 {
    font-size: 22px;
}
.cuslogo {
    position: absolute;
        top: -25px;
            z-index: 99999;
}
.mask {
    padding-top: 165px;
}
.baninputone {
    top: 30px;
}
ul.hero-topics {
    top: 25px;
}
ul.hero-topics a.front .fa, ul.hero-topics a.front .fas, ul.hero-topics a.front .fal, ul.hero-topics a.front .svg-inline--fa, ul.hero-topics a.front .svg-inline--fas, ul.hero-topics a.front .svg-inline--fal {
   
    font-size: 3em;
}
ul.hero-topics li {
    position: relative;
    width: 33.33%;
}
ul.hero-topics li:nth-child(6) {
    margin-left: 0;
}
.bannerbackg {
    min-height: 610px;
}
.stude-enroll {
    margin: 0 0 20px 0;
}
.item-control {
    top: -55px;
}
.owl-carousel.owl-drag .owl-item{    text-align: center;}
#bestselling{margin:0px!important;}
.whybg .item-control {
    top: -40px;
}
.popularcourse h1 {
    text-align: left;
}
#bestproduct h2{margin-bottom: 65px;}
.foobtn span.btn-primary {
    right: 0px;
}
.foobtn span.btn-primary{position: relative;
    right: 0;
    top: 0px;
    width: 100%;}
    ul.sub-menu{-webkit-column-count: !important;}
    .featuredprograms{box-shadow:none!important;}
    .breadcrumbone {
    top: auto;
    bottom: 20px;
}
.loginbox .modal.show .modal-dialog {
    max-width: 320px;
}
}
    </style>
  
    
    
   

   

   
    
     

    

    
    
    
    
   
 
    </main>
@endsection

@section('pagejs')
    <script src="{{ url('js/select.load.js') }}" type="text/javascript"></script>
    <script>

        $('#country').on('change', function () {
            let country = this.value;
            load_seldata('state', 'state', country)
        })

        $('#state').on('change', function () {
            let state = this.value;
            load_seldata('city', 'city', state)
        })

        $(".puchase_for_self").click(function () {
            var radioValue = $("input[name='puchase_for_self']:checked").val();
            if (radioValue === 'no') {
                $('#attendee').css('display', 'block');
                $('#attendee_name').attr('required', 'required');
                $('#attendee_email').attr('required', 'required');
                $('#attendee_title').attr('required', 'required');
                $('#attendee_no').attr('required', 'required');
            } else {
                $('#attendee').css('display', 'none');
                $('#attendee_name').removeAttr('required', 'required');
                $('#attendee_email').removeAttr('required', 'required');
                $('#attendee_title').removeAttr('required', 'required');
                $('#attendee_no').removeAttr('required', 'required');
            }
        });
    </script>
@endsection
