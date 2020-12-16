@extends('user.layout.master')
@section('title','Resume summary')
@section('styles')

@section('content')

    <main>
        <div class="" id="app">
            <div class="row no-gutters">
                <div class="col-md-1">
                    <div class="logo-wrap">
                        <a href="{{ url('/') }}"><img src="{{ asset('front/images/logo.png')}}" height="42" alt=""></a>
                    </div>
                </div>
                <div class="col-sm-11 p-0">
                    <div class="step-bar">
                        <step-progress  @if(Session::get('locale') == 'ar') :steps="resumeStepsArabic" @else :steps="resumeSteps" @endif :current-step=5 icon-class="fa fa-check"></step-progress>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="content-panel">
                        <div class="tooltip-wrap">
                            <div class="d-flex align-items-center justify-content-end">
                               <span>{{ __('message.tips') }}</span>
                                    <a id="tooltip" class="ml-2">
                                        {{-- <i class="fa fa-lightbulb-o"></i> --}}
                                        <img class="fa fa-lightbulb-o" src="{{ asset('front/images/lamp.svg')}}" height="25" alt="">
                                    </a>
                            </div>
                        </div>
                        <div class="form-panel pt-0">
                            <div class="row">
                                <div class="col-sm-7">
                                    <h3 class="fw-600">{{ __('message.resumeSummaryHeader') }}</h3>
                                    <p class="sub-header mb-4">
                                        {{ __('message.resumeSummarySubHeader') }}
                                    </p>
                                    @include('notification')

                                    <form class="" method="POST" action="{{ route('resume.save') }}" autofocus="off">
                                        @csrf
                                        <div class="row">
                                            <input type="hidden" name="type" value="summary">
                                            @if(isset($resume) && !empty($resume))
                                                <input type="hidden" name="resume_id" value="{{ $resume->id }}">
                                            @endif
                                            @if(isset($resumeEdit) && $resumeEdit == true)
                                                <input type="hidden" name="resume_edit" value="true">
                                            @endif

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="floating-input">
                                                    <textarea type="text" name="summary"
                                                              id="summary" required rows="10"
                                                              class="form-control ck_editor summary @error('summary') is-invalid @enderror">
                                                        @if(!empty($resume->summary) && isset($resume->summary))
                                                            {{ old('summary',$resume->summary) }}
                                                        @else
                                                            {{ old('summary') }}
                                                        @endif
                                                    </textarea>

                                                        @error('summary')
                                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="mt-5">
                                            <a type="button"
                                               class="btn btn-outline-secondary text-center text-uppercase mr-2"
                                               @if(isset($resumeEdit) && $resumeEdit == true) href="{{ route('resume.finalize',$resume->id) }}"
                                               @else href="{{ route('resume.skills') }}" @endif>{{__('fields.back') }}</a>
                                            <button type="submit"
                                                    class="btn primary-btn text-center text-uppercase ">{{__('fields.save&next') }}</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-5">
                                    <div class="pre-written-box">
                                        <div class="prewritten-title">{{ __('message.preWritten') }}</div>
                                        <ul class="prewritten-content text-left">
                                            @foreach($preWrittenContents as $key=>$preWrittenContent)
                                                <li class="prewritten-list">
                                                    <span class="addContent" data-row-index="{{$key}}" data-row-content="{{ $preWrittenContent->description }}">{!! $preWrittenContent->description !!}</span>
                                                    <button class="btn-custom btn-red addContent"
                                                            data-row-index="{{$key}}"
                                                            data-row-content="{{ $preWrittenContent->description }}">
                                                        {{-- <i class="fa fa-angle-left mr-2" aria-hidden="true"></i> --}} <span>Add</span>
                                                    </button>

                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script type="text/javascript">

        $(document).ready(function () {
            var tooltipContent = "<ul class='tips-container'>" +
                "<li>{{ __('message.summaryTips1') }}</li>" +
                "<li>{{ __('message.summaryTips2') }}</li>" +
                "<li>{{ __('message.summaryTips3') }}</li>" +
                "<li>{{ __('message.summaryTips4') }}</li>" +
                "</ul>";
            $('#tooltip').popover({
                title: "{{ __('message.summaryTipsTitle') }} <a href='#' class='close' data-dismiss='alert'>&times;</a>",
                content: tooltipContent,
                html: true,
                placement: "bottom"
            });

        });

    </script>
@endsection
