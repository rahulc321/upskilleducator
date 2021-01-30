@extends('website.layouts.app')

@section('title')
    Privacy Policy - Up Skill Educator
@endsection

@section('content')
    <main id="main-content">
        <div class="innerbanner" style="background-image: url({{ url('assets/images/product-banner.jpg') }});">
            <div class="container">
                <h1>Privacy Policy</h1>
                <div class="breadcrumbs">
                    <a href="{{ url('/') }}">Home</a>
                    <i class="fas fa-caret-right"></i>
                    <span>Privacy Policy</span>
                </div>
            </div>
        </div>
        <div class="product-detail">
            <div class="container">
                <div class="detail-sub">
                    <ul class="link-tab">
                        <li class="active"><a data-toggle="tab" href="#overview">Privacy Policy</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="overview" class="tab-pane fade in active">
                            {!! $privacypolicy->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
