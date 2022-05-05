@extends('layouts.app')

@section('content')

<div class="card-box p-5">
    <h2 class="text-uppercase text-center pb-4">
        <a href="index.html" class="text-success">
            <span><img src="{{asset('backend')}}/assets/images/logo.png" alt="" height="26"></span>
        </a>
    </h2>

    <form class="" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group m-b-20 row">
            <div class="col-12">
                <label for="emailaddress">Email address</label>
                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"   placeholder="Enter your email">
                @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>
        </div>

        <div class="form-group row m-b-20">
            <div class="col-12">

                <label for="password">Password</label>
                <input class="form-control @error('password') is-invalid @enderror" type="password" id="password" placeholder="Enter your password" name="password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>



        <div class="form-group row text-center m-t-10">
            <div class="col-12">
                <button class="btn btn-block btn-custom waves-effect waves-light" type="submit">Sign In</button>
            </div>
        </div>

    </form>

    <div class="row m-t-50">
        <div class="col-sm-12 text-center">
            <p class="text-muted">Don't have an account? <a href="{{route('register')}}" class="text-dark m-l-5"><b>Sign Up</b></a></p>
        </div>
    </div>

</div>

@endsection
