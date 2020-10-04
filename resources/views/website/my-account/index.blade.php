@extends('website.layouts.app')

@section('title')
    My Account - Up Skill Educator
@endsection

@section('pagecss')
    <link rel="stylesheet" href="{{ url('assets/css/checkout.css') }}">
@endsection

@section('content')
    <main id="main-content">
        <div class="innerbanner" style="background-image: url({{ url('assets/images/product-banner.jpg') }});">
            <div class="container">
                <h1>My Account</h1>
                <div class="breadcrumbs">
                    <a href="{{ url('/') }}">Home</a>
                    <i class="fas fa-caret-right"></i>
                    <span>My Account</span>
                </div>
            </div>
        </div>
        <div class="product-detail">
            <div class="container">
                <div class="detail-sub">
                    <ul class="link-tab">
                        <li class=""><a data-toggle="tab" href="#overview">Dashboard</a></li>
                        <li class=""><a data-toggle="tab" href="#update_profile">Update Profile</a></li>
                        <li class=""><a data-toggle="tab" href="#update_password">Update Password</a></li>
                        <li class="active"><a data-toggle="tab" href="#orders">Orders</a></li>
                        <a href="javascript:void(0)" style="margin-top: 20px"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                           class="site-btn">
                            <i class="fas fa-power-off"></i> Logout
                        </a>
                        
                         <a href="javascript:void(0)" style="margin-top: 20px"
                            
                           class="site-btn">
                            <i class="fa fa-trophy" aria-hidden="true"></i> Credit ({{ Auth::user()->credit }})
                        </a>
                    </ul>
                    <div class="tab-content">
                        <div id="overview" class="tab-pane">
                            Welcome to Dasbhoard
                            {{ Auth::user()->fullname }}
                        </div>
                        <div id="update_profile" class="tab-pane">
                            <form action="{{ route('update-profile') }}" method="post" class="form-input-style"
                                  id="update_prof">
                                @csrf
                                <div class="form-group">
                                    <label for="fullname">Full Name : <span
                                            class="validation-error-label">*</span></label>
                                    <input type="text" name="fullname" required class="form-control"
                                           value="{{ Auth::user()->fullname }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email : <span
                                            class="validation-error-label">*</span></label>
                                    <input type="email" name="email" required class="form-control"
                                           readonly
                                           value="{{ Auth::user()->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="phone_no">Phone Number : <span
                                            class="validation-error-label">*</span></label>
                                    <input type="number" name="phone_no" required class="form-control"
                                           value="{{ Auth::user()->mobile_no }}">
                                </div>
                                <div class="form-group">
                                    <label for="job_title">Job Title : <span
                                            class="validation-error-label">*</span></label>
                                    <input type="text" name="job_title" required class="form-control"
                                           value="{{ Auth::user()->job_title }}">
                                </div>
                                <div class="form-group">
                                    <label for="company_name">Company Name : <span
                                            class="validation-error-label">*</span></label>
                                    <input type="text" name="company_name" required class="form-control"
                                           value="{{ Auth::user()->company_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="company_address">Company Address : <span
                                            class="validation-error-label">*</span></label>
                                    <textarea name="company_address" id="company_address" required
                                              class="form-control">{{ Auth::user()->company_address }}</textarea>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="site-btn">
                                        Update Profile
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div id="update_password" class="tab-pane">
                            <form action="{{ route('change-password') }}" method="post" class="form-input-style"
                                  id="update_pass">
                                @csrf
                                <div class="form-group">
                                    <label for="password">Password : <span
                                            class="validation-error-label">*</span></label>
                                    <input type="password" id="password" name="password" required
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">Confirm Password : <span
                                            class="validation-error-label">*</span></label>
                                    <input type="password" name="confirm_password" required
                                           data-parsley-equalto="#password"
                                           data-parsley-error-message="Confirm password does not match with password."
                                           class="form-control">
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="site-btn">
                                        Change Pasword
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div id="orders" class="tab-pane fade in active">
                            <div class="product-listing" style="padding: 0px !important">
                                <div class="container" style="width: auto">
                                    <div class="row">
                                        @if(count($orders) > 0)
                                            <div class="s_r">
                                                <h1><span class="r_head">Order History</span></h1>
                                                <br/>
                                                <div class="form2">
                                                    <div class="order_history">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0"
                                                               class="orderhis" style="margin-bottom:20px;">
                                                            <tbody>
                                                            <tr>
                                                                <th width="7%">Order Number</th>
                                                                <th width="33%">Order Summery</th>
                                                                <th width="8%">Order Type</th>
                                                                <th width="15%">Order Date</th>
                                                                <th width="8%">Order Status</th>
                                                                <th width="15%">Webinar Recording</th>
                                                                <th width="15%">e-Transcript</th>
                                                                <th width="15%">Grand Total</th>
                                                                
                                                            </tr>
                                                            @foreach($orders as $order)
                                                                <tr>
                                                                    <td>{{ $order->order_number }}</td>
                                                                    <td>
                                                                         

                                                                    <ol style="margin-left: 12px">
                                                                    @foreach($order->order_items as $items)
                                                                    <?php
                                                                    $pName=  \App\Models\Program::where('id',$items->program_id)->first();

                                                                    ?>

                                                                    <li><a href="javascript:void(0)"> 
                                                                        {{ @$items->product->title }} @if($pName['program_name']) ({{$pName['program_name']}})
                                                                        </a>
                                                                    @endif
                                                                    </li>
                                                                    @endforeach
                                                                    </ol>
                                                                    </td>
                                                                    <td>@foreach($order->order_items as $items)
                                                                        @if(@$items->product->product_type==1)
                                                                        {{'Product'}}
                                                                        @else

                                                                        {{'Package'}}
                                                                        @endif
                                                                        
                                                                          
                                                                         <?php break; ?>
                                                                        @endforeach
                                                                    </td>
                                                                    <td>
                                                                        <span class="order_time"
                                                                              data-date="{{ \Carbon\Carbon::createFromTimestamp(\Carbon\Carbon::parse($order->created_at)->timestamp)->toIso8601String()}}"></span>
                                                                    </td>
                                                                    <td>Confirmed</td>
                                                                    <td>
                                                                        @if($order->webinar_link == null ||
                                                                        $order->webinar_link == '')
                                                                            coming soon..
                                                                        @else
                                                                            <a href="{{ $order->webinar_link }}"
                                                                               target="_blank">{{ $order->webinar_link }}</a>
                                                                        @endif
                                                                    </td>
                                                                     <td>coming soon..</td>
                                                                    <td>$&nbsp;{{ $order->payment_details->card_amount }}</td>
                                                                    
                                                                    
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-4 list text-center">
                                                <div class="sub">
                                                    <div class="image"
                                                         style="background-image: url({{ url('assets/images/empty_cart.png') }});"></div>
                                                    <div class="text text-center">
                                                        <h3>
                                                            No Webinar Order Found.
                                                        </h3>
                                                        <a href="{{ url('/#specialities-section') }}">Go To Homepage</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
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

@section('pagejs')
    <script type="text/javascript" src="{{ url('admin-assets/plugins/parsleyjs/parsley.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#update_prof').parsley();
            $('#update_pass').parsley();
            let options = {
                hour: "2-digit", minute: "2-digit"
            };
            $(".order_time").each(function (i, item) {
                let date = new Date($(item).data('date'));
                $(item).text(date.getMonth() + 1 + "/" + date.getDate() + "/" + date.getFullYear() + " @ " + date.toLocaleTimeString('en-us', options))
            });

        });
    </script>
@endsection
