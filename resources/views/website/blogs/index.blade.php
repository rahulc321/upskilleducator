@extends('website.layouts.app')

@section('title')
    Blogs - Up Skill Educator
@endsection

@section('content')
    <main id="main-content">
        <div class="innerbanner" style="background-image: url({{ url('assets/images/product-banner.jpg') }});">
            <div class="container">
                <h1>Blogs</h1>
                <div class="breadcrumbs">
                    <a href="{{ url('/') }}">Home</a>
                    <i class="fas fa-caret-right"></i>
                    <span>Blogs</span>
                </div>
            </div>
        </div>
        <div class="blog-section">
            <div class="container">
                <div class="allPost">
                    <div class="row">
                        @foreach($blogs as $blog)
                            <div class="col-xs-12 col-sm-4">
                                <div class="sub">
                                    <div class="image"
                                         style="background-image: url({{ $blog->image }});"></div>
                                    <div class="text">
                                        <h3>
                                            <a href="{{ url('blog/'.$blog->url_name) }}">
                                                {{ $blog->title }}
                                            </a>
                                        </h3>
                                        <p>
                                            @php $desc = strip_tags($blog->description) @endphp
                                            {!! substr($desc, 0, 150) !!}
                                        </p>
                                        <div
                                            class="date">{{ \Carbon\Carbon::parse($blog->created_at)->format('M d, Y') }}</div>
                                        <a href="{{ url('blog/'.$blog->url_name) }}" class="read-more"></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
