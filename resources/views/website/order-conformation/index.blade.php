@extends('website.layouts.app')

@section('title')
    Order Confirmation - Up Skill Educator
@endsection

@section('pagecss')
    <style>
        .order_confirmation {
            width: 100%;
            float: left;
            text-align: center;
            padding: 100px 0 50px 0;
            text-align: center
        }

        .order_confirmation h2 {
            font-size: 30px;
            padding-top: 20px;
        }

        .order_confirmation h3 {
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .order_confirmation p {
            font-size: 15px;
            padding-top: 10px;
        }

        .order_confirmation p a {
            color: #d91a35
        }
    </style>
@endsection

@section('content')
    <main id="main-content">
        <div class="innerbanner" style="background-image: url({{ url('assets/images/product-banner.jpg') }});">
            <div class="container">
                <h1>Order Confirmation</h1>
                <div class="breadcrumbs">
                    <a href="{{ url('/') }}">Home</a>
                    <i class="fas fa-caret-right"></i>
                    <span>Order Confirmation</span>
                </div>
            </div>
        </div>
        <div class="product-listing">
            <div class="container">
                <div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-4 list text-center">
                    <div class="sub">
                        @if(Session::has('success'))
                            @php
                                $order = Session::get('order')
                            @endphp
                            <div class="image"
                                 style="background-image: url({{ url('assets/images/empty_cart.png') }});">
                            </div>
                            <div class="text text-center">
                                <div class="img" style="text-align: -webkit-center;">
                                    <img src="{{ url('assets/images/book-status.png') }}">
                                </div>
                                <h2>THANK YOU FOR YOUR ORDER</h2>
                                <h3>Your Booking ID is {{ $order->order_number }}</h3>
                                <p>We have sent you an email confirmation at: <a href="">{{ Auth::user()->email }}</a>
                                </p>
                                <p>In case of any questions, please call us at: <a href="">0124-484-5199</a></p>
                                <a href="{{ url('/') }}">Go To Homepage</a>
                            </div>
                        @elseif(Session::has('error'))
                            <div class="image"
                                 style="background-image: url({{ url('assets/images/empty_cart.png') }});">
                            </div>
                            <div class="text text-center">
                                <div class="img" style="text-align: -webkit-center;">
                                    <img src="{{ url('assets/images/wrong.jpg') }}">
                                </div>
                                <h2>YOUR ORDER IS CANCELLED</h2>
                                <p>In case of any questions, please call us at:
                                    <a href="">+1 888-407-9644</a>
                                </p>
                            </div>
                        @else
                            <div class="text text-center">
                                <h2>Oops... something wen't wrong.</h2>
                                <p>In case of any questions, please call us at:
                                    <a href="">+1 888-407-9644</a>
                                </p>
                                <a href="{{ url('/') }}">Go To Homepage</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
