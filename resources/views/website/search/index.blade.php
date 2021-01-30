@extends('website.layouts.app')

@section('title')
    Search - Up Skill Educator
@endsection

@section('content')
    <main id="main-content">
        <div class="innerbanner" style="background-image: url({{ url('assets/images/product-banner.jpg') }});">
            <div class="container">
                <h1>Search - Upcoming Webinars</h1>
                <div class="breadcrumbs">
                    <a href="{{ url('/') }}">Home</a>
                    <i class="fas fa-caret-right"></i>
                    <span>Search</span>
                </div>
            </div>
        </div>
        <div class="product-listing">
            <div class="container">
                <div class="row">
                    @if(count($searches) > 0)
                        @foreach($searches as $search)
                            @isset($search['uuid'])
                                <div class="col-xs-12 col-sm-6 col-md-4 list">
                                    <div class="sub">
                                        <div class="image"
                                             style="background-image: url({{ $search['picture'] }});"></div>
                                        <div class="text">
                                            <div class="cat">On-Demand</div>
                                            <h3>
                                                <a href="{{ url('product/'.$search['category']['url_name'].'/'.$search['url_name']) }}">
                                                    {{ $search['title'] }}
                                                </a>
                                            </h3>
                                            <div class="date">
                                                Date: {{ \Carbon\Carbon::parse($search['webinar_date_time'])->format('d-m-y') }}
                                            </div>
                                            <div class="value">
                                                <span>Speaker-</span>{{ $search['speaker_name'] }}
                                            </div>
                                            <div class="value">
                                                <span>Duration-</span> {{ $search['duration'] }} minutes
                                            </div>
                                            <div class="value">
                                                <span>CEU-</span> 1.5
                                            </div>
                                            <div class="price">
                                                <span>Price-</span> ${{ $search['price'] }}
                                            </div>
                                            <a href="{{url('add-cart/'.$search['url_name'].'?'.csrf_token()) }}"
                                               class="site-btn" style="float: none">Book Now</a>
                                            <a href="{{url('product/'.$search['category']['url_name'].'/'.$search['url_name']) }}"
                                               class="site-btn view">View
                                                Details</a>
                                        </div>
                                    </div>
                                </div>
                                {{--@else
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="sub">
                                            <div class="image"
                                                 style="background-image: url({{ $search['image'] }});"></div>
                                            <div class="text">
                                                <h3>
                                                    <a href="{{ url('blog/'.$search['url_name']) }}">
                                                        {{ $search['title'] }}
                                                    </a>
                                                </h3>
                                                <p>
                                                    @php $desc = strip_tags($search['description']) @endphp
                                                    {!! substr($desc, 0, 150) !!}
                                                </p>
                                                <div
                                                    class="date">{{ \Carbon\Carbon::parse($search['created_at'])->format('M d, Y') }}</div>
                                                <a href="{{ url('blog/'.$search['url_name']) }}" class="read-more"></a>
                                            </div>
                                        </div>
                                    </div>--}}
                            @endif
                        @endforeach
                    @else
                        <div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-4 list text-center">
                            <div class="sub">
                                <div class="image"
                                     style="background-image: url({{ url('assets/images/empty_cart.png') }});"></div>
                                <div class="text text-center">
                                    <h3>
                                        Search result not found....
                                    </h3>
                                    <a href="{{ url('/') }}">Go To Homepage</a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
