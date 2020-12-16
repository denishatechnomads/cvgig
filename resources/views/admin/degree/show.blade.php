@extends('admin.layout.master')
@section('title', 'Detail Pre written content')
@section('parentPageTitle', 'Pre written content')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2><strong>Pre written content</strong> Detail</h2>
                        </div>
                        <div class="col-sm-6">
                        </div>
                    </div>
                </div>
                <div class="body">

                    <small class="text-muted">Details: </small>
                    <p>
                        Id #: {{ $prewritten_content->id }}<br>
                        Type: {{ $prewritten_content->type }}<br>
                        Title: {{ $prewritten_content->title }}<br>
                        Detail: {{ $prewritten_content->description }}<br>
                    </p>
                    <hr>
                </div>
            </div>
        </div>
    </div>
@stop
