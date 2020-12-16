@extends('user.layout.master')
@section('title','Work experience')
@section('content')
    @php
        $months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
    @endphp
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
                        <step-progress @if(Session::get('locale') == 'ar') :steps="resumeStepsArabic"
                                       @else :steps="resumeSteps" @endif :current-step=2
                                       icon-class="fa fa-check"></step-progress>
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
                                    <img class="fa fa-lightbulb-o" src="{{ asset('front/images/lamp.svg')}}" height="25"
                                         alt="">
                                </a>
                            </div>
                        </div>
                        <div class="form-panel pt-2">
                            <div class="row">
                                <div class="col-md-7">
                                    @include('notification')
                                    <h3 class="fw-600">{{ __('message.resumeExperienceHeader') }}</h3>
                                    <p class="sub-header">{{ __('message.resumeExperienceSubHeader') }}</p>
                                    <form class="" id="expForm" method="POST" action="{{ route('resume.save') }}"
                                          autofocus="off">
                                        @csrf
                                        <div class="row  no-gutters">
                                            <input type="hidden" name="type" value="experience">
                                            <input type="hidden" id="name"
                                                   value="{{!empty($resume) ? $resume->contact_info['name'] : "MICHAEL WILLIAMS"}}">
                                            <input type="hidden" id="phone"
                                                   value="{{!empty($resume) ? $resume->contact_info['phone'] : "123-456-78"}}">
                                            <input type="hidden" id="email"
                                                   value="{{!empty($resume) ? $resume->contact_info['email'] : "yourmail@domain.com"}}">
                                            @if(isset($resume) && !empty($resume))
                                                <input type="hidden" name="resume_id" value="{{ $resume->id }}">
                                                <input type="hidden" name="countExpInfo"
                                                       @if(isset($countExpInfo)) value="{{ $countExpInfo }}"
                                                       @else value="0" @endif>
                                            @endif

                                            @if(isset($resumeEdit) && $resumeEdit == true)
                                                <input type="hidden" name="resume_edit" value="true">
                                            @endif

                                            <div class="col-md-6 col-lg-6 pr-md-3">
                                                <div class="form-group">
                                                    <div class="floating-input">
                                                        <input type="text" name="employer" id="employer"
                                                               class="form-control @error('employer') is-invalid @enderror"
                                                               @if(!empty($resume->experience_info) && isset($resume->experience_info[$countExpInfo]['employer']))
                                                               value="{{ old('employer',$resume->experience_info[$countExpInfo]['employer']) }}"
                                                               @else
                                                               value="{{ old('employer') }}"
                                                            @endif>
                                                        <label class="form-control-placeholder"
                                                               for="employer">{{ __('fields.employer') }}</label>

                                                        @error('employer')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-lg-6 ">
                                                <div class="form-group">
                                                    <div class="floating-input">
                                                        <input type="text" name="job_title" id="job_title"
                                                               class="form-control @error('job_title') is-invalid @enderror"
                                                               @if(!empty($resume->experience_info) && isset($resume->experience_info[$countExpInfo]['job_title']))
                                                               value="{{ old('job_title',$resume->experience_info[$countExpInfo]['job_title']) }}"
                                                               @else
                                                               value="{{ old('job_title') }}"
                                                            @endif>
                                                        <label class="form-control-placeholder"
                                                               for="job_title">{{ __('fields.job_title') }}</label>

                                                        @error('job_title')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-lg-3 col-md-6 col-sm-6 pr-md-3  pr-sm-15">
                                                <div class="form-group">
                                                    <div class="floating-input">
                                                        <input type="text" name="country" id="country"
                                                               class="form-control @error('country') is-invalid @enderror"
                                                               @if(!empty($resume->experience_info) && isset($resume->experience_info[$countExpInfo]['country']))
                                                               value="{{ old('country',$resume->experience_info[$countExpInfo]['country']) }}"
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

                                            <div class="col-lg-3 col-md-6 col-sm-6 pr-lg-3">
                                                <div class="form-group">
                                                    <div class="floating-input">
                                                        <input type="text" name="city" id="city"
                                                               class="form-control @error('city') is-invalid @enderror"
                                                               @if(!empty($resume->experience_info) && isset($resume->experience_info[$countExpInfo]['city']))
                                                               value="{{ old('city',$resume->experience_info[$countExpInfo]['city']) }}"
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

                                            <div class="col-lg-3 col-md-6 col-sm-6 pr-md-3  pr-sm-15">
                                                <div class="form-group">
                                                    <div class="floating-input">
                                                        <input type="text" name="state" id="state"
                                                               class="form-control @error('state') is-invalid @enderror"
                                                               @if(!empty($resume->experience_info) && isset($resume->experience_info[$countExpInfo]['state']))
                                                               value="{{ old('state',$resume->experience_info[$countExpInfo]['state']) }}"
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

                                            <div class="col-lg-3 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <div class="floating-input">
                                                        <input type="text" name="zipcode" id="zipcode"
                                                               class="form-control @error('zipcode') is-invalid @enderror"
                                                               maxlength="10" min="1" max="9"
                                                               @keypress="onlyNumber($event)"
                                                               @if(!empty($resume->experience_info) && isset($resume->experience_info[$countExpInfo]['zipcode']))
                                                               value="{{ old('zipcode',$resume->experience_info[$countExpInfo]['zipcode']) }}"
                                                               @else
                                                               value="{{ old('zipcode') }}"
                                                            @endif
                                                        >
                                                        <label class="form-control-placeholder"
                                                               for="zipcode">{{ __('fields.zipcode') }}</label>

                                                        @error('zipcode')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row no-gutters align-items-center">
                                            <div class="col-lg-3 col-md-12  pr-md-3">
                                                <div class="form-group">
                                                    <label for="" class="text-grey m-0">
                                                        {{ __('fields.startDate') }}
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-6 col-sm-6 pr-md-3 pr-sm-15">
                                                <div class="form-group">
                                                    <select name="start_month" id="start_month"
                                                            class="form-control @error('start_month') is-invalid @enderror">
                                                        <option value="">{{ __('fields.month') }}</option>
                                                        @foreach($months as $key=>$month)
                                                            <option value="{{$month}}"
                                                                    @if(!empty($resume->experience_info) &&
                                                                            isset($resume->experience_info[$countExpInfo]['start_month']) &&
                                                                            $resume->experience_info[$countExpInfo]['start_month'] == $month)
                                                                    selected
                                                                    @elseif(old('start_month') == $month)
                                                                    selected
                                                                @endif>{{ $month }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('start_month')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6  pr-lg-3">
                                                <div class="form-group">
                                                    <select name="start_year" id="start_year"
                                                            class="form-control @error('start_year') is-invalid @enderror">
                                                        <option value="">{{ __('fields.year') }}</option>
                                                        @for($i = date('Y'); $i >=1993 ; $i--)
                                                            <option value="{{ $i }}"
                                                                    @if(!empty($resume->experience_info) &&
                                                                            isset($resume->experience_info[$countExpInfo]['start_year']) &&
                                                                            $resume->experience_info[$countExpInfo]['start_year'] == $i)
                                                                    selected
                                                                    @elseif(old('start_year') == $i)
                                                                    selected
                                                                @endif>
                                                                {{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                    @error('start_year')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row no-gutters  align-items-center" id="endDateSection">
                                            <div class="col-lg-3 col-md-12  pr-md-3">
                                                <div class="form-group">
                                                    <label for="" class="text-grey m-0">
                                                        {{ __('fields.endDate') }}
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 pr-md-3 pr-sm-15">
                                                <div class="form-group">
                                                    <select name="end_month" id="end_month"
                                                            class="form-control @error('end_month') is-invalid @enderror">
                                                        <option value="">{{ __('fields.month') }}</option>
                                                        @foreach($months as $key=>$month)
                                                            <option value="{{$month}}"
                                                                    @if(!empty($resume->experience_info) &&
                                                                            isset($resume->experience_info[$countExpInfo]['end_month']) &&
                                                                            $resume->experience_info[$countExpInfo]['end_month'] == $month)
                                                                    selected
                                                                    @elseif(old('end_month') == $month)
                                                                    selected
                                                                @endif>{{ $month }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('end_month')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6  pr-lg-3">
                                                <div class="form-group">
                                                    <select name="end_year" id="end_year"
                                                            class="form-control @error('end_year') is-invalid @enderror">
                                                        <option value="">{{ __('fields.year') }}</option>
                                                        @for($i = date('Y'); $i >=1993 ; $i--)
                                                            <option value="{{ $i }}"
                                                                    @if(!empty($resume->experience_info) &&
                                                                    isset($resume->experience_info[$countExpInfo]['end_year']) &&
                                                                    $resume->experience_info[$countExpInfo]['end_year'] == $i)
                                                                    selected
                                                                    @elseif(old('end_year') == $i)
                                                                    selected
                                                                @endif>{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                    @error('end_year')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="custom-checkbox custom-control-inline">
                                                    <input type="checkbox" id="is_present" name="is_present"
                                                           value="true" class="custom-control-input"
                                                           @if(!empty($resume->experience_info) && isset($resume->experience_info[$countExpInfo]['is_present'])) checked @endif>
                                                    <label class="custom-control-label"
                                                           for="is_present"> {{ __('fields.I_presently_work_here') }}</label>
                                                </div>
                                                {{--                                                <div class="custom-radio custom-control-inline">--}}
                                                {{--                                                    <input type="radio" id="abc"  name="is_present" value="true" class="custom-control-input" @if(!empty($resume->experience_info) && isset($resume->experience_info[$countExpInfo]['is_present'])) checked @endif>--}}
                                                {{--                                                    <label class="custom-control-label" for="abc"> {{ __('fields.I_presently_work_here') }}</label>--}}
                                                {{--                                                </div>--}}
                                                {{--                                                <div class="custom-radio custom-control-inline">--}}
                                                {{--                                                    <input type="radio" id="abc2"  name="is_present" value="true" class="custom-control-input" @if(!empty($resume->experience_info) && isset($resume->experience_info[$countExpInfo]['is_present'])) checked @endif>--}}
                                                {{--                                                    <label class="custom-control-label" for="abc2"> {{ __('fields.I_presently_work_here') }}</label>--}}
                                                {{--                                                </div>--}}
                                            </div>
                                        </div>

                                        <div class="mt-5">
                                            <a
                                                class="btn btn-outline-secondary text-center text-uppercase mr-2"
                                                @if(isset($resumeEdit) && $resumeEdit == true) href="{{ route('resume.finalize',$resume->id) }}"
                                                @else href="{{ route('resume.contact') }}" @endif>{{__('fields.back') }}</a>
                                            <button type="button" id="saveExp"
                                                    class="btn primary-btn text-center text-uppercase ">{{__('fields.save&next') }}</button>
                                            @if(!empty($resume->experience_info) && !isset($resumeEdit))
                                                <a href=" ">{{__('fields.skip') }}</a>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-5">

                                    <div class="resume-item">
                                        <div class="resume-shadow">
                                            <div class="overlayPosition experience"><span class="overlayBG"></span>
                                            </div>
                                            {!! file_get_contents(asset('storage/'.$template->image)) !!}
                                        </div>
                                        {{--                                        <img alt="{{ $template->name }}"--}}
                                        {{--                                            src="{{ Storage::url($template->image) }}"--}}
                                        {{--                                            class="resume-shadow" height="400">--}}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- The Modal -->
    <div class="modal" id="myModal" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">{{__('fields.missingInformation') }}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    {{__('fields.expModelBody') }}
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" id="skipBtn" class="btn btn-default"
                            data-dismiss="modal">{{__('fields.skipThis') }}</button>
                    <button type="button" class="btn btn-danger"
                            data-dismiss="modal">{{__('fields.fixThisNow') }}</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            nameReplace($("#name").val());
            $("#name").keyup(function () {
                name = $("#name").val();
                nameReplace(name);
            });
            emailReplace($("#email").val());
            $("#email").keyup(function () {
                email = $("#email").val();
                emailReplace(email);
            });
            contactReplace($("#phone").val());
            $("#phone").keyup(function () {
                phone = $("#phone").val();
                contactReplace(phone);
            });
        });
        function nameReplace(name) {
            if(name != ""){
                $("#PreviewUserFirstName").text(name.toUpperCase());
                $("#PreviewUserLastName").text("");

                var fName = name.substr(0,1);
                var SName = "";
                if(name.indexOf(' ') != -1) {
                    SName = name.substr(name.indexOf(' ') + 1, 1);
                }
                $("#PreviewUserFirstName-Initials").text(fName);
                $("#PreviewUserLastName-Initials").text(SName);
            }
            else{
                $("#PreviewUserFirstName").text("MICHAEL");
                $("#PreviewUserLastName").text("WILLIAMS");
                $("#PreviewUserFirstName-Initials").text("M");
                $("#PreviewUserLastName-Initials").text("W");
            }
        }

        function emailReplace(email) {
            if(email != ""){
                $("#PreviewEmail").text(email);

                var Email = email.substr(0,1);
                if(email.indexOf(' ') != -1) {
                    Email = email.substr(email.indexOf(' ') + 1, 1);
                }
                $("#PreviewEmail-Initials").text(Email);
            }
        }

        function contactReplace(phone) {
            if(phone != ""){
                $("#PreviewPhone").text(phone);

                var Phone = phone.substr(0,1);
                if(phone.indexOf(' ') != -1) {
                    Phone = phone.substr(phone.indexOf(' ') + 1, 1);
                }
                $("#PreviewPhone-Initials").text(Phone);
            }
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function () {

            $('#is_present').click(function () {
                if ($(this).is(':checked')) {
                    $("#endDateSection").addClass("collapse");
                } else {
                    $("#endDateSection").removeClass("collapse");
                }
            });
            if ($("#is_present").is(':checked')) {
                $("#endDateSection").addClass("collapse");
            }

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

            $('#saveExp').click(function () {
                if ($('#employer').val() == '' || $('#job_title').val() == '') {
                    $('#myModal').modal('show');
                } else {
                    $('#expForm').submit();
                }
            });

            $('#skipBtn').click(function () {
                $('#expForm').submit();
            });
        });


    </script>
