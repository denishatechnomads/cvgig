@extends('admin.layout.master')
@section('title', 'Create Pre written content')
@section('parentPageTitle', 'Pre written content')
@section('page-style')
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"/>
@stop
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Pre written content</strong> create</h2>
                </div>
                <div class="body">
                    <form method="post" action="{{ route('prewritten_content.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row clearfix">

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="parent_id">Content Type</label>
                                    <select name="type"
                                            class="form-control show-tick @error('type') is-invalid @enderror">
                                        <option value="">Select Content Type</option>
                                        @foreach($contentType as $type)
                                            <option value="{{ $type }}">{{ $type }}</option>
                                        @endforeach
                                    </select>
                                    @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group required">
                                    <label for="name">Title</label>
                                    <input type="text" name="title"
                                           class="form-control @error('title') is-invalid @enderror"
                                           placeholder="Enter content title" value="{{ old('title') }}">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group required">
                                    <label for="description">Description</label>
                                    <textarea name="description" rows="5" class="form-control @error('description') is-invalid @enderror" placeholder="Enter content description">{{ old('description') }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>


                        </div>
                        <a class="btn btn-raised btn-dark btn-round waves-effect" href="{{ route('prewritten_content.index') }}">Cancel</a>
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
