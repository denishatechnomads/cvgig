@section('styles')
    @include('template.resume.style')

    <div class="custom_resume_card custom-resume-card" style="min-height:29cm;max-width: 900px;margin: 0 auto;width: 100%;border: 1px solid #ccc;padding: 15px 35px;position: relative;box-shadow: 0 3px 4px rgba(0,0,0,.16);">
        <ul class="sortable contact-info ui-sortable" style="display: flex;padding-right: 40px;position: relative;">
            <li id="contact_name" class="resume-card-left" style="width: 50%;padding-right: 0%;">
                <div class="card-inner contact_name">
                    <div class="card-inner-left" style="position: relative;">
                        <div class="resumeAction">
                            {{-- <a class="btn-custom btn-red handle" title="move" id="contactNameMove" href="#">
                                <i class="fa fa-arrows"></i>
                            </a> --}}

                            <a class="btn-custom btn-red" title="Edit" id="contactInfoEdit" href="{{ route('resume.contact',$resume->id) }}">Edit</a>
                        </div>

                        <div class="green-bg" style="width: 60px;height: 80px;background-color: #11AF97; {{-- @if(isset($resume->style_section['color'])) {{ $resume->style_section['color'] }} @else #11AF97 @endif;  --}}"></div>

                        <div class="green-line" style="position: absolute;left: 0;top: 40px;width: 70%;border-bottom: 2px solid;"></div>
                    </div>

                    <div class="card-inner-right" style="padding-left: 15px">
                        <h2 class="resume-section-heading" style="font-size: 45px;font-weight: 600;text-transform: uppercase;letter-spacing: 3px;">{{ $resume->contact_info['name'] }}</h2>

                        <p style="font-size: 18px;
                            margin-bottom: 10px;
                            text-transform: uppercase;
                            letter-spacing: 2px;
                            margin-top: 10px;">@if(isset($experience['job_title'])){{ $experience['job_title'] }}@endif</p>
                    </div>
                </div>
            </li>

            @foreach($resume->sortable as $value)
                @if($value == "contact_info")
                    <li id="contact_info" class="resume-card-right" style="width: 50%;text-align: right;">
                        <div class="contactInfo">
                            <div class="resumeAction">
                                {{-- <a class="btn-custom btn-red handle" title="move" id="contactInfoMove" href="#">
                                    <i class="fa fa-arrows"></i>
                                </a> --}}

                                <a class="btn-custom btn-red" title="Edit" id="contactInfoEdit" href="{{ route('resume.contact',$resume->id) }}">Edit</a>
                            </div>

                            <p style="font-size: 12px;margin-bottom: 20px;letter-spacing: 2.4px;"></p>

                            <div class="contact-info-right">
                                <h3 class="resume-title resume-section-heading" style="position: relative;
                                    font-weight: 700;
                                    font-size: 19px;
                                    letter-spacing: 3.3px;
                                    text-transform: uppercase;
                                    padding-bottom: 5px;
                                    margin-bottom: 10px;
                                    display: inline-block;"> Contact
                                    <hr style="border-color: #11af97;
                                        margin-bottom: unset;
                                        position: absolute;
                                        right: 0;
                                        border-width: 2px 0 0;
                                        border-style: solid;
                                        width: 80px;
                                        bottom: 0;">
                                </h3>

                                <ul>
                                    <li class="Contact-inner-map" style="padding: 0px 0 10px;">
                                        <a href="#" style="color: #333;text-decoration: none;font-size: 12px;">
                                            <span>
                                                @if(isset($resume->contact_info['address']))
                                                    {{ $resume->contact_info['address'] }}
                                                @endif

                                                @if(isset($resume->contact_info['city']))
                                                    , {{ $resume->contact_info['city'] }}
                                                @endif

                                                @if(isset($resume->contact_info['state']))
                                                    , {{ $resume->contact_info['state'] }}
                                                @endif

                                                @if(isset($resume->contact_info['country']))
                                                    , {{ $resume->contact_info['country'] }}
                                                @endif

                                                @if(isset($resume->contact_info['zipcode']))
                                                    - {{ $resume->contact_info['zipcode'] }}
                                                @endif
                                            </span>
                                        </a>
                                    </li>

                                    <li class="Contact-inner-number" style="padding: 0px 0 10px;">
                                        <a href="#" style="color: #333;text-decoration: none;font-size: 12px;">
                                            <span>
                                                @if(isset($resume->contact_info['phone']))
                                                    {{ $resume->contact_info['phone'] }}
                                                @endif
                                            </span>
                                        </a>
                                    </li>

                                    <li class="Contact-inner-email" style="padding: 0px 0 10px;">
                                        <a href="#" style="color: #333;text-decoration: none;font-size: 12px;">
                                            <span>
                                                @if(isset($resume->contact_info['email']))
                                                    {{ $resume->contact_info['email'] }}
                                                @endif
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <li class="head-line" style="border-left: 1px solid;
                        content: '';
                        right: 25px;
                        position: absolute;
                        height: 120%;">
                    </li>
                @endif
            @endforeach
        </ul>

        <ul class="sortable experience-info ui-sortable" style="border-top: 5px solid #11AF97;
            margin-bottom: 25px;
            margin: 0 15px;">
            @foreach($resume->sortable as $value)
                @if($value == "summary")
                    <li class="experience-card-right" id="summary" style="padding-top: 13px;">
                        <div class="education-card-right-inner summary">
                            <div class="resumeAction">
                                <a class="btn-custom btn-red handle" title="move" id="summaryMove" href="#">
                                    <i class="fa fa-arrows"></i>
                                </a>

                                <a class="btn-custom btn-red" title="Edit" id="summaryEdit" href="{{ route('resume.summary',$resume->id) }}">Edit</a>
                            </div>

                            <h3 class="resume-title resume-section-heading" style="position: relative;
                                font-weight: 700;
                                font-size: 19px;
                                letter-spacing: 3.3px;
                                text-transform: uppercase;
                                padding-bottom: 5px;
                                margin-bottom: 10px;
                                display: inline-block;"> Summary
                                <hr style="border-color: #11af97;
                                    margin-bottom: unset;
                                    position: absolute;
                                    right: 0;
                                    border-width: 2px 0 0;
                                    border-style: solid;
                                    width: 80px;
                                    bottom: 0;">
                            </h3>

                            <div class="education-bottom-box" style="padding-bottom: 12px;">
                                <div class="education-bottom-box-right">
                                    <span>{!! $resume->summary !!}</span>
                                </div>
                            </div>
                        </div>
                    </li>
                @endif

                @if($value == "education")
                    <li class="experience-card-right" id="education" style="padding-top: 13px;">
                        <div class="education-card-right-inner education">
                            <div class="resumeAction">
                                <a class="btn-custom btn-red handle" title="move" id="educationMove" href="#">
                                    <i class="fa fa-arrows"></i>
                                </a>

                                <a class="btn-custom btn-red" title="Edit" id="educationEdit" href="{{ route('resume.education-review',$resume->id) }}">Edit</a>
                            </div>

                            <h3 class="resume-title resume-section-heading" style="position: relative;
                                font-weight: 700;
                                font-size: 19px;
                                letter-spacing: 3.3px;
                                text-transform: uppercase;
                                padding-bottom: 5px;
                                margin-bottom: 10px;
                                display: inline-block;"> Education
                                <hr style="border-color: #11af97;
                                    margin-bottom: unset;
                                    position: absolute;
                                    right: 0;
                                    border-width: 2px 0 0;
                                    border-style: solid;
                                    width: 80px;
                                    bottom: 0;">
                            </h3>

                            @if(isset($resume->education) && !empty($resume->education))
                                @foreach($resume->education as $education)
                                    <div class="education-bottom-box" style="padding-bottom: 12px;">
                                        <div class="education-bottom-box-left">
                                            <p style="font-size: 13px;font-weight: 800;margin-bottom: 10px;">
                                                @if(isset($education['school_name']))
                                                    {{ $education['school_name'] }} -
                                                @endif

                                                @if(isset($education['degree']))
                                                    {{ $education['degree'] }}
                                                @endif

                                                @if(isset($education['field']))
                                                    &nbsp {{ $education['field'] }}
                                                @endif

                                                @if(isset($education['currently_attend']) && $education['currently_attend'] == true)
                                                    (
                                                        Currently Attend
                                                    )
                                                @else
                                                    &nbsp(
                                                        @if(isset($education['month']))
                                                            {{ $education['month'] }}
                                                        @endif

                                                        @if(isset($education['year']))
                                                            {{ $education['year'] }}
                                                        @endif
                                                    )
                                                @endif
                                            </p>
                                        </div>

                                        <div class="education-bottom-box-right">
                                            <span style="font-size: 13px;padding-right: 80px;display: block;line-height: 21px;">
                                                {!!  $education['description'] !!}
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </li>
                @endif

                @if($value == "experience")
                    <li class="experience-card-right" id="experience" style="padding-top: 13px;">
                        <div class="education-card-right-inner experience">

                            <div class="resumeAction">
                                <a class="btn-custom btn-red handle" title="move" id="experienceMove" href="#">
                                   <i class="fa fa-arrows"></i>
                                </a>

                                <a class="btn-custom btn-red" title="Edit" id="experienceEdit" href="{{ route('resume.experience-review',$resume->id) }}">Edit</a>
                            </div>

                            <h3 class="resume-title resume-section-heading" style="position: relative;
                                font-weight: 700;
                                font-size: 19px;
                                letter-spacing: 3.3px;
                                text-transform: uppercase;
                                padding-bottom: 5px;
                                margin-bottom: 10px;
                                display: inline-block;"> Work experience
                                <hr style="border-color: #11af97;
                                    margin-bottom: unset;
                                    position: absolute;
                                    right: 0;
                                    border-width: 2px 0 0;
                                    border-style: solid;
                                    width: 80px;
                                    bottom: 0;">
                            </h3>

                            @if(isset($resume->experience_info) && !empty($resume->experience_info))
                                @foreach($resume->experience_info as $experience)
                                    <div class="education-bottom-box" style="padding-bottom: 12px;">
                                        <div class="education-bottom-box-left">
                                            <p style="font-size: 13px;font-weight: 800;margin-bottom: 10px;">
                                                @if(isset($experience['start_month']))
                                                    {{ $experience['start_month'] }}
                                                @endif

                                                @if(isset($experience['start_year']))
                                                    {{ $experience['start_year'] }}
                                                @endif

                                                -

                                                @if(isset($experience['is_present']) && $experience['is_present'] == true)
                                                    Preset
                                                @else
                                                    @if(isset($experience['end_month']))
                                                        {{ $experience['end_month'] }}
                                                    @endif

                                                    @if(isset($experience['end_year']))
                                                        {{ $experience['end_year'] }}
                                                    @endif
                                                @endif
                                            </p>
                                        </div>

                                        <div class="education-bottom-box-right">
                                            <span style="font-size: 13px;padding-right: 80px;display: block;line-height: 21px;">
                                                @if(isset($experience['job_description']))
                                                    {!!  $experience['job_description'] !!}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </li>
                @endif

                @if($value == "skills")
                    <li class="skills-info-left title-bg" style="padding-top: 13px;" id="skills">
                        <div class="skills-info-box skills">
                            <div class="resumeAction">
                                <a class="btn-custom btn-red handle" title="move" id="skillsMove" href="#">
                                    <i class="fa fa-arrows"></i>
                                </a>

                                <a class="btn-custom btn-red" title="Edit" id="skillsEdit" href="{{ route('resume.skills',$resume->id) }}">Edit</a>
                            </div>

                            <h3 class="resume-title resume-section-heading" style="position: relative;
                                font-weight: 700;
                                font-size: 19px;
                                letter-spacing: 3.3px;
                                text-transform: uppercase;
                                padding-bottom: 5px;
                                margin-bottom: 10px;
                                display: inline-block;"> Skills
                                <hr style="border-color: #11af97;
                                    margin-bottom: unset;
                                    position: absolute;
                                    right: 0;
                                    border-width: 2px 0 0;
                                    border-style: solid;
                                    width: 80px;
                                    bottom: 0;">
                            </h3>

                            {!! $resume->skills !!}
                        </div>
                    </li>
                @endif

                @if(isset($resume->extra_section[$value]) && !empty($resume->extra_section[$value]))
                    <li id="{{ $value }}" style="padding-top: 13px;">
                        <div class="@if(in_array($value,$resume->extra_section)) {{ $value }} @else other @endif">
                            <div class="resumeAction @if(in_array($value,$resume->extra_section)) {{ $value }} @else other @endif">
                                <a class="btn-custom btn-red handle" title="move" id="{{$value}}SectionMove" href="#">
                                    <i class="fa fa-arrows"></i>
                                </a>

                                <a class="btn-custom btn-red" title="Edit" id="{{$value}}SectionEdit" href="{{ route('resume.section',[$resume->id,$value]) }}">Edit</a>
                            </div>

                            <h3 class="resume-title resume-section-heading" style="position: relative;
                                font-weight: 700;
                                font-size: 19px;
                                letter-spacing: 3.3px;
                                text-transform: uppercase;
                                padding-bottom: 5px;
                                margin-bottom: 10px;
                                display: inline-block;"> {{ $value }}
                                <hr style="border-color: #11af97;
                                    margin-bottom: unset;
                                    position: absolute;
                                    right: 0;
                                    border-width: 2px 0 0;
                                    border-style: solid;
                                    width: 80px;
                                    bottom: 0;">
                            </h3>

                            {!! $resume->extra_section[$value] !!}
                        </div>
                    </li>
                @endif
            @endforeach

            @if(isset($resume->extra_section) && !empty($resume->extra_section))
                @foreach($resume->extra_section as $sectionKey => $section)
                    @if(!in_array($sectionKey,$resume->sortable))
                        <li id="{{ $sectionKey }}" style="padding-top: 13px;">
                            <div class="other">
                                <div class="resumeAction {{ $sectionKey }}">
                                    <a class="btn-custom btn-red handle" title="move" id="{{$sectionKey}}SectionMove" href="#">
                                        <i class="fa fa-arrows"></i>
                                    </a>

                                    <a class="btn-custom btn-red" title="Edit" id="{{$sectionKey}}SectionEdit" href="{{ route('resume.section',[$resume->id,$sectionKey]) }}">Edit</a>
                                </div>

                                <h3 class="resume-title resume-section-heading" style="position: relative;
                                    font-weight: 700;
                                    font-size: 19px;
                                    letter-spacing: 3.3px;
                                    text-transform: uppercase;
                                    padding-bottom: 5px;
                                    margin-bottom: 10px;
                                    display: inline-block;"> {{ $sectionKey }}
                                    <hr style="border-color: #11af97;
                                        margin-bottom: unset;
                                        position: absolute;
                                        right: 0;
                                        border-width: 2px 0 0;
                                        border-style: solid;
                                        width: 80px;
                                        bottom: 0;">
                                </h3>

                                {!! $resume->extra_section[$sectionKey] !!}
                            </div>
                        </li>
                    @endif
                @endforeach
            @endif

            <li class="skills-info-right" style="border-bottom: 1px solid #000;
                width: 40%;
                position: absolute;
                right: 0;
                bottom: 60px;">
            </li>
        </ul>

        <div class="border-bottom" style="height: 200px;
            width: 30px;
            background: #11af97;
            position: absolute;
            left: 0;
            bottom: 0;">
        </div>

        <div class="border-right" style="height: 300px;
            width: 30px;
            background: #11af97;
            position: absolute;
            right: 0;
            bottom: 40%;">
        </div>
    </div>
