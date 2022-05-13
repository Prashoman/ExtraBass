@extends('admin.dashboardmaster')

@section('content')
<div class="card-box">
    <h4 class="m-t-0 header-title">Add Product</h4>


    <div class="row">
        <div class="col-12">
            <div class="p-20">
                <form class="form-horizontal" role="form" action="{{ route('product.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Category</label>
                        <div class="col-10">
                            <select name="category_id" id="" class="form-control">
                                <option value="">--Select any--</option>
                                @foreach ($categoris as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Product Name</label>
                        <div class="col-10">
                            <input type="text" name="product_name" class="form-control" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Product Price</label>
                        <div class="col-10">
                            <input type="number" name="product_price" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Product code</label>
                        <div class="col-10">
                            <input type="text" name="product_code" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Product Quentity</label>
                        <div class="col-10">
                            <input type="number" name="product_quentity" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Sort description</label>
                        <div class="col-10">
                        <textarea name="sort_description" class="form-control" rows="2"></textarea>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Long description</label>
                        <div class="col-10">
                        <textarea name="long_description" class="form-control" rows="4"></textarea>
                        </div>

                    </div>


                    <div class="form-group row">
                        <label class="col-2 col-form-label">Product Photo</label>
                        <div class="col-10">
                            <input type="file" name="product_photo" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Product Thanbails Photo</label>
                        <div class="col-10">
                            <input type="file" name="product_thanbails[]" class="form-control" multiple>
                        </div>
                    </div>
                    <button class="btn btn-sm btn-success" type="submit">Submit</button>


                </form>
            </div>
        </div>

    </div>
    <!-- end row -->

</div>
@endsection
