@extends('user.layout.master')
@section('title','Experience Review')
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
                    <div class="content-panel">
                        <div class="form-panel pt-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3 class="fw-600">{{ __('message.resumeExperienceHeader') }}</h3>
                                    <p class="sub-header mb-5">
                                        {{ __('message.resumeExperienceReview') }}
                                    </p>
                                    <div class="card p-3">
                                        @include('notification')
                                        @if(!empty($resume->experience_info))
                                            @foreach($resume->experience_info as $key=>$experience)
                                                @if(!empty($experience))
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            @if(isset($experience['employer']))
                                                                <h5 class="d-inline-block fw-600">{{ $experience['employer'] }}</h5>
                                                            @endif
                                                            <span>
                                                                    @if(isset($experience['city']) && !empty($experience['city']))
                                                                    {{ $experience['city'] }},
                                                                @endif
                                                                @if(isset($experience['state']))
                                                                    {{ $experience['state'] }},
                                                                @endif
                                                                @if(isset($experience['country']))
                                                                    {{ $experience['country'] }}
                                                                @endif
                                                                </span>

                                                            <br>
                                                            @if(isset($experience['job_title']))
                                                                {{ $experience['job_title']  }},
                                                            @endif
                                                            @if(isset($experience['start_month']))
                                                                {{ $experience['start_month'] }}
                                                            @endif
                                                            @if(isset($experience['start_year']))
                                                                {{ $experience['start_year'] }}
                                                            @endif

                                                            @if(isset($experience['is_present']))
                                                                - Present
                                                            @else
                                                                @if(isset($experience['end_month']))
                                                                    - {{ $experience['end_month'] }}
                                                                @endif

                                                                @if(isset($experience['end_year']))
                                                                    {{ $experience['end_year'] }}
                                                                @endif
                                                            @endif
                                                        </div>
                                                        <div class="col-md-4 pl-0 d-md-flex justify-content-end">
                                                            <a class="btn btn-sm btn-outline-success mr-2"
                                                               @if(isset($resumeEdit) && $resumeEdit == true) href="{{ route('resume.experience.editById',[$resume->id,$key]) }}"
                                                               @else href="{{ route('resume.experience.edit',$key) }}" @endif>{{ __('fields.edit') }}</a>
                                                            <a class="btn btn-sm btn-outline-danger"
                                                               href="{{ route('resume.experience.delete',[$resume->id,$key]) }}">{{ __('fields.delete') }}</a>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    @if(isset($experience['job_description']))
                                                        <div class="row clearfix mb-5">
                                                            <div class="col-lg-8 job_description">
                                                                {!! $experience['job_description'] !!}
                                                            </div>
                                                            <div class="col-lg-4 text-lg-right">
                                                                <a class="btn btn-sm btn-dashed-outline"
                                                                   @if(isset($resumeEdit) && $resumeEdit == true)
                                                                   href="{{ route('resume.experience.description.editById',[$resume->id,$key]) }}"
                                                                   @else href="{{ route('resume.experience.description',[$key,"resumeId"=>$resume->id]) }}" @endif>{{ __('fields.editJobDescription') }}</a>
                                                            </div>

                                                        </div>
                                                    @endif
                                                @endif
                                            @endforeach
                                        @else
                                            <div class="alert alert-danger"> Experience not found.!</div>
                                        @endif
                                        <div class="row">

                                            <div class="col-sm-6">
                                                <a class="btn btn-sm btn-success"
                                                   @if(isset($resumeEdit) && $resumeEdit == true)
                                                   href="{{ route('resume.experience.createById',$resume->id) }}"
                                                   @else
                                                   href="{{ route('resume.experience') }}"
                                                    @endif
                                                ><i class="fa fa-plus mr-2"></i>{{ __('fields.addAnotherPosition') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-5">
                                        <a type="button"
                                           class="btn btn-outline-secondary text-center text-uppercase mr-2"
                                           @if(isset($resumeEdit) && $resumeEdit == true) href="{{ route('resume.finalize',$resume->id) }}"
                                           @elseif(isset($key)) href="{{ route('resume.experience.description',$key) }}"
                                           @else  href="{{ route('resume.experience') }}" @endif>{{__('fields.back') }}</a>

                                        <a class="btn primary-btn text-center text-uppercase"
                                           @if(isset($resumeEdit) && $resumeEdit == true) href="{{ route('resume.finalize',$resume->id) }}"
                                           @elseif(!empty($resume->education)) href="{{ route('resume.education-review') }}"
                                           @else href="{{ route('resume.education') }}" @endif>{{__('fields.next') }}</a>
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
    <script type="text/javascript">

    </script>
