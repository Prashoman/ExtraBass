@extends('admin.dashboardmaster')

@section('content')

<div class="content">
    <div class="container-fluid">


        <!-- end row -->
        {{ url()->previous() }}

        @if (auth()->user()->role == '1')
            <div class="alert alert-success">
            <p>Welcome Costumer</p>
            </div>

            @else
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <h4 class="header-title mb-4">ExtraBass Overview</h4>

                        <div class="row">
                            <div class="col-sm-6 col-lg-6 col-xl-3">
                                <div class="card-box mb-0 widget-chart-two">
                                    <div class="float-right">
                                        <div style="display:inline;width:80px;height:80px;"><canvas width="120" height="120" style="width: 80px; height: 80px;"></canvas><input data-plugin="knob" data-width="80" data-height="80" data-linecap="round" data-fgcolor="#0acf97" value="{{$all_user}}" data-skin="tron" data-angleoffset="180" data-readonly="true" data-thickness=".1" readonly="readonly" style="width: 44px; height: 26px; position: absolute; vertical-align: middle; margin-top: 26px; margin-left: -62px; border: 0px; background: none; font: bold 16px Arial; text-align: center; color: rgb(10, 207, 151); padding: 0px; appearance: none;"></div>
                                    </div>
                                    <div class="widget-chart-two-content">
                                        <p class="text-muted mb-0 mt-2">All Users</p>
                                        <h3 class="">
                                            <i class="fa fa-users"></i>{{$all_user}}
                                        </h3>

                                    </div>

                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-6 col-xl-3">
                                <div class="card-box mb-0 widget-chart-two">
                                    <div class="float-right">
                                        <div style="display:inline;width:80px;height:80px;"><canvas width="120" height="120" style="width: 80px; height: 80px;"></canvas><input data-plugin="knob" data-width="80" data-height="80" data-linecap="round" data-fgcolor="#f9bc0b" value="{{$all_admin}}" data-skin="tron" data-angleoffset="180" data-readonly="true" data-thickness=".1" readonly="readonly" style="width: 44px; height: 26px; position: absolute; vertical-align: middle; margin-top: 26px; margin-left: -62px; border: 0px; background: none; font: bold 16px Arial; text-align: center; color: rgb(249, 188, 11); padding: 0px; appearance: none;"></div>
                                    </div>
                                    <div class="widget-chart-two-content">
                                        <p class="text-muted mb-0 mt-2">All Admin</p>
                                        <h3 class=""><i class="fa fa-user-secret"></i>{{$all_admin}}
                                        </h3>
                                    </div>

                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-6 col-xl-3">
                                <div class="card-box mb-0 widget-chart-two">
                                    <div class="float-right">
                                        <div style="display:inline;width:80px;height:80px;"><canvas width="120" height="120" style="width: 80px; height: 80px;"></canvas><input data-plugin="knob" data-width="80" data-height="80" data-linecap="round" data-fgcolor="#f1556c" value="{{$all_customer}}" data-skin="tron" data-angleoffset="180" data-readonly="true" data-thickness=".1" readonly="readonly" style="width: 44px; height: 26px; position: absolute; vertical-align: middle; margin-top: 26px; margin-left: -62px; border: 0px; background: none; font: bold 16px Arial; text-align: center; color: rgb(241, 85, 108); padding: 0px; appearance: none;"></div>
                                    </div>
                                    <div class="widget-chart-two-content">
                                        <p class="text-muted mb-0 mt-2">All Customer</p>
                                        <h3 class="">
                                            <i class="fa fa-users"></i>{{$all_customer}}</h3>
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6 col-xl-3">
                                <div class="card-box mb-0 widget-chart-two">
                                    <div class="float-right">
                                        <div style="display:inline;width:80px;height:80px;"><canvas width="120" height="120" style="width: 80px; height: 80px;"></canvas><input data-plugin="knob" data-width="80" data-height="80" data-linecap="round" data-fgcolor="#f1556c" value="{{$all_vendor}}" data-skin="tron" data-angleoffset="180" data-readonly="true" data-thickness=".1" readonly="readonly" style="width: 44px; height: 26px; position: absolute; vertical-align: middle; margin-top: 26px; margin-left: -62px; border: 0px; background: none; font: bold 16px Arial; text-align: center; color: rgb(241, 85, 108); padding: 0px; appearance: none;"></div>
                                    </div>
                                    <div class="widget-chart-two-content">
                                        <p class="text-muted mb-0 mt-2">All Vendor</p>
                                        <h3 class="">
                                            <i class="fa fa-arrows"></i>{{$all_vendor}}</h3>
                                    </div>

                                </div>
                            </div>


                        </div>
                        <!-- end row -->
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card-box">
                        <h4 class="header-title">Order Overview</h4>

                        <div id="website-stats" style="height: 350px;" class="flot-chart mt-5"></div>

                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card-box">
                        <h4 class="header-title">Sales Overview</h4>

                        <div id="combine-chart">
                            <div id="combine-chart-container" class="flot-chart mt-5" style="height: 350px;">
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        @endif

        <!-- end row -->



        <!-- end row -->




    </div> <!-- container -->

</div> <!-- content -->

@endsection
