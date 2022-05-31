@extends('layouts.app_fontend')

@section('body')
<!-- OffCanvas Wishlist Start -->

<!-- OffCanvas Wishlist End -->


<!-- OffCanvas Menu Start -->

<!-- OffCanvas Menu End -->


<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 text-center">
                <h2 class="breadcrumb-title">Products</h2>
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
                    <li class="breadcrumb-item active">{{$products->product_name}}</li>

                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>

<!-- breadcrumb-area end -->

<!-- Product Details Area Start -->
<div class="product-details-area pt-100px pb-100px">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">
                <!-- Swiper -->
                <div class="swiper-container zoom-top">
                    <div class="swiper-wrapper">
                        @foreach ( App\Models\Product_thanbail::where('product_id', $products->id)->get() as $thambails )
                            <div class="swiper-slide zoom-image-hover">
                                <img class="img-responsive m-auto" src="{{asset('uploads/product_thanbails')}}/{{$thambails->product_thanbails_photo}}"
                                    alt="">
                            </div>
                        @endforeach


                    </div>
                </div>
                <div class="swiper-container zoom-thumbs mt-3 mb-3">
                    <div class="swiper-wrapper">
                        @foreach ( App\Models\Product_thanbail::where('product_id', $products->id)->get() as $thambails )
                            <div class="swiper-slide">
                                <img class="img-responsive m-auto" src="{{asset('uploads/product_thanbails')}}/{{$thambails->product_thanbails_photo}}"
                                    alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                @if(session('stockout'))
                    <div class="alert alert-danger">
                        {{session('stockout')}}
                    </div>
                @endif

                <div class="product-details-content quickview-content">
                    <h2>{{$products->product_name}}</h2>
                    <span>Avilable: {{$products->quentity}}</span>
                    <div class="pricing-meta">
                        <ul>
                            <li class="old-price not-cut">${{$products->product_price}}</li>
                        </ul>

                    </div>
                    <style>
                         .ratings{display:flex;align-items:flex-start;margin-bottom:4px}
                          .ratings .rating-wrap{font-size:14px;line-height:1;position:relative;color:#e4e4e4;white-space:nowrap}
                           .ratings .rating-wrap::before{font-family:FontAwesome;content:"    "}
                          .ratings .rating-wrap .star{position:absolute;top:0;left:0;overflow:hidden;color:#ffde00}
                           .ratings .rating-wrap .star::before{font-family:FontAwesome;content:"    "}
                        .ratings .rating-num{font-size:14px;line-height:1;margin-left:6px;color:#9f9e9e}
                    </style>
                    <span class="ratings">
                        <span class="rating-wrap">

                            <span class="star" style="width: {{RtingProduct($products->id)*20}}%"></span>
                        </span>
                        <span class="rating-num">({{ReviewProduct($products->id)}} )</span>
                    </span>

                    <p class="mt-30px mb-0">{{$products->sort_description}}</p>
                    <form action="{{ route('cart.add', $products->id)}}" method="POST">
                        @csrf
                        <div class="pro-details-quality">
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                            </div>
                            <div class="pro-details-cart">
                                <button class="add-cart" type="submit"> Add To
                                    Cart</button>
                            </div>
                    </form>
                        @auth

                            <div class="pro-details-compare-wishlist pro-details-wishlist ">
                                @if ($wishlist)
                                    <a  href="{{ route('wishlist.remove', $wishlist_id)}}"><i class="fa fa-heart text-danger"></i></a>

                                    @else
                                    <a  href="{{ route('wishlist.insert', $products->id )}}"><i class="fa fa-heart"></i></a>
                                @endif

                            </div>
                        @else
                            <div class="pro-details-compare-wishlist pro-details-wishlist ">
                                <a  data-bs-toggle="modal"
                                data-bs-target="#loginActive"><i class="pe-7s-like"></i></a>
                            </div>
                        @endauth




                    </div>
                    <div class="pro-details-sku-info pro-details-same-style  d-flex">
                        <span>SKU: </span>
                        <ul class="d-flex">
                            <li>
                                <a href="#">{{$products->product_code}}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="pro-details-categories-info pro-details-same-style d-flex">
                        <span>Category: </span>
                        <ul class="d-flex">
                            <li>
                                <a href="{{ route('category.wish', $products->category_id)}}">{{$products->relationTocategory->category_name}}
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="pro-details-social-info pro-details-same-style d-flex">
                        <span>Share: </span>
                        <ul class="d-flex">
                            <li>
                                <a href="http://www.facebook.com/sharer.php?u=http://www.example.com" target="_blank"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="http://twitter.com/share?url=http://www.example.com&text=Simple Share Buttons&hashtags=simplesharebuttons" target="_blank"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-google"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- product details description area start -->
<div class="description-review-area pb-100px" data-aos="fade-up" data-aos-delay="200">
    <div class="container">
        <div class="description-review-wrapper">
            <div class="description-review-topbar nav">
                <a data-bs-toggle="tab" href="#des-details2">Information</a>
                <a class="active" data-bs-toggle="tab" href="#des-details1">Description</a>
                <a data-bs-toggle="tab" href="#des-details3">{{ReviewProduct($products->id)}}</a>
            </div>
            <div class="tab-content description-review-bottom">
                <div id="des-details2" class="tab-pane">
                    <div class="product-anotherinfo-wrapper text-start">
                        <ul>
                            <li><span>Weight</span> 400 g</li>
                            <li><span>Dimensions</span>10 x 10 x 15 cm</li>
                            <li><span>Materials</span> 60% cotton, 40% polyester</li>
                            <li><span>Other Info</span> American heirloom jean shorts pug seitan letterpress</li>
                        </ul>
                    </div>
                </div>
                <div id="des-details1" class="tab-pane active">
                    <div class="product-description-wrapper">
                        <p>
                            {{$products->long_description}}
                        </p>
                    </div>
                </div>
                <div id="des-details3" class="tab-pane">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="review-wrapper">
                                @foreach ($CommentRatins as $comment)
                                <div class="single-review">
                                    <div class="review-img">
                                        <img width="50" src="{{asset('uploads/profile_photos')}}/{{$comment->relationRatingwithuser->profile_photo}}" alt="" />
                                    </div>
                                    <div class="review-content">
                                        <div class="review-top-wrap">
                                            <div class="review-left">
                                                <div class="review-name">
                                                    <h4>{{$comment->relationRatingwithuser->name}}</h4>
                                                </div>

                                            </div>


                                        </div>
                                        <span class="ratings">
                                            <span class="rating-wrap">

                                                <span class="star" style="width: {{$comment->rate*20}}%"></span>
                                            </span>
                                            <span class="rating-num"></span>
                                        </span>
                                        <div class="review-bottom">
                                            <p>
                                                {{$comment->massege}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach


                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product details description area end -->

<!-- Related product Area Start -->
<div class="related-product-area pb-100px">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center mb-30px0px line-height-1">
                    <h2 class="title m-0">Related Products</h2>
                </div>
            </div>
        </div>
        <div class="new-product-slider swiper-container slider-nav-style-1 small-nav">
            <div class="new-product-wrapper swiper-wrapper">
                @forelse ($related_products as $related_product )
                <div class="new-product-item swiper-slide">
                    <!-- Single Prodect -->
                    <div class="product">
                        <div class="thumb">
                            <a href="single-product.html" class="image">
                                <img src="{{asset('uploads/product_photos')}}/{{$related_product->product_photo}}" alt="Product" />

                            </a>

                            <div class="actions">
                                <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                                        class="pe-7s-like"></i></a>
                                <a href="#" class="action quickview" data-link-action="quickview"
                                    title="Quick view" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"><i class="pe-7s-search"></i></a>
                                <a href="compare.html" class="action compare" title="Compare"><i
                                        class="pe-7s-refresh-2"></i></a>
                            </div>
                            <button title="Add To Cart" class=" add-to-cart">Add
                                To Cart</button>
                        </div>
                        <div class="content">
                            <span class="ratings">
                                <span class="rating-wrap">
                                    <span class="star" style="width: 100%"></span>
                                </span>
                                <span class="rating-num">( 5 Review )</span>
                            </span>
                            <h5 class="title"><a href="{{ route('product.details',$related_product->slug )}}" >{{$related_product->product_name}}
                                </a>

                            </h5>
                            <span class="price">
                                <span class="new">${{$related_product->product_price}}</span>
                            </span>
                            <span class="price">
                                <span class="new">Vendor:{{\App\Models\User::find($related_product->user_id)->name}}</span>
                            </span>
                        </div>
                    </div>
                </div>
                @empty
                    <h3>No Product</h3>
                @endforelse


            </div>
            <!-- Add Arrows -->
            <div class="swiper-buttons">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
</div>
<!-- Related product Area End -->
@endsection
