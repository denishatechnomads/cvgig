@extends('user.layout.master')
@section('title','Build your resume')

@section('content')
    <main>
        <div class="top-nav">
            <div class="logo-box">
                <a href="{{ url('/') }}"><img src="{{ asset('front/images/logo.png') }}" height="45" alt=""></a>
            </div>

            @can('isUser')
                <div class="user-account dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
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
        <form method="post" action="{{route('user.payment.request')}}">
            @csrf
        <section class="content-panel">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h3 class="heading">Payment Information</h3>
                    <h4 class="heading primary-color">Total Due Today:</h4>
                    <span class="h3">{{ __("message.1kwd") }}</span>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-danger">Pay with Bookeey</button>
                </div>
            </div>
        </section>
        </form>
    </main>
    <div id="app"></div>
    @include('user.footer')
@endsection
@section('scripts')
    <script>
        $('.pay-request').click(function() {
            var url = "{{ route('user.payment.request') }}";
            $.ajax({
                method: "POST",
                url: url,
            }).success(function( msg ) {
                if(msg.Success == true){
                    $(".paypal-button-container").html("<div class='alert alert-success'>"+ msg.Message +"</div>")
                    window.location.href = "{{ route('user.dashboard') }}";
                }else{
                    $(".errorMsg").html("<div class='alert alert-danger'>"+ msg.Message +"</div>");
                }
            });
        });
    </script>
@endsection
