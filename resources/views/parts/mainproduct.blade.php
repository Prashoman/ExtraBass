<div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up"
                                    data-aos-delay="400">
                                    <!-- Single Prodect -->
                                        <div class="product">
                                            <div class="thumb">
                                                <a href="single-product.html" class="image">
                                                    <img src="{{asset('uploads/product_photos')}}/{{$all_product->product_photo}}" alt="Product" />
                                                </a>
                                                <span class="badges">

                                                </span>
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
                                                        <span class="star" style="width: 80%"></span>
                                                    </span>
                                                    <span class="rating-num">( 4 Review )</span>
                                                </span>
                                                <h5 class="title"><a href="{{ route('product.details',$all_product->slug )}}">{{$all_product->product_name}}</a>
                                                </h5>
                                                <span class="price">
                                                    <span class="new">${{$all_product->product_price}}</span>


                                                </span>
                                                <span class="price">
                                                    <span class="new">Vendor: {{\App\Models\User::find($all_product->user_id)->name}}</span>


                                                </span>
                                            </div>
                                        </div>
                                        <!-- Single Prodect -->
                                    </div>
