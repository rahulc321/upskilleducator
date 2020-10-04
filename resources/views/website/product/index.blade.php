@extends('website.layouts.app')

@section('title')
    {!! strip_tags($category->name) !!} - Up Skill Educator
@endsection

@section('content')
    <main id="main-content">
        <div class="innerbanner" style="background-image: url({{ url('assets/images/product-banner.jpg') }});">
            <div class="container">
                <h1>{!! strip_tags($category->name) !!} - Upcoming Webinars</h1>
                <div class="breadcrumbs">
                    <a href="{{ url('/') }}">Home</a>
                    <i class="fas fa-caret-right"></i>
                    <span>{!! strip_tags($category->name) !!}</span>
                </div>
            </div>
        </div>
        <div class="product-listing">
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
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
