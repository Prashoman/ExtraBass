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
                                        No Paid Yet
                                        @else
                                        Paid
                                    @endif
                                </td>
                                <td>
                                    @if ($order_summery->payment_option == 1)
                                       Cash on Delivery
                                        @else
                                       On Line Payment
                                    @endif
                                </td>
                                <td>{!!   DNS2D::getBarcodeHTML('Prashoman', 'QRCODE', 3,3) !!}</td>
                                <td>
                                    <a href="{{ route('orders.details',Crypt::encrypt($order_summery->id)) }}" class="btn btn-sm btn-primary">Details</a>
                                    <a href="{{ route('invoice.download',$order_summery->id) }}" class="btn btn-sm btn-success">Invoice Download</a>
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
