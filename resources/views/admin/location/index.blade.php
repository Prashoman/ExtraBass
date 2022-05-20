@extends('admin.dashboardmaster')

@section('content')
<div class="card-box">
    <h4 class="m-t-0 header-title">Add Location</h4>


    <div class="row">
        <div class="col-12">
            <div class="p-20">
                <form class="form-horizontal" role="form" action="{{ route('location.active') }}" method="POST" >
                    @csrf

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Country</label>
                        <div class="col-10">
                            <select name="country[]" id="country_drop_active" class="form-control" multiple>
                                <option value="">--Select any--</option>
                                @foreach ($countries as $country)
                                    <option {{($country->status == 'active') ? 'selected':''}}  value="{{$country->id}}">{{$country->name}} </option>
                                @endforeach



                            </select>
                        </div>
                    </div>

                    <button class="btn btn-sm btn-success" type="submit">Active Location</button>


                </form>
            </div>
        </div>

    </div>
    <!-- end row -->

</div>
@endsection

@section('script_footer')

<script>
    $(document).ready(function() {
    $('#country_drop_active').select2();
});
</script>

@endsection
