@extends('user.layout.master')
@section('title','Registration')
@section('content')
    <main>
        <section class="user-page">
            <div class="row no-gutters">
                <div class="col-md-5">
                    <div class="login-splash" style="background-image: url({{ asset('front/images/login_bg.png')}});background-position: 80%;">
                        <div class="login-logo">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('front/images/logo.png') }}" alt="" height="70" />
                            </a>
                        </div>
                        <div class="splash-image">
                            <img src="{{ asset('front/images/login_character.svg')}}" height="350"  alt=""/>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="login-formwrap">
                        <div class="text-right">
                            <a href="{{ route('home') }}" class="pt-3 pr-3">
                                <img class="pt-3" src="{{ asset('front/images/cancel.svg')}}" alt="">
                            </a>

                        </div>
                        <div class="row no-gutters">
                            <div class="col-lg-6 m-auto">
                                <div class="center-container text-left">
                                    <h3 class="mb-4 ">{{ __('auth.registrationHeader') }}</h3>
                                    <a class="btn btn-outline-grey btn-block mb-3 text-grey" href="{{ route('google.login') }}">
                                        <img src="{{ asset('front/images/google.svg') }}" height="20" class="mr-2" alt="">
                                        {{ __('auth.Sign up with Google') }}
                                    </a>
                                    <div class="or-seperator">
                                        <span>{{ __('message.or') }}</span>
                                    </div>
                                    @include('notification')
                                    <form class="" method="POST" action="{{ route('front.registration.post') }}" autocomplete="off">
                                        @csrf
                                        <div class="form-group">
                                            <div class="floating-input">
                                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required value="{{ old('name') }}">
                                                <label class="form-control-placeholder" for="name">{{ __('fields.name') }}</label>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
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

                                        <div class="form-group">
                                            <div class="floating-input">
                                                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required value="{{ old('password') }}">
                                                <label class="form-control-placeholder" for="password">{{ __('fields.password') }}</label>

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="floating-input">
                                                <input type="password" name="password_confirmation" id="password_confirmation"
                                                       class="form-control @error('password_confirmation') is-invalid @enderror" required
                                                       value="{{ old('password_confirmation') }}"
                                                >
                                                <label class="form-control-placeholder" for="password_confirmation">{{ __('fields.password_confirmation') }}</label>

                                            @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            </div>
                                        </div>

                                        <div class=" mt-5">
                                            <button type="submit" class="btn primary-btn text-center text-uppercase ">{{__('auth.registration') }}</button>
                                        </div>
                                        <p class="mt-4 text-grey">{{ __("auth.If you have an account?") }}  <a href="{{ route('front.login') }}">{{ __('auth.login') }}</a> </p>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <div id="app"></div>
@endsection
