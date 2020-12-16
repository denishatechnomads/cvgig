@section('styles')
    @include('template.resume.style')

    <div class="custom_resume_card custom-resume-card" style="min-height:29cm;overflow: hidden;max-width: 900px; margin: 0 auto; width: 100%; border: 1px solid #ccc; padding: 15px 35px 10px; position: relative;box-shadow: 0 3px 4px rgba(0,0,0,.16);">
        <ul class="sortable contact-info ui-sortable">
            <li id="contact_name" class="resume-card-left" style="width: 100%;">
                <div class="card-inner contact_name" style="display: flex; align-items: center; justify-content: center;">
                    <div class="card-inner-right">
                        <div class="resumeAction">
                            <a class="btn-custom btn-red" title="Edit" id="contactInfoEdit" href="{{ route('resume.contact',$resume->id) }}">Edit</a>
                        </div>

                        <div class="title-resume-card">
                            <h1 class="resume-section-heading" style="
                                    font-size: 44px;
                                    text-transform: capitalize;
                                    display: flex;
                                    font-weight: 600;
                                    flex-direction: column;
                                    margin-bottom: 20px;
                                    position: relative;
                                    letter-spacing: 8px;
                                    color: #3b3b44;">
                                {{ $resume->contact_info['name'] }}

                                <div style="width: 100%; border-bottom: 1px solid #3b3b44; position: absolute; bottom: 0; left: 0;"></div>
                            </h1>
                        </div>
                    </div>
                </div>
            </li>
        </ul>

        <ul class="sortable contact-border-line ui-sortable" style="display: flex; flex-wrap: wrap;">
            @foreach($resume->sortable as $value)
                @if($value == "contact_info")
                    <li id="contact_info" style="display: flex; align-items: center; padding: 15px 0;
                        margin: 0 0 15px;
                        justify-content: space-between;
                        border-bottom: 2px solid #b9c1c3;width: 100%;">

                        @if(isset($resume->contact_info['phone']))
                            <div style="">
                                <a href="#" style="color: #3b3b44; text-decoration: none; display: flex; align-items: center;">
                                    <span class="icon" style="width: 25px;
                                        height: 25px;
                                        background-color: #334a50;
                                        display: inline-block;
                                        color: #fff;
                                        border-radius: 100%;
                                        line-height: 25px;
                                        text-align: center;">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                    </span>

                                    <span style="margin-left: 10px;">{{ $resume->contact_info['phone'] }}</span>
                                </a>
                            </div>
                        @endif

                        @if(isset($resume->contact_info['email']))
                            <div style="">
                                <a href="#" style="color: #3b3b44; text-decoration: none; display: flex; align-items: center;">
                                    <span class="icon" style="width: 25px;
                                        height: 25px;
                                        background-color: #334a50;
                                        display: inline-block;
                                        color: #fff;
                                        border-radius: 100%;
                                        line-height: 25px;
                                        text-align: center;">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </span>

                                    <span style="margin-left: 10px;">{{ $resume->contact_info['email'] }}</span>
                                </a>
                            </div>
                        @endif

                        @if(isset($resume->contact_info['address']) || isset($resume->contact_info['city']) || isset($resume->contact_info['state']) || isset($resume->contact_info['country']) || isset($resume->contact_info['zipcode']))
                            <div style="">
                                <a href="#" style="color: #3b3b44; text-decoration: none; display: flex; align-items: center;">
                                    <span class="icon" style="width: 25px;
                                        height: 25px;
                                        background-color: #334a50;
                                        display: inline-block;
                                        color: #fff;
                                        border-radius: 100%;
                                        line-height: 25px;
                                        text-align: center;">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    </span>

                                    <span style="margin-left: 10px;">
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
                            </div>
                        @endif
                    </li>
                @endif

                @if($value == "summary")
                    <li class="personal_info" id="summary" style="width: 100%;">
                        <div class="summary">
                            <div class="resumeAction">
                                <a class="btn-custom btn-red handle" title="move" id="summaryMove" href="#">
                                    <i class="fa fa-arrows"></i>
                                </a>

                                <a class="btn-custom btn-red" title="Edit" id="summaryEdit" href="{{ route('resume.summary',$resume->id) }}">Edit</a>
                            </div>

                            <div class="title-box" style="width: 100%;">
                                <h3 class="resume-section-heading" style="font-size: 19px; text-transform: uppercase; padding-bottom: 10px; margin-bottom: 10px; padding-top: 10px; color: #ab5429; letter-spacing: 4px; position: relative; display: flex; align-items: center;">
                                    <span style="width: 270px;">Summary</span>
                                </h3>
                            </div>

                            <p style="font-size: 12px; line-height: 24px;">
                                {!! $resume->summary !!}
                            </p>
                        </div>
                    </li>
                @endif

                @if($value == "skills")
                    <li class="skills-info" style="width: 100%;" id="skills">
                        <div class="skills-info-left title-bg">
                            <div class="skills-info-box skills">
                                <div class="resumeAction">
                                    <a class="btn-custom btn-red handle" title="move" id="skillsMove" href="#">
                                        <i class="fa fa-arrows"></i>
                                    </a>

                                    <a class="btn-custom btn-red" title="Edit" id="skillsEdit" href="{{ route('resume.skills',$resume->id) }}">Edit</a>
                                </div>

                                <div class="title-box" style="width: 100%;">
                                    <h3 class="resume-section-heading" style="font-size: 19px; text-transform: uppercase; padding-bottom: 10px; margin-bottom: 10px; padding-top: 10px; color: #ab5429; letter-spacing: 4px; position: relative; display: flex; align-items: center;">
                                        <span style="width: 270px;">Skills</span>

                                    </h3>
                                </div>

                                {!! $resume->skills !!}
                            </div>
                        </div>
                    </li>
                @endif
            @endforeach
        </ul>

        <ul class="sortable experience-info ui-sortable" style="display: flex; padding: 10px 0 5px; flex-wrap: wrap;justify-content: space-between;">
            @foreach($resume->sortable as $value)
                @if($value == "education")
                    <li class="experience-card-right" id="education" style="width: 49%;">
                        <div class="education-card-right-inner title-bg education">
                            <div class="resumeAction">
                                <a class="btn-custom btn-red handle" title="move" id="educationMove" href="#">
                                    <i class="fa fa-arrows"></i>
                                </a>

                                <a class="btn-custom btn-red" title="Edit" id="educationEdit" href="{{ route('resume.education-review',$resume->id) }}">Edit</a>
                            </div>

                            <div class="title-box" style="width: 100%;">
                                <h3 class="resume-section-heading" style="font-size: 19px; text-transform: uppercase; padding-bottom: 10px; margin-bottom: 10px; padding-top: 10px; color: #ab5429; letter-spacing: 4px; position: relative; display: flex; align-items: center;">
                                    <span style="width: 270px;">Education</span>
                                </h3>
                            </div>

                            @if(isset($resume->education) && !empty($resume->education))
                                @foreach($resume->education as $education)
                                    <div class="education-bottom-box" style="width: 100%; padding-bottom: 12px; padding-right: 0;">
                                        <div class="education-bottom-box-right" style="display: flex; flex-wrap: wrap;">
                                            <div class="box-title" style="width: 100%;display: flex;justify-content: space-between;">
                                                <p style="font-size: 15px; margin-bottom: 4px; color: #3b3b44; font-weight: 600;">
                                                    @if(isset($education['degree']))
                                                        {{ $education['degree'] }}
                                                    @endif

                                                    @if(isset($education['field']))
                                                        &nbsp {{ $education['field'] }}
                                                    @endif
                                                </p>

                                                <span style="display: block;font-size: 12px;line-height: 18px;letter-spacing: 0.5px;color: #ab5429;">
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
                                                </span>
                                            </div>

                                            <div class="sub-title" style="width: 100%;">
                                                <p style="font-size: 15px; margin-bottom: 4px; color: #3b3b44; font-weight: 400;">
                                                    @if(isset($education['school_name']))
                                                        {{ $education['school_name'] }}
                                                    @endif
                                                </p>

                                                <span style="display: block; font-size: 12px; line-height: 18px; letter-spacing: 0.5px;">
                                                    {!!  $education['description'] !!}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </li>
                @endif

                @if($value == "experience")
                    <li class="contact-info-right" id="experience" style="position: relative;width: 49%;">
                        <div class="education-card-right-inner title-bg experience">
                            <div class="resumeAction">
                                <a class="btn-custom btn-red handle" title="move" id="experienceMove" href="#">
                                   <i class="fa fa-arrows"></i>
                                </a>

                                <a class="btn-custom btn-red" title="Edit" id="experienceEdit" href="{{ route('resume.experience-review',$resume->id) }}">Edit</a>
                            </div>

                            <div class="title-box" style="width: 100%;">
                                <h3 class="resume-section-heading" style="font-size: 19px; text-transform: uppercase; padding-bottom: 10px; margin-bottom: 10px; padding-top: 10px; color: #ab5429; letter-spacing: 4px; position: relative; display: flex; align-items: center;">
                                    <span style="width: 270px;">Experience</span>

                                </h3>
                            </div>

                            @if(isset($resume->experience_info) && !empty($resume->experience_info))
                                @foreach($resume->experience_info as $experience)
                                    <div class="education-bottom-box" style="width: 100%; padding-bottom: 12px; padding-right: 0;">
                                        <div class="education-bottom-box-right" style="display: flex;flex-wrap: wrap;">
                                            <div class="box-title" style="width: 100%; display: flex;justify-content: space-between;">
                                                <p style="font-size: 15px; margin-bottom: 4px; color: #3b3b44; font-weight: 600;">
                                                    @if(isset($experience['job_title']))
                                                        {{ $experience['job_title'] }}
                                                    @endif
                                                </p>

                                                <span style="display: block;font-size: 12px;line-height: 18px;letter-spacing: 0.5px;color: #ab5429;">
                                                    (
                                                        @if(isset($experience['start_month']))
                                                            {{ $experience['start_month'] }}
                                                        @endif

                                                        @if(isset($experience['start_year']))
                                                            {{ $experience['start_year'] }}
                                                        @endif

                                                        -

                                                        @if(isset($experience['is_present']) && $experience['is_present'] == true)
                                                            Present
                                                        @else
                                                            @if(isset($experience['end_month']))
                                                                {{ $experience['end_month'] }}
                                                            @endif

                                                            @if(isset($experience['end_year']))
                                                                {{ $experience['end_year'] }}
                                                            @endif
                                                        @endif
                                                    )
                                                </span>
                                            </div>

                                            <div class="sub-title" style="width: 100%;">
                                                <p style="font-size: 15px; margin-bottom: 4px; color: #3b3b44; font-weight: 400;">{{ $experience['employer'] }}</p>

                                                <span style="display: block; font-size: 12px; line-height: 18px; letter-spacing: 0.5px;">
                                                    @if(isset($experience['job_description']))
                                                        {!!  $experience['job_description'] !!}
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </li>
                @endif
            @endforeach
        </ul>

        <ul class="sortable ui-sortable" style="display: flex; flex-wrap: wrap;">
            @foreach($resume->sortable as $value)
                @if(isset($resume->extra_section[$value]) && !empty($resume->extra_section[$value]))
                    <li id="{{ $value }}" style="width: 100%;">
                        <div class="@if(in_array($value,$resume->extra_section)) {{ $value }} @else other @endif">
                            <div class="resumeAction @if(in_array($value,$resume->extra_section)) {{ $value }} @else other @endif">
                                <a class="btn-custom btn-red handle" title="move" id="{{$value}}SectionMove" href="#">
                                    <i class="fa fa-arrows"></i>
                                </a>

                                <a class="btn-custom btn-red" title="Edit" id="{{$value}}SectionEdit" href="{{ route('resume.section',[$resume->id,$value]) }}">Edit</a>
                            </div>

                            <div class="title-box" style="width: 100%;">
                                <h3 class="resume-section-heading" style="font-size: 19px; text-transform: uppercase; padding-bottom: 10px; margin-bottom: 10px; padding-top: 10px; color: #ab5429; letter-spacing: 4px; position: relative; display: flex; align-items: center;">
                                    <span style="width: 270px;">{{ $value }}</span>
                                </h3>
                            </div>

                            <p style="font-size: 12px; line-height: 24px;">
                                {!! $resume->extra_section[$value] !!}
                            </p>
                        </div>
                    </li>
                @endif
            @endforeach

            @if(isset($resume->extra_section) && !empty($resume->extra_section))
                @foreach($resume->extra_section as $sectionKey => $section)
                    @if(!in_array($sectionKey,$resume->sortable))
                        <li id="{{ $sectionKey }}" style="width: 100%;">
                            <div class="other">
                                <div class="resumeAction {{ $sectionKey }}">
                                    <a class="btn-custom btn-red handle" title="move" id="{{$sectionKey}}SectionMove" href="#">
                                        <i class="fa fa-arrows"></i>
                                    </a>

                                    <a class="btn-custom btn-red" title="Edit" id="{{$sectionKey}}SectionEdit" href="{{ route('resume.section',[$resume->id,$sectionKey]) }}">Edit</a>
                                </div>

                                <div class="title-box" style="width: 100%;">
                                    <h3 class="resume-section-heading" style="font-size: 19px; text-transform: uppercase; padding-bottom: 10px; margin-bottom: 10px; padding-top: 10px; color: #ab5429; letter-spacing: 4px; position: relative; display: flex; align-items: center;">
                                        <span style="width: 270px;">{{ $sectionKey }}</span>
                                    </h3>
                                </div>

                                <p style="font-size: 12px; line-height: 24px;">
                                    {!! $resume->extra_section[$sectionKey] !!}
                                </p>
                            </div>
                        </li>
                    @endif
                @endforeach
            @endif
        </ul>

        <div class="background-info" style="position: absolute;
            z-index: -1;
            left: 0;
            right: 0;
            bottom: 0;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 950 1343" width="950" height="1343">
                <defs>
                    <clipPath clipPathUnits="userSpaceOnUse" id="cp1">
                        <path d="M0 0L950 0L950 1343L0 1343Z" />
                    </clipPath>

                    <image width="4000" height="2000" id="img1" />
                </defs>

                <style>
                    tspan { white-space:pre }
                </style>
                <g id="New 21" clip-path="url(#cp1)">
                    <g id="BG">
                        <use id="hand-painted-watercolor-background-with-sky-clouds-shape" style="opacity: 0.4" href="#img1" transform="matrix(0.671,0,0,0.671,-441,0)"/>
                    </g>
                </g>
            </svg>
        </div>
    </div>
