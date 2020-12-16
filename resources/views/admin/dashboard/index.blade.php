@extends('admin.layout.master')
@section('title', 'Dashboard')
@section('page-style')
    <link rel="stylesheet" href="{{asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/plugins/charts-c3/plugin.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/plugins/morrisjs/morris.min.css')}}"/>
@stop
@section('content')
    <div class="row clearfix">
        <div class="col-lg-3 col-md-6 col-sm-12">
            <a href="{{ route('user.index') }}">
                <div class="card widget_2 big_icon">
                    <div class="body">
                        <h6>Total Users</h6>
                        <h2>{{ $data['total_user'] }} <small class="info"></small></h2>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <a href="{{ route('template.index') }}">
                <div class="card widget_2 big_icon">
                    <div class="body">
                        <h6>Total Template</h6>
                        <h2>{{ $data['total_template'] }}<small class="info"></small></h2>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <a href="{{ route('payment.index') }}">
                <div class="card widget_2 big_icon">
                    <div class="body">
                        <h6>Total Orders</h6>
                        <h2>{{ $data['total_order'] }} <small class="info"></small></h2>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <a href="{{ route('user.index') }}">
                <div class="card widget_2 big_icon">
                    <div class="body">
                        <h6>Total Resumes</h6>
                        <h2>{{ $data['total_resume'] }}</h2>
                    </div>
                </div>
            </a>
        </div>
    </div>

@stop
@section('page-script')
    <script src="{{asset('assets/bundles/jvectormap.bundle.js')}}"></script>
    <script src="{{asset('assets/bundles/sparkline.bundle.js')}}"></script>
    <script src="{{asset('assets/bundles/c3.bundle.js')}}"></script>
    <script src="{{asset('assets/js/pages/index.js')}}"></script>
@stop
