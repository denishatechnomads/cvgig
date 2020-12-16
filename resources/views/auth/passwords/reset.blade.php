<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('admin/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/authentication/form-2.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/forms/switches.css')}}">

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/png">
    <title>Reset Password | {{ config('app.name') }}</title>

</head>
<body class="form">

<div class="form-form">
    <div class="form-form-wrap">
        <div class="form-container">
            <div class="form-content">
                <h1 class="">Reset Password</h1>
                <p class="">Log in to your account to continue.</p>
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group row">
                        <div class="col-12">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"
                                   autofocus readonly>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-12">
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" name="password" required
                                   autocomplete="new-password" placeholder="{{ __('Password') }}">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <input id="password-confirm" type="password" class="form-control btn-block" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </div>
                    <div class="division">
                        <p class="signup-link register">If you have already password? <a href="{{ route('login') }}">Log in</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{ asset('admin/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('admin/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('admin/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- END GLOBAL MANDATORY SCRIPTS -->
<script src="{{ asset('admin/assets/js/authentication/form-2.js') }}"></script>

</body>
</html>

