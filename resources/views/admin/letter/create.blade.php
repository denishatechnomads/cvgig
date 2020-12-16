@extends('admin.layout.master')
@section('title', 'Create type')
@section('parentPageTitle', 'Letters')
@section('page-style')
    <link rel="stylesheet" href="{{asset('assets/plugins/dropify/css/dropify.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"/>
@stop
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Letter type</strong> create</h2>
                </div>
                <div class="body">
                    <form method="post" action="{{ route('letter_type.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group required">
                                    <label for="name">Name</label>
                                    <input type="text" name="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           placeholder="Enter letter type name" value="{{ old('name') }}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="parent_id">Select parent</label>
                                    <select name="parent_id"
                                            class="form-control show-tick @error('type') is-invalid @enderror">
                                        <option value="0">Select letter Type</option>
                                        @foreach($mainLetters as $letter)
                                            <option value="{{ $letter->id }}">{{ $letter->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group required">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Enter latter description">{{ old('description') }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>


                        </div>
                        <a class="btn btn-raised btn-dark btn-round waves-effect" href="{{ route('letter_type.index') }}">Cancel</a>
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
    <script src="{{asset('assets/plugins/dropify/js/dropify.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/forms/dropify.js')}}"></script>
    <script src="{{asset('assets/js/pages/forms/basic-form-elements.js')}}"></script>
@stop
