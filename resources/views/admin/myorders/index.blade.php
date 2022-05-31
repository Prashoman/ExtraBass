@extends('admin.dashboardmaster')

@section('content')
<div class="card-box">
    <h4 class="m-t-0 header-title">My Order Details</h4>


    <div class="row">
        <div class="col-12">
            <div class="card-box">
                @if ($order_summeris->payment_status == 1 && $order_summeris->delivared == 0)
                    <a href="{{ route('order.delivared',$order_summeris->id) }}" class="btn btn-sm btn-primary">Delivared</a>
                @endif


                <table class="table table-bordered">
                    <thead>
                        <tr>

                        <th scope="col">User name</th>
                        <th scope="col">{{$order_summeris->relationwithuser->name}}</th>
                    </tr>
                      <tr>

                        <th scope="col">cupon_name</th>
                        <th scope="col">{{$order_summeris->cupon_name}}</th>
                    </tr>
                    <tr>
                        <th scope="col">cart_total</th>
                        <th scope="col">{{$order_summeris->cart_total}}</th>


                    </tr>
                    <tr>
                        <th scope="col">discount</th>
                        <th scope="col">{{$order_summeris->discount}}</th>
                    </tr>
                    <tr>
                        <th scope="col">sub_total</th>
                        <th scope="col">{{$order_summeris->sub_total}}</th>
                    </tr>
                    <tr>
                        <th scope="col">shiping</th>
                        <th scope="col">{{$order_summeris->shiping}}</th>
                    </tr>
                    <tr>
                        <th scope="col">grand_total</th>
                        <th scope="col">{{$order_summeris->grand_total}}</th>

                    </tr>
                    <tr>
                        <th scope="col">payment_status</th>
                        <th scope="col">
                            @if ($order_summeris->payment_status == 0)
                                        <span class="badge badge-danger">No Paid Yet</span>

                                        @else
                                        <span class="badge badge-primary">Paid</span>

                            @endif
                        </th>
                    </tr>
                    <tr>
                        <th scope="col">payment_option</th>
                        <th scope="col">
                            @if ($order_summeris->payment_option == 1)
                                        <span class="badge badge-info">Cash on Delivery</span>

                                        @else
                                        <span class="badge badge-secondary">On Line Payment</span>

                            @endif
                        </th>
                    </tr>
                    <tr>
                        <th scope="col">delivared</th>
                        <th scope="col">
                            @if ($order_summeris->delivared == 0)
                                        <span class="badge badge-info">Procesing</span>

                                        @else
                                        <span class="badge badge-secondary">Delivared</span>

                            @endif
                        </th>

                    </tr>


                    <tr>

                        <th >created_at</th>
                        <th >{{$order_summeris->created_at}}</th>
                      </tr>
                    </thead>

                  </table>



            </div>
        </div>

    </div>
    <!-- end row -->

    <div class="row">
        @foreach ($order_details as $order_detail)
        <div class="col-12 mt-3">
            <div class="card bg-light ">
                <div class="card-body">
                  <h5 class="card-title">Order Details</h5>
                  <table class="table table-bordered">
                    <thead>
                        <tr>

                        <th scope="col">Vendor Name</th>
                        <th scope="col">{{$order_detail->relationorder_detailswithuser->name}}</th>
                    </tr>
                      <tr>

                        <th scope="col">Product Name</th>
                        <th scope="col">{{$order_detail->relationwithproduct->product_name}}</th>
                    </tr>
                    <tr>

                        <th scope="col">Product Price</th>
                        <th scope="col">{{$order_detail->relationwithproduct->product_price}}</th>
                    </tr>
                    <tr>

                        <th scope="col">Product Image</th>
                        <th scope="col">
                            <img width="120" src="{{asset('uploads/product_photos')}}/{{$order_detail->relationwithproduct->product_photo}}" alt="not found">
                            </th>

                    </tr>
                    <tr>

                        <th scope="col">Product Amount</th>
                        <th scope="col">{{$order_detail->amount}}</th>
                    </tr>
                </thead>
            </table>
                </div>
              </div>
              <hr>
              <style>
            .rate {
                float: left;
                height: 46px;
                padding: 0 10px;
            }
            .rate:not(:checked) > input {
                position:absolute;
                opacity: 0;
            }
            .rate:not(:checked) > label {
                float:right;
                width:1em;
                overflow:hidden;
                white-space:nowrap;
                cursor:pointer;
                font-size:30px;
                color:#ccc;
            }
            .rate:not(:checked) > label:before {
                content: '★ ';
            }
            .rate > input:checked ~ label {
                color: #ffc700;
            }
            .rate:not(:checked) > label:hover,
            .rate:not(:checked) > label:hover ~ label {
                color: #deb217;
            }
            .rate > input:checked + label:hover,
            .rate > input:checked + label:hover ~ label,
            .rate > input:checked ~ label:hover,
            .rate > input:checked ~ label:hover ~ label,
            .rate > label:hover ~ input:checked ~ label {
                color: #c59b08;
            }

              </style>
              <form action="{{ route('rating',$order_detail->id)}}" method="POST">
                @csrf
                  <div class="form-group">
                    <textarea name="massege" class="form-control" id="" cols="30" rows="4"></textarea>
                  </div>
                  <div class="form-group">
                    <div class="rate">
                        <input type="radio" id="star_5{{$order_detail->id}}" name="rate" value="5" />
                        <label for="star_5{{$order_detail->id}}" title="text">5 stars</label>
                        <input type="radio" id="star_4{{$order_detail->id}}" name="rate" value="4" />
                        <label for="star_4{{$order_detail->id}}" title="text">4 stars</label>
                        <input type="radio" id="star_3{{$order_detail->id}}" name="rate" value="3" />
                        <label for="star_3{{$order_detail->id}}" title="text">3 stars</label>
                        <input type="radio" id="star_2{{$order_detail->id}}" name="rate" value="2" />
                        <label for="star_2{{$order_detail->id}}" title="text">2 stars</label>
                        <input type="radio" id="star_1{{$order_detail->id}}" name="rate" value="1" />
                        <label for="star_1{{$order_detail->id}}" title="text">1 star</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-success" type="submit"> submit</button>
                  </div>

              </form>
        </div>
        @endforeach



    </div>

</div>
@endsection
