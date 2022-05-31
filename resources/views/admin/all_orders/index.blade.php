@extends('admin.dashboardmaster')

@section('content')
<div class="card-box">
    <h4 class="m-t-0 header-title">All List</h4>


    <div class="row">
        <div class="col-12">
            <div class="card-box">


                <table class="table">
                    <thead >
                    <tr>
                        <th>Sl No.</th>
                        <th>Grand Total</th>
                        <th>Status</th>
                        <th>Payment Option</th>
                        <th>BeCode</th>

                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($Order_summeries as $order_summery)
                            <tr>
                                <th scope="row">{{$loop->index+1}}</th>
                                <td>{{$order_summery->grand_total}}</td>
                                <td>
                                    @if ($order_summery->payment_status == 0)
                                        <span class="badge badge-danger">No Paid Yet</span>

                                        @else
                                        <span class="badge badge-primary">Paid</span>

                                    @endif
                                </td>
                                <td>
                                    @if ($order_summery->payment_option == 1)
                                        <span class="badge badge-info">Cash on Delivery</span>

                                        @else
                                        <span class="badge badge-secondary">On Line Payment</span>

                                    @endif
                                </td>
                                <td>
                                    @if ($order_summery->delivared == 0)
                                        <span class="badge badge-info">Procesing</span>

                                        @else
                                        <span class="badge badge-secondary">Delivared</span>

                                    @endif
                                </td>
                                <td>
                                    @if ($order_summery->payment_status == 1 && $order_summery->delivared == 0)
                                    <a href="{{ route('order.delivared',$order_summery->id) }}" class="btn btn-sm btn-primary">Delivared</a>
                                    @endif



                                </td>


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
