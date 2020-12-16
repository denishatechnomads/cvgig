@extends('user.layout.master')
@section('title','Build your resume')

@section('content')
    <main>
        <div class="top-nav">
            <div class="logo-box">
                <a href="{{ url('/') }}"><img src="{{ asset('front/images/logo.png') }}" height="45" alt=""></a>
            </div>

            @can('isUser')
                <div class="user-account dropdown">
                    <button class="btn dropdown-toggle" type="button" id="btnGroupDrop1"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if(Session::get('locale') == 'ar') {{ __('fields.Arabic') }} @else English @endif
                        <i class="fa fa-angle-down ml-2"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a class="dropdown-item" href="{{ url('locale/en') }}">English</a>
                        <a class="dropdown-item" href="{{ url('locale/ar') }}">{{ __('fields.Arabic') }}</a>
                    </div>
                </div>

                <div class="user-account dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}<i class="fa fa-angle-down ml-2"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a href="{{ route('front.logout') }}" class="dropdown-item" title="Sign Out"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('auth.logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('front.logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            @endauth
        </div>

        @if(isset($selectedData) && !empty($selectedData))
            <section class="content-panel">
                <form action="{{ route('user.dashboard') }}" name="dashboardForm" id="dashboardForm" method="post">
                @csrf
                <div class="container-fluid">
                    <div class="title-row">
                        <h3 class="fw-600">{{ __('message.dashboardHeader') }}</h3>
                        <div class="button-group">
                            <a class="btn primary-btn text-uppercase mr-3"
                               @if($type == 'Resume') href="{{ route('resume.copy',$selectedData->id) }}"
                               @else href="{{ route('letter.copy',$selectedData->id) }}" @endif>
                                <i clawss="fa fa-clone"></i> <span>{{ __('fields.duplicate') }}</span>
                            </a>
                            <a class="btn secondary-btn text-uppercase mr-3"
                               @if($type == 'Resume') href="{{ route('resume.delete',$selectedData->id) }}"
                               @else href="{{ route('letter.delete',$selectedData->id) }}" @endif><i
                                    class="fa fa-trash"></i> <span>{{ __('fields.delete') }}</span></a>
                            <a class="btn secondary-btn text-uppercase" href="#" data-toggle="modal"
                               data-target="#renameModal"><i class="fa fa-pencil-square-o"></i>
                                <span>{{ __('fields.rename') }}</span></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            @include('notification')
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-3">
                            <div class="select-resume dashboard-ddn dropdown mb-3">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span>{{ $selectedData->title }}</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    @foreach($resumes as $resume)
                                        <a class="dropdown-item resume_letter_list" href="#" data-type="Resume" data-title="{{ $resume->title }}"
                                           data-id="{{$resume->id}}">{{$resume->title}}</a>
                                    @endforeach
                                    @foreach($letters as $letter)
                                        <a class="dropdown-item resume_letter_list" href="#" data-type="Letter" data-title="{{ $letter->title }}"
                                           data-id="{{$letter->id}}">{{$letter->title}}</a>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-9 pl-0">
                            <div class="button-group text-right  mb-4">
                                    <a class="btn primary-btn text-uppercase mr-3" @if($type == "Resume") href="{{ route('resume.download',$selectedData->id) }}" @else href="{{ route('letter.download',$selectedData->id) }}" @endif>
                                        <i class="fa fa-download"></i><span>{{ __('fields.download') }}</span>
                                    </a>
                                    <a class="btn secondary-btn text-uppercase mr-3 print" id="print" @if($type == "Resume") href="{{ route('resume.print',$selectedData->id) }}" @else href="{{ route('letter.print',$selectedData->id) }}" @endif>
                                        <i class="fa fa-print"></i><span>{{ __('fields.print') }}</span>
                                    </a>
                                    <a class="btn secondary-btn text-uppercase " @if($type == "Resume") href="{{ route('resume.email',$selectedData->id) }}" @else href="{{ route('letter.email',$selectedData->id) }}" @endif>
                                        <i class="fa fa-envelope"></i><span>{{ __('fields.email') }}</span></a>
                                  <div class="mt-md-2 mt-lg-0 ml-3 d-inline-block">
                                       <a  class="btn  btn-outline-secondary text-uppercase mr-3"
                                            @if($type == 'Resume') href="{{ route('resume.finalize',$selectedData->id) }}"
                                            @else href="{{ route('letter.finalize',$selectedData->id) }}" @endif>{{ __('message.editResume') }}</a>
                                    <a href="{{ route('build_resume') }}" class="btn  primary-btn text-uppercase">
                                    {{ __('message.createYour')}}  {{ __('message.resume')}}
                                    </a></div>
                                    <!-- <h2 class="fw-600 mb-3">{{ __('message.createYour')}} <br>{{ __('message.resume')}}</h2> -->

                                </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-7 m-auto">


                            <div class="resume-img mb-3">
                                {{--                            <img src="{{ asset('front/images/sample-resume.svg')}}" class="img-fluid" alt="">--}}
                                <div class="img-fluid resume_card" style="box-shadow: unset;margin-top: unset;">
                                    @if($type == "Resume")
                                        @php
                                            switch ($selectedData->template_id) {
                                            case 15:
                                        @endphp
                                                @include('template.resume.resume-1',['resume'=>$selectedData])
                                        @php
                                                break;
                                            case 16:
                                        @endphp
                                                @include('template.resume.resume-6',['resume'=>$selectedData])
                                        @php
                                                break;
                                            case 17:
                                        @endphp
                                                @include('template.resume.resume-21',['resume'=>$selectedData])
                                        @php
                                                break;
                                            case 18:
                                        @endphp
                                                @include('template.resume.resume-22',['resume'=>$selectedData])
                                        @php
                                                break;
                                            case 19:
                                        @endphp
                                                @include('template.resume.resume-23',['resume'=>$selectedData])
                                        @php
                                                break;
                                            case 20:
                                        @endphp
                                                @include('template.resume.resume-24',['resume'=>$selectedData])
                                        @php
                                                break;
                                            default:
                                        @endphp
                                                @include('template.resume.common',['resume'=>$selectedData])
                                        @php
                                            }
                                        @endphp

                                        {{-- @include('template.resume.common',['resume'=>$selectedData]) --}}
                                    @else
                                        @include('template.letter.common',['userLetter'=>$selectedData])
                                    @endif
                                </div>
                            </div>

                        </div>
                        <!-- <div class="col-md-5">

                            <div class="mb-4">
                                <a href="{{ route('resume.choose-template') }}" class=" dashed-box text-center text-dark">
                                    <img src="{{ asset('front/images/add.svg')}}" height="60" class="mb-4 mt-4" alt="">
                                    <h2 class="fw-600 mb-3">{{ __('message.createYour')}} <br>{{ __('message.resume')}}</h2>
                                </a>
                            </div>
                            <div class="">
                                <a href="{{ route('letter.choose-template') }}" class=" dashed-box text-center text-dark">
                                    <img src="{{ asset('front/images/add.svg')}}" height="60" class="mb-4 mt-4" alt="">
                                    <h2 class="fw-600 mb-3">{{ __('message.createA')}} <br>{{ __('message.coverLetter') }}</h2>
                                </a>
                            </div>
                        </div> -->
                    </div>
                </div>

                <input type="hidden" name="type" @if($type == 'Resume') value="Resume" @else value="Letter" @endif
                       id="type">
                <input type="hidden" name="record_id" value="{{ $selectedData->id }}" id="record_id">

            </form>
            </section>
        @else
            <section class="content-panel">
                Your Dashboard is empty.
            </section>
        @endif

    @if(isset($selectedData) && !empty($selectedData))
        <!-- Modal -->
        <div class="modal fade" id="renameModal" tabindex="-1" role="dialog" aria-labelledby="renameModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="renameModalLabel">{{ __('fields.rename') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" name="renameForm" @if($type == 'Resume') action="{{ route('resume.update',$selectedData->id) }}" @else action="{{ route('letter.update',$selectedData->id) }}" @endif>
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="title" value="{{ $selectedData->title }}">
                                    <input type="hidden" class="form-control" name="redirect_url" value="dashboard">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary text-center text-uppercase"
                                data-dismiss="modal">{{__('fields.cancel') }}</button>
                        <button type="submit"
                                class="btn primary-btn text-center text-uppercase addSection">{{__('fields.save') }}</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        @endif

    </main>
    <div id="app"></div>
@endsection
@section('scripts')
    <script src="{{ asset('js/jquery.printPage.js') }}"></script>
    <script>
        $(document).ready(function () {
            $(".resume_letter_list").on("click", function () {
                $("#type").val($(this).data('type'));
                $("#record_id").val($(this).data('id'));
                $("#dropdownMenuButton span").text($(this).data('title'));
                $("#dashboardForm").submit();
            });
        });

        /* Printing Section */
        $(".print").printPage();

    </script>
@endsection
