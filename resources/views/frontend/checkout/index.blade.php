@extends('layouts.app_fontend')

@section('body')

<!-- OffCanvas Menu Start -->

    <!-- OffCanvas Menu End -->


    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb-title">Shop</h2>
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>

    <!-- breadcrumb-area end -->


    <!-- checkout area start -->
    <div class="checkout-area pt-100px pb-100px">
        <div class="container">
            <form action="{{ route('checkout.store')}}" method="POST">
                @csrf
            <div class="row">

                    <div class="col-lg-7">
                        <div class="billing-info-wrap">
                            <h3>Billing Details</h3>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>Name</label>
                                        <input type="text" value="{{auth::user()->name}}" name="name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>Email Address</label>
                                        <input type="text" value="{{auth::user()->email}}" name="email">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="billing-info mb-4">
                                        <label>Phone</label>
                                        <input type="text" value="{{auth::user()->Phone_number}}" name="phone">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="billing-select mb-4">
                                        <label>Country</label>
                                        <select name="country" id="js-example-basic-single">
                                            <option>Select a country</option>
                                            @foreach ($countries as $country)
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="billing-select mb-4">
                                        <label>City</label>
                                        <select name="city" id="city_drop_down" disabled>
                                            <option>Select a City</option>

                                            <option>Nai</option>



                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>Postcode / ZIP</label>
                                        <input type="text" name="postcode">
                                    </div>
                                </div>


                            </div>

                            <div class="additional-info-wrap">
                                <h4>Additional information</h4>
                                <div class="additional-info">
                                    <label>Order notes</label>
                                    <textarea placeholder="Notes about your order, e.g. special notes for delivery. "
                                        name="message"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-5 mt-md-30px mt-lm-30px ">
                        <div class="your-order-area">
                            <h3>Your order</h3>
                            <div class="your-order-wrap gray-bg-4">
                                <div class="your-order-product-info">
                                    <div class="your-order-top">
                                        <ul>
                                            <li>Product</li>
                                            <li>Total</li>
                                        </ul>
                                    </div>
                                    <div class="your-order-middle">
                                        <ul>
                                            @forelse (CartallProduct() as $cart)
                                                <li><span class="order-middle-left">{{$cart->CartToProduct->product_name}} X {{$cart->amount}}</span> <span
                                                    class="order-price">${{$cart->amount * $cart->CartToProduct->product_price}} </span></li>

                                            @endforeach

                                        </ul>
                                    </div>
                                    <div class="your-order-bottom">
                                        <ul>
                                            <li class="your-order-shipping">Cart Total</li>
                                            <li>${{Session::get('Total_price')}}</li>
                                        </ul>
                                        <ul>
                                            <li class="your-order-shipping">Discount ({{Session::get('cupon_name')}})</li>
                                            <li>${{Session::get('discount_price')}}</li>
                                        </ul>
                                        <ul>
                                            <li class="your-order-shipping">Total All</li>
                                            <li>${{Session::get('Total_price') - Session::get('discount_price')}}</li>
                                        </ul>
                                        <ul>
                                            <li class="your-order-shipping">Shipping</li>
                                            <li>Free shipping</li>
                                        </ul>
                                    </div>
                                    <div class="your-order-total">
                                        <ul>
                                            <li class="order-total">Total</li>
                                            <li>$100</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="payment-method">
                                    <div class="payment-accordion element-mrg">
                                        <div id="faq" class="panel-group">
                                            <div class="panel panel-default single-my-account m-0">
                                                <div class="panel-heading my-account-title">
                                                    <h4 class="panel-title"><a data-bs-toggle="collapse"
                                                            href="#my-account-1" class="collapsed"
                                                            aria-expanded="true">Direct bank transfer</a>
                                                    </h4>
                                                </div>
                                                <div id="my-account-1" class="panel-collapse collapse show"
                                                    data-bs-parent="#faq">

                                                    <div class="panel-body">
                                                        <p>Please send a check to Store Name, Store Street, Store Town,
                                                            Store State / County, Store Postcode.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default single-my-account m-0">
                                                <div class="panel-heading my-account-title">
                                                    <h4 class="panel-title"><a data-bs-toggle="collapse"
                                                            href="#my-account-2" aria-expanded="false"
                                                            class="collapsed">Check payments</a></h4>
                                                </div>
                                                <div id="my-account-2" class="panel-collapse collapse"
                                                    data-bs-parent="#faq">

                                                    <div class="panel-body">
                                                        <p>Please send a check to Store Name, Store Street, Store Town,
                                                            Store State / County, Store Postcode.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default single-my-account m-0">
                                                <div class="panel-heading my-account-title">
                                                    <h4 class="panel-title"><a data-bs-toggle="collapse"
                                                            href="#my-account-3">Cash on delivery</a></h4>
                                                </div>
                                                <div id="my-account-3" class="panel-collapse collapse"
                                                    data-bs-parent="#faq">

                                                    <div class="panel-body">
                                                        <p>Please send a check to Store Name, Store Street, Store Town,
                                                            Store State / County, Store Postcode.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="Place-order mt-25">
                                <input type="submit" class="btn btn-danger" value="Place Order">
                            </div>
                        </div>
                    </div>

            </div>
        </form>
        </div>
    </div>
    <!-- checkout area end -->

@endsection
@section('footer_script')
<script>
$(document).ready(function() {
    $('#js-example-basic-single').select2();
    $('#js-example-basic-single').change(function(){
        $('#city_drop_down').attr('disabled', false);
        var Country_id =$(this).val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({

            type : 'POST',
            url  : 'checkout/get/up',
            data : {country_id:Country_id},
            success: function(data){

                $('#city_drop_down').html(data);
            }
        });


    });
    $('#city_drop_down').select2();
});
</script>
@endsection
