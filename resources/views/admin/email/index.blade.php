@extends('admin.dashboardmaster')

@section('content')

<div class="main">
    <div class="container-fluid">
      <div class="row">

        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
          <div class="page-header">
            <div class="page-title">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Email Offer</li>
              </ol>
            </div>
          </div>
        </div>
        <!-- /# column -->
      </div>
      <!-- /# row -->

    </div>
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-tittle">Coutomers Email </h3>
                </div>
                <div class="card-box">



                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Active</th>
                        </tr>
                        </thead>

                        <tbody>

                            @foreach ( $customers as $customer)
                                <tr>
                                    <th>{{$loop->index+1}}</th>
                                    <td>{{$customer->name}}</td>
                                    <td>{{$customer->email}}</td>
                                    <td>
                                        <a href="{{(route('send.email',$customer->id))}}" class="btn btn-sm btn-success">Send</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection
