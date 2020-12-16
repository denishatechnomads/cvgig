@extends('user.layout.master')
@section('title','Homepage')
@section('styles')
    <link rel="stylesheet" href="{{ asset('front/css/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/owl-carousel/owl.theme.default.min.css') }}">
{{--    <script src="{{ asset('front/js/jquery-3.3.1.min.js') }}"></script>--}}
@section('content')

    <header class="home-header fixed-header">
        <nav class="navbar navbar-light ">
            <div class="container-fluid">
                <a href="" class="navbar-brand">
                    <img src="{{ asset('front/images/logo.png')}}" height="80" alt="{{ config('app.name') }}"/>
                </a>
                <div class="row no-gutters">
                    <div class="dropdown mr-2">
                        <button class="btn btn-light text-left dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if(Session::get('locale') == 'ar') {{ __('fields.Arabic') }} @else English @endif
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <a class="dropdown-item" href="{{ url('locale/en') }}">English</a>
                            <a class="dropdown-item" href="{{ url('locale/ar') }}">{{ __('fields.Arabic') }}</a>
                        </div>
                    </div>
                    @can('isUser')
                        <a href="{{ route('user.dashboard') }}" class="btn secondary-btn mr-2">
                            <span>{{__('auth.dashboard') }}</span>
                        </a>
                        <a href="{{ route('front.logout') }}" class="btn primary-btn" title="Sign Out"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('auth.logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('front.logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    @else
                        <a class="btn primary-btn sign-in" href="{{ route('front.login') }}"><i
                                class="fa fa-lock mr-md-2"></i> <span>{{ __('auth.login') }}</span> </a>
                        {{--                    <a href="{{ route('front.registration') }}" class="btn btn-primary">{{__('auth.registration') }}</a>--}}
                    @endauth
                </div>
            </div>
        </nav>
    </header>

    <main>
        <section class="home-banner">
            <div class="container">
                <div class="row align-items-center h-100">
                    <div class="col-lg-6 col-md-8">
                        <div class="banner-content">
                            <h1 class="mb-3">{{ __('message.easy') }} <span class="primary-color">{{ __('message.online') }}</span> <br > {{ __('message.resume') }} <span
                                    class="primary-color">{{ __('message.builder') }}</span></h1>
                            <p class="mb-4">{{ __('message.subHeader1') }} <br class="desktop-break"> {{ __('message.subHeader2') }}</p>
                            <a type="button" class="btn primary-btn text-uppercase mb-2 mr-2"
                               href="{{ route('build_resume') }}">{{ __('message.Create your resume') }}</a>
                            {{-- <a type="button" class="btn primary-btn text-uppercase mb-2"
                               href="{{ route('build_letter') }}">{{ __('message.createLetter') }}</a> --}}
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4">
                        <div class="banner-img text-center">
                            <img src="{{ asset('front/images/character_image.svg') }}" height="350" class="img-fluid"
                                 alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-padding home-templates">
            <div class="container">
                <h2 class="fw-600 mb-5"><span class="primary-color">{{ __('message.our') }}</span> {{ __('message.templates') }}<span
                        class="primary-color">.</span></h2>
                <div class="row">
                    <div class="col-md-3 text-center mb-3">
                        <div class="resume-holder">
                            <img src="{{ asset('front/images/resume/new1.svg')}}" class="img-fluid" alt="">
                        </div>
                        <h6 class="fw-600 mb-3">{{ __("message.chooseTemplate") }}</h6>
                        <p class="fs-14">{{ __('message.chooseTemplateDes') }}</p>
                    </div>
                    <div class="col-md-3 text-center mb-3">
                        <div class="resume-holder">
                            <img src="{{ asset('front/images/resume/new2.svg') }}" class="img-fluid" alt="">
                        </div>
                        <h6 class="fw-600 mb-3">{{ __("message.preWrittenExample") }}</h6>
                        <p class="fs-14">{{ __("message.preWrittenExampleDes") }}</p>
                    </div>
                    <div class="col-md-3 text-center mb-3">
                        <div class="resume-holder">
                            <img src="{{ asset('front/images/resume/new11.svg') }}" class="img-fluid" alt="">
                        </div>
                        <h6 class="fw-600 mb-3">{{ __('message.tipsMakeEasy') }}</h6>
                        <p class="fs-14">{{ __('message.tipsMakeEasyDes') }}</p>
                    </div>
                    <div class="col-md-3 text-center mb-3">
                        <div class="resume-holder">
                            <img src="{{ asset('front/images/resume/new12.svg') }}" class="img-fluid" alt="">
                        </div>
                        <h6 class="fw-600 mb-3">{{ __('message.tipsMakeEasy') }}</h6>
                        <p class="fs-14">{{ __('message.tipsMakeEasyDes') }}</p>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <a type="submit" class="btn primary-btn text-uppercase " href="{{ route('resume.choose-template') }}">{{ __("message.viewTemplate") }}</a>
                </div>
            </div>
        </section>
        <section class="section-padding home-hiw text-white">
            <div class="container">
                <div class="hiw-content">
                    <h2 class="fw-600 mb-4"><span class="primary-color">{{ __("message.how") }}</span> {{ __("message.itWorks") }}
                        <span class="primary-color">.</span></h2>
                    <h5 class="text-center mb-4">{{ __("message.followSteps") }}</h5>
                    <div class="row mb-5 justify-content-center">
                        <div class="col-md-3 col-sm-6 mb-2 step-1 text-center">
                            <div class="icon-wrap">
                                <img src="{{ asset('front/images/icons/resume.svg') }}" alt="">
                            </div>
                            <h6>{{ __("message.chooseResumeLayout") }}</h6>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-2 step-2 text-center">
                            <div class="icon-wrap">
                                <img src="{{ asset('front/images/icons/content.svg')}}" alt="">
                            </div>
                            <h6>{{ __("message.optimizeContent") }}</h6>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-2 text-center">
                            <div class="icon-wrap">
                                <img src="{{ asset('front/images/icons/pdf.svg')}}" alt="">
                            </div>
                            <h6>{{ __("message.exportSend") }}</h6>
                        </div>
                    </div>
                    <div class="text-center">
                        <a class="btn primary-btn text-uppercase mb-4"
                           href="{{ route('build_resume') }}">{{ __('message.Create your resume') }}</a>
                        <p>{{ __("message.setupResumeDes") }}</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-padding cv-benefits">
            <div class="container">
                <h2 class="fw-600 mb-4"><span class="primary-color">{{ __("message.benefits") }}</span> {{ __("message.resumeBuilder") }}<span
                        class="primary-color">.</span></h2>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="cv-ben-wrap">
                            <div class="icon-holder">
                                <img src="{{ asset('front/images/icons/resume_layout.svg') }}" height="100" alt="">
                            </div>
                            <div class="text-holder">
                                <h5>{{ __("message.resumeLayoutTitle") }}</h5>
                                <p class="fs-16 text-grey">{{ __("message.resumeLayoutDes") }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="cv-ben-wrap">
                            <div class="icon-holder">
                                <img src="{{ asset('front/images/icons/feedback.svg')}}" height="100" alt="">
                            </div>
                            <div class="text-holder">
                                <h5>{{ __("message.liveFeedBack") }}</h5>
                                <p class="fs-16 text-grey">{{ __("message.liveFeedBackDes") }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="cv-ben-wrap">
                            <div class="icon-holder">
                                <img src="{{ asset('front/images/icons/template_suited.svg') }}" height="100" alt="">
                            </div>
                            <div class="text-holder">
                                <h5>{{ __("message.templateExactNeeds") }}</h5>
                                <p class="fs-16 text-grey">
                                    {{ __("message.templateExactNeedsDes") }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="cv-ben-wrap">
                            <div class="icon-holder">
                                <img src="{{ asset('front/images/icons/coverletter.svg') }}" height="100" alt="">
                            </div>
                            <div class="text-holder">
                                <h5>{{ __("message.coverLetterResumeSample") }}</h5>
                                <p class="fs-16 text-grey">{{ __("message.coverLetterResumeSampleDes") }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-padding">
            <div class="container">
                <div class="row mb-5 align-items-center">
                    <div class="col-md-6 mb-4">
                        <img src="{{ asset('front/images/is_it_easy.svg')}}" class="img-fluid p-3" alt="">
                    </div>
                    <div class="col-md-6">
                        <div>
                            <h4 class="fw-600 mb-3">{{ __("message.isItEasy") }}</h4>
                            <p class="text-grey fs-18">
                                {{ __("message.isItEasyDes1") }} <br class="desktop-break">
                                {{ __("message.isItEasyDes1") }} {{ config("app.name") }}.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>

    @include('user.footer')
    <div id="app"></div>
@endsection
@section('scripts')
    <script src="{{ asset('front/js/popper.min.js')}}"></script>
    <script src="{{ asset('front/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('front/js/owl.carousel.min.js')}}"></script>
    <script>
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:40,
            nav:false,
            dots:true,
            pagination:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:3
                }
            }
        })
    </script>
@endsection
