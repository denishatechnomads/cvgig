@extends('user.layout.master')
@section('title','Education detail')
@section('content')

    @php
        $months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
    @endphp
    <main id="education">
        <div class="" id="app">
            <div class="row no-gutters">
                <div class="col-md-1">
                    <div class="logo-wrap">
                        <a href="{{ url('/') }}"><img src="{{ asset('front/images/logo.png')}}" height="42" alt=""></a>
                    </div>
                </div>
                <div class="col-sm-11 p-0">
                    <div class="step-bar">
                        @if(Session::get('locale') == 'ar')
                            <step-progress :steps="resumeStepsArabic" :current-step=3 icon-class="fa fa-check"></step-progress>
                        @else
                            <step-progress :steps="resumeSteps" :current-step=3 icon-class="fa fa-check"></step-progress>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="content-panel ">
                        <div class="tooltip-wrap">
                            <div class="d-flex align-items-center justify-content-end">
                               <span>{{ __('message.tips') }}</span>
                                    <a id="tooltip" class="ml-2">
                                        {{-- <i class="fa fa-lightbulb-o"></i> --}}
                                        <img class="fa fa-lightbulb-o" src="{{ asset('front/images/lamp.svg')}}" height="25" alt="">
                                    </a>
                            </div>
                        </div>
                        <div class="form-panel pt-2">
                            <div class="row">
                                <div class="col-md-7">
                                    <h3 class="fw-600">{{ __('message.resumeEducationHeader') }}</h3>
                                    <p class="sub-header">{{ __('message.resumeEducationSubHeader') }}</p>
                                    @include('notification')

                                    <form class="" method="POST" action="{{ route('resume.save') }}" autofocus="off">
                                        @csrf
                                        <div class="row no-gutters">
                                            <input type="hidden" name="type" value="education">
                                            @if(isset($resume) && !empty($resume))
                                                <input type="hidden" name="resume_id" value="{{ $resume->id }}">
                                                <input type="hidden" name="countExpInfo"
                                                    @if(isset($countExpInfo)) value="{{ $countExpInfo }}"
                                                    @else value="0" @endif>
                                            @endif
                                            @if(isset($resumeEdit) && $resumeEdit == true)
                                                <input type="hidden" name="resume_edit" value="true">
                                            @endif

                                            <div class="col-lg-9 ">
                                                <div class="form-group">
                                                    <div class="floating-input">
                                                        <input type="text" name="school_name" id="school_name"
                                                            class="form-control @error('school_name') is-invalid @enderror"
                                                            @if(!empty($resume->education) && isset($resume->education[$countExpInfo]['school_name']))
                                                            value="{{ old('school_name',$resume->education[$countExpInfo]['school_name']) }}"
                                                            @else
                                                            value="{{ old('school_name') }}"
                                                            @endif>
                                                        <label class="form-control-placeholder"
                                                            for="school_name">{{ __('fields.school_name') }}</label>

                                                        @error('school_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row no-gutters">
                                            <div class="col-lg-3 col-md-12  pr-lg-3">
                                                <div class="form-group">
                                                    <div class="floating-input">
                                                        <input type="text" name="country" id="country"
                                                            class="form-control @error('country') is-invalid @enderror"
                                                            @if(!empty($resume->education) && isset($resume->education[$countExpInfo]['country']))
                                                            value="{{ old('country',$resume->education[$countExpInfo]['country']) }}"
                                                            @else
                                                            value="{{ old('country') }}"
                                                            @endif
                                                        >
                                                        <label class="form-control-placeholder"
                                                            for="country">{{ __('fields.country') }}</label>

                                                        @error('country')
                                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-6 col-sm-6 pr-md-3 pr-sm-15">
                                                <div class="form-group">
                                                    <div class="floating-input">
                                                        <input type="text" name="city" id="city"
                                                            class="form-control @error('city') is-invalid @enderror"
                                                            @if(!empty($resume->education) && isset($resume->education[$countExpInfo]['city']))
                                                            value="{{ old('city',$resume->education[$countExpInfo]['city']) }}"
                                                            @else
                                                            value="{{ old('city') }}"
                                                            @endif>
                                                        <label class="form-control-placeholder"
                                                            for="city">{{ __('fields.city') }}</label>

                                                        @error('city')
                                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <div class="floating-input">
                                                        <input type="text" name="state" id="state"
                                                            class="form-control @error('state') is-invalid @enderror"
                                                            @if(!empty($resume->education) && isset($resume->education[$countExpInfo]['state']))
                                                            value="{{ old('state',$resume->education[$countExpInfo]['state']) }}"
                                                            @else
                                                            value="{{ old('state') }}"
                                                            @endif>
                                                        <label class="form-control-placeholder"
                                                            for="state">{{ __('fields.state') }}</label>

                                                        @error('state')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row no-gutters align-items-center">
                                            <div class="col-lg-3 col-md-12  pr-md-3" >
                                                <div class="form-group">
                                                    <label class="text-grey m-md-0"> {{ __('fields.graduation_date') }}</label>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-6 col-sm-6 pr-md-3 pr-sm-15">
                                                <div class="form-group">
                                                    <select name="month" id="month"
                                                            class="form-control @error('month') is-invalid @enderror">
                                                        <option value="">{{ __('fields.month') }}</option>
                                                        @foreach($months as $key=>$month)
                                                            <option value="{{$month}}"
                                                                    @if(!empty($resume->education) &&
                                                                            isset($resume->education[$countExpInfo]['month']) &&
                                                                            $resume->education[$countExpInfo]['month'] == $month)
                                                                        selected
                                                                    @elseif(old('month') == $month)
                                                                        selected
                                                                    @endif>{{ $month }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('month')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <select name="year" id="year"
                                                            class="form-control @error('year') is-invalid @enderror">
                                                        <option value="">{{ __('fields.year') }}</option>
                                                        @for($i = date('Y'); $i >=1993 ; $i--)
                                                            <option value="{{ $i }}"
                                                                    @if(!empty($resume->education) &&
                                                                            isset($resume->education[$countExpInfo]['year']) &&
                                                                            $resume->education[$countExpInfo]['year'] == $i)
                                                                    selected
                                                                    @elseif(old('year') == $i)
                                                                    selected
                                                                @endif>
                                                                {{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                    @error('year')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row no-gutters">
                                            <div class="col-lg-4 pr-lg-3">
                                                <div class="form-group">
                                                    <select name="degree" id="degree"
                                                            class="form-control @error('degree') is-invalid @enderror">
                                                        <option value="">{{ __('fields.degree') }}</option>
                                                        @foreach($degrees as $degree)
                                                            <option value="{{ $degree->name }}"
                                                                    @if(!empty($resume->education) &&
                                                                            isset($resume->education[$countExpInfo]['degree']) &&
                                                                            $resume->education[$countExpInfo]['degree'] == $degree->name)
                                                                    selected
                                                                    @elseif(old('degree') == $degree->name)
                                                                    selected
                                                                @endif>
                                                                {{ $degree->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('degree')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <div class="floating-input">
                                                        <input type="text" name="field" id="field"
                                                            class="form-control @error('field') is-invalid @enderror"
                                                            @if(!empty($resume->education) && isset($resume->education[$countExpInfo]['field']))
                                                            value="{{ old('field',$resume->education[$countExpInfo]['field']) }}"
                                                            @else
                                                            value="{{ old('field') }}"
                                                            @endif>
                                                        <label class="form-control-placeholder"
                                                            for="field">{{ __('fields.field') }}</label>

                                                        @error('field')
                                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="custom-checkbox custom-control-inline">
                                                    <input type="checkbox" id="currently_attend"  name="currently_attend" value="true" class="custom-control-input"
                                                           @if(!empty($resume->education) && isset($resume->education[$countExpInfo]['currently_attend'])) checked @endif>
                                                    <label class="custom-control-label" for="currently_attend"> {{ __('fields.currentlyAttend') }} </label>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <a class="btn btn-outline-secondary text-center text-uppercase mr-2"
                                               @if(isset($resumeEdit) && $resumeEdit == true) href="{{ route('resume.finalize',$resume->id) }}"
                                               @else href="{{ route('resume.experience-review') }}" @endif>{{__('fields.back') }}</a>
                                            <button type="submit"
                                                    class="btn primary-btn text-center text-uppercase ">{{__('fields.save&next') }}</button>
                                            @if(!empty($resume->education) && !isset($resumeEdit))
                                                <a href="{{ route('resume.education-review') }}">{{__('fields.skip') }}</a>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-5">
                                    <div class="resume-item">
                                        <div class="resume-shadow">
                                            <div class="overlayPosition education"><span class="overlayBG"></span></div>
                                            {!! file_get_contents(asset('storage/'.$template->image)) !!}
                                        </div>

{{--                                        <img alt="{{ $template->name }}"--}}
{{--                                             src="{{ Storage::url($template->image) }}"--}}
{{--                                             class="resume-shadow" height="400">--}}

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

@push('scripts')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script type = "text/javascript">
    $(document).ready(function(){
        var tooltipContent = "<ul class='tips-container'>" +
            "<li>{{ __('message.experienceTips1') }}</li>" +
            "<li>{{ __('message.experienceTips2') }}</li>" +
            "<li>{{ __('message.experienceTips3') }}</li>" +
            "<li>{{ __('message.experienceTips4') }}</li>" +
            "</ul>";

        $('#tooltip').popover({
            title: "{{ __('message.experienceTipsTitle') }} <a href='#' class='close' data-dismiss='alert'>&times;</a>",
            content: tooltipContent,
            html: true,
            placement: "bottom"
        });
    });
</script>
