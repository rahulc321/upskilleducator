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
                <h1>Cart</h1>
                <div class="breadcrumbs">
                    <a href="{{ url('/') }}">Home</a>
                    <i class="fas fa-caret-right"></i>
                    <span>Cart</span>
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
                                    @foreach($products as $k=>$product)
                                    <?php

                                    $cartCheck=  \App\Models\Cartnew::where('id',$cartId[$k])->first();
                                    $pName=  \App\Models\Program::where('id',$cartCheck->program_id)->first();

                                    ?>
                                        <tr class="woocommerce-cart-form__cart-item cart_item">
                                            <td class="product-remove">
                                                <a href="{{ url('remove-cart1/'.$cartId[$k].'?'.csrf_token()) }}"
                                                   class="remove">
                                                    <img src="{{ url('assets/images/close.jpg') }}">
                                                </a>
                                            </td>
                                            <td class="product-thumbnail">
                                                <a href="">
                                                    <img src="{{$title['pic'][$k]}}" width="60" height="60">
                                                </a>
                                            </td>
                                            <td class="product-name" data-title="Product">
                                                <a href="{{ url('product/'.$product->category->url_name.'/'.$product->url_name) }}">
                                                    {{ substr($product->title,0, 30) }}
                                                    {{$title['name'][$k]}} ({{ $pName->program_name }})
                                                </a>
                                            </td>
                                            <td class="product-price" data-title="Price">
                                                <div class="qty2">
                                                    
                                                    <input type="button" value="-" class="qtyminus"
                                                           onclick="changeqty('{{ $product->id }}','{{ $loop->index }}',false,'{{$cartId[$k]}}')"
                                                           id="qtyminus{{ $loop->index }}">
                                                    <input type="text" name="quantity[{{ $product->id }}]"
                                                           value="{{ $quantity[$loop->index] }}"
                                                           id="quantity{{ $loop->index }}"
                                                           class="qty">
                                                    <input type="button" value="+" class="qtyplus"
                                                           onclick="changeqty('{{ $product->id }}','{{ $loop->index }}', true,'{{$cartId[$k]}}')"
                                                           id="qtyplus{{ $loop->index }}">
                                                </div>
                                            </td>
                                            <td class="product-subtotal" data-title="Total">
                                                {{ $quantity[$loop->index] }}
                                            </td>
                                            <td class="product-subtotal" data-title="Total">
                                                ${{ $pName->price * $quantity[$loop->index] }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </form>
                                <tr>
                                    <td colspan="6" style="border:none">
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
                                @foreach($products as $k=>$product)
                                <?php

                                    $cartCheck=  \App\Models\Cartnew::where('id',$cartId[$k])->first();
                                    $pName=  \App\Models\Program::where('id',$cartCheck->program_id)->first();

                                    ?>
                                    <tr class="cart-subtotal">
                                        <td width="80%"> {{$title['name'][$k]}} ({{ $pName->program_name }})</td>
                                        <td class="Subtotal">$ {{ $pName->price * $quantity[$loop->index]  }}</td>
                                    </tr>
                                    @php
                                        $total[] = str_replace(',', '', round($pName->price, 0, PHP_ROUND_HALF_DOWN)) * $quantity[$loop->index];
                                    @endphp
                                @endforeach
                                <tr class="order-total">
                                    <td class="order-total" style=" text-align:right"><span style="padding-right:25px;">Grand Total</span>
                                    </td>
                                    <td class="order-total Subtotal" data-title="Total">
                                        <strong>$ {{  number_format(array_sum($total)) }}</strong></td>
                                </tr>
                                </tbody>
                            </table>
                            <input type="hidden" value="{{ number_format(array_sum($total)) }}" name="total">
                            <br/>
                            <div class="wc-proceed-to-checkout text-right">
                                <a href="{{ url('checkout/?'.csrf_token()) }}" class="site-btn">
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

        function changeqty(id, index, type, cartId) {
            let value;
            if (type) {
                value = parseInt($("#quantity" + index).val()) + 1;
            } else {
                value = parseInt($("#quantity" + index).val()) - 1;
                value = value === 0 ? 1 : value;
            }
            $.ajax({
                url: '{{ url('update-cart-product1') }}',
                type: 'post',
                data: {
                    product_id: function () {
                        return id;
                    },
                    quantity: function () {
                        return value;
                    },
                    cartId: function () {
                        return cartId;
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
