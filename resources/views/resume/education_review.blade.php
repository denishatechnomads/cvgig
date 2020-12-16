@extends('user.layout.master')
@section('title','Education review')
@section('content')

    <main>
        <div class="" id="app">
            <div class="row no-gutters">
                <div class="col-md-1">
                    <div class="logo-wrap">
                        <a href=""><img src="{{ asset('front/images/logo.png')}}" height="42" alt=""></a>
                    </div>
                </div>
                <div class="col-sm-11 p-0">
                    <div class="step-bar">
                        <step-progress @if(Session::get('locale') == 'ar') :steps="resumeStepsArabic"
                                       @else :steps="resumeSteps" @endif :current-step=3
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
                                    <h3 class="fw-600">{{ __('message.resumeEducationHeader') }}</h3>
                                    <p class="sub-header">{{ __('message.resumeEducationReview') }}</p>
                                    <div class="card p-3">
                                        @include('notification')
                                        @if(isset($resume->education) && !empty($resume->education))
                                            @foreach($resume->education as $key=>$education)
                                                @if(!empty($education))
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="row">
                                                                <div class="col-sm-8">
                                                                    @if(isset($education['school_name']))
                                                                        <b>{{ $education['school_name'] }}</b>
                                                                    @endif
                                                                    <span>
                                                    @if(isset($education['city']))
                                                                            {{ $education['city'] }},
                                                                        @endif
                                                                        @if(isset($education['state']))
                                                                            {{ $education['state'] }},
                                                                        @endif
                                                                        @if(isset($education['country']))
                                                                            {{ $education['country'] }}
                                                                        @endif
                                                </span>
                                                                    <br>
                                                                    @if(isset($education['degree']))
                                                                        {{ $education['degree']  }},
                                                                    @endif
                                                                    @if(isset($education['month']))
                                                                        {{ $education['month'] }}
                                                                    @endif
                                                                    @if(isset($education['year']))
                                                                        {{ $education['year'] }}
                                                                    @endif
                                                                    @if(isset($education['current_attend']))
                                                                        - Current Attend
                                                                    @endif
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="float-right">
                                                                        <a class="btn btn-sm btn-outline-success"
                                                                           @if(isset($resumeEdit) && $resumeEdit == true)
                                                                           href="{{ route('resume.education.editById',[$resume->id,$key]) }}"
                                                                           @else href="{{ route('resume.education.edit',$key) }}" @endif>{{ __('fields.edit') }}</a>
                                                                        <a class="btn btn-sm btn-outline-danger"
                                                                           href="{{ route('resume.education.delete',[$resume->id,$key]) }}">{{ __('fields.delete') }}</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    @if(isset($education['description']))
                                                        <div class="row clearfix mb-5">
                                                            <div class="col-sm-8 description">
                                                                {!! $education['description'] !!}
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="float-right">
                                                                    <a class="btn btn-sm btn-dashed-outline"
                                                                       href="{{ route('resume.education.description',[$key,"resumeId"=>$resume->id]) }}">{{ __('fields.editEducationDescription') }}</a>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    @endif
                                                @endif
                                            @endforeach
                                        @else
                                            <div class="alert alert-danger">
                                                Education info is empty.
                                            </div>
                                        @endif
                                        <div class="row">
                                            <div class="col-sm-6">

                                                <a class="btn btn-sm btn-success"
                                                   @if(isset($resumeEdit) && $resumeEdit == true) href="{{ route('resume.education.createById',$resume->id) }}"
                                                   @else href="{{ route('resume.education') }}" @endif><i class="fa fa-plus mr-2"></i> {{ __('fields.addAnotherDegree') }}</a>

                                            </div>
                                        </div>

                                        {{-- <div class="row"> --}}
                                            <div class="mt-5">
                                                <a type="button"
                                                   class="btn btn-outline-secondary text-center text-uppercase mr-2"
                                                   @if(isset($resumeEdit) && $resumeEdit == true) href="{{ route('resume.finalize',$resume->id) }}"
                                                   @elseif(!empty($resume->experience_info)) href="{{ route('resume.experience-review') }}"
                                                   @else href="{{ route('resume.experience') }}" @endif>{{__('fields.back') }}</a>
                                                <a class="btn primary-btn text-center text-uppercase "
                                                   @if(isset($resumeEdit) && $resumeEdit == true)
                                                   href="{{ route('resume.finalize',$resume->id) }}"
                                                   @else
                                                   href="{{ route('resume.skills') }}"
                                                    @endif >{{__('fields.next') }}</a>
                                            </div>
                                        {{-- </div> --}}
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
