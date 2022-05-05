@extends('admin.dashboardmaster')

@section('content')
<div class="card-box">
    <h4 class="m-t-0 header-title">All Category</h4>


    <div class="row">
        <div class="col-12">
            <div class="card-box">


                <table class="table">
                    <thead >
                    <tr>
                        <th>Sl No.</th>
                        <th>Product Name</th>
                        <th>Product Price</th>

                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($vendor_products as $vendor_product)
                            <tr>
                                <th scope="row">{{$loop->index+1}}</th>
                                <td>{{$vendor_product->product_name}}</td>
                                <td>{{$vendor_product->product_price}}</td>
                                {{-- <td><img width="120" src="{{asset('uploads/category_photos').'/'.$category->category_photo}}" alt=""></td> --}}

                                {{-- <td><a href="{{ route('category.edit', $category->id)}}" class="btn btn-sm btn-success">Edit</a>
                                <button class="btn btn-sm btn-danger" type="button" onclick="if(confirm('Are sure dalate! this item.')){
                                        event.preventDefault();
                                        document.getElementById('delete-form {{$category->id}}').submit();
                                      }else{
                                        event.preventDefault();
                                      }"><i class="material-icons">delete</i></button>

                                      <form id="delete-form {{$category->id}}" action="{{route('category.destroy',$category->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                      </form></td> --}}

                            </tr>

                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- end row -->

</div>
@endsection
