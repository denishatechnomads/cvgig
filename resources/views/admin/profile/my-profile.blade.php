@extends('admin.layout.master')
@section('title', 'My Profile')
@section('content')
<div class="row clearfix">
    <div class="col-xl-4 col-lg-12 col-md-12">
        <div class="card mcard_3">
            <div class="body">
                <a href="javascript:void(0);"><img src="{{asset('assets/images/profile_av.jpg')}}" class="rounded-circle" alt="profile-image"></a>
                <h4 class="m-t-10">{{Auth::user()->name}}</h4>
                <div class="row">
                    <div class="col-12 mb-4">
                        <ul class="social-links list-unstyled">
                            <li><a href="https://www.facebook.com/thememakkerteam" title="facebook" ><i class="zmdi zmdi-facebook-box"></i></a></li>
                            <li><a href="https://twitter.com/thememakker" title="twitter"><i class="zmdi zmdi-twitter-box"></i></a></li>
                            <li><a href="https://www.instagram.com/thememakker/" title="instagram"><i class="zmdi zmdi-instagram"></i></a></li>
                        </ul>
                        <a href="https://themeforest.net/user/wrraptheme/portfolio" class="btn btn-danger">Our Portfolio</a>
                        <a href="https://thememakker.com/" class="btn btn-success">More Template</a>
                    </div>
                    <div class="col-4">
                        <small>Experience</small>
                        <h5>6+ Year</h5>
                    </div>
                    <div class="col-4">
                        <small>Hourly Rate</small>
                        <h5>18$</h5>
                    </div>
                    <div class="col-4">
                        <small>Team</small>
                        <h5>25+</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@stop
