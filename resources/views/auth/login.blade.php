@extends('admin.layout.authentication')
@section('title', 'Login')
@section('content')
    <div class="row">
        <div class="col-lg-4 col-sm-12">
            @include('notification')
            <form class="card auth_form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="header">
                    <img class="logo" src="{{asset('assets/images/logo.png')}}" alt="">
                    <h5>Log in</h5>
                </div>
                <div class="body">
                    <div class="input-group mb-3">
                        <input id="username" type="email" name="email"
                               class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                               required autocomplete="email" autofocus
                               placeholder="e.g john@gmail.com">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="input-group mb-3">
                        <input name="password" type="password"
                               class="form-control @error('password') is-invalid @enderror" required
                               autocomplete="current-password" placeholder="Password">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="checkbox">
                        <input id="remember_me" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember_me">Remember Me</label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">SIGNIN</button>
                    <div class="signin_with mt-3">
                        <a href="{{ route('password.request') }}" class="forgot-pass-link">Forgot Password?</a>
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
                <img src="{{asset('assets/images/signin.svg')}}" alt="Sign In"/>
            </div>
        </div>
    </div>
@stop
