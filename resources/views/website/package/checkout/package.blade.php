@extends('website.layouts.app')

@section('title')
    Checkout - Up Skill Educator
@endsection

@section('pagecss')
    <link rel="stylesheet" href="{{ url('assets/css/checkout.css') }}">
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
        <form action="{{ url('payment-card-details-package?'.csrf_token()) }}" id="checkoutForm" method="post">
            @csrf;
            @method('put')
            <div class="product_detail2">
                <div class="add_to_cart">
                    <div class="cart-wrapper-main">
                        <div class="cart-wrapper">
                            <div class="shiping_address">
                                <div class="s_r">
                                    <h1><span class="r_head">Enter Details</span></h1>
                                    <div class="form">
                                        <div class="grid2">
                                            <div class="g_l">
                                                <div class="txta">
                                                    <div class="t1">First Name <span>*</span></div>
                                                    <div class="t2">
                                                        <input name="name" required type="text" class="t_box"
                                                               value="{{ Auth::user()->fullname }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="g_l">
                                                <div class="txta">
                                                    <div class="t1">Middle Name</div>
                                                    <div class="t2">
                                                        <input name="middle_name" type="text" class="t_box">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid2">
                                            <div class="g_l">
                                                <div class="txta">
                                                    <div class="t1">Last Name <span>*</span></div>
                                                    <div class="t2">
                                                        <input name="last_name" required type="text" class="t_box">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="g_r">
                                                <div class="txta">
                                                    <div class="t1">Email <span>*</span></div>
                                                    <div class="t2">
                                                        <input name="email" required type="email" class="t_box"
                                                               value="{{ Auth::user()->email }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid2">
                                            <div class="g_l">
                                                <div class="txta">
                                                    <div class="t1">Comapny Name <span>*</span></div>
                                                    <div class="t2">
                                                        <input name="company_name" required type="text" class="t_box">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="g_r">
                                                <div class="txta">
                                                    <div class="t1">Job Title <span>*</span></div>
                                                    <div class="t2">
                                                        <input name="company_title" required type="text" class="t_box">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid2">
                                            <div class="g_l">
                                                <div class="txta">
                                                    <div class="t1">Phone 1 <span>*</span></div>
                                                    <div class="t2">
                                                        <input name="phone_1" required type="number" class="t_box"
                                                               value="{{ Auth::user()->mobile_no }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="g_r">
                                                <div class="txta">
                                                    <div class="t1">Phone 2</div>
                                                    <div class="t2">
                                                        <input name="phone_2" type="number" class="t_box">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid2">
                                            <div class="g_3">
                                                <div class="txta">
                                                    <div class="t1">Billing Address 1<span>*</span>
                                                    </div>
                                                    <div class="t2">
                                                        <input name="billing_address_1" required type="text"
                                                               class="t_box2">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid2">
                                            <div class="g_3">
                                                <div class="txta">
                                                    <div class="t1">Billing Address 2 <span>*</span></div>
                                                    <div class="t2">
                                                        <input name="billing_address_2" required type="text"
                                                               class="t_box2">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid2">
                                            <div class="g_l">
                                                <div class="txta">
                                                    <div class="t1">Country <span>*</span></div>
                                                    <div class="t2">
                                                        <select name="country" id="country" class="t_box2" required >
                                                            <option value="">Select Country</option>
                                                            <option value="CANADA">CANADA</option>
                                                            <option value="USA">USA</option>
                                                        </select>
                                                    </div>
                                                    <span>
                                                        Not in the USA or Canada, contact us at +1 888-407-9644 and we will be happy to help you
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="g_r">
                                                <div class="txta">
                                                    <div class="t1">State/Province <span>*</span></div>
                                                    <div class="t2">
                                                        <select name="state" id="state" class="t_box2" required >
                                                            <option value="">Select State/Province</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clr"></div>
                                        </div>
                                        <div class="grid2">
                                            <div class="g_l">
                                                <div class="txta">
                                                    <div class="t1">City/County <span>*</span></div>
                                                    <div class="t2">
                                                        <select name="city" id="city" class="t_box2" required >
                                                            <option value="">Select City/County</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="g_r">
                                                <div class="txta">
                                                    <div class="t1">Zipcode <span>*</span></div>
                                                    <div class="t2">
                                                        <input name="pincode" required type="text" class="t_box">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid2">
                                            <div class="g_r">
                                                <div class="txta">
                                                    <div class="t1">Are You Purchasing For Yourself ? <span>*</span>
                                                    </div>
                                                    <br/>
                                                    <div class="t2">
                                                        <input type="radio" name="puchase_for_self" value="yes"
                                                               class="puchase_for_self"
                                                               required> Yes
                                                        &nbsp;
                                                        &nbsp;
                                                        &nbsp;
                                                        &nbsp;
                                                        <input type="radio" name="puchase_for_self" value="no" required
                                                               class="puchase_for_self">
                                                        No
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="attendee" style="display: none">
                                            <div class="grid2">
                                                <div class="g_l">
                                                    <div class="txta">
                                                        <div class="t1">Attendee Name <span>*</span></div>
                                                        <div class="t2">
                                                            <input name="attendee_name" id="attendee_name" type="text"
                                                                   class="t_box">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="g_r">
                                                    <div class="txta">
                                                        <div class="t1">Attendee Eamil <span>*</span></div>
                                                        <div class="t2">
                                                            <input name="attendee_email" id="attendee_email"
                                                                   type="email" class="t_box2">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clr"></div>
                                            </div>
                                            <div class="grid2">
                                                <div class="g_l">
                                                    <div class="txta">
                                                        <div class="t1">Attendee Title <span>*</span></div>
                                                        <div class="t2">
                                                            <input name="attendee_title" id="attendee_title" type="text"
                                                                   class="t_box2">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="g_r">
                                                    <div class="txta">
                                                        <div class="t1">Attendee Contact No <span>*</span></div>
                                                        <div class="t2">
                                                            <input name="attendee_no" id="attendee_no" type="text"
                                                                   class="t_box">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cart_totals ">
                            <table cellspacing="0" class="shop_table">
                                <tbody>
                                <tr>
                                    <th>Product Title</th>
                                    <th>Price</th>
                                </tr>
                                @foreach($carts as $cart)
                                    <tr class="cart-subtotal">
                                        <td width="80%">{{ $cart->product->title }}</td>
                                        <td class="Subtotal">$ {{ $cart->product->price * $cart->quantity  }}</td>
                                    </tr>
                                    @php
                                        $total[] = str_replace(',', '', round($cart->product->price, 0, PHP_ROUND_HALF_DOWN)) *$cart->quantity;
                                    @endphp
                                @endforeach
                                 <tr class="order-total">
                                    <td class="order-total" style=" text-align:right"><span style="padding-right:25px;">Grand Total</span>
                                    </td>
                                    <td class="order-total Subtotal" data-title="Total">
                                        <strong>$ {{  number_format(array_sum($total)) }}</strong></td>
                                </tr>



                                <?php  if(Session::get('cpn_price')){ 
                                        $cpnprice= Session::get('cpn_price');
                                        $total= array_sum($total)-$cpnprice;
                                    ?>
                                 <tr class="order-total">
                                    <td class="order-total" style=" text-align:right"><span style="padding-right:25px;">
                                        <i class="ti-gift" style="color:green">Applied Coupon </i>  </span>
                                    </td>
                                    <td class="order-total Subtotal" data-title="Total">
                                        <strong>$ {{  number_format($cpnprice) }}</strong></td>
                                </tr>
                                <?php }else{
                                    $total=array_sum($total);
                                } ?>




                                <?php  if(Session::get('cpn_price')){  ?>
                                <tr class="order-total">
                                    <td class="order-total" style=" text-align:right"><span style="padding-right:25px;">Total</span>
                                    </td>
                                    <td class="order-total Subtotal" data-title="Total">
                                        <strong>$ {{  number_format($total) }}</strong></td>
                                </tr>
                            <?php } ?>
                                </tbody>
                            </table>
                            <input type="hidden" value="{{ number_format($total) }}" name="total">
                            <div class="wc-proceed-to-checkout">
                                <button type="submit" class="checkout-button button alt wc-forward">
                                    Proceed to Payment
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection

@section('pagejs')
    <script src="{{ url('js/select.load.js') }}" type="text/javascript"></script>
    <script>
    
    <?php
            $val= \Session::get('direct_login');


        ?>  

        var test= "{{$val}}";
        if(test=='direct'){
            $('[type="text"]').removeAttr('required');
             
        }

        $('#country').on('change', function () {
            let country = this.value;
            load_seldata('state', 'state', country)
        })

        $('#state').on('change', function () {
            let state = this.value;
            load_seldata('city', 'city', state)
        })

        $(".puchase_for_self").click(function () {
            var radioValue = $("input[name='puchase_for_self']:checked").val();
            if (radioValue === 'no') {
                $('#attendee').css('display', 'block');
                $('#attendee_name').attr('required', 'required');
                $('#attendee_email').attr('required', 'required');
                $('#attendee_title').attr('required', 'required');
                $('#attendee_no').attr('required', 'required');
            } else {
                $('#attendee').css('display', 'none');
                $('#attendee_name').removeAttr('required', 'required');
                $('#attendee_email').removeAttr('required', 'required');
                $('#attendee_title').removeAttr('required', 'required');
                $('#attendee_no').removeAttr('required', 'required');
            }
        });
    </script>
@endsection
