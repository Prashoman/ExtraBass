@extends('layouts.app')

@section('content')

<div class="card-box p-5">
    <h2 class="text-uppercase text-center pb-4">
        <a href="index.html" class="text-success">
            <span><img src="{{asset('backend')}}/assets/images/logo.png" alt="" height="26"></span>
        </a>
    </h2>

    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            @csrf
        <div class="form-group row m-b-20">
            <div class="col-12">
                <label for="username">Full Name<span class="text-danger">*</span></label>
                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" id="username"  placeholder="Michael Zenaty">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row m-b-20">
            <div class="col-12">
                <label for="emailaddress">Email address<span class="text-danger">*</span></label>
                <input class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" type="email" id="emailaddress"  placeholder="john@deo.com">


                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row m-b-20">
            <div class="col-12">
                <label for="password">Phone</label>
                <input class="form-control" name="phone_number" type="text"  id="password" placeholder="Enter your phone number">

            </div>
        </div>
        <div class="form-group row m-b-20">
            <div class="col-12">
                <label for="password">Password<span class="text-danger">*</span></label>
                <input class="form-control @error('password') is-invalid @enderror" name="password" type="password"  id="password" placeholder="Enter your password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row m-b-20">
            <div class="col-12">
                <label for="password">Confirm Password<span class="text-danger">*</span></label>
                <input class="form-control" name="password_confirmation" type="password"  id="password" placeholder="Enter your Confirm password">
            </div>
        </div>



        <div class="form-group row text-center m-t-10">
            <div class="col-12">
                <button class="btn btn-block btn-custom waves-effect waves-light" type="submit">Sign Up Free</button>
            </div>
        </div>

    </form>

    <div class="row m-t-50">
        <div class="col-sm-12 text-center">
            <p class="text-muted">Already have an account?  <a href="{{route('login')}}" class="text-dark m-l-5"><b>Login</b></a></p>
        </div>
    </div>

</div>

@endsection
