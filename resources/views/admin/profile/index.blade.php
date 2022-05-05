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
                <li class="breadcrumb-item active">App-Profile</li>
              </ol>
            </div>
          </div>
        </div>
        <!-- /# column -->
      </div>
      <!-- /# row -->
      <section id="main-content">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="user-profile">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="user-photo m-b-30">

                        <img class="img-fluid" src="{{asset('uploads/profile_photos')}}/{{auth()->user()->profile_photo}}" alt="//" />
                      </div>

                    </div>
                    <div class="col-lg-8">
                      <div class="user-profile-name ml-5">{{auth::user()->name}}</div>
                        <div class="user-job-title ml-5">Dashboard Controler</div>

                        <div class="user-profile-name ml-5">{{auth::user()->email}}</div>
                        <div class="user-job-title ml-5">User Email</div>

                        <div class="user-profile-name ml-5">{{auth::user()->created_at->diffForHumans()}}</div>
                        <div class="user-job-title ml-5">Created At</div>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6">
                          <div class="card">
                              <div class="card-header">
                                  <h5 class="card-tittle text-center">Change Name</h5>
                              </div>
                          </div>
                          <div class="card-body">
                            @if (session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif
                              <form action="{{route('change.name')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" name="name" value="{{auth()->user()->name}}" class="form-control">
                                </div>
                                  <div class="mt-3">
                                    <button type="submit"class="btn btn-sm btn-info">Change Name</button>
                                  </div>

                              </form>
                          </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-tittle text-center">Change Photo</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (session('profile_success'))
                                <div class="alert alert-success">
                                    {{session('profile_success')}}
                                </div>
                            @endif
                            <form action="{{route('change.photo')}}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="mb-3">
                                <label for="" class="form-label">Choice profile Photo</label>
                                <input type="file" name="profile_photo"  class="form-control">
                            </div>
                                <div class="mt-3">
                                  <button type="submit"class="btn btn-sm btn-info">Change Photo</button>
                                </div>

                            </form>
                        </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-tittle">Change Password</h3>
                        </div>
                        <div class="card-body">
                            @if (session('pass_succes'))
                                <div class="alert alert-success">
                                    {{session('pass_succes')}}
                                </div>
                            @endif
                            @if (session('match_success'))
                                <div class="alert alert-danger">
                                    {{session('match_success')}}
                                </div>
                            @endif

                            @if (session('wrong_success'))
                                <div class="alert alert-danger">
                                    {{session('wrong_success')}}
                                </div>
                            @endif
                            <form action="{{route('change.password')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-4">
                                        <label for="" class="form-label">Curennt Password</label>
                                        <input type="password" name="curent_pass"  class="form-control">
                                    </div>
                                    <div class="mb-3 col-4">
                                        <label for="" class="form-label">New Password</label>
                                        <input type="password" name="pass"  class="form-control">
                                    </div>
                                    <div class="mb-3 col-4">
                                        <label for="" class="form-label">Confirm Password</label>
                                        <input type="password" name="pass_confrim"  class="form-control">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-sm btn-info">Change</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /# row -->

      </section>
    </div>
  </div>
</div>
@endsection
