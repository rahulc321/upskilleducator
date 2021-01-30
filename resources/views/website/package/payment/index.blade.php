@extends('website.layouts.app')

@section('title')
    Payment Details - Up Skill Educator
@endsection

@section('content')
    <main id="main-content">
        <div class="innerbanner" style="background-image: url({{ url('assets/images/product-banner.jpg') }});">
            <div class="container">
                <h1>Checkout</h1>
                <div class="breadcrumbs">
                    <a href="{{ url('/') }}">Home</a>
                    <i class="fas fa-caret-right"></i>
                    <span>Checkout</span>
                </div>
            </div>
        </div>
        <div class="product-detail">
            <div class="container">
                <div class="detail-sub">
                    <div class="card_detailst">
                        <div id="overview" class="tab-pane fade in active">
                            <form class="" action="{{ url('/package-card-payment') }}" method="post" class="form-input-style"
                                  style="margin: 30px">
                                {{ csrf_field() }}
                                <input type="hidden" name="first_name" value="{{ $checkout_data['name'] }}">
                                <input type="hidden" name="middle_name" value="{{ $checkout_data['middle_name'] }}">
                                <input type="hidden" name="last_name" value="{{ $checkout_data['last_name'] }}">
                                <input type="hidden" name="email" value="{{ $checkout_data['email'] }}">
                                <input type="hidden" name="mobile_no" value="{{ $checkout_data['phone_1'] }}">
                                <input type="hidden" name="mobile_no_2" value="{{ $checkout_data['phone_2'] }}">
                                <input type="hidden" name="billing_address_1"
                                       value="{{ $checkout_data['billing_address_1'] }}">
                                <input type="hidden" name="billing_address_2"
                                       value="{{ $checkout_data['billing_address_1'] }}">
                                <input type="hidden" name="city" value="{{ $checkout_data['city'] }}">
                                <input type="hidden" name="state" value="{{ $checkout_data['state'] }}">
                                <input type="hidden" name="country" value="{{ $checkout_data['country'] }}">
                                <input type="hidden" name="pincode" value="{{ $checkout_data['pincode'] }}">
                                <input type="hidden" name="puchase_for_self"
                                       value="{{ $checkout_data['puchase_for_self'] }}">
                                <input type="hidden" name="attendee_name" value="{{ $checkout_data['attendee_name'] }}">
                                <input type="hidden" name="attendee_email"
                                       value="{{ $checkout_data['attendee_email'] }}">
                                <input type="hidden" name="attendee_title"
                                       value="{{ $checkout_data['attendee_title'] }}">
                                <input type="hidden" name="attendee_no" value="{{ $checkout_data['attendee_no'] }}">
                                <input type="hidden" name="company_name" value="{{ $checkout_data['company_name'] }}">
                                <input type="hidden" name="company_title" value="{{ $checkout_data['company_title'] }}">
                                <h3>Credit Card Information</h3>
                                <div class="form-group">
                                    <label for="cnumber">Card Number</label>
                                    <input type="text" class="form-control" id="cnumber" name="cnumber"
                                           value="{{ old('cnumber') }}"
                                           required placeholder="Enter Card Number">
                                </div>
                                <div class="form-group">
                                    <label for="card-expiry-month">Expiration Month</label>
                                    {{ Form::selectMonth(null, null, ['name' => 'card_expiry_month', 'class' => 'form-control', 'required', 'value' => old('card_expiry_month')]) }}
                                </div>
                                <div class="form-group">
                                    <label for="card-expiry-year">Expiration Year</label>
                                    {{ Form::selectYear(null, date('Y'), date('Y') + 10, null, ['name' => 'card_expiry_year', 'class' => 'form-control', 'required', 'value' => old('card_expiry_year')]) }}
                                </div>
                                <div class="form-group">
                                    <label for="ccode">Card Code</label>
                                    <input type="text" class="form-control" id="ccode" name="ccode"
                                           value="{{ old('ccode') }}" placeholder="Enter Card Code">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="camount"
                                           value="{{ $checkout_data['total'] }}">
                                </div>
                                <button type="submit" class="site-btn">Submit</button>
                                @isset($error)
                                    <p class="error">
                                        {{ $error }}
                                    </p>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
