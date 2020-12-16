@section('styles')
    @include('template.resume.style')

    <div class="custom_resume_card custom-resume-card" style="min-height:29cm;overflow: hidden;max-width: 950px; margin: 0 auto; width: 100%; border: 1px solid #ccc;box-shadow: 0 3px 4px rgba(0,0,0,.16);">
        <div class="resume-card-inner" style="position: relative;">
            <div class="experience-info" style="display: flex;">
                <ul class="sortable contact-info experience-card-right ui-sortable" style="width: 40%; background-color: #88c8af; padding: 20px; position: relative;">
                    <li id="contact_name" class="resume-card-left">
                        <div class="card-inner contact_name">
                            <div class="card-inner-right">
                                <div class="resumeAction">

                                    <a class="btn-custom btn-red" title="Edit" id="contactInfoEdit" href="{{ route('resume.contact',$resume->id) }}">Edit</a>
                                </div>

                                <div class="title-resume-card" style="padding: 5px 0 25px;">
                                    <h1 class="resume-section-heading" style="font-size: 41px; margin-bottom: 0; text-transform: capitalize; font-weight: 500; position: relative;"><b>{{ $resume->contact_info['name'] }}</b></h1>
                                </div>
                            </div>
                        </div>
                    </li>

                    @foreach($resume->sortable as $value)
                        @if($value == "contact_info")
                            <li id="contact_info" class="Contact-box" style="padding: 10px 0 20px; width: 100%;">
                                <div class="contactInfo">
                                    <div class="resumeAction">
                                        <a class="btn-custom btn-red handle" title="move" id="contactInfoMove" href="#">
                                            <i class="fa fa-arrows"></i>
                                        </a>

                                        <a class="btn-custom btn-red" title="Edit" id="contactInfoEdit" href="{{ route('resume.contact',$resume->id) }}">Edit</a>
                                    </div>

                                    <h3 class="resume-section-heading" style="font-size: 16px;
                                        text-transform: uppercase;
                                        font-weight: 700;
                                        margin-bottom: 10px;
                                        position: relative;
                                        padding-bottom: 10px;
                                        width: 100%;
                                        display: flex;
                                        justify-content: space-between;
                                        align-items: center;
                                        letter-spacing: 3px;">
                                        <span>Contact</span>

                                        <p style="width: 150px; border-bottom: 1px solid #5b5b5b;"></p>
                                    </h3>

                                    <div class="Contact-box-info">
                                        <ul>
                                            @if(isset($resume->contact_info['email']))
                                                <li class="contact-inner-col" style="margin-bottom: 10px;">
                                                    <a href="#" style="display: flex; align-items: center; font-weight: 500; color: #000; font-size: 14px;">
                                                        <span style="width: 30px; height: 30px; border-radius: 100%; line-height: 30px; text-align: center; margin-right: 10px;"><i class="fa fa-envelope" aria-hidden="true"></i></span>

                                                        <span>
                                                            {{ $resume->contact_info['email'] }}
                                                        </span>
                                                    </a>
                                                </li>
                                            @endif

                                            @if(isset($resume->contact_info['phone']))
                                                <li class="contact-inner-col" style="margin-bottom: 10px;">
                                                    <a href="#" style="display: flex; align-items: center; font-weight: 500; color: #000; font-size: 14px; ">
                                                        <span style="width: 30px; height: 30px; border-radius: 100%; line-height: 30px; text-align: center; margin-right: 10px;"><i class="fa fa-phone" aria-hidden="true"></i></span>

                                                        <span>
                                                            {{ $resume->contact_info['phone'] }}
                                                        </span>
                                                    </a>
                                                </li>
                                            @endif

                                            @if(isset($resume->contact_info['address']) || isset($resume->contact_info['city']) || isset($resume->contact_info['state']) || isset($resume->contact_info['country']) || isset($resume->contact_info['zipcode']))
                                                <li class="contact-inner-col" style="margin-bottom: 10px;">
                                                    <a href="#" style="display: flex; align-items: center; font-weight: 500; color: #000; font-size: 14px;">
                                                        <span style="width: 30px; height: 30px; border-radius: 100%; line-height: 30px; text-align: center; margin-right: 10px;"><i class="fa fa-map-marker" aria-hidden="true"></i></span>

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
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        @endif

                        @if($value == "skills")
                            <li class="skills-info" id="skills" style="display: flex; width: 100%;">
                                <div class="skills-info-left title-bg skills" style="width: 100%; padding: 0 0 20px;">
                                    <div class="skills-info-box">
                                        <div class="resumeAction">
                                            <a class="btn-custom btn-red handle" title="move" id="skillsMove" href="#">
                                                <i class="fa fa-arrows"></i>
                                            </a>

                                            <a class="btn-custom btn-red" title="Edit" id="skillsEdit" href="{{ route('resume.skills',$resume->id) }}">Edit</a>
                                        </div>

                                        <h3 class="resume-section-heading" style="font-size: 16px;
                                            text-transform: uppercase;
                                            font-weight: 700;
                                            margin-bottom: 10px;
                                            position: relative;
                                            padding-bottom: 10px;
                                            width: 100%;
                                            display: flex;
                                            justify-content: space-between;
                                            align-items: center;
                                            letter-spacing: 3px;">
                                            <span>Skills</span>

                                            <p style="width: 150px; border-bottom: 1px solid #5b5b5b;"></p>
                                        </h3>

                                        {!! $resume->skills !!}
                                    </div>
                                </div>
                            </li>
                        @endif

                        @if($value == "summary")
                            <li id="summary">
                                <div class="education-card-right-inner summary">
                                    <div class="resumeAction">
                                        <a class="btn-custom btn-red handle" title="move" id="contactInfoMove" href="#">
                                            <i class="fa fa-arrows"></i>
                                        </a>

                                        <a class="btn-custom btn-red" title="Edit" id="contactInfoEdit" href="{{ route('resume.contact',$resume->id) }}">Edit</a>
                                    </div>

                                    <h3 class="resume-section-heading" style="
                                        font-size: 16px;
                                        text-transform: uppercase;
                                        font-weight: 700;
                                        margin-bottom: 10px;
                                        position: relative;
                                        padding-bottom: 10px;
                                        width: 100%;
                                        display: flex;
                                        justify-content: space-between;
                                        align-items: center;
                                        letter-spacing: 3px;">
                                        <span>SUMMARY</span>

                                        <p style="width: 150px; border-bottom: 1px solid #5b5b5b;"></p>
                                    </h3>

                                    <div class="education-bottom-box">
                                        <div class="education-bottom-box-right">
                                            <div class="box-title">
                                                <div class="text" style="line-height: 24px; font-weight: 500;">
                                                    {!! $resume->summary !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>

                <ul class="sortable contact-info-right ui-sortable" style="width: 60%; display: inline-block; position: relative; padding: 60px 20px 30px;">
                    @foreach($resume->sortable as $value)
                        @if($value == "education")
                            <li id="education">
                                <div class="education-card-right-inner education">
                                    <div class="resumeAction">
                                        <a class="btn-custom btn-red handle" title="move" id="educationMove" href="#">
                                            <i class="fa fa-arrows"></i>
                                        </a>

                                        <a class="btn-custom btn-red" title="Edit" id="educationEdit" href="{{ route('resume.education-review',$resume->id) }}">Edit</a>
                                    </div>

                                    <h3 class="resume-section-heading" style="font-size: 16px;
                                            text-transform: uppercase;
                                            font-weight: 700;
                                            margin-bottom: 10px;
                                            position: relative;
                                            padding-bottom: 10px;
                                            width: 100%;
                                            display: flex;
                                            justify-content: space-between;
                                            align-items: center;
                                            letter-spacing: 3px;">
                                        <span>EDUCATION</span>

                                        <p style="width: 150px; border-bottom: 1px solid #5b5b5b;"></p>
                                    </h3>

                                    @if(isset($resume->education) && !empty($resume->education))
                                        @foreach($resume->education as $education)
                                            <div class="education-bottom-box" style="width: 100%; margin-bottom: 20px; padding-left: 15px; position: relative; padding-bottom: 0;">
                                                <div style="border-left: 3px solid #88c8af; position: absolute; left: 0; width: 3px; height: 100%;"></div>

                                                <div class="education-bottom-box-right">
                                                    <div class="box-title">
                                                        <p style="font-size: 15px; margin-bottom: 8px; font-weight: 600;">
                                                            <text style="color: #5b5b5b;  padding-right: 5px;">
                                                                @if(isset($education['currently_attend']) && $education['currently_attend'] == true)
                                                                    Currently Attend
                                                                @else
                                                                    @if(isset($education['month']))
                                                                        {{ $education['month'] }}
                                                                    @endif

                                                                    @if(isset($education['year']))
                                                                        {{ $education['year'] }}
                                                                    @endif
                                                                @endif
                                                            </text>

                                                            @if(isset($education['degree']))
                                                                {{ $education['degree'] }}
                                                            @endif

                                                            @if(isset($education['field']))
                                                                {{ $education['field'] }}
                                                            @endif
                                                        </p>
                                                    </div>

                                                    <div class="sub-title" style="font-size: 15px; margin-bottom: 8px; font-weight: 600;">
                                                        @if(isset($education['school_name']))
                                                            {{ $education['school_name'] }}
                                                        @endif
                                                    </div>

                                                    <span style="font-size: 13px; line-height: 18px; font-weight: 500; color: #5b5b5b;">
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
                            <li id="experience">
                                <div class="education-card-right-inner experience">
                                    <div class="resumeAction">
                                        <a class="btn-custom btn-red handle" title="move" id="experienceMove" href="#">
                                           <i class="fa fa-arrows"></i>
                                        </a>

                                        <a class="btn-custom btn-red" title="Edit" id="experienceEdit" href="{{ route('resume.experience-review',$resume->id) }}">Edit</a>
                                    </div>

                                    <h3 class="resume-section-heading" style="font-size: 16px;
                                        text-transform: uppercase;
                                        font-weight: 700;
                                        margin-bottom: 10px;
                                        position: relative;
                                        padding-bottom: 10px;
                                        width: 100%;
                                        display: flex;
                                        justify-content: space-between;
                                        align-items: center;
                                        letter-spacing: 3px;">
                                        <span>Experience</span>

                                        <p style="width: 150px; border-bottom: 1px solid #5b5b5b;"></p>
                                    </h3>

                                    @if(isset($resume->experience_info) && !empty($resume->experience_info))
                                        @foreach($resume->experience_info as $experience)
                                            <div class="education-bottom-box" style="width: 100%; margin-bottom: 20px; padding-left: 15px; position: relative; padding-bottom: 0;">
                                                <div style="border-left: 3px solid #88c8af; position: absolute; left: 0; width: 3px; height: 100%;"></div>

                                                <div class="education-bottom-box-right">
                                                    <div class="box-title">
                                                        <p style="font-size: 15px; margin-bottom: 8px; font-weight: 600;">
                                                            <text style="color: #5b5b5b;  padding-right: 5px;">
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
                                                            </text>

                                                            @if(isset($experience['job_title']))
                                                                {{ $experience['job_title'] }}
                                                            @endif
                                                        </p>
                                                    </div>

                                                    <div class="sub-title" style="font-size: 15px; margin-bottom: 8px; font-weight: 600;">
                                                        {{ $experience['employer'] }}
                                                    </div>

                                                    <span style="font-size: 13px; line-height: 18px; font-weight: 500; color: #5b5b5b;">
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

                        @if(isset($resume->extra_section[$value]) && !empty($resume->extra_section[$value]))
                            <li id="{{ $value }}" style="padding-bottom: 20px;">
                                <div class="@if(in_array($value,$resume->extra_section)) {{ $value }} @else other @endif">
                                    <div class="inner-box-text">
                                        <div class="resumeAction @if(in_array($value,$resume->extra_section)) {{ $value }} @else other @endif">
                                            <a class="btn-custom btn-red handle" title="move" id="{{$value}}SectionMove" href="#">
                                                <i class="fa fa-arrows"></i>
                                            </a>

                                            <a class="btn-custom btn-red" title="Edit" id="{{$value}}SectionEdit" href="{{ route('resume.section',[$resume->id,$value]) }}">Edit</a>
                                        </div>

                                        <div class="title-box">
                                            <h3 class="resume-section-heading" style="font-size: 16px;
                                                text-transform: uppercase;
                                                font-weight: 700;
                                                margin-bottom: 10px;
                                                position: relative;
                                                padding-bottom: 10px;
                                                width: 100%;
                                                display: flex;
                                                justify-content: space-between;
                                                align-items: center;
                                                letter-spacing: 3px;">
                                                <span>{{ $value }}</span>

                                                <p style="width: 150px; border-bottom: 1px solid #5b5b5b;"></p>
                                            </h3>
                                        </div>

                                        <p style="font-size: 13px; font-weight: 600; line-height: 18px; color: #5b5b5b;">
                                            {!! $resume->extra_section[$value] !!}
                                        </p>
                                    </div>
                                </div>
                            </li>
                        @endif
                    @endforeach

                    @if(isset($resume->extra_section) && !empty($resume->extra_section))
                        @foreach($resume->extra_section as $sectionKey => $section)
                            @if(!in_array($sectionKey,$resume->sortable))
                                <li id="{{ $sectionKey }}" style="padding-bottom: 20px;">
                                    <div class="inner-box-text other">
                                        <div class="resumeAction {{ $sectionKey }}">
                                            <a class="btn-custom btn-red handle" title="move" id="{{$sectionKey}}SectionMove" href="#">
                                                <i class="fa fa-arrows"></i>
                                            </a>

                                            <a class="btn-custom btn-red" title="Edit" id="{{$sectionKey}}SectionEdit" href="{{ route('resume.section',[$resume->id,$sectionKey]) }}">Edit</a>
                                        </div>

                                        <div class="title-box">
                                            <h3 style="font-size: 16px;
                                                text-transform: uppercase;
                                                font-weight: 700;
                                                margin-bottom: 10px;
                                                position: relative;
                                                padding-bottom: 10px;
                                                width: 100%;
                                                display: flex;
                                                justify-content: space-between;
                                                align-items: center;
                                                letter-spacing: 3px;">
                                                <span>{{ $sectionKey }}</span>

                                                <p style="width: 150px; border-bottom: 1px solid #5b5b5b;"></p>
                                            </h3>
                                        </div>

                                        <p style="font-size: 13px; font-weight: 600; line-height: 18px; color: #5b5b5b;">
                                            {!! $resume->extra_section[$sectionKey] !!}
                                        </p>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    @endif
                </ul>
            </div>

            <div class="top-center-shape">
                <svg class="Polygon_4" viewBox="0 0 150 152" style="max-width: 100%;
                    overflow: visible;
                    position: absolute;
                    width: 150px;
                    height: 152px;
                    left: 451px;
                    top: -96px;
                    z-index: -1;">
                    <path style="fill: #88c8af;" id="Polygon_4" d="M 74.99999237060547 0 L 135.1453247070313 30.1054573059082 L 150 97.75182342529297 L 108.3781356811523 151.9999847412109 L 41.62186431884766 152 L 0 97.75183868408203 L 14.85464859008789 30.1054859161377 Z">
                    </path>
                </svg>
            </div>

            <div class="top-right-shape">
                <svg class="Polygon_3" viewBox="0 0 150 152" style="right: -30px;
                    top: -20px;
                    z-index: -1;
                    overflow: visible;
                    position: absolute;
                    width: 76px;
                    height: 77px;
                    transform: matrix(1,0,0,1,0,0);">
                    <path style="fill: #88c8af;" id="Polygon_3" d="M 74.99999237060547 0 L 135.1453247070313 30.1054573059082 L 150 97.75182342529297 L 108.3781356811523 151.9999847412109 L 41.62186431884766 152 L 0 97.75183868408203 L 14.85464859008789 30.1054859161377 Z">
                    </path>
                </svg>
            </div>

            <div class="bottom-right-shape">
                <svg class="Polygon_1" viewBox="0 0 133 136" style="    overflow: visible;
                    position: absolute;
                    width: 133px;
                    height: 136px;
                    right: -70px;
                    bottom: 0;
                    transform: matrix(1,0,0,1,0,0);
                    z-index: -1;">
                    <path style="fill: #88c8af;" id="Polygon_1" d="M 66.5 0 L 133 136 L 0 136 Z">
                    </path>
                </svg>
            </div>

            <div class="bottom-center-shape">
                <svg class="Polygon_3" viewBox="0 0 150 152" style="overflow: visible;
                    position: absolute;
                    width: 150px;
                    height: 152px;
                    bottom: -80px;
                    transform: matrix(1,0,0,1,0,0);
                    left: 451px;
                    z-index: -1;">
                    <path style="fill: #88c8af;" id="Polygon_3" d="M 74.99999237060547 0 L 135.1453247070313 30.1054573059082 L 150 97.75182342529297 L 108.3781356811523 151.9999847412109 L 41.62186431884766 152 L 0 97.75183868408203 L 14.85464859008789 30.1054859161377 Z">
                    </path>
                </svg>
            </div>
        </div>
    </div>
