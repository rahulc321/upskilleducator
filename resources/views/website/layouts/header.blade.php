 
 @if(Request::url() == "https://www.upskilleducator.com/speakers" || Request::url() == "https://upskilleducator.com/speakers")
 
 
    <!-- <link href="{{Request::root()}}/css/speakers/mdb.min.css" rel="stylesheet">-->
    <!--<link href="{{Request::root()}}/css/speakers/localweb.css" rel="stylesheet">-->
@endif
 
 
<header id="headerCntr">
    @include('website.layouts.flash')
    <div class="container">
       
        <div class="logoArea">
            <a href="{{ url('/') }}"><img src="{{ url('assets/images/site-logo.png') }}" alt="log"/></a>
        </div>
        

        <div class="header-right topnav"   id="myTopnav">

            <a href="{{url('/')}}" class="site-btn g">Home</a>
            <a href="{{url('/about-us')}}" class="site-btn g">About Us</a>
            <a href="{{url('/training')}}" class="site-btn h">Training</a>
            <a href="{{url('/package')}}" class="site-btn h">Package</a>
            <a href="{{url('/speakers')}}" class="site-btn h">Speakers</a>

            <!-- <div class="searchbar">
                <form class="example" action="{{ url('search') }}" method="get">
                    <input type="text" placeholder="Search.." name="keyword"
                           value="@if(app('request')->input('keyword')){{ app('request')->input('keyword') }}@endif">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div> -->
            

            <?php


            $user = Auth::user();
            if($user){
                $uId= $user->id; 
            }else{
               $uId= Session::get('uId'); 
            }
             
            $cartCount=  \App\Models\Cartnew::where('user_id',$uId)->get();

            if(count($cartCount) > 0){
                $cartt=$cartCount;
            }else{
                $cartt=$cart;
            }
             
           ?>

            <a href="{{ url('cart?'.csrf_token()) }}" class="dropdown-toggle" style="text-decoration: none">
                <i class="fas fa-shopping-cart"></i>
                <span class="badge"
                      style="background: linear-gradient(to right, #ff2670 0%, #ff6c36 100%)">Cart : {{ count($cartt) }}</span>
            </a>
            <a href="javascript:void(0);" class="site-btn se h showsearch"><i class="fa fa-search"></i></a>

             @auth
                <a href="{{ url('my-account') }}" class="site-btn login">
                    <i class="fas fa-home"></i> My Account
                </a>
            @else
                <a href="{{ url('/login') }}" class="site-btn login"><i class="fas fa-lock"></i> Login</a>
            @endauth
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
            </a>
            <!-- <div class="dropmenu">
                <button class="dropdown-toggle" type="button" data-toggle="dropdown">
                    <img src="{{ url('assets/images/grid-icon.png') }}" alt="image">
                    Webinars
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    @foreach($menus as $menu)
                        <li>
                            <a href="{{ url('category/'.$menu->url_name) }}">{!! strip_tags($menu->name) !!}</a>
                        </li>
                    @endforeach
                </ul>
            </div> -->

        </div>
<!-- <p class="toll" style="color:white"><i class="fa fa-phone">&nbsp;&nbsp;1800-180-8080</i></p> -->
    </div>

    <div class="header-right s1" style="display: none">

          

             <div class="searchbar">
                <form class="example" action="{{ url('search') }}" method="get">
                    <input type="text" placeholder="Search.." name="keyword"
                           value="@if(app('request')->input('keyword')){{ app('request')->input('keyword') }}@endif">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
    </div>
    
    <style type="text/css">
    
    
    
    
   /* */
    
    
    
        a.site-btn.kk {
    padding: 4px;
    font-size: 12px;
}
.col-sm-6.ll {
    margin-left: 769px;
    padding-top: 6px;
}
.toll
{
    color: white;
    font-weight: bold;
    margin-left: 22px !important;
    padding-left: 10px !important;
    padding: 8px;
}
i.fa.fa-phone {
    font-size: 18px;
    padding: 3px;
}
.header-right .site-btn {
    margin: 1px 22px 0 0;
    float: left;
}
a.site-btn.login {
    margin: 1px -46px 0 0 !important;
}
button.site-btn.se {
    margin-left: 10px;
}
a.dropdown-toggle {
    color: #ff6d12;
    font-size: 16px;
    text-decoration: none;
    float: left;
    margin: 7px 10px 0 10px;
}
.header-right .searchbar {
    margin: 0 71px 0 0;
    float: left;
}

    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
 

/*.topnav {
  overflow: hidden;
  background-color: #333;
}*/

/*.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}*/

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 768px) {
  .topnav a {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }

}

@media screen and (max-width: 768px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
    text-align: center !important;

  }
  .topnav.responsive a {
    float: none;
    display: block;
    
        text-align: center;
  }
  .topnav.responsive {
    position: relative;
    /* background: #e44b3b; */
    background: linear-gradient(to right, #ff2670 0%, #ff6c36 100%);
}
a.site-btn.g {
    margin-left: 8px;
    margin-right: 127px;
}
button.site-btn.se {
    margin-left: 162px;
}
p.toll {
    display: none;
}

.fa-navicon:before, .fa-reorder:before, .fa-bars:before {
    content: "\f0c9";
    font-size: 42px;
    color: red;
}

}


</style>
</head>
<body>

<!-- <div class="topnav" id="myTopnav">
  <a href="#home" class="active">Home</a>
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div> -->



<script>

$(document).ready(function(){
    $('.showsearch').click(function(){
        $('.s1').toggle();
    });
});
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
</header>

