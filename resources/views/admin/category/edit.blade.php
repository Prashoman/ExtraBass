@extends('admin.dashboardmaster')

@section('content')
<div class="card-box">
    <h4 class="m-t-0 header-title">Edit {{$category->category_name}} Category</h4>


    <div class="row">
        <div class="col-12">
            <div class="p-20">
                <form class="form-horizontal" role="form" action="{{ route('category.update', $category->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Category Status</label>
                        <div class="col-10">
                            <select class="form-control" name="category_status" id="">
                                <option value="show" {{($category->status == 'show') ? 'selected':''}}>show</option>
                                <option value="hide" {{($category->status == 'hide') ? 'selected':''}}>hide</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Category Name</label>
                        <div class="col-10">
                            <input type="text" name="category_name" class="form-control" value="{{$category->category_name}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Category Tittle</label>
                        <div class="col-10">
                            <input type="text" name="category_tittle" class="form-control" value="{{$category->category_tittle}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Old Category Photo</label>
                        <div class="col-10">
                            <img width="120" src="{{asset('uploads/category_photos').'/'.$category->category_photo}}" alt="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">New Category Photo</label>
                        <div class="col-10">
                            <input type="file" name="new_category_photo" class="form-control">
                        </div>
                    </div>
                    <button class="btn btn-sm btn-success" type="submit">Edit {{$category->category_name}} Category</button>


                </form>
            </div>
        </div>

    </div>
    <!-- end row -->

</div>
@endsection
