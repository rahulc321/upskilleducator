@extends('website.layouts.app')

@section('title')
    {{ $blog->title }} - Up Skill Educator
@endsection

@section('content')
    <main id="main-content">
        <div class="innerbanner" style="background-image: url({{ url('assets/images/product-banner.jpg') }});">
            <div class="container">
                <h1>{{ $blog->title }}</h1>
                <div class="breadcrumbs">
                    <a href="{{ url('/') }}">Home</a>
                    <i class="fas fa-caret-right"></i>
                    <a href="{{ url('blogs') }}">Blogs</a>
                    <i class="fas fa-caret-right"></i>
                    <span>{{ $blog->title }}</span>
                </div>
            </div>
        </div>
        <div class="product-detail">
            <div class="container">
                <div class="top-view">
                    <h2>{{ $blog->title }}</h2>
                    <ul>
                        <li>
                            <div class="image"><img src="{{ url('assets/images/calander-icon.png') }}" alt="image">
                            </div>
                            <div class="text">
                                <h5>Date</h5>
                                <span>{{ \Carbon\Carbon::parse($blog->created_at)->format('M d, Y  h:m:s A') }}</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="detail-sub">
                    <ul class="link-tab">
                        <li class="active"><a data-toggle="tab" href="#overview">Blog Description</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="overview" class="tab-pane fade in active">
                            {!! $blog->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
