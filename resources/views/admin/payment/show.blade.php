@extends('admin.layout.master')
@section('title', 'Payment Details')
@section('parentPageTitle', 'Payments')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2><strong>Payment</strong> Detail</h2>
                        </div>
                        <div class="col-sm-6">
                        </div>
                    </div>
                </div>
                <div class="body">
                    <p><code>Payment details.</code></p>
                    <small class="text-muted">Payment Details: </small>
                    <p>
                        Payment #: {{ $payment->id }}<br>
                        Payment Id: {{ $payment->payment_id }}<br>
                        Amount: {{ $payment->amount }}<br>
                        Discount: {{ $payment->discount }}<br>
                        Total Amount: {{ $payment->total_amount }}<br>
                        Status: <span class="badge badge-{{ $payment->payment_status }}"> {{ $payment->payment_status }}</span><br>
                    </p>
                    <hr>

                    <small class="text-muted">User Info: </small>
                    <p>
                        Name: {{ $payment->user->name }}<br>
                        Email: {{ $payment->user->email }}
                    </p>
                    <hr>
                </div>
            </div>
        </div>
    </div>
@stop
