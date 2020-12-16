@extends('admin.layout.master')
@section('title', 'Create Degree')
@section('parentPageTitle', 'Degrees')
@section('page-style')
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"/>
@stop
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Degree</strong> create</h2>
                </div>
                <div class="body">
                    <form method="post" action="{{ route('degree.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row clearfix">

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group required">
                                    <label for="name">Name</label>
                                    <input type="text" name="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           placeholder="Enter degree name" value="{{ old('name') }}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>


                        </div>
                        <a class="btn btn-raised btn-dark btn-round waves-effect" href="{{ route('degree.index') }}">Cancel</a>
                        <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect float-right">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
@section('page-script')
    <script src="{{asset('assets/js/pages/forms/basic-form-elements.js')}}"></script>
@stop
