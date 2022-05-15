@extends('layouts.app_fontend')

@section('body')
<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 text-center">
                <h2 class="breadcrumb-title">Shop</h2>
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Cart</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>

<!-- breadcrumb-area end -->

<!-- Cart Area Start -->
<div class="cart-main-area pt-100px pb-100px">
    <div class="container">
        <h3 class="cart-page-title">Your cart items</h3>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="{{ route('updatecart') }}" method="POST">
                    @csrf
                    <div class="table-content table-responsive cart-table-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Unit Price</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total_price = 0;
                                    $result = false;
                                @endphp
                                @forelse (CartallProduct() as $cart)
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="#"><img class="img-responsive ml-15px"
                                                src="{{asset('uploads/product_photos')}}/{{$cart->CartToProduct->product_photo}}" alt="" /></a>
                                    </td>
                                    <td class="product-name">
                                        <a href="#">{{$cart->CartToProduct->product_name}}</a>
                                        <br>
                                        <span>Vendor: {{CartvendorName($cart->id)}}</span>
                                        <br>
                                        <span>Status:
                                        @if($cart->CartToProduct->quentity < $cart->amount)
                                            @php
                                                $result = true;
                                            @endphp
                                            Stock Out
                                            @else
                                            avilable
                                        @endif
                                        </span>
                                    </td>

                                    <td class="product-price-cart"><span class="amount">{{$cart->amount}} x <span class="amount">${{$cart->CartToProduct->product_price}}</span></span></td>
                                    <td class="product-quantity">
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" type="text" name="qtybutton[{{$cart->id}}]"
                                                value="{{$cart->amount}}" />
                                        </div>
                                    </td>
                                    <td class="product-subtotal">${{$cart->amount * $cart->CartToProduct->product_price}}</td>
                                    @php
                                        $total_price += $cart->amount * $cart->CartToProduct->product_price;
                                    @endphp
                                    <td class="product-remove">
                                        <a href="#"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ route('cart.remove', $cart->id)}}"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td>No Product show in Cart</td>
                                    </tr>
                                @endforelse


                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-shiping-update-wrapper">
                                <div class="cart-shiping-update">
                                    <a href="{{ route('/') }}">Continue Shopping</a>

                                </div>
                                <div class="cart-clear">
                                    <button>Update Shopping Cart</button>
                </form>
                                    <a href="{{ route('allcart.remove', auth()->id()) }}">Clear Shopping Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="row">
                    {{-- <div class="col-lg-4 col-md-6 mb-lm-30px">
                        <div class="cart-tax">
                            <div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gray">Estimate Shipping And Tax</h4>
                            </div>
                            <div class="tax-wrapper">
                                <p>Enter your destination to get a shipping estimate.</p>
                                <div class="tax-select-wrapper">
                                    <div class="tax-select">
                                        <label>
                                            * Country
                                        </label>
                                        <select class="email s-email s-wid">
                                            <option>Bangladesh</option>
                                            <option>Albania</option>
                                            <option>Åland Islands</option>
                                            <option>Afghanistan</option>
                                            <option>Belgium</option>
                                        </select>
                                    </div>
                                    <div class="tax-select">
                                        <label>
                                            * Region / State
                                        </label>
                                        <select class="email s-email s-wid">
                                            <option>Bangladesh</option>
                                            <option>Albania</option>
                                            <option>Åland Islands</option>
                                            <option>Afghanistan</option>
                                            <option>Belgium</option>
                                        </select>
                                    </div>
                                    <div class="tax-select mb-25px">
                                        <label>
                                            * Zip/Postal Code
                                        </label>
                                        <input type="text" />
                                    </div>
                                    <button class="cart-btn-2" type="submit">Get A Quote</button>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-lg-6 col-md-6 mb-lm-30px">
                        <div class="discount-code-wrapper">
                            <div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4>
                            </div>
                            <div class="discount-code">
                                <p>Enter your coupon code if you have one.</p>
                                <form>
                                    <input type="text"  name="coupon_name" />
                                    <button class="cart-btn-2" type="submit">Apply Coupon</button>
                                </form>
                            </div>
                            @if(session('cupon_erorr'))
                            <div class="alert alert-danger mt-5">
                                {{session('cupon_erorr')}}
                            </div>
                        @endif
                        </div>
                    </div>
                    @php
                         Session::put('Total_price',$total_price);
                    @endphp
                    <div class="col-lg-6 col-md-12 mt-md-30px">
                        <div class="grand-totall">
                            <div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                            </div>
                            <h5>Total Carts <span>${{$total_price}}</span> </h5>
                            <h5>Discount ({{$cupon_name}}) <span>${{$discount_price}}</span> </h5>
                            <h5>Total AllPrice <span id="total_price">{{$total_price - $discount_price}}</span> <span>$</span></h5>
                            <div class="total-shipping">
                                <h5>Total shipping</h5>
                                <ul>
                                    <li><input type="radio" id="btn1" name="shiping" /> Standard <span>$20.00</span></li>
                                    <li><input type="radio" id="btn2" name="shiping" /> Express <span>$30.00</span></li>
                                </ul>
                            </div>
                            <h4 class="grand-totall-title">Grand Total <span id="grand_total">{{$total_price - $discount_price}}</span> <span>$</span></h4>
                            @if ($result)
                                <span class="text-danger">Plause Remove Stock Out Product</span>
                                @else
                                <a href="checkout.html">Proceed to Checkout</a>
                            @endif


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart Area End -->
@endsection

@section('footer_script')
<script>
    $('#btn1').click(function(){

        $('#grand_total').html(parseInt($('#total_price').html())+20);
    });
    $('#btn2').click(function(){

    $('#grand_total').html(parseInt($('#total_price').html())+30);
    });
</script>

@endsection
