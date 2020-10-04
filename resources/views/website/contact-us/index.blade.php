@extends('website.layouts.app')

@section('title')
    Contact Us - Up Skill Educator
@endsection

@section('content')
    <main id="main-content">
        <div class="innerbanner" style="background-image: url({{ url('assets/images/product-banner.jpg') }});">
            <div class="container">
                <h1>Contact Us</h1>
                <div class="breadcrumbs">
                    <a href="{{ url('/') }}">Home</a>
                    <i class="fas fa-caret-right"></i>
                    <span>Contact Us</span>
                </div>
            </div>
        </div>
        <div class="product-detail">
            <div class="container">
                <div class="detail-sub">
                    <ul class="link-tab">
                        <li class="active"><a data-toggle="tab" href="#overview">Contact Us</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="overview" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-lg-6">
                                    {!! $contactus->description !!}
                                </div>
                                <div class="col-lg-6">
                                    <div class="fl">
                                        <h2>Send us an email</h2>
                                        <form action="{{ url('contact-us') }}" method="post">
                                            @csrf
                                            <div class="form">
                                                <div class="form-group">
                                                    <label for="confirm_password">Full Name : <span
                                                            class="validation-error-label">*</span></label>
                                                    <input name="fullname" placeholder="Full Name*" type="text"
                                                           required class="form-control" value="{{ old('fullname') }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="confirm_password">Email Address : <span
                                                            class="validation-error-label">*</span></label>
                                                    <input name="email" placeholder="Email Address*" type="email"
                                                           required class="form-control" value="{{ old('email') }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="confirm_password">Contact Number : <span
                                                            class="validation-error-label">*</span></label>
                                                    <input name="number" placeholder="Contact Number*" type="text"
                                                           required class="form-control" value="{{ old('number') }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="confirm_password">Subject : <span
                                                            class="validation-error-label">*</span></label>
                                                    <input name="subject" placeholder="Subject*" type="text"
                                                           required class="form-control" value="{{ old('subject') }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="confirm_password">Message : </label>
                                                    <textarea name="message" placeholder="Message"
                                                              class="form-control">{{ old('message') }}</textarea>
                                                </div>
                                                <div class="form-group text-left">
                                                    <button type="submit" class="site-btn">
                                                        Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
