@extends('user.layout.master')
@section('title','Letter Closer')

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
                        <step-progress @if(Session::get('locale') == 'ar') :steps="letterStepsArabic"
                                       @else :steps="letterSteps" @endif :current-step=8
                                       icon-class="fa fa-check"></step-progress>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="content-panel">
                        <div class="tooltip-wrap">
                            <div class="text-right mb-3">
                                <span>{{ __('message.tips') }}</span>
                                <a id="tooltip" class="btn-custom btn-yellow">
                                    <i class="fa fa-lightbulb-o"></i>
                                </a>
                            </div>
                        </div>
                        <div class="form-panel pt-2">
                            <div class="row">
                                <div class="col-sm-7">
                                    <h2>{{ __('message.letterCloserHeader') }}</h2>
                                    <p class="sub-header mb-3">&nbsp;</p>

                                    @include('notification')

                                    <form class="" method="POST" action="{{ route('letter.save') }}" autofocus="off">
                                        @csrf
                                        <div class="row">
                                            <input type="hidden" name="type" value="closer">
                                            @if(isset($userLetter) && !empty($userLetter))
                                                <input type="hidden" name="letter_id" value="{{ $userLetter->id }}">
                                            @endif
                                            @if(isset($editLetter) && $editLetter == true)
                                                <input type="hidden" name="letter_edit" value="true">
                                            @endif

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="floating-input">
                                                        <textarea name="closer" id="closer"
                                                                  class="form-control ck_editor closer @error('closer') is-invalid @enderror"
                                                        >@if(!empty($userLetter->closer) && isset($userLetter->closer)){{ old('closer',$userLetter->closer) }}
                                                            @else{{ old('closer') }}
                                                            @endif</textarea>

                                                        @error('closer')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="mt-5">
                                            <a class="btn btn-outline-secondary text-center text-uppercase"
                                               @if(isset($editLetter) && $editLetter == true) href="{{ route('letter.finalize', $userLetter->id) }}"
                                               @else href="{{ route('letter.call-to-action') }}" @endif>{{__('fields.back') }}</a>
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
                                                    <span>{!! $preWrittenContent->description !!}</span>
                                                    <button class="btn-custom btn-red addContent"
                                                            data-row-index="{{$key}}"
                                                            data-row-content="{{ $preWrittenContent->description }}">
                                                        <i class="fa fa-angle-left mr-2" aria-hidden="true"></i> <span>Add</span>
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
            var tooltipContent = "{{ __('message.closerTipsSubTitle') }}" +
                "<ul class='tips-container'>" +
                "<li>{{ __('message.closerTips1') }}</li>" +
                "<li>{{ __('message.closerTips2') }}</li>" +
                "<li>{{ __('message.closerTips3') }}</li>" +
                "<li>{{ __('message.closerTips4') }}</li>" +
                "<li>{{ __('message.closerTips5') }}</li>" +
                "</ul>";
            $('#tooltip').popover({
                title: "{{ __('message.closerTipsTitle') }} <a href='#' class='close' data-dismiss='alert'>&times;</a>",
                content: tooltipContent,
                html: true,
                placement: "bottom"
            });

        });

    </script>
@endsection
