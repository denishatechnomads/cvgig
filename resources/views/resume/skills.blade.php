@extends('user.layout.master')
@section('title','Resume Skills')
@push('styles')

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
                        <step-progress  @if(Session::get('locale') == 'ar') :steps="resumeStepsArabic" @else :steps="resumeSteps" @endif :current-step=4 icon-class="fa fa-check"></step-progress>

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
                                <div class="col-md-7">
                                    <h3 class="fw-600">{{ __('message.resumeSkillHeader') }}</h3>
                                        <p class="sub-header mb-4">
                                            {{ __('message.resumeSkillSubHeader') }}
                                        </p>
                                    @include('notification')

                                    <form class="" method="POST" action="{{ route('resume.save') }}" autofocus="off">
                                        @csrf
                                        <div class="row">
                                            <input type="hidden" name="type" value="skills">
                                            @if(isset($resume) && !empty($resume))
                                                <input type="hidden" name="resume_id" value="{{ $resume->id }}">
                                            @endif
                                            @if(isset($resumeEdit) && $resumeEdit == true)
                                                <input type="hidden" name="resume_edit" value="true">
                                            @endif

                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <div class="floating-input">
                                                        <textarea type="text" name="skills"
                                                                id="skills" required rows="10"
                                                                class="form-control ck_editor skills @error('skills') is-invalid @enderror">
                                                            @if(!empty($resume->skills) && isset($resume->skills))
                                                                {{ old('skills',$resume->skills) }}
                                                            @else
                                                                {{ old('skills') }}
                                                            @endif
                                                        </textarea>

                                                        @error('skills')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="mt-4">
                                            <a type="button"
                                            class="btn btn-outline-secondary text-center text-uppercase mr-2"
                                               @if(isset($resumeEdit) && $resumeEdit == true) href="{{ route('resume.finalize',$resume->id) }}"
                                               @else href="{{ route('resume.education-review') }}" @endif>{{__('fields.back') }}</a>
                                            <button type="submit" class="btn primary-btn text-center text-uppercase ">{{__('fields.save&next') }}</button>
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
        $(document).ready(function(){
            var tooltipContent = "<ul class='tips-container'>" +
                "<li>{{ __('message.skillsTips1') }}</li>" +
                "<li>{{ __('message.skillsTips2') }}</li>" +
                "<li>{{ __('message.skillsTips3') }}</li>" +
                "<li>{{ __('message.skillsTips4') }}</li>" +
                "</ul>";
            $('#tooltip').popover({
                title: "{{ __('message.skillsTipsTitle') }} <a href='#' class='close' data-dismiss='alert'>&times;</a>",
                content: tooltipContent,
                html: true,
                placement: "bottom"
            });

        });

    </script>
@endsection
