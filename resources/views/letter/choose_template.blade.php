@extends('user.layout.master')
@section('title','Choose template')

@section('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('front/css/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/owl-carousel/owl.theme.default.min.css') }}">
{{--    <script src="{{ asset('front/js/jquery-3.3.1.min.js') }}"></script>--}}
@endsection

@section('content')
<main>
    <div class="top-nav">
        <div class="logo-box">
            <a href="{{ url('/') }}"><img src="{{ asset('front/images/logo.png')}}" height="42" alt=""></a>
        </div>
        <ul id="myTabs" class="head-tabs nav nav-pills nav-justified" role="tablist" data-tabs="tabs">
            <li><a href="#all" data-toggle="tab" class="active">{{ __('message.all') }}</a></li>
            <li><a href="#Creative" data-toggle="tab">{{ __('message.creative') }}</a></li>
            <li><a href="#Simple" data-toggle="tab">{{ __('message.simple') }}</a></li>
            <li><a href="#Modern" data-toggle="tab">{{ __('message.modern') }}</a></li>
        </ul>

        @auth
            <div class="user-account dropdown">
                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}<i class="fa fa-angle-down ml-2"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    <a href="{{ route('front.logout') }}" class="dropdown-item" title="Sign Out"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('auth.logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('front.logout') }}" method="POST"
                          style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        @endauth
    </div>
    <section class="content-panel">
        <div class="container-fluid">
            <ul id="myTabs" class="inner-resume-tabs nav nav-pills nav-justified" role="tablist" data-tabs="tabs">
                <li class="resumeTab active" data-type="all"><a href="#all" data-toggle="tab">All</a></li>
                <li class="resumeTab" data-type="creative"><a href="#Creative" data-toggle="tab">Creative</a></li>
                <li class="resumeTab" data-type="simple"><a href="#Simple" data-toggle="tab">Simple</a></li>
                <li class="resumeTab" data-type="modern"><a href="#Modern" data-toggle="tab">Modern</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane  in active" id="all">
                    <div class="resume-list-wrap">
                        <div class="owl-carousel owl-theme">
                            @foreach($templates as $template)
                                <div class="item">
                                <div class="resume-img">
                                    @if($template->image == 'default.png' || $template->image == '')
                                        <img src="{{ asset('front/images/sample-resume.svg') }}" alt="{{ $template->name }}">
                                    @else
                                        <img src="{{ Storage::url($template->image) }}" alt="{{ $template->name }}">
                                    @endif

                                </div>
                                <a class="btn primary-btn text-uppercase" href="{{ route('letter.template.select',$template->id) }}">{{ __('fields.createResume') }}</a>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                <div role="tabpanel" class="tab-pane fade" id="Creative">
                    <div class="resume-list-wrap">
                        <div class="owl-carousel owl-theme">
                            @foreach($templates as $template)
                        @if($template->tag == 'creative')
                        <div class="item">
                            <div class="resume-img">
                                @if($template->image == 'default.png' || $template->image == '')
                                    <img src="{{ asset('front/images/sample-resume.svg') }}" alt="{{ $template->name }}">
                                @else
                                    <img src="{{ Storage::url($template->image) }}" alt="{{ $template->name }}">
{{--                                    <img src="{{ asset('front/images/sample-resume.svg') }}" alt="{{ $template->name }}">--}}
                                @endif

                            </div>
                            <a class="btn primary-btn text-uppercase" href="{{ route('letter.template.select',$template->id) }}">{{ __('fields.createResume') }}</a>
                        </div>
                        @endif
                    @endforeach
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="Simple">
                    <div class="resume-list-wrap">
                        <div class="owl-carousel owl-theme">
                        @foreach($templates as $template)
                        @if($template->tag == 'simple')
                            <div class="item">
                                <div class="resume-img">
                                    @if($template->image == 'default.png' || $template->image == '')
                                        <img src="{{ asset('front/images/sample-resume.svg') }}" alt="{{ $template->name }}">
                                    @else
                                        <img src="{{ Storage::url($template->image) }}" alt="{{ $template->name }}">
                                    @endif

                                </div>
                                <a class="btn primary-btn text-uppercase" href="{{ route('letter.template.select',$template->id) }}">{{ __('fields.createResume') }}</a>
                            </div>
                        @endif
                    @endforeach
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="Modern">
                    <div class="resume-list-wrap">
                        <div class="owl-carousel owl-theme">
                        @foreach($templates as $template)
                        @if($template->tag == 'modern')
                            <div class="item">
                                <div class="resume-img">
                                    @if($template->image == 'default.png' || $template->image == '')
                                        <img src="{{ asset('front/images/sample-resume.svg') }}" alt="{{ $template->name }}">
                                    @else
                                        <img src="{{ Storage::url($template->image) }}" alt="{{ $template->name }}">
                                    @endif

                                </div>
                                <a class="btn primary-btn text-uppercase" href="{{ route('letter.template.select',$template->id) }}">{{ __('fields.createResume') }}</a>
                            </div>
                        @endif
                    @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <div id="app"></div>
</main>
@endsection

@section('scripts')
<script src="{{ asset('front/js/owl.carousel.min.js')}}"></script>
<script>
    $('.owl-carousel').owlCarousel({
        loop:false,
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
                items:4
            }
        }
    })
</script>
@endsection
