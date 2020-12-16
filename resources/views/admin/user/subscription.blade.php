@extends('admin.layout.master')
@section('title', 'User Subscription')
@section('parentPageTitle', 'User')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2><strong>Subscription</strong> Detail</h2>
                        </div>
                        <div class="col-sm-6">
                        </div>
                    </div>
                </div>
                <div class="body">
                    <p><code>Subscription details.</code></p>

                    @if(!empty($user->subscription))
                    <p>
                        Subscription title: {{ $user->subscription->title }}<br>
                        Credit: {{ $user->subscription->credits_limit }} ({{ $user->subscription->credits_type }})<br>
                        Price: {{ $user->subscription->price }}$<br>
                        Auto Renew: @if($user->subscription->auto_renew == 1) Yes @else No @endif<br>
                        Created Date: {{ date("d-m-Y",strtotime($user->subscription->created_at)) }}<br>

                        @php
                            $credit = $user->subscription->credits_limit;
                        @endphp
                        @if($user->subscription->credits_type == "month")
                            Expired Date: {{ date('d-m-Y', strtotime("+$credit months", strtotime($user->subscription->created_at))) }}<br>
                        @elseif($user->subscription->credits_type == "year")
                            Expired Date: {{ date('d-m-Y', strtotime("+$credit years", strtotime($user->subscription->created_at))) }}<br>
                        @else
                            Expired Date: {{ date('d-m-Y', strtotime("+$credit days", strtotime($user->subscription->created_at))) }}<br>
                        @endif

                    </p>
                    @else
                        <p>
                            Not any active subscription found.!
                        </p>
                    @endif
                    <hr>

                    <small class="text-muted">User Info: </small>
                    <p>
                        Name: {{ $user->name }}<br>
                        Email: {{ $user->email }}
                    </p>
                    <hr>
                </div>
            </div>
        </div>
    </div>
@stop
