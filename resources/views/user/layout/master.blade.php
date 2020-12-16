<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon"> <!-- Favicon-->
    <title>@yield('title') - {{ config('app.name') }}</title>
    <meta name="description" content="@yield('meta_description', config('app.name'))">
    <meta name="author" content="@yield('meta_author', config('app.name'))">
    @yield('meta')
    <style>
        #loader {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            background-color: #fff;
            z-index: 10000;
        }

        .loader-review {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 300px;
            font-family: Arial;
            font-size: 13px;
            text-align: center;

        }

        .loading {
            background-color: white;
            height: 4px;
            margin: 1em;
            overflow: hidden;
            position: relative;
        }

        .loading-bar {
            animation: sideToside 2s ease-in-out infinite;
            /*change this for the color of the sideToside line*/
            background-color: #dc3545;
            height: 100%;
            position: absolute;
            width: 50%;
        }

        @keyframes sideToside {
            0%, 100% {
                transform: translateX(-50%);
            }
            50% {
                transform: translateX(150%);
            }
        }

        .bouton-image:before {
            content: "";
            width: 16px;
            height: 16px;
            display: inline-block;
            margin-right: 5px;
            vertical-align: text-top;
            background-color: transparent;
            background-position: center center;
            background-repeat: no-repeat;
        }

        .monBouton:before {
            background-image: url({{asset('/storage/images/BookeeyLogo.png')}});
        }
    </style>
    <link rel="stylesheet" href="{{ asset("front/font-awesome/css/font-awesome.min.css") }}">
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/custom.css') }}">
    <script src="{{ asset('front/js/jquery-3.3.1.min.js') }}"></script>
    @yield('styles')

    @if(Session::has('locale') && Session::get('locale') == "ar")
        <style>
            input {
                direction: rtl;
            }
        </style>
    @endif


</head>
<body>
<div id="loader">
    <div class="loader-review">
        <img src="{{ asset('front/images/logo.png') }}" width="100" class="mb-3" alt="">

        <div class="loading center">
            <div class="loading-bar"></div>
        </div>
    </div>
</div>
@yield('content')

<div class="collapse editorResult">

</div>

<script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('front/js/popper.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('ckeditor5/build/ckeditor.js') }}"></script>
{{-- <script src="https://cdn.ckeditor.com/4.15.1/standard-all/ckeditor.js"></script> --}}
<script src="{{ asset('front/js/custom.js') }}"></script>
<script>
    var lang = "{{ Session::get('locale') }}";

    // CKEDITOR.replace('job_description', {
    //   //height: 250,
    //   // Remove the WebSpellChecker plugin.
    //   removePlugins: 'wsc',
    //   // Configure SCAYT to load on editor startup.
    //   scayt_autoStartup: true,
    //   // Limit the number of suggestions available in the context menu.
    //   //scayt_maxSuggestions: 3
    // });
</script>
@yield('scripts')
{{-- @include('user.footer') --}}
<footer class=" pt-0 home-footer">
    <div class="footer-bottom">
        <div class="container">
            <div class="copyright">
                <p class="mb-0">{{ date('Y') }} CVGig, All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
