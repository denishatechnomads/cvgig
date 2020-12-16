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
            <li><a href="#all" data-toggle="tab" class="active">{{ __('message.chooseTemplateOnly') }}</a></li>
        </ul>

        @can('isUser')
            <div class="user-account dropdown">
                <button class="btn dropdown-toggle" type="button" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
            <div class="resume-list-wrap">
                <div class="owl-carousel owl-theme">
                    @foreach($templates as $template)
                        <div class="item">
                            <div class="resume-img">
                                <a href="{{ route('resume.template.select',$template->id) }}" style="position: unset;">
                                    @if($template->image == 'default.png' || $template->image == '')
                                        <img src="{{ asset('front/images/sample-resume.svg') }}" alt="{{ $template->name }}">
                                    @else
                                        <img src="{{ asset('storage/'.$template->image) }}" alt="{{ $template->name }}">
                                    @endif
                                </a>
                            </div>
                            <a class="btn primary-btn text-uppercase" href="{{ route('resume.template.select',$template->id) }}">{{ __('fields.createResume') }}</a>
                        </div>
                    @endforeach
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
                items:3
            }
        }
    })
</script>
@endsection
