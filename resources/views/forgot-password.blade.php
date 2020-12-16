@extends('user.layout.master')
@section('title','Forgot Password')
@section('content')
<main>
    <section class="user-page">
        <div class="row no-gutters">
            <div class="col-md-5">
                <div class="login-splash" style="background-image: url({{ asset('front/images/login_bg.png') }});background-position: 80%;">
                    <div class="login-logo">
                        <img src="{{ asset('front/images/logo.png') }}" alt="" height="70" />
                    </div>
                    <div class="splash-image">
                        <img src="{{ asset('front/images/login_character.svg') }}" height="350"  alt=""/>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="login-formwrap">


                    <div class="text-right">
                        <a class="pt-3 pr-3" href="{{ route('front.login') }}">
                            <img class="pt-3" src="{{ asset('front/images/cancel.svg') }}" alt="">
                        </a>

                    </div>
                    <div class="row no-gutters">
                        <div class="col-lg-6 m-auto">
                            <form class="" method="POST" action="{{ route('front.forgot-password.post') }}">
                                @csrf
                            <div class="center-container text-left">
                                <h3 class="mb-4">{{ __("auth.Forgot Password?") }}</h3>
                                <p class="text-grey pt-0 mb-4">{{__('auth.forgotPasswordHeader')}}</p>
                                @include('notification')
                                <div class="form-group ">
                                    <div class="floating-input">
                                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" required value="{{ old('email') }}">
                                        <label class="form-control-placeholder" for="email">{{ __('fields.email') }}</label>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class=" mt-5">
                                    <button type="submit" class="btn primary-btn text-center text-uppercase ">{{ __('fields.submit') }}</button>
                                </div>
                            </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
