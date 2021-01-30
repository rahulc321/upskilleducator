@extends('website.layouts.app')

@section('title')
    {{ $speaker->title }} - Up Skill Educator
@endsection

@section('content')
<style type="text/css">
    .speaker-image img {
    border-radius: 50%;
    object-fit: cover;
    object-position: center;
    max-width: 100px !important;
    max-height: 100px !important;
}
.product-listing {
    padding: 0px 0;
    width: 100%;
    float: left;
}
</style>
    <main id="main-content">
        <div class="innerbanner" style="background-image: url({{ url('assets/images/product-banner.jpg') }});">
            <div class="container">
                <h1>{!! strip_tags($product->category->name) !!}</h1>
                <div class="breadcrumbs">
                    <a href="{{ url('/') }}">Home</a>
                    <i class="fas fa-caret-right"></i>
                    <a href="{{ url('/speakers') }}">Speakers</a>
                    <i class="fas fa-caret-right"></i>
                    <span>{{ $speaker->title }}</span>
                </div>
            </div>
        </div>
        <div class="product-detail">
            <div class="container">
                <div class="top-view">
                    <div class="speaker-image" style="float: left;">
                        <img src="{{ $speaker->image }}" alt="image" >
                    </div>
                    <div class="text">
                                <h5>{{ $speaker->title }}</h5>
                                 
                    </div>
                    <p><i>{!! $speaker->description !!}</i></p>
                    
                    
                </div>
                 
            </div>
            <div class="product-listing">
                <center><h4>Training by {{ $speaker->title }}</h4></center>
            <div class="container">
                <div class="row">
                    @foreach($products as $product)
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
                                   


                                    <a href="{{url('programs/'.$product->url_name) }}"
                                       class="site-btn">Book Now</a>

                                   <?php
                                    $date1= \Carbon\Carbon::parse($product->webinar_date_time)->format('Y-m-d');
                                    

                                    $todayDate=date('Y-m-d');
                                     
                                    $dateTimestamp1 = strtotime($date1); 
                                    $dateTimestamp2 = strtotime($todayDate); 

                                   
                                   /* if ($dateTimestamp1 > $dateTimestamp2) {
                                    ?>
                                    <a href="javascript:;"
                                        class="hh"><i>Upcoming</i></a>

                                    <?php }else{
                                        echo '<a href="javascript:;"
                                        class="hh kk"><i>Pre-recorded</i></a>';
                                    } */?>
                                    <a href="{{url('product/'.$product->category->url_name.'/'.$product->url_name) }}"
                                       class="site-btn view">View
                                        Details</a>
                                     
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        </div>
        
    </main>
    <style type="text/css">
        a.hh {
    margin-left: 49px;
    background-color: green;
    padding: 10px;
    color: white;
    border-radius: 25px;
}
a.hh.kk {
    margin-left: 49px;
    background-color: #cc5116;
    padding: 10px;
    color: white;
    border-radius: 25px;
}
    </style>
@endsection
