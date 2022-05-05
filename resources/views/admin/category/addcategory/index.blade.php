@extends('admin.dashboardmaster')

@section('content')
<div class="card-box">
    <h4 class="m-t-0 header-title">Add Category</h4>


    <div class="row">
        <div class="col-12">
            <div class="p-20">
                <form class="form-horizontal" role="form" action="{{ route('category.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Category Name</label>
                        <div class="col-10">
                            <input type="text" name="category_name" class="form-control" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Category Tittle</label>
                        <div class="col-10">
                            <input type="text" name="category_tittle" class="form-control">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-2 col-form-label">Default file input</label>
                        <div class="col-10">
                            <input type="file" name="category_photo" class="form-control">
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
