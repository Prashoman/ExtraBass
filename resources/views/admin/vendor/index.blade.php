@extends('admin.dashboardmaster')

@section('content')
<div class="card-box">
    <h4 class="m-t-0 header-title">Add Vendor</h4>


    <div class="row">
        <div class="col-12">
            <div class="p-20">
                <form class="form-horizontal" role="form" action="{{ route('vendor.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Vendor Name</label>
                        <div class="col-10">
                            <input type="text" name="vendor_name" class="form-control" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">vendor phone</label>
                        <div class="col-10">
                            <input type="text" name="vendor_phone" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">vendor email</label>
                        <div class="col-10">
                            <input type="email" name="vendor_email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">vendor Address</label>
                        <div class="col-10">
                            <input type="text" name="vendor_address" class="form-control">
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
