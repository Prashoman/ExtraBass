@extends('admin.dashboardmaster')

@section('content')
<div class="card-box">
    <h4 class="m-t-0 header-title">Add Cupon</h4>


    <div class="row">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-12">
            <div class="p-20">
                <form class="form-horizontal" role="form" action="{{ route('cupon.store')}}" method="POST" >
                    @csrf
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Cupon Name</label>
                        <div class="col-10">
                            <input type="text" name="cupon_name" class="form-control" placeholder="Enter Cupon Name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Cupon Limit</label>
                        <div class="col-10">
                            <input type="number" name="limit" class="form-control" placeholder="Enter Cupon Limit">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Cupon Validatey</label>
                        <div class="col-10">
                            <input type="date" name="validatey" class="form-control" placeholder="Enter Cupon Validatey">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Cupon Discount Persentig</label>
                        <div class="col-10">
                            <input type="number" name="discount" class="form-control" placeholder="Enter Cupon Discount">
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
