@extends('user.layout.master')
@section('title','Build Your Resume')
@section('content')
<main id="app">
    <section class="user-page build-resume">
        <div class="row no-gutters">
            <div class="col-md-5">
                <div class="login-splash side-splash" >
                </div>
            </div>
            <div class="col-md-7">
                <div class="login-formwrap">

{{--                    <div class="text-right pt-3 pr-3">--}}
{{--                        <a href="" class=" btn primary-btn">--}}
{{--                            <i class="fa fa-user mr-2"></i> Account--}}
{{--                        </a>--}}
{{--                    </div>--}}

                    <div class="row no-gutters">
                        <div class="col-lg-9 m-auto">
                            <div class="center-container text-left">
                                <h3 class="mb-5 fw-600">{{ __('message.buildResumeTitle') }}</h3>
                                @error('upload_file')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="create-resume mb-5">
                                            <a href="{{ route('resume.choose-template') }}" class=" dashed-box text-center text-dark">
                                                <img src="{{ asset('front/images/add.svg')}}" height="60" class="mb-4" alt="">
                                                <h5 class="fw-600 fs-18 mb-3">{{ __('message.build_a_new_resume') }}</h5>
                                                <p class="fs-14 text-grey">{{ __('message.help_you_build_a_new_resume') }}</p>
                                                <label class="badge badge-danger">{{ __('message.recommended') }}</label>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="upload-resume">
                                            <form action="{{ route('resume.upload') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <a href="" class=" dashed-box text-center text-dark">
                                                    <input type="file" name="upload_file" class="form-control" id="hidden_upload_file" accept="application/pdf">
                                                    <img src="{{ asset('front/images/upload.svg') }}" height="60" class="mb-4" alt="">
                                                    <h5 class="fw-600 fs-18 mb-3">{{ __('message.upload_old_resume') }}</h5>
                                                    <p class="fs-14 text-grey">{{ __('message.upload_old_resume_msg') }}</p>
                                                </a>

                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class=" text-right mt-5">
                                    <a type="button" class="btn btn-outline-secondary text-center text-uppercase" href="{{ route('home') }}">BACK</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
@section('scripts')
<script>
    $(document).ready(function () {
        $('input[type=file]').change(function() {
            // select the form and submit
            $('form').submit();
        });
    });
</script>
@endsection
