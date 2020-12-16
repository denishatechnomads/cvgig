@extends('admin.layout.master')
@section('title', 'Edit template')
@section('parentPageTitle', 'Templates')
@section('page-style')
    <link rel="stylesheet" href="{{asset('assets/plugins/dropify/css/dropify.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"/>
@stop
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Edit</strong> Template</h2>
                </div>
                <div class="body">
                    <form method="post" action="{{ route('template.update',$template->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group required">
                                    <label for="name">Name</label>
                                    <input type="text" name="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           placeholder="Enter Template name" value="{{ old('name',$template->name) }}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group required">
                                    <label for="path">Path</label>
                                    <input type="text" name="path"
                                           class="form-control @error('path') is-invalid @enderror"
                                           placeholder="Enter Template Path" value="{{ old('path',$template->path) }}">
                                    <small id="emailHelp" class="form-text text-muted">Path Format Example: template.resume.myfirstresume</small>
                                    @error('path')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group required">
                                    <label for="type">Type</label>
                                    <select name="type"
                                            class="form-control show-tick @error('type') is-invalid @enderror">
                                        <option value="">Select Template Type</option>
                                        <option value="resume" @if($template->type == 'resume')selected @endif>Resume</option>
                                        <option value="letter" @if($template->type == 'letter')selected @endif>Letter</option>
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
                                    <label for="type">Tag</label>
                                    <select name="tag"
                                            class="form-control @error('tag') is-invalid @enderror">
                                        <option value="">Select Template Tag</option>
                                        @php
                                            $tags = ['simple','creative','modern'];
                                        @endphp
                                        @foreach($tags as $tag)
                                            <option class="text-capitalize" value="{{$tag}}" @if($tag == $template->tag) selected @endif >{{$tag}}</option>
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
                                <div class="checkbox m-t-25">
                                    <input id="required_image" type="checkbox" name="required_image" @if($template->required_image) checked @endif>
                                    <label for="required_image">Required Image</label>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkbox m-t-25">
                                    <input id="is_active" type="checkbox" name="is_active" @if($template->is_active)checked @endif>
                                    <label for="is_active">Is Active</label>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group required">
                                    <label for="description">Description</label>
                                    <textarea name="description"
                                              class="form-control @error('description') is-invalid @enderror"
                                              rows="3">{{ old('description',$template->description) }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="card">
                                    <div class="header">
                                        <h2>Image</h2>
                                    </div>
                                    <div class="body">
                                        <input type="file" name="image" class="dropify @error('image') is-invalid @enderror"
                                               accept="image/svg+xml"
                                               data-default-file="{{ Storage::url($template->image) }}">
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-raised btn-dark btn-round waves-effect" href="{{ route('template.index') }}">Cancel</a>
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
