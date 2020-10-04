@extends('website.layouts.app')

@section('title')
    {{ $product->title }} - Up Skill Educator
@endsection

@section('content')
    <main id="main-content">
        <div class="innerbanner" style="background-image: url({{ url('assets/images/product-banner.jpg') }});">
            <div class="container">
                <h1>{!! strip_tags($product->category->name) !!}</h1>
                <div class="breadcrumbs">
                    <a href="{{ url('/') }}">Home</a>
                    <i class="fas fa-caret-right"></i>
                    <a href="{{ url('category/'.$product->category->url_name) }}">{!! strip_tags($product->category->name) !!}</a>
                    <i class="fas fa-caret-right"></i>
                    <span>{{ $product->title }}</span>
                </div>
            </div>
        </div>
        <div class="product-detail">
            <div class="container">
                <div class="top-view">
                    <h2>
                        {{ $product->title }}
                    </h2>
                    <div class="cat">
                        @if($product->type == 1)
                            Live Webinar
                        @elseif($product->type == 2)
                            On-Demand
                        @elseif($product->type == 3)
                            Pre-Recorded
                        @endif
                    </div>
                    <ul>
                        <li>
                            <div class="image circle">
                                <img src="{{ $product->speaker_picture }}" alt="image">
                            </div>
                            <div class="text">
                                <h5>Speaker</h5>
                                <span>{{ $product->speaker_name }}</span>
                            </div>
                        </li>
                        <li>
                            <div class="image"><img src="{{ url('assets/images/calander-icon.png') }}" alt="image">
                            </div>
                            <div class="text">
                                <h5>Date</h5>
                                <span>{{ \Carbon\Carbon::parse($product->webinar_date_time)->format('M d, Y') }}</span>
                            </div>
                        </li>
                        <li>
                            <div class="image"><img src="{{ url('assets/images/time-icon.png') }}" alt="image"></div>
                            <div class="text">
                                <h5>Time</h5>
                                <span>{{ \Carbon\Carbon::parse($product->webinar_date_time)->format('H:i A') }} EST</span>
                            </div>
                        </li>
                        <li>
                            <div class="image"><img src="{{ url('assets/images/duration-icon.png') }}" alt="image">
                            </div>
                            <div class="text">
                                <h5>Duration</h5>
                                <span>{{ $product->duration }} Min</span>
                            </div>
                        </li>
                    </ul>
                    <div class="price">${{ number_format($product->price,2,'.','') }}</div>
                    <!--<a href="{{url('add-cart/'.$product->url_name.'?'.csrf_token()) }}" class="site-btn">Book Now</a>-->
                    
                     <a href="{{url('programs/'.$product->url_name) }}"
                                       class="site-btn">Book Now</a>
                </div>
                <div class="detail-sub">
                    <ul class="link-tab">
                        <li class="active"><a data-toggle="tab" href="#overview">Overview</a></li>
                        <li><a data-toggle="tab" href="#speaker">Speaker</a></li>
                        <li><a data-toggle="tab" href="#ceus">CEUs</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="overview" class="tab-pane fade in active">
                            {!! $product->overview !!}
                        </div>
                        <div id="speaker" class="tab-pane fade">
                            {!! $product->speaker !!}
                        </div>
                        <div id="ceus" class="tab-pane fade">
                            {!! $product->ceus !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
