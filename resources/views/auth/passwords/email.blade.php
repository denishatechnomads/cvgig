@extends('admin.layout.authentication')
@section('title', 'Forget Password')
@section('content')
    <div class="row">
        <div class="col-lg-4 col-sm-12">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form class="card auth_form" method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="header">
                    <img class="logo" src="{{asset('assets/images/logo.png')}}" alt="">
                    <h5>Forgot Password?</h5>
                    <span>Enter your e-mail address below to reset your password.</span>
                </div>
                <div class="body">
                    <div class="input-group mb-3">
                        <input id="email" type="email"
                               class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required autocomplete="email"
                               autofocus placeholder="Enter Email">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">SUBMIT</button>
                    <div class="signin_with mt-3">
                        If you have already password?
                        <a class="link" href="{{ route('login') }}">Log in</a>
                    </div>
                </div>
            </form>
                <div class="copyright text-center">
                    &copy;<script>document.write(new Date().getFullYear())</script>
                    ,
                    <span>Designed by <a href="https://cvgig.com/" target="_blank">CVGig</a></span>
                </div>
        </div>
        <div class="col-lg-8 col-sm-12">
            <div class="card">
                <img src="{{asset('assets/images/signin.svg')}}" alt="Forgot Password"/>
            </div>
        </div>
    </div>
@stop

