@extends('user.layout.master')
@section('title',Request::segment(4)." Section")
@push('styles')

@section('content')

    <main>
        <div class="top-nav">
            <div class="logo-box">
                <a href="{{ url('/') }}"><img src="http://cvgig/front/images/logo.png" height="45" alt=""></a>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="content-panel">
                        <div class="tooltip-wrap">
                            <div class="text-right mb-3">
                                @if(in_array($section,$sections))
                                    <span>{{ __('message.tips') }}</span>
                                    <a id="tooltip" class="btn-custom btn-yellow">
                                        <i class="fa fa-lightbulb-o"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="form-panel  pt-0">
                            <div class="row">
                                <div class="col-sm-7">
                                    @if(in_array($section,$sections))
                                        <h3 class="fw-600">{{ __('message.sections.'.$section.'.title') }}</h3>
                                    @else
                                        <h3 class="fw-600">{{ $section }}</h3>
                                    @endif
                                    <p class="sub-header mb-4">&nbsp;</p>
                                    @include('notification')

                                    <form class="" method="POST" action="{{ route('resume.save') }}" autofocus="off">
                                        @csrf
                                        <div class="row">
                                            <input type="hidden" name="type" value="sectionDescription">
                                            @if(isset($resume) && !empty($resume))
                                                <input type="hidden" name="resume_id" value="{{ $resume->id }}">
                                                <input type="hidden" name="section" value="{{ $section }}">
                                            @endif

                                            <div class="col-lg-10">
                                                <div class="form-group">
                                                    <div class="floating-input">
                                                    <textarea type="text" name="description"
                                                              id="description" required
                                                              class="form-control ck_editor description @error('description') is-invalid @enderror">
                                                        @if(!empty($resume->extra_section) && isset($resume->extra_section[$section]))
                                                            {{ old('description',$resume->extra_section[$section]) }}
                                                        @else
                                                            {{ old('description') }}
                                                        @endif
                                                    </textarea>

                                                        @error('description')
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
                                               href="{{ route('resume.finalize',$resume->id) }}">{{__('fields.back') }}</a>
                                            <button type="submit"
                                                    class="btn primary-btn text-center text-uppercase ">{{__('fields.save&next') }}</button>
                                        </div>
                                    </form>
                                </div>
                                @if(in_array($section,$sections))
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
                                                            {{-- <i class="fa fa-angle-left mr-2" aria-hidden="true"></i> --}}
                                                            <span>Add</span>
                                                        </button>

                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div id="app"></div>
@endsection

@section('scripts')
    <script type="text/javascript">

        $(document).ready(function () {
                {{--var section = "{{ $section }}";--}}
            var tooltipContent = "<ul class='tips-container'>" +
                "<li>{{ __('message.sections.'.$section.'.Tips1') }}</li>" +
                "<li>{{ __('message.sections.'.$section.'.Tips2') }}</li>" +
                "<li>{{ __('message.sections.'.$section.'.Tips3') }}</li>" +
                "<li>{{ __('message.sections.'.$section.'.Tips4') }}</li>" +
                "</ul>";
            $('#tooltip').popover({
                title: "{{ __('message.sections.'.$section.'.tipsTitle') }} <a href='#' class='close' data-dismiss='alert'>&times;</a>",
                content: tooltipContent,
                html: true,
                placement: "bottom"
            });

        });

    </script>
@endsection
