@extends('website.layouts.app')

@section('title')
    Upskill Educator
@endsection

@section('content')
    <main id="main-content">
        <div class="banner-section" style="background-image: url({{ $homepage->homepage_banner }});">
            <div class="banner-text">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4">
                            <div class="image"><img src="{{ $homepage->homepage_text1_picture }}" alt="image"></div>
                            <div class="text">
                                <h3>{{ $homepage->homepage_text1 }}</h3>
                                <p>{{ $homepage->homepage_secondary_text1 }}</p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <div class="image"><img src="{{ $homepage->homepage_text2_picture }}" alt="image"></div>
                            <div class="text">
                                <h3>{{ $homepage->homepage_text2 }}</h3>
                                <p>{{ $homepage->homepage_secondary_text2 }}</p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <div class="image"><img src="{{ $homepage->homepage_text3_picture }}" alt="image"></div>
                            <div class="text">
                                <h3>{{ $homepage->homepage_text3 }}</h3>
                                <p>{{ $homepage->homepage_secondary_text3 }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-section">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 image pull-right">
                        <img src="{{ $aboutUs->image }}" alt="image">
                    </div>
                    <div class="col-xs-12 col-sm-6 text">
                        {{--                        <span>{{ $aboutUs->title }}</span>--}}
                        <h2>{{ $aboutUs->title }}</h2>
                        <p>
                            @php $desc = strip_tags($aboutUs->description) @endphp
                            {!! substr($desc, 0, 500) !!}
                        </p>
                        {{--                        <a href="{{ url('about-us') }}" class="site-btn">Read More</a>--}}
                    </div>
                </div>
            </div>
        </div>
        <div class="specialities-section" id="specialities-section">
            <div class="container">
                <h2>Industry topics</h2>
                <div class="row">
                    <div class="col-xs-12 col-sm-7">
                        <a href="{{ url('category/'.$categories[0]->url_name) }}">
                            <div class="special pink">
                                <img src="{{ url('assets/images/health-icon.png') }}" alt="image">
                                <div class="title">{!! $categories[0]->name !!}</div>
                            </div>
                        </a>
                        <a href="{{ url('category/'.$categories[1]->url_name) }}">
                            <div class="special purple">
                                <img src="{{ url('assets/images/business-icon.png') }}" alt="image">
                                <div class="title">{!! $categories[1]->name !!}</div>
                            </div>
                        </a>
                        <a href="{{ url('category/'.$categories[2]->url_name) }}">
                            <div class="special sky-blue">
                                <img src="{{ url('assets/images/real-icon.png') }}" alt="image">
                                <div class="title">{!! $categories[2]->name !!}</div>
                            </div>
                        </a>
                        <a href="{{ url('category/'.$categories[3]->url_name) }}">
                            <div class="special orange">
                                <img src="{{ url('assets/images/accounting-icon.png') }}" alt="image">
                                <div class="title">{!! $categories[3]->name !!}</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-5">
                        <a href="{{ url('category/'.$categories[4]->url_name) }}">
                            <div class="special green">
                                <img src="{{ url('assets/images/human-icon.png') }}" alt="image">
                                <div class="title">{!! $categories[4]->name !!}</div>
                            </div>
                        </a>
                        <a href="{{ url('category/'.$categories[5]->url_name) }}">
                            <div class="special orange-light">
                                <img src="{{ url('assets/images/food-icon.png') }}" alt="image">
                                <div class="title">{!! $categories[5]->name !!}</div>
                            </div>
                        </a>
                        <a href="{{ url('category/'.$categories[6]->url_name) }}">
                            <div class="special blue">
                                <img src="{{ url('assets/images/construction-icon.png') }}" alt="image">
                                <div class="title">{!! $categories[6]->name !!}</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="our-speakers">
            <div class="container">
                <h2>Our <br>Speakers</h2>
                <div class="speaker-slider owl-carousel">
                    @foreach($speakers as $speaker)
                        <div class="item">
                            <div class="image"
                                 style="background-image: url({{ $speaker->image }});"></div>
                            <h3>{{ $speaker->title }}</h3>
                            <p>{{ $speaker->description }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="upcoming-webinars">
            <div class="container">
                <h2>Upcoming Webinars</h2>
                <div class="webinars-slider owl-carousel">
                    @if(count($products) > 0)
                        @foreach($products as $product)
                            <div class="item">
                                <a href="{{ url('product/'.$product->category->url_name.'/'.$product->url_name) }}"
                                   style="text-decoration: none;">
                                    <h3>{{ $product->title }}</h3>
                                </a>
                                <div class="date">
                                    <span>
                                        @if($product->type == 1)
                                            Live Webinar
                                        @elseif($product->type == 2)
                                            On-Demand
                                        @elseif($product->type == 3)
                                            Pre-Recorded
                                        @endif
                                    </span>
                                    Date: {{ \Carbon\Carbon::parse($product->webinar_date_time)->format('d-m-y') }}
                                </div>
                                <div class="image"
                                     style="background-image: url({{ $product->speaker_picture }});"></div>
                                <div class="name">{{ $product->speaker_name }}</div>
                                @php $desc = strip_tags($product->overview) @endphp
                                <p>
                                    {!! substr($desc, 0, 100) !!}
                                </p>
                            </div>
                        @endforeach
                    @else
                        <div class="item">
                            <h3>No Webinar Content is avaliable</h3>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        {{-- <div class="blog-section">
             <div class="container">
                 <h2>Latest Blog Posts</h2>
                 <a href="{{ url('/blogs') }}" class="site-btn">Read All</a>
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
         </div>--}}
    </main>
@endsection
