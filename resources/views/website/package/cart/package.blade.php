@extends('website.layouts.app')

@section('title')
    Cart - Up Skill Educator
@endsection

@section('pagecss')
    <link rel="stylesheet" href="{{ url('assets/css/checkout.css') }}">
@endsection

@section('content')
    <main id="main-content">
        <div class="innerbanner" style="background-image: url({{ url('assets/images/product-banner.jpg') }});">
            <div class="container">
                <h1>Package Cart</h1>
                <div class="breadcrumbs">
                    <a href="{{ url('/') }}">Home</a>
                    <i class="fas fa-caret-right"></i>
                    <span>Package Cart</span>
                </div>
            </div>
        </div>
        @if(count($products) > 0)
            <div class="product_detail2">
                <div class="add_to_cart">
                    <div class="cart-wrapper-main">
                        <div class="cart-wrapper">
                            <table class="shop_table" cellspacing="0">
                                <thead>
                                <tr>
                                    <th class="product-name" colspan="3">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                </tr>
                                <form id="cartUpdate" method="post" action="{{ url('update-cart') }}">
                                    @csrf
                                    @foreach($products as $product)
                                        <tr class="woocommerce-cart-form__cart-item cart_item">
                                            <td class="product-remove">
                                                <a href="{{ url('remove-cart/'.$product->id.'?'.csrf_token()) }}"
                                                   class="remove">
                                                    <img src="{{ url('assets/images/close.jpg') }}">
                                                </a>
                                            </td>
                                            <td class="product-thumbnail">
                                                <a href="">
                                                    <img src="https://i.ibb.co/8g1xL9k/packages.png" width="60" height="60">
                                                </a>
                                            </td>
                                            <td class="product-name" data-title="Product">
                                               
                                                    {{ substr($product->title,0, 30) }}
                                                </a>
                                            </td>
                                            <td class="product-price" data-title="Price">
                                                <div class="qty2">
                                                    <input type="button" value="-" class="qtyminus"
                                                           onclick="changeqty('{{ $product->id }}','{{ $loop->index }}',false)"
                                                           id="qtyminus{{ $loop->index }}">
                                                    <input type="text" name="quantity[{{ $product->id }}]"
                                                           value="{{ $quantity[$loop->index] }}"
                                                           id="quantity{{ $loop->index }}"
                                                           class="qty">
                                                    <input type="button" value="+" class="qtyplus"
                                                           onclick="changeqty('{{ $product->id }}','{{ $loop->index }}', true)"
                                                           id="qtyplus{{ $loop->index }}">
                                                </div>
                                            </td>
                                            <td class="product-subtotal" data-title="Total">
                                                {{ $quantity[$loop->index] }}
                                            </td>
                                            <td class="product-subtotal" data-title="Total">
                                                ${{ $product->price * $quantity[$loop->index] }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </form>
                                <tr>
                                    <td colspan="6" style="border:none">
                                        <?php  if(!Session::get('cpn_price')){ ?>
                                        <form action="{{ url('apply-coupon') }}" method="post">
                                             <input type="hidden" name="_token" value = "{{csrf_token()}}"/>
                                        <div class="col-sm-6">
                                            <div class="for-group" style="padding-top: 20px">
                                                <input type="text" name="cpn" placeholder="Apply Coupon" class="form-control" required="">
                                            </div>
                                        </div>
                                        <button type="submit" style="margin-top: 18px;"  class="site-btn">Apply</button>
                                        </form>
                                        <?php } ?>

                                        
                                        <div class="continue-shopping" style="padding-top: 20px">
                                            <a class="button-continue-shopping" href=" {{ url('/') }}"> ←
                                                Continue shopping
                                            </a>
                                            {{--<a class="button-continue-shopping" href="javascript:void(0)"
                                               onclick="$('#cartUpdate').submit()"> ←
                                                Update Cart
                                            </a>--}}
                                        </div>
                                    </td>
                                </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="cart_totals ">
                            <table cellspacing="0" class="shop_table">
                                <tbody>
                                <tr>
                                    <th>Product Title</th>
                                    <th>Price</th>
                                </tr>
                                @foreach($products as $product)
                                    <tr class="cart-subtotal">
                                        <td width="80%">{{ $product->title }}</td>
                                        <td class="Subtotal">$ {{ $product->price * $quantity[$loop->index]  }}</td>
                                    </tr>
                                    @php
                                        $total[] = str_replace(',', '', round($product->price, 0, PHP_ROUND_HALF_DOWN)) * $quantity[$loop->index];
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
                                        <i class="ti-gift" style="color:green">Applied Coupon  </i><a href="{{ url('remove-coupon') }}">remove</a></span>
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
                            <br/>
                            <div class="wc-proceed-to-checkout text-right">
                                <a href="{{ url('package-checkout/?'.csrf_token()) }}" class="site-btn">
                                    <i class="fas fa-lock"></i> Proceed To Checkout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="product-listing">
                <div class="container">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-4 list text-center">
                        <div class="sub">
                            <div class="image"
                                 style="background-image: url({{ url('assets/images/empty_cart.png') }});"></div>
                            <div class="text text-center">
                                <h3>
                                    No Webinar Found.
                                </h3>
                                <a href="{{ url('/#specialities-section') }}">Go To Homepage</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </main>
@endsection

@section('pagejs')
    <script>

        function changeqty(id, index, type) {
            let value;
            if (type) {
                value = parseInt($("#quantity" + index).val()) + 1;
            } else {
                value = parseInt($("#quantity" + index).val()) - 1;
                value = value === 0 ? 1 : value;
            }
            $.ajax({
                url: '{{ url('update-cart-product') }}',
                type: 'post',
                data: {
                    product_id: function () {
                        return id;
                    },
                    quantity: function () {
                        return value;
                    },
                    _token: function () {
                        return "{{ csrf_token() }}";
                    }
                },
                success: function (data) {
                    location.reload();
                },
                error: function (xhr) {
                    location.reload();
                }
            });
        }

        @foreach($products as $product)
        $('#qtyplus{{ $loop->index }}').on('click', function (e) {
            e.preventDefault();
            var currentVal = parseInt($('#quantity{{ $loop->index }}').val());
            if (!isNaN(currentVal)) {
                $('#quantity{{ $loop->index }}').val(currentVal + 1);
            } else {
                $('#quantity{{ $loop->index }}').val(0);
            }
        });
        $('#qtyminus{{ $loop->index }}').on('click', function (e) {
            e.preventDefault();
            var currentVal = parseInt($('#quantity{{ $loop->index }}').val());
            if (!isNaN(currentVal) && currentVal > 1) {
                $('#quantity{{ $loop->index }}').val(currentVal - 1);
            } else {
                $('#quantity{{ $loop->index }}').val(1);
            }
        });
        @endforeach
    </script>
@endsection
