@extends('website.layouts.app')

@section('title')
    Site Map - Up Skill Educator
@endsection

@section('content')
    <main id="main-content">
        <div class="innerbanner" style="background-image: url({{ url('assets/images/product-banner.jpg') }});">
            <div class="container">
                <h1>Site Map</h1>
                <div class="breadcrumbs">
                    <a href="{{ url('/') }}">Home</a>
                    <i class="fas fa-caret-right"></i>
                    <span>Site Map</span>
                </div>
            </div>
        </div>
        <div class="product-detail">
            <div class="container">
                <div class="detail-sub">
                    <ul class="link-tab">
                        <li class="active"><a data-toggle="tab" href="#overview">Site Map</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="overview" class="tab-pane fade in active">
                            {!! $sitemap->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
