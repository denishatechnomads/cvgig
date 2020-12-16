@section('styles')
    @include('template.resume.style')
    <div class="custom-resume-card custom_resume_card"
         style="min-height:29cm;max-width: 950px; margin: 0 auto; width: 100%; border: 1px solid #ccc;">
        <div class="resume-card-inner" style="position: relative;">
            <div class="experience-info" style="display: flex;padding-bottom: 40px;">
                <ul class="sortable experience-card-right" style="width: 40%; position: relative;">
                    <li class="resume-card-left contact-name" style="background-color: #2890e8; padding: 60px;">
                        <div class="card-inner contact-name">
                            <div class="card-inner-right">
                                <div class="resumeAction">
                                    <a class="btn-custom btn-red" title="Edit" id="contactInfoEdit"
                                       href="{{ route('resume.contact',$resume->id) }}">Edit</a>
                                </div>
                                <div class="title-resume-card">
                                    <h1 style="color: #fff;font-size: 60px; margin-bottom: 0; text-transform: capitalize; font-weight: 500; position: relative; text-align: center;" class="resume-section-heading">
                                        <b>{{ $resume->contact_info['name'] }}</b></h1>
                                </div>
                            </div>
                        </div>
                    </li>
                    @foreach($resume->sortable as $value)
                        @if($value == 'summary')
                            <li style="padding: 40px 30px 20px;" id="summary">
                                <div class="summary">
                                    <div class="resumeAction">
                                        <a class="btn-custom btn-red handle" title="move" id="summaryMove" href="#">
                                            <i class="fa fa-arrows"></i>
                                        </a>
                                        <a class="btn-custom btn-red" title="Edit" id="summaryEdit"
                                           href="{{ route('resume.summary',$resume->id) }}">Edit</a>
                                    </div>
                                    <h3
                                        style="
                                    font-size: 19px;
                                    text-transform: uppercase;
                                    font-weight: 700;
                                    margin-bottom: 10px;
                                    position: relative;
                                    padding-bottom: 10px;
                                    width: 100%;
                                    display: flex;
                                    justify-content: space-between;
                                    align-items: center;
                                    letter-spacing: 3px;
                                "
                                    class="resume-section-heading">
                                        <span>SUMMARY</span>

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
                        @if($value == "skills")
                            <li id="skills-info skills" style="display: flex; width: 100%; padding: 20px 30px">
                                <div class="skills-info-left skills title-bg" style="width: 100%; padding: 0 0 20px;">
                                    <div class="skills-info-box">
                                        <div class="resumeAction">
                                            <a class="btn-custom btn-red handle" title="move" id="skillsMove"
                                               href="#">
                                                <i class="fa fa-arrows"></i>
                                            </a>

                                            <a class="btn-custom btn-red" title="Edit" id="skillsEdit"
                                               href="{{ route('resume.skills',$resume->id) }}">Edit</a>
                                        </div>
                                        <h3
                                            style="
											font-size: 19px;
											text-transform: uppercase;
											font-weight: 700;
											margin-bottom: 10px;
											position: relative;
											padding-bottom: 10px;
											width: 100%;
											display: flex;
											justify-content: space-between;
											align-items: center;
											letter-spacing: 3px;
										"
                                        class="resume-section-heading">
                                            <span>Skills</span>

                                        </h3>
                                        {!! $resume->skills !!}
                                    </div>
                                </div>
                            </li>
                        @endif
                    @endforeach
                    @foreach($resume->sortable as $value)
                        @if($value == 'contact_info')
                            <li style="padding: 20px 30px" id="contact_info">
                                <div class="Contact-box contactInfo" style="padding: 10px 0 20px; width: 100%;">
                                    <div class="resumeAction">
                                        <a class="btn-custom btn-red handle" title="move" id="contactInfoMove" href="#">
                                            <i class="fa fa-arrows"></i>
                                        </a>

                                        <a class="btn-custom btn-red" title="Edit" id="contactInfoEdit" href="{{ route('resume.contact',$resume->id) }}">Edit</a>
                                    </div>
                                    <h3
                                        style="
                                        font-size: 19px;
                                        text-transform: uppercase;
                                        font-weight: 700;
                                        margin-bottom: 10px;
                                        position: relative;
                                        padding-bottom: 10px;
                                        width: 100%;
                                        display: flex;
                                        justify-content: space-between;
                                        align-items: center;
                                        letter-spacing: 3px;
                                    "
                                    class="resume-section-heading">
                                        <span>Contact</span>

                                    </h3>
                                    <div class="Contact-box-info">
                                        <ul>
                                            @if(isset($resume->contact_info['address']) || isset($resume->contact_info['city']) || isset($resume->contact_info['state']) || isset($resume->contact_info['country']) || isset($resume->contact_info['zipcode']))
                                                <li class="contact-inner-col" style="margin-bottom: 10px;">
                                                    <a href="#"
                                                       style="display: flex; align-items: center; font-weight: 500; color: #000; font-size: 15px; ">

                                                    <span><b>ADDRESS:</b> @if(isset($resume->contact_info['address']))
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
                                                        @endif</span>
                                                    </a>
                                                </li>
                                            @endif
                                            @if(isset($resume->contact_info['phone']))
                                                <li class="contact-inner-col" style="margin-bottom: 10px;">
                                                    <a href="#"
                                                       style="display: flex; align-items: center; font-weight: 500; color: #000; font-size: 15px; ">
                                                        <span><b>PHONE: </b> {{ $resume->contact_info['phone'] }}</span>
                                                    </a>
                                                </li>
                                            @endif
                                            @if(isset($resume->contact_info['email']))
                                                <li class="contact-inner-col" style="margin-bottom: 10px;">
                                                    <a href="#"
                                                       style="display: flex; align-items: center; font-weight: 500; color: #000; font-size: 15px;">

                                                        <span><b>EMAIL:</b> {{ $resume->contact_info['email'] }}</span>
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <ul class="contact-info-right"
                    style="width: 60%; display: flex;flex-wrap: wrap; position: relative; padding: 20px 00px 0;">
                    <li class="contact-border-line">
                        <div class="inner-box-text">
                        </div>
                    </li>
                    @foreach($resume->sortable as $value)
                        @if($value == "education")
                            <li style="border: 2px dashed #ccc;
    border-bottom: 0;border-right: 0;
    padding: 7px 0px 0 7px;" id="education">
                                <div style="border:2px dashed #ccc;
    border-bottom: 0;border-right: 0;padding: 50px 15px 15px;    display: flex;
    flex-wrap: wrap;" class="education">
                                    <div class="resumeAction">
<!--                                        <a class="btn-custom btn-red handle" title="move" id="educationMove"
                                           href="#">
                                            <i class="fa fa-arrows"></i>
                                        </a>-->

                                        <a class="btn-custom btn-red" title="Edit" id="educationEdit"
                                           href="{{ route('resume.education-review',$resume->id) }}">Edit</a>
                                    </div>
                                    <h3
                                        style="
										font-size: 19px;
										text-transform: uppercase;
										font-weight: 700;
										margin-bottom: 10px;
										position: relative;
										padding-bottom: 10px;
										width: 100%;
										display: flex;
										justify-content: space-between;
										align-items: center;
										letter-spacing: 3px;
									"
                                    class="resume-section-heading">
                                        <span>EDUCATION</span>

                                    </h3>
                                    @if(isset($resume->education) && !empty($resume->education))
                                        @foreach($resume->education as $education)
                                    <div class="education-bottom-box"
                                         style="padding-right: 15px;width: 100%; margin-bottom: 20px; position: relative; padding-bottom: 0;">

                                        <div class="education-bottom-box-right">
                                            <div class="box-title">
											<span style="font-size: 14px;
    color: rgba(105,108,105,1);
    letter-spacing: 0.5px;">@if(isset($education['currently_attend']) && $education['currently_attend'] == true)
                                                    Currently Attend
                                                @else
                                                    @if(isset($education['month']))
                                                        {{ $education['month'] }}
                                                    @endif

                                                    @if(isset($education['year']))
                                                        {{ $education['year'] }}
                                                    @endif
                                                @endif</span>
                                                <p style="font-size: 15px; margin-bottom: 8px; font-weight: 600;">@if(isset($education['school_name']))
                                                        {{ $education['school_name'] }}
                                                    @endif</p>
                                            </div>

                                            <span
                                                style="font-size: 15px; line-height: 24px; font-weight: 400; color: #5b5b5b;">
											{!!  $education['description'] !!}
										</span>
                                        </div>
                                    </div>
                                        @endforeach
                                    @endif
                                </div>
                            </li>
                        @endif
                    @endforeach
                    <div class="sortable">
                    @foreach($resume->sortable as $value)
                        @if($value == "experience")
                            <li style="border: 2px dashed #ccc;border-bottom: 0;border-right: 0;border-top: 0;padding: 7px 0px 0 7px;" id="experience">
                                <div style="border:2px dashed #ccc;
    border-bottom: 0;border-right: 0;border-top: 0;padding: 15px;" class="experience">
                                    <div class="resumeAction">
                                        <a class="btn-custom btn-red handle" title="move" id="experienceMove"
                                           href="#">
                                            <i class="fa fa-arrows"></i>
                                        </a>

                                        <a class="btn-custom btn-red" title="Edit" id="experienceEdit"
                                           href="{{ route('resume.experience-review',$resume->id) }}">Edit</a>
                                    </div>
                                    <h3
                                        style="
										font-size: 19px;
										text-transform: uppercase;
										font-weight: 700;
										margin-bottom: 10px;
										position: relative;
										padding-bottom: 10px;
										width: 100%;
										display: flex;
										justify-content: space-between;
										align-items: center;
										letter-spacing: 3px;
									"
                                    class="resume-section-heading">
                                        <span>Experience </span>

                                    </h3>
                                    <div class="education-bottom-box"
                                         style="width: 100%; margin-bottom: 50px;  position: relative; padding-bottom: 0;">
                                        @if(isset($resume->experience_info) && !empty($resume->experience_info))
                                            @foreach($resume->experience_info as $experience)
                                        <div class="education-bottom-box-right">
                                            <div class="box-title">
											<span style="font-size: 14px;
    color: rgba(105,108,105,1);
    letter-spacing: 0.5px;">@if(isset($experience['start_year']))
                                                    {{ $experience['start_year'] }}
                                                @endif

                                                        -

                                                        @if(isset($experience['is_present']) && $experience['is_present'] == true)
                                                    Present
                                                @else

                                                    @if(isset($experience['end_year']))
                                                        {{ $experience['end_year'] }}
                                                    @endif
                                                @endif</span>
                                                <p style="font-size: 15px; margin-bottom: 8px; font-weight: 600;">{{ $experience['employer'] }}</p>
                                            </div>

                                            <span
                                                style="font-size: 15px; line-height: 24px; font-weight: 400; color: #5b5b5b;">
											@if(isset($experience['job_description']))
                                                    {!!  $experience['job_description'] !!}
                                            @endif
										</span>
                                        </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </li>
                        @endif
                            @if(isset($resume->extra_section[$value]) && !empty($resume->extra_section[$value]))
                                <li id="{{ $value }}" style="border: 2px dashed #ccc;border-bottom: 0;border-right: 0;border-top: 0;padding: 7px 0px 0 7px;">
                                    <div class="@if(in_array($value,$resume->extra_section)) {{ $value }} @else other @endif" style="border:2px dashed #ccc;
    border-bottom: 0;border-right: 0;border-top: 0;padding: 15px;">
                                        <div
                                            class="resumeAction @if(in_array($value,$resume->extra_section)) {{ $value }} @else other @endif">
                                            <a class="btn-custom btn-red handle" title="move" id="{{$value}}SectionMove" href="#">
                                                <i class="fa fa-arrows"></i>
                                            </a>

                                            <a class="btn-custom btn-red" title="Edit" id="{{$value}}SectionEdit"
                                               href="{{ route('resume.section',[$resume->id,$value]) }}">Edit</a>
                                        </div>
                                        <h3
                                            style="
										font-size: 19px;
										text-transform: uppercase;
										font-weight: 700;
										margin-bottom: 10px;
										position: relative;
										padding-bottom: 10px;
										width: 100%;
										display: flex;
										justify-content: space-between;
										align-items: center;
										letter-spacing: 3px;
									"
                                        class="resume-section-heading">
                                            <span>{{ $value }}</span>

                                        </h3>
                                        <span
                                            style="font-size: 15px; line-height: 24px; font-weight: 400; color: #5b5b5b;">
											{!! $resume->extra_section[$value] !!}
										</span>
                                    </div>
                                </li>
                            @endif
                    @endforeach
                        @if(isset($resume->extra_section) && !empty($resume->extra_section))
                            @foreach($resume->extra_section as $sectionKey => $section)
                                @if(!in_array($sectionKey,$resume->sortable))
                                    <li id="{{ $sectionKey }}" style="border: 2px dashed #ccc;border-bottom: 0;border-right: 0;border-top: 0;padding: 7px 0px 0 7px;">
                                        <div class="other" style="border:2px dashed #ccc;
    border-bottom: 0;border-right: 0;border-top: 0;padding: 15px;">
                                            <div class="resumeAction {{ $sectionKey }}">
                                                <a class="btn-custom btn-red handle" title="move"
                                                   id="{{$sectionKey}}SectionMove" href="#">
                                                    <i class="fa fa-arrows"></i>
                                                </a>

                                                <a class="btn-custom btn-red" title="Edit" id="{{$sectionKey}}SectionEdit"
                                                   href="{{ route('resume.section',[$resume->id,$sectionKey]) }}">Edit</a>
                                            </div>
                                            <h3
                                                style="
										font-size: 19px;
										text-transform: uppercase;
										font-weight: 700;
										margin-bottom: 10px;
										position: relative;
										padding-bottom: 10px;
										width: 100%;
										display: flex;
										justify-content: space-between;
										align-items: center;
										letter-spacing: 3px;
									"
                                            class="resume-section-heading">
                                                <span>{{ $sectionKey }}</span>

                                            </h3>
                                            <span
                                                style="font-size: 15px; line-height: 24px; font-weight: 400; color: #5b5b5b;">
											{!! $resume->extra_section[$sectionKey] !!}
										</span>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </ul>
                <div class="bottom-shape" style="position: absolute;bottom: -5px;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 950 46" width="950" height="46">
                        <defs>
                            <clipPath clipPathUnits="userSpaceOnUse" id="cp1">
                                <path d="M0 -1297L950 -1297L950 46L0 46Z"/>
                            </clipPath>
                        </defs>
                        <style>
                            tspan {
                                white-space: pre
                            }

                            .shp0 {
                                fill: #2890e8
                            }
                        </style>
                        <g id="New 26" clip-path="url(#cp1)">
                            <g id="BG">
                                <path id="Ellipse 165" class="shp0"
                                      d="M475.5 392C146.74 392 -119 304.39 -119 196C-119 87.61 146.74 0 475.5 0C804.26 0 1070 87.61 1070 196C1070 304.39 804.26 392 475.5 392Z"/>
                            </g>
                        </g>
                    </svg>
                </div>
                <div class="right-shape"
                     style="position: absolute;right: 0px; width: 10px; background-color: rgba(40,144,232,1);height: 100%;">
                </div>
            </div>
        </div>
    </div>
