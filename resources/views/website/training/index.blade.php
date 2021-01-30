@extends('website.layouts.app')

@section('title')
    Training - Up Skill Educator
@endsection

@section('content')
<?php error_reporting(0); ?>
<style type="text/css">
 /*   .site-btn.ll. {
    padding: 3px 11px;
    display: inline-block;
    font-size: 14px;
    color: #fff !important;
    font-weight: 500;
    text-transform: uppercase;
    text-decoration: none !important;
    background: linear-gradient(to right, #ff2670 0%, #ff6c36 100%);
    border-radius: 26px;
    border: none;
}*/
.type {
    padding-top: 24px;
}
a.site-btn.ll {
    padding-top: -1px;
    /* padding: 7px; */
    margin-top: 10px;
}
.active{
    background:#94bb94  !important;
}
.cat1{
    background: #a0cea0;
    padding: 10px;
    border-radius: 13px;
    width: 153px;
}
.cat2{
    background: #58b758;
    padding: 10px;
    border-radius: 13px;
    width: 103px;
    font-weight: bold;
    color: white;
}
.pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
    z-index: 3;
    color: #fff;
    cursor: default;
    /* background-color: #337ab7; */
    border-color: #ff2670;
    background: linear-gradient(to right, #ff2670 0%, #ff6c36 100%);
}
center.error {
    color: red;
    padding: 29px;
   
    
}
 
.ll{
    background:#f5f5f5;
    color: #272702 !important;
     
}
.ll:hover {
    color: white !important;
}
.product-listing .list h3 a {
    font-size: 14px;
}
</style>
    <main id="main-content">
        <div class="innerbanner" style="background-image: url({{ url('assets/images/product-banner.jpg') }});">
            <div class="container">
                <h1>Training</h1>
                <div class="breadcrumbs">
                    <a href="{{ url('/') }}">Home</a>
                    <i class="fas fa-caret-right"></i>
                    <span>Training</span>
                </div>
            </div>
        </div>

                     
                
        <div class="product-listing">

            <div class="container">
                <div class="category">

                   <a href="javascript:;" class="cat2">Industry</a> 
                    @foreach($menus as $menu)

                    <?php if($menu->name=='Food Safety' || $menu->id==7){ ?>
                        @if($menu->name=='Food Safety')
                        <center>
                        @endif

                    <a href="javascript:;" data-url="{{$menu->id}}" class="site-btn color ll tt <?php if($_REQUEST['industry']==$menu->id){ echo 'active'; } ?>">{!! strip_tags($menu->name) !!}</a>

                    @if($menu->id==7)
                    <a href="javascript:;" data-url="" class="site-btn color ll tt <?php if($_REQUEST['industry']==''){ echo 'active'; } ?>">All</a>
                    </center>
                    @endif
                    <?php }else{ ?>
                        <a href="javascript:;" data-url="{{$menu->id}}" class="site-btn color ll tt <?php if($_REQUEST['industry']==$menu->id){ echo 'active'; } ?>">{!! strip_tags($menu->name) !!}</a>

                    <?php } ?>
                    @endforeach
                    
                </div>
                <div class="type">
                     
                    <a href="javascript:;" class="cat2">Program Type</a> 
                    <a href="javascript:;" class="site-btn ll pp <?php if($_REQUEST['type']==1){ echo 'active'; } ?>" data-web="1" >Live Webinar</a>
                    <a href="javascript:;" class="site-btn ll pp <?php if($_REQUEST['type']==2){ echo 'active'; } ?>" data-web="2">On-Demand</a>
                    <a href="javascript:;" class="site-btn ll pp <?php if($_REQUEST['type']==3){ echo 'active'; } ?>" data-web="3">Pre-Recorded</a>
                    <a href="javascript:;" class="site-btn ll pp <?php if($_REQUEST['type']==''){ echo 'active'; } ?>" data-web="">All</a>
                </div>

                <form action="" id="type" method="GET">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="industry" value="{{@$_REQUEST['industry']}}"  class="industry">
                    <input type="hidden" name="type"  class="type" value="{{@$_REQUEST['type']}}" >
                </form>

                <div class="row">
                    
                    @if(count($products) > 0)
                    @foreach($products as $product)
                     @if($product->type == 1)
                        <div class="col-xs-12 col-sm-6 col-md-4 list">
                            <div class="sub">
                                <div class="image"
                                     style="background-image: url({{ $product->picture }});"></div>
                                <div class="text">
                                    <div class="cat">
                                        @if($product->type == 1)
                                            Live Webinar
                                        @elseif($product->type == 2)
                                            On-Demand
                                        @elseif($product->type == 3)
                                            Pre-Recorded
                                        @endif
                                    </div>
                                    <h3>
                                        <a href="{{ url('product/'.$product->category->url_name.'/'.$product->url_name) }}">
                                            {{ $product->title }}
                                        </a>
                                    </h3>
                                    <div class="date">
                                        Date: {{ \Carbon\Carbon::parse($product->webinar_date_time)->format('d-m-y') }}
                                    </div>
                                    <div class="value">
                                        <span>Speaker-</span>{{ $product->speaker_name }}
                                    </div>
                                    <div class="value">
                                        <span>Duration-</span> {{ $product->duration }} minutes
                                    </div>
                                    <div class="value">
                                        @php $desc = strip_tags($product->ceus) @endphp
                                        <span>CEU-</span> {!! substr($desc, 0, 100) !!}
                                    </div>
                                    <div class="price">
                                        <span>Price-</span> ${{ $product->price }}
                                    </div>
                                   <!--  <a href="{{url('add-cart/'.$product->url_name.'?'.csrf_token()) }}"
                                       class="site-btn">Book Now</a> -->


                                    <a href="{{url('programs/'.$product->url_name) }}"
                                       class="site-btn">Book Now</a>


                                    <a href="{{url('product/'.$product->category->url_name.'/'.$product->url_name) }}"
                                       class="site-btn view">View
                                        Details</a>
                                </div>
                            </div>
                        </div>
                        
                        @endif
                    @endforeach
                    <!--On Demand-->
                     @foreach($products as $product)
                     @if($product->type == 2)
                        <div class="col-xs-12 col-sm-6 col-md-4 list">
                            <div class="sub">
                                <div class="image"
                                     style="background-image: url({{ $product->picture }});"></div>
                                <div class="text">
                                    <div class="cat">
                                        @if($product->type == 1)
                                            Live Webinar
                                        @elseif($product->type == 2)
                                            On-Demand
                                        @elseif($product->type == 3)
                                            Pre-Recorded
                                        @endif
                                    </div>
                                    <h3>
                                        <a href="{{ url('product/'.$product->category->url_name.'/'.$product->url_name) }}">
                                            {{ $product->title }}
                                        </a>
                                    </h3>
                                    <div class="date">
                                        Date: {{ \Carbon\Carbon::parse($product->webinar_date_time)->format('d-m-y') }}
                                    </div>
                                    <div class="value">
                                        <span>Speaker-</span>{{ $product->speaker_name }}
                                    </div>
                                    <div class="value">
                                        <span>Duration-</span> {{ $product->duration }} minutes
                                    </div>
                                    <div class="value">
                                        @php $desc = strip_tags($product->ceus) @endphp
                                        <span>CEU-</span> {!! substr($desc, 0, 100) !!}
                                    </div>
                                    <div class="price">
                                        <span>Price-</span> ${{ $product->price }}
                                    </div>
                                   <!--  <a href="{{url('add-cart/'.$product->url_name.'?'.csrf_token()) }}"
                                       class="site-btn">Book Now</a> -->


                                    <a href="{{url('programs/'.$product->url_name) }}"
                                       class="site-btn">Book Now</a>


                                    <a href="{{url('product/'.$product->category->url_name.'/'.$product->url_name) }}"
                                       class="site-btn view">View
                                        Details</a>
                                </div>
                            </div>
                        </div>
                        
                        @endif
                    @endforeach
                    
                    
                    <!--Pre recorder-->
                    @foreach($products as $product)
                     @if($product->type == 3)
                        <div class="col-xs-12 col-sm-6 col-md-4 list">
                            <div class="sub">
                                <div class="image"
                                     style="background-image: url({{ $product->picture }});"></div>
                                <div class="text">
                                    <div class="cat">
                                        @if($product->type == 1)
                                            Live Webinar
                                        @elseif($product->type == 2)
                                            On-Demand
                                        @elseif($product->type == 3)
                                            Pre-Recorded
                                        @endif
                                    </div>
                                    <h3>
                                        <a href="{{ url('product/'.$product->category->url_name.'/'.$product->url_name) }}">
                                            {{ $product->title }}
                                        </a>
                                    </h3>
                                    <div class="date">
                                        Date: {{ \Carbon\Carbon::parse($product->webinar_date_time)->format('d-m-y') }}
                                    </div>
                                    <div class="value">
                                        <span>Speaker-</span>{{ $product->speaker_name }}
                                    </div>
                                    <div class="value">
                                        <span>Duration-</span> {{ $product->duration }} minutes
                                    </div>
                                    <div class="value">
                                        @php $desc = strip_tags($product->ceus) @endphp
                                        <span>CEU-</span> {!! substr($desc, 0, 100) !!}
                                    </div>
                                    <div class="price">
                                        <span>Price-</span> ${{ $product->price }}
                                    </div>
                                   <!--  <a href="{{url('add-cart/'.$product->url_name.'?'.csrf_token()) }}"
                                       class="site-btn">Book Now</a> -->


                                    <a href="{{url('programs/'.$product->url_name) }}"
                                       class="site-btn">Book Now</a>


                                    <a href="{{url('product/'.$product->category->url_name.'/'.$product->url_name) }}"
                                       class="site-btn view">View
                                        Details</a>
                                </div>
                            </div>
                        </div>
                        
                        @endif
                    @endforeach
                    

                    <center>
                        @if(!empty($products))
                        {{$products->appends(request()->query())->links()}}
                        @endif
                    </center>
                    @else
                    <center class="error"><h4><i>No Record Found !!</i></h4></center>

                    @endif
                </div>
                
            </div>

        </div>
    </main>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.tt').click(function(){
                var url= $(this).attr('data-url');
                $('.industry').val(url);
                $('#type').submit();
            });
            $('.pp').click(function(){
                var url= $(this).attr('data-web');
                $('.type').val(url);
                $('#type').submit();
            });
        });
    </script>
@endsection
