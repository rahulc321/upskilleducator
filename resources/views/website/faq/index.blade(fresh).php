@extends('website.layouts.app')

@section('title')
    FAQ's - Up Skill Educator
@endsection

@section('content')
    <main id="main-content">
        <div class="innerbanner" style="background-image: url({{ url('assets/images/product-banner.jpg') }});">
            <div class="container">
                <h1>FAQ's</h1>
                <div class="breadcrumbs">
                    <a href="{{ url('/') }}">Home</a>
                    <i class="fas fa-caret-right"></i>
                    <span>FAQ's</span>
                </div>
            </div>
        </div>
        <div class="product-detail">
            <div class="container">
                <div class="detail-sub">
                    <ul class="link-tab">
                        <li class="active"><a data-toggle="tab" href="#overview">FAQ's</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="overview" class="tab-pane fade in active">
                            {!! $faq->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
