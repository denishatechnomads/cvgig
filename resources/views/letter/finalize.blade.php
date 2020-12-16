@extends('user.layout.master')
@section('title','Finalize Letter')
@section('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
    <main>
        <div class="top-nav">
            <div class="logo-box">
                <a href="{{ url('/') }}"><img src="{{ asset('front/images/logo.png') }}" height="45" alt=""></a>
            </div>
            @can('isUser')
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

        <section class="content-panel">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-row">
                            <h3 class="fw-600 resumeTitle"><i class="fa fa-pencil"></i> {{ $userLetter->title }}</h3>
                            <div class="resumeTitleEdit collapse">
                                <form action="{{ route('letter.update',$userLetter->id) }}" method="post">
                                    @csrf
                                    <div class="select-resume input-group mb-3">
                                        <input type="text" class="form-control" name="title"
                                               value="{{ $userLetter->title }}">
                                        <div class="input-group-prepend">
                                            <button type="submit" class="input-group-text" id="saveTitleBtn">
                                                &nbsp;<i class="fa fa-check"></i>&nbsp;
                                            </button>
                                            <button type="button" class="input-group-text cancel-btn"
                                                    id="cancelTitleBtn">
                                                &nbsp;<i class="fa fa-times"></i>&nbsp;
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="button-group">
                                @if (!Auth::check())
                                    <a class="btn primary-btn text-uppercase mr-3" data-toggle="modal"
                                       data-target="#downloadModal">
                                        <i class="fa fa-download"></i><span> {{ __('fields.download') }}</span>
                                    </a>
                                    <a class="btn btn-outline-secondary text-uppercase mr-3" data-toggle="modal"
                                       data-target="#downloadModal">
                                        <i class="fa fa-print"></i><span> {{ __('fields.print') }}</span>
                                    </a>
                                    <a class="btn btn-outline-secondary text-uppercase" data-toggle="modal"
                                       data-target="#downloadModal">
                                        <i class="fa fa-envelope"></i><span> {{ __('fields.email') }}</span>
                                    </a>
                                @else
                                    <a class="btn primary-btn text-uppercase mr-3"
                                       href="{{ route('letter.download',$userLetter->id) }}">
                                        <i class="fa fa-download"></i><span> {{ __('fields.download') }}</span>
                                    </a>
                                    <a class="btn btn-outline-secondary text-uppercase mr-3 print" id="print"
                                       href="{{ route('letter.print',$userLetter->id) }}">
                                        <i class="fa fa-print"></i><span> {{ __('fields.print') }}</span>
                                    </a>
                                    <a class="btn btn-outline-secondary text-uppercase"
                                       href="{{ route('letter.email',$userLetter->id) }}">
                                        <i class="fa fa-envelope"></i><span> {{ __('fields.email') }}</span>
                                    </a>
                                @endif

                                <a class="btn btn-outline-secondary text-uppercase" href="#" onclick="openNav()">
                                    <i class="fa fa-sliders"></i><span> {{ __('fields.formatting') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-7">
                        @include('notification')
                        <div class="row">
                            <div class="col-sm-12">
                                <form class="" method="POST" action="{{ route('letter.save') }}" autofocus="off">
                                    @csrf
                                    <input type="hidden" name="type" value="finalize">
                                    <input type="hidden" name="letter_id" value="{{ $userLetter->id }}">
                                    <div class="resume-img mb-3">
                                        <div class="img-fluid resume_card finalized">
                                            @if(View::exists($userLetter->template->path))
                                                @includeIf($userLetter->template->path)
                                            @else
                                                @include('template.letter.common')
                                            @endif
                                        </div>
                                    </div>
                                    <div>
                                        <a class="btn btn-outline-secondary text-center text-uppercase"
                                           href="{{ route('letter.closer') }}">{{__('fields.back') }}</a>
                                        @if (!Auth::check())
                                            <a class="btn primary-btn text-center text-uppercase" data-toggle="modal"
                                               data-target="#downloadModal">{{__('fields.save&next') }}</a>
                                        @else
                                            <button type="submit"
                                                    class="btn primary-btn text-center text-uppercase">{{__('fields.save&next') }}</button>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 template_card">

                        <h5 class="pb-2">{{ __('message.letterDesign') }}</h5>
                        <div class="templateList">
                            <div class="row">
                                @foreach($templates as $template)
                                    <div class="col-sm-6 pb-10">
                                        <a href="#" class="text-center text-dark">
                                            <div class="card border-dark p-10">
                                                @if($template->image == 'default.png')
                                                    <img alt="{{ $template->name }}"
                                                         src="{{ asset('images/'.$template->image) }}"
                                                         class="rounded mx-auto d-block">
                                                @else
                                                    <img alt="{{ $template->name }}"
                                                         src="{{ Storage::url($template->image) }}"
                                                         class="card-img-top">
                                                @endif

                                                <div class="card-body text-center">
                                                    <a class="btn primary-btn text-uppercase"
                                                       href="{{ route('letter.template.update',[$userLetter->id, $template->id]) }}">{{ __('fields.chooseResume') }}</a>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        {{-- Style Slider --}}
        <div id="mySidenav" class="sidenav">
            <div class="row sidenav-header">
                <div class="col-sm-10">
                    {{ __('fields.customFormatting') }}
                </div>
                <div class="col-sm-2">
                    <a href="javascript:void(0)" class="closeBtn" onclick="closeNav()"><i class="fa fa-times"></i> </a>
                </div>
            </div>
            <div class="row sidenav-body resume-style-section">
                <div class="col-sm-12 customStyle">
                    <div class="form-group">
                    <span
                        class="styleIcon boldStyle @if(isset($userLetter->style_section['font_weight'])) active @endif"
                        title="font bold"
                        data-value="@if(isset($userLetter->style_section['font_weight'])){{ $userLetter->style_section['font_weight'] }} @endif">
                        <i class="fa fa-bold"></i></span>
                        <span
                            class="styleIcon italicStyle @if(isset($userLetter->style_section['font_style'])) active @endif"
                            title="font italic"
                            data-value="@if(isset($userLetter->style_section['font_style'])){{ $userLetter->style_section['font_style'] }} @endif">
                        <i class="fa fa-italic"></i></span>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        @php
                            $fontFamilies = [
                                    "Arial","Bodoni MT","Century Gothic","Courier New","Georgia","Palatino Linotype","Tahoma","Times New Roman",
                                    "Trebuchet MS","Verdana","Roboto","Source Sans Pro","Merriweather"
                                    ];
                        @endphp
                        <label for="exampleInputEmail1">{{ __('fields.fontStyle') }}</label>
                        <select name="font_family" class="form-control resumeFontFamily"
                                title="{{ __('fields.fontStyle') }}">
                            @foreach($fontFamilies as $font)
                                <option value="{{ $font }}"
                                        @if(isset($userLetter->style_section['font_family']) && $userLetter->style_section['font_family'] == $font) selected @endif
                                ">
                                {{ $font }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">{{ __('fields.fontSize') }}</label>
                        <select name="size" class="form-control resumeSize" title="{{ __('fields.fontSize') }}">
                            @for($i = 8; $i <= 25 ; $i++)
                                <option value="{{ $i }}"
                                        @if(isset($userLetter->style_section['font_size']) && $userLetter->style_section['font_size'] == $i) selected @endif
                                ">{{ $i }}</option>
                            @endfor

                        </select>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="resumeLineHeight">{{ __('fields.lineSpacing') }}</label>
                        <select name="line_height" class="form-control resumeLineHeight"
                                title="{{ __('fields.lineSpacing') }}">
                            @for($i = 0; $i <= 5 ; $i+=0.2)
                                <option value="{{ $i }}"
                                        @if(isset($userLetter->style_section['line_height']) && $userLetter->style_section['line_height'] == $i) selected @endif
                                ">{{ $i }}</option>
                            @endfor

                        </select>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="resumeSideMargins">{{ __('fields.sideMargins') }}</label>
                        <select name="side_margin" class="form-control resumeSideMargins"
                                title="{{ __('fields.sideMargins') }}">
                            @for($i = 0; $i <= 100 ; $i+=5)
                                <option value="{{ $i }}"
                                        @if(isset($userLetter->style_section['side_padding']) && $userLetter->style_section['side_padding'] == $i) selected @endif
                                ">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="resumeTopBottomMargins">{{ __('fields.topBottomMargins') }}</label>
                        <select name="top_bottom_padding" class="form-control resumeTopBottomMargins"
                                title="{{ __('fields.topBottomMargins') }}">
                            @for($i = 0; $i <= 100 ; $i+=5)
                                <option value="{{ $i }}"
                                        @if(isset($userLetter->style_section['top_bottom_padding']) && $userLetter->style_section['top_bottom_padding'] == $i) selected @endif
                                ">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <a class="btn btn-default text-uppercase"
                           href="{{ route('letter.style.reset',$userLetter->id) }}">
                            {{ __('fields.defaultFormatting') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>

        @include('user.login_model')
        <div id="app"></div>
    </main>
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.printPage.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {

            $(function  () {
                $(".sortable").sortable({
                    handle: '.handle',
                    start: function(e, ui) {
                    },
                    update: function(e, ui) {
                        var productOrder = $(this).sortable('toArray').toString();
                        updateSortingOrder(productOrder);
                        // console.log("productOrder:",productOrder);
                    }
                });
            });


            $(".resumeSize").bind("change", function () {
                var value = $(".resumeSize option:selected").text();
                $(".custom_resume_card").css("font-size", value);
                updateStyle('font_size', value);
            });

            $(".resumeFontFamily").bind("change", function () {
                var value = $(".resumeFontFamily option:selected").text();
                $(".custom_resume_card").css("font-family", value);
                updateStyle('font_family', value);
            });
            $(".resumeLineHeight").bind("change", function () {
                var value = $(".resumeLineHeight option:selected").text();
                $(".custom_resume_card").css("line-height", value);
                updateStyle('line_height', value);
            });

            $(".resumeParagraphHeight").bind("change", function () {
                var value = $(".resumeParagraphHeight option:selected").text();
                $(".custom_resume_card").css("line-height", value);
                updateStyle('paragraph_height', value);
            });

            $(".resumeSideMargins").bind("change", function () {
                var value = $(".resumeSideMargins option:selected").text();
                $(".custom_resume_card").css("padding-left", value + "px");
                $(".custom_resume_card").css("padding-right", value + "px");
                updateStyle('side_padding', value);
            });

            $(".resumeTopBottomMargins").bind("change", function () {
                var value = $(".resumeTopBottomMargins option:selected").text();
                $(".custom_resume_card").css("padding-top", value + "px");
                $(".custom_resume_card").css("padding-right", value + "px");
                updateStyle('top_bottom_padding', value);
            });

            $(".resumeParagraphIndent").bind("change", function () {
                var value = $(".resumeParagraphIndent option:selected").text();
                $(".custom_resume_card p,ul").css("padding-left", value + "px");
                updateStyle('paragraph_indent', value);
            });

            $(".boldStyle").bind("click", function () {
                var value = $(this).data('value');
                if (value == "") {
                    value = "bold";
                    $(".custom_resume_card").css("font-weight", value);
                    $(this).data('value', value);
                    $(this).addClass('active');

                } else {
                    value = "";
                    $(".custom_resume_card").css("font-weight", value);
                    $(this).data('value', value);
                    $(this).removeClass('active');
                }
                updateStyle('font_weight', value);
            });

            $(".italicStyle").bind("click", function () {

                var value = $(this).data('value');

                if (value == "") {
                    value = "italic";
                    $(".custom_resume_card").css("font-style", value);
                    $(this).data('value', value);
                    $(this).addClass('active');

                } else {
                    value = "";
                    $(".custom_resume_card").css("font-style", value);
                    $(this).data('value', value);
                    $(this).removeClass('active');
                }
                updateStyle('font_style', value);
            });

            /* Rename Resume */
            $(".resumeTitle").bind("click", function () {
                $(".resumeTitleEdit").show();
                $(this).hide();
            });

            $("#cancelTitleBtn").bind("click", function () {
                $(".resumeTitleEdit").hide();
                $(".resumeTitle").show();
            });
            /* -- End Rename Resume-- */

            /* Add Section */
            $(".addSection").bind("click", function () {
                var section = $("input[name='section']:checked").val();
                if (section == "" || section == undefined) {
                    alert("Please select section");
                    return false;
                }
                window.location.href = "/resume/" + {{ $userLetter->id }} +"/section/" + section;
            });

            /* Printing Section */
            $(".print").printPage();

            // $("#checkSpellingBtn").click(function(){
            //     // $('#textarea').spellCheckInDialog();
            //     $Spelling.SpellCheckInWindow(['name','city']);
            // });

        });

        function updateStyle(field, value) {
            var url = "{{ route('letter.style.update',$userLetter->id) }}";
            var data = {type: field, value: value};

            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: url,
                data: data,
                success: function (result) {
                    console.log("result: ", result);
                }

            });
        }

        function updateSortingOrder(ordering) {
            var url = "{{ route('letter.update.sortable',$userLetter->id) }}";
            var data = {sortable: ordering};

            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: url,
                data: data,
                success: function (result) {
                    console.log("result: ", result);
                }

            });
        }
    </script>
@endsection
