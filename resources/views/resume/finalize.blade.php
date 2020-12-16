@extends('user.layout.master')
@section('title','Finalize Resume')
@section('styles')
{{--    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">--}}
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

            @guest
                <div class="user-account dropdown">
                    <button class="btn dropdown-toggle" type="button">
                            Guest User
                    </button>
                </div>
            @endguest
        </div>
        <section>
        <div class="row no-gutters">
                <div class="col-xl-9">
                    <div class="content-panel">
                            <div class="title-row">
                                <h3 class="fw-600 resumeTitle"><img src="{{ asset('front/images/icons/edit.svg') }}" alt="edit-icon"> <span id="title-text">{{ $resume->title }}</span></h3>
                                <div class="resumeTitleEdit collapse">
                                    {{-- <form action="{{ route('resume.update',$resume->id) }}" method="post">
                                        @csrf --}}
                                        <div class="select-resume input-group mb-3">
                                            <input type="text" class="form-control" name="title" id="title"
                                                value="{{ $resume->title }}">
                                            <div class="input-group-prepend">
                                                <button type="button" class="input-group-text" id="saveTitleBtn">
                                                    &nbsp;<i class="fa fa-check"></i>&nbsp;
                                                </button>
                                                <button type="button" class="input-group-text cancel-btn"
                                                        id="cancelTitleBtn">
                                                    &nbsp;<i class="fa fa-times"></i>&nbsp;
                                                </button>
                                            </div>
                                        </div>
                                    {{-- </form> --}}
                                </div>
                                <div class="button-group">
                                    @if (!Auth::check())
                                        <a class="btn primary-btn text-uppercase mr-2" data-toggle="modal" data-target="#downloadModal">
                                            <i class="fa fa-download"></i><span> {{ __('fields.download') }}</span>
                                        </a>
                                        <a class="btn secondary-btn text-uppercase mr-2" data-toggle="modal" data-target="#downloadModal">
                                            <i class="fa fa-print"></i><span> {{ __('fields.print') }}</span>
                                        </a>
                                        <a class="btn secondary-btn text-uppercase" data-toggle="modal" data-target="#downloadModal">
                                            <i class="fa fa-envelope"></i><span> {{ __('fields.email') }}</span>
                                        </a>
                                    @else
                                        <a class="btn primary-btn text-uppercase mr-2"
                                        href="{{ route('resume.download',$resume->id) }}">
                                            <i class="fa fa-download"></i><span> {{ __('fields.download') }}</span>
                                        </a>
                                        <a class="btn secondary-btn text-uppercase mr-2 print" id="print"
                                        href="{{ route('resume.print',$resume->id) }}">
                                            <i class="fa fa-print"></i><span> {{ __('fields.print') }}</span>
                                        </a>
                                        <a class="btn secondary-btn text-uppercase"
                                        href="{{ route('resume.email',$resume->id) }}">
                                            <i class="fa fa-envelope"></i><span> {{ __('fields.email') }}</span>
                                        </a>
                                    @endif

                                    <a class="btn secondary-btn text-uppercase ml-2" href="#" onclick="openNav()">
                                        <i class="fa fa-sliders"></i><span> {{ __('fields.formatting') }}</span>
                                    </a>

                                </div>
                            </div>
                        @include('notification')
                        <div class="row column-reverse-sm">
                            <div class="col-md-9">
                                <form class="" method="POST" action="{{ route('resume.save') }}" autofocus="off">
                                    @csrf
                                    <input type="hidden" name="type" value="finalize">
                                    <input type="hidden" name="resume_id" value="{{ $resume->id }}">
                                    <div class="resume-img mb-3">
                                        <div class="img-fluid resume_card finalized" style="box-shadow: unset;margin-bottom: unset;padding: 0px 0px 30px;">
                                            @if(View::exists($resume->template->path))
                                                @includeIf($resume->template->path)
                                            @else
                                                @include('template.resume.common')
                                            @endif
                                        </div>
                                    </div>
                                    <div>
                                        <a class="btn btn-outline-secondary text-center text-uppercase mr-2"
                                           href="{{ route('resume.summary',$resume->id) }}">{{__('fields.back') }}</a>
                                        @if (!Auth::check())
                                            <a class="btn primary-btn text-center text-uppercase" data-toggle="modal"
                                               data-target="#downloadModal">{{__('fields.save&next') }}</a>
                                        @else
                                            <button type="submit" class="btn primary-btn text-center text-uppercase">{{__('fields.save&next') }}</button>
                                        @endif
                                    </div>
                                </form>
                            </div>

                            <div class="col-md-3 col-lg-3  mt-30">
                                <div>
                                <div class="color-box ">
                                @php
                                    $colors = [
                                                "#000000","#436975","#305fec","#0e9fc1","#dc3545","#7ebca3","#acb75a",
                                                "#9097be","#ac7bae","#f46464","#96006f","#c5a3ab","#d39c00","#fd7e14"
                                            ];
                                @endphp
                                @foreach($colors as $color)
                                    <div
                                        class="item mb-1 @if(isset($resume->style_section['color']) && $resume->style_section['color'] == $color) selected @endif"
                                        data-code="{{ $color }}"></div>
                                @endforeach</div>

                                <div class="mb-4">
                                    <a href="#" class=" dashed-box text-center text-dark" data-toggle="modal"
                                       data-target="#sectionModal">
                                        <img src="{{ asset('front/images/add.svg')}}" height="60" class="mb-4 mt-4"
                                             alt="">
                                        <h4 class="fw-600 mb-3">{{ __('message.addSection') }}</h4>
                                    </a>
                                </div>
{{--                                <div class="">--}}
{{--                                    <a href="#" class="dashed-box text-center text-dark" id="checkSpellingBtn">--}}
{{--                                        <img src="{{ asset('front/images/add.svg')}}" height="60" class="mb-4 mt-4"--}}
{{--                                             alt="">--}}
{{--                                        <h4 class="fw-600 mb-3">{{ __('message.spellCheck') }}</h4>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
                            </div>
                                        </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-xl-3 template_card ">
                        <h5 >{{ __('message.changeTemplate') }}</h5>
                        <div class="templateList">
                            @foreach($templates as $template)
                            <a href="#" >
                                            <div class="template-item">
                                                @if($template->image == 'default.png')
                                                    <img alt="{{ $template->name }}"
                                                         src="{{ asset('images/'.$template->image) }}"
                                                         class="rounded mx-auto d-block"
                                                        >
                                                @else
                                                    <img alt="{{ $template->name }}"
                                                         src="{{ asset('storage/'.$template->image) }}"
                                                         class="resume-shadow"
                                                         >
                                                @endif

                                                <div class="card-body text-center">
                                                    <a class="btn primary-btn text-uppercase"
                                                       href="{{ route('resume.template.update',[$resume->id,$template->id]) }}">{{ __('fields.chooseResume') }}</a>
                                                </div>
                                            </div>
                             </a>
                            @endforeach
                        </div>
                    </div>
                </div>
        </section>

        <!-- Modal -->
        <div class="modal fade" id="sectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('message.sectionTitle') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            @foreach($sections as $section)
                                <div class="col-sm-6">
                                    <label class="radio-inline p-10">
                                        <input type="radio" name="section" value="{{ $section }}"
                                               class="selectSection"> {{ __('message.'.$section) }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="radio-inline p-10">
                                    <input type="radio" name="section" value="other"
                                           class="selectSection otherSection"> {{ __('message.Other') }}
                                </label>
                                <input type="text" class="form-control collapse" name="other_section" value="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary text-center text-uppercase mr-2"
                                data-dismiss="modal">{{__('fields.back') }}</button>
                        <button type="button"
                                class="btn primary-btn text-center text-uppercase addSection">{{__('fields.save&next') }}</button>
                    </div>
                </div>
            </div>
        </div>
        @include('user.login_model')
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
                    <span class="styleIcon boldStyle @if(isset($resume->style_section['font_weight'])) active @endif" title="font bold"
                          data-value="@if(isset($resume->style_section['font_weight'])){{ $resume->style_section['font_weight'] }} @endif">
                        <i class="fa fa-bold"></i></span>
                    <span class="styleIcon italicStyle @if(isset($resume->style_section['font_style'])) active @endif" title="font italic"
                        data-value="@if(isset($resume->style_section['font_style'])){{ $resume->style_section['font_style'] }} @endif">
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
                        <select name="font_family" class="form-control resumeFontFamily" title="{{ __('fields.fontStyle') }}">
                            @foreach($fontFamilies as $font)
                                <option value="{{ $font }}"
                                        @if(isset($resume->style_section['font_family']) && $resume->style_section['font_family'] == $font) selected @endif
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
                                        @if(isset($resume->style_section['font_size']) && $resume->style_section['font_size'] == $i) selected @endif
                                ">{{ $i }}</option>
                            @endfor

                        </select>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="resumeLineHeight">{{ __('fields.lineSpacing') }}</label>
                        <select name="line_height" class="form-control resumeLineHeight" title="{{ __('fields.lineSpacing') }}">
                            @for($i = 0; $i <= 5 ; $i+=0.2)
                                <option value="{{ $i }}"
                                        @if(isset($resume->style_section['line_height']) && $resume->style_section['line_height'] == $i) selected @endif
                                ">{{ $i }}</option>
                            @endfor

                        </select>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="resumeParagraphHeight">{{ __('fields.paragraphSpacing') }}</label>
                        <select name="paragraph_height" class="form-control resumeParagraphHeight"
                                title="{{ __('fields.paragraphSpacing') }}">
                            @for($i = 0; $i <= 5 ; $i+=0.2)
                                <option value="{{ $i }}"
                                        @if(isset($resume->style_section['paragraph_height']) && $resume->style_section['paragraph_height'] == $i) selected @endif
                                ">{{ $i }}</option>
                            @endfor

                        </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="resumeSideMargins">{{ __('fields.sideMargins') }}</label>
                        <select name="side_margin" class="form-control resumeSideMargins" title="{{ __('fields.sideMargins') }}">
                            @for($i = 0; $i <= 100 ; $i+=5)
                                <option value="{{ $i }}"
                                        @if(isset($resume->style_section['side_padding']) && $resume->style_section['side_padding'] == $i) selected @endif
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
                                        @if(isset($resume->style_section['top_bottom_padding']) && $resume->style_section['top_bottom_padding'] == $i) selected @endif
                                ">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="resumeParagraphIndent">Paragraph Indent</label>
                        <select name="paragraph_indent" class="form-control resumeParagraphIndent"
                                title="Paragraph Indent">
                            @for($i = 0; $i <= 100 ; $i+=5)
                                <option value="{{ $i }}"
                                        @if(isset($resume->style_section['paragraph_indent']) && $resume->style_section['paragraph_indent'] == $i) selected @endif
                                ">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <a class="btn btn-default text-uppercase" href="{{ route('resume.style.reset',$resume->id) }}">
                            {{ __('fields.defaultFormatting') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
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
                        // creates a temporary attribute on the element with the old index
                        // $(this).attr('data-previndex', ui.item.index());
                    },
                    update: function(e, ui) {
                        var productOrder = $(this).sortable('toArray').toString();
                        updateSortingOrder(productOrder);
                        // console.log("productOrder:",productOrder);
                    }
                });
            });


            $(".color-box .item").each(function (index) {
                $(this).css("background-color", $(this).data('code'));
            });

            $(".color-box .item").click(function () {
                $(".color-box .item").removeClass('selected');
                $(this).addClass('selected');
                $(".resume-section-heading").css("color", $(this).data('code'));
                updateStyle('color', $(this).data('code'));
            });

            $(".resumeSize").bind("change", function () {
                var value = $(".resumeSize option:selected").text();
                $(".resume-section-heading").css("font-size", value);
                updateStyle('font_size', value);
            });

            $(".resumeFontFamily").bind("change", function () {
                var value = $(".resumeFontFamily option:selected").text();
                $(".custom_resume_card").css("font-family", value);
                updateStyle('font_family', value);
            });
            $(".resumeLineHeight").bind("change", function () {
                var value = $(".resumeLineHeight option:selected").text();
                $(".resume-section-heading").css("line-height", value);
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
                    $(".resume-section-heading").css("font-weight", value);
                    $(this).data('value', value);
                    $(this).addClass('active');

                } else {
                    value = "";
                    $(".resume-section-heading").css("font-weight", value);
                    $(this).data('value', value);
                    $(this).removeClass('active');
                }
                updateStyle('font_weight', value);
            });

            $(".italicStyle").bind("click", function () {

                var value = $(this).data('value');

                if (value == "") {
                    value = "italic";
                    $(".resume-section-heading").css("font-style", value);
                    $(this).data('value', value);
                    $(this).addClass('active');

                } else {
                    value = "";
                    $(".resume-section-heading").css("font-style", value);
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
                $('#title').val($('#title-text').text());
                $(".resumeTitleEdit").hide();
                $(".resumeTitle").show();
            });

            $('#saveTitleBtn').click(function() {
                $.ajax({
                    url: "{{ route('resume.updateAjax', $resume->id) }}",
                    type: 'POST',
                    async: false,
                    data: {
                        title: $('#title').val(),
                    },
                    success: function(data) {
                        if(data == 1) {
                            $('#title-text').text($('#title').val());
                            $(".resumeTitleEdit").hide();
                            $(".resumeTitle").show();
                        }
                    }
                });
            });
            /* -- End Rename Resume-- */

            /* Add Section */
            $("input[name='section']").change(function () {
                if ($("input[name='section']:checked").val() == 'other') {
                    $("input[name='other_section']").removeClass("collapse");
                }else{
                    $("input[name='other_section']").addClass("collapse");
                }
            });

            $(".addSection").bind("click", function () {
                var section = $("input[name='section']:checked").val();

                if(section == "other"){
                    section = $("input[name='other_section']").val();
                }
                if (section == "" || section == undefined) {
                    alert("Please select section");
                    return false;
                }
                window.location.href = "/resume/" + {{ $resume->id }} +"/section/" + section;
            });

            /* Printing Section */
            $(".print").printPage();

            // $("#checkSpellingBtn").click(function(){
            //     // $('#textarea').spellCheckInDialog();
            //     $Spelling.SpellCheckInWindow(['name','city']);
            // });

        });

        function updateStyle(field, value) {
            var url = "{{ route('resume.style.update',$resume->id) }}";
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
            var url = "{{ route('resume.update.sortable',$resume->id) }}";
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
