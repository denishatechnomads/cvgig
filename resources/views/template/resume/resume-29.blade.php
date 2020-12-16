@section('styles')
    @include('template.resume.style')
    <div class="custom-resume-card custom_resume_card"
         style="max-width: 950px; margin: 0 auto; width: 100%; border: 1px solid #ccc; position: relative;">
        <div class="background-info">
            <div class="top-shape" style="position: absolute; top: 0;">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 950 97" width="950" height="97">
                    <defs>
                        <clipPath clipPathUnits="userSpaceOnUse" id="cp1">
                            <path d="M0 0L950 0L950 1343L0 1343Z"/>
                        </clipPath>
                    </defs>
                    <style>
                        tspan {
                            white-space: pre;
                        }

                        .shp0 {
                            fill: #ecc9b9;
                        }
                    </style>
                    <g id="New 28" clip-path="url(#cp1)">
                        <g id="BG">
                            <g id="Group 20705">
                                <path
                                    id="Path 29517"
                                    class="shp0"
                                    d="M79.15 49.78C221.03 46.7 312.18 -47.69 499.13 -48.65C598.77 -49.17 718.51 -2.47 809.77 -7.75C906.69 -13.37 909 -74.85 909 -74.85L909 -104.18L-63.8 -104.18L-63.8 -74.85L-63.8 23.78C-22.01 47.19 37.2 50.69 79.15 49.78Z"
                                />
                                <path
                                    id="Path 29518"
                                    class="shp0"
                                    d="M1064.05 96.78C922.17 93.7 831.02 -0.69 644.07 -1.65C544.43 -2.17 424.7 44.53 333.44 39.25C236.51 33.63 234.2 -27.85 234.2 -27.85L234.2 -57.18L1207 -57.18L1207 -27.85L1207 70.78C1165.21 94.19 1106 97.69 1064.05 96.78Z"
                                />
                            </g>
                        </g>
                    </g>
                </svg>
            </div>
            <div class="bottom-shape" style="position: absolute; bottom: 0; right: 0;">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 921 76" width="921" height="76">
                    <defs>
                        <clipPath clipPathUnits="userSpaceOnUse" id="cp1">
                            <path d="M-29 -1267L921 -1267L921 76L-29 76Z"/>
                        </clipPath>
                    </defs>
                    <style>
                        tspan {
                            white-space: pre;
                        }

                        .shp0 {
                            fill: #ecc9b9;
                        }
                    </style>
                    <g id="New 28" clip-path="url(#cp1)">
                        <g id="BG">
                            <g id="Group 20705">
                                <path
                                    id="Path 858"
                                    class="shp0"
                                    d="M830.05 0.94C688.17 4.02 597.02 98.41 410.07 99.38C310.43 99.89 190.7 53.19 99.44 58.48C2.51 64.09 0.2 125.58 0.2 125.58L0.2 154.91L973 154.91L973 125.58L973 26.94C931.21 3.54 872 0.03 830.05 0.94Z"
                                />
                            </g>
                        </g>
                    </g>
                </svg>
            </div>
            <div id="Group_20654"
                 style="position: absolute; width: 31.778px; height: 182.545px; left: 860.458px; top: 0px; overflow: visible;">
                <svg class="Line_68" viewBox="0 0 1.5290199518203735 177.159"
                     style="overflow: visible; position: absolute; width: 1.529px; height: 177.159px; left: 15.62px; top: 0px; transform: matrix(1, 0, 0, 1, 0, 0);">
                    <path
                        id="Line_68"
                        d="M 0 0 L 0 177.1585083007813"
                        style="fill: transparent; stroke: rgba(141, 149, 157, 1); stroke-width: 1.5290199518203735px; stroke-linejoin: miter; stroke-linecap: butt; stroke-miterlimit: 10; shape-rendering: auto;"
                    ></path>
                </svg>
                <svg class="Rectangle_215"
                     style="position: absolute; overflow: visible; width: 31.778px; height: 31.778px; left: 0px; top: 150.767px;">
                    <rect id="Rectangle_215" rx="0" ry="0" x="0" y="0" width="31.778" height="31.778"
                          style="fill: rgba(236, 201, 185, 1);"></rect>
                </svg>
            </div>
        </div>
        <div class="contact-info ui-sortable" style="display: flex; flex-wrap: wrap;">
            <ul class="sortable mine-title"
                style="width: 100%; position: relative; display: flex; margin-bottom: 20px;">
                <li class="card-inner" style="display: flex; align-items: center; padding: 80px 60px 40px 60px;">
                    <div class="card-inner-right">
                        <div class="resumeAction">
                            <a class="btn-custom btn-red" title="Edit" id="contactInfoEdit"
                               href="{{ route('resume.contact',$resume->id) }}">Edit</a>
                        </div>
                        <div class="title-resume-card">
                            <h2 style="letter-spacing: 4px; color: #3d4445; font-size: 75px; font-weight: 700; line-height: 50px; position: relative; padding-bottom: 10px; font-family: 'Merriweather', serif;" class="resume-section-heading">{{ $resume->contact_info['name'] }}</h2>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="sortable resume-card-left" style="width: 35%; background-color: #ecc9b9;">
                @foreach($resume->sortable as $value)
                    @if($value == "summary")
                        <li id="summary" class="contact-border-line"
                            style="display: flex; flex-wrap: wrap; width: 100%; padding: 35px 35px;">
                            <div class="inner-box-text summary">
                                <div class="resumeAction">
                                    <a class="btn-custom btn-red handle" title="move" id="summaryMove" href="#">
                                        <i class="fa fa-arrows"></i>
                                    </a>

                                    <a class="btn-custom btn-red" title="Edit" id="summaryEdit"
                                       href="{{ route('resume.summary',$resume->id) }}">Edit</a>
                                </div>
                                <div class="title-box" style="width: 100%;">
                                    <h3 style="font-size: 19px; text-transform: uppercase; padding-bottom: 10px; padding-top: 10px; letter-spacing: 4px;" class="resume-section-heading">
                                        Summary</h3>
                                </div>
                                <p style="line-height: 28px; font-size: 16px; color: rgba(61, 68, 69, 1); letter-spacing: -0.25px; margin-top: 20px;">
                                    {!! $resume->summary !!}
                                </p>
                            </div>
                        </li>
                    @endif
                    @if($value == "contact_info")
                        <li id="contact_info" class="contact-us-info" style="padding: 15px 35px;">
                            <div class="contactInfo contact-us-info-left title-bg">
                                <div class="contact-us-info-box">
                                    <div class="resumeAction">
                                        <a class="btn-custom btn-red handle" title="move" id="contactInfoMove" href="#">
                                            <i class="fa fa-arrows"></i>
                                        </a>

                                        <a class="btn-custom btn-red" title="Edit" id="contactInfoEdit"
                                           href="{{ route('resume.contact',$resume->id) }}">Edit</a>
                                    </div>
                                    <div class="title-box" style="width: 100%;">
                                        <h3 style="font-size: 19px; text-transform: uppercase; padding-bottom: 10px; padding-top: 10px; letter-spacing: 4px;" class="resume-section-heading">
                                            Contact</h3>
                                    </div>
                                    <ul style="margin-top: 20px;">
                                        @if(isset($resume->contact_info['email']))
                                            <li>
                                                <a href="#"
                                                   style="padding: 10px 0 10px; display: flex; align-items: center; text-decoration: none; color: #4f4f4f;">
                                                    <i style="font-size: 18px; margin: 0 10px 0 0; text-align: center; width: 30px;"
                                                       class="fa fa-envelope" aria-hidden="true"></i>
                                                    <span
                                                        style="color: #4f4f4f; font-size: 15px; font-weight: 500;">{{ $resume->contact_info['email'] }}</span>
                                                </a>
                                            </li>
                                        @endif
                                        @if(isset($resume->contact_info['phone']))
                                            <li>
                                                <a href="#"
                                                   style="padding: 10px 0 10px; display: flex; align-items: center; text-decoration: none; color: #4f4f4f;">
                                                    <i style="font-size: 18px; margin: 0 10px 0 0; text-align: center; width: 30px;"
                                                       class="fa fa-phone" aria-hidden="true"></i>
                                                    <span
                                                        style="color: #4f4f4f; font-size: 15px; font-weight: 500;">{{ $resume->contact_info['phone'] }}</span>
                                                </a>
                                            </li>
                                        @endif
                                        @if(isset($resume->contact_info['address']) || isset($resume->contact_info['city']) || isset($resume->contact_info['state']) || isset($resume->contact_info['country']) || isset($resume->contact_info['zipcode']))

                                            <li>
                                                <a href="#"
                                                   style="padding: 10px 0 10px; display: flex; align-items: center; text-decoration: none; color: #4f4f4f;">
                                                    <i style="font-size: 18px; margin: 0 10px 0 0; text-align: center; width: 30px;"
                                                       class="fa fa-map-marker" aria-hidden="true"></i>
                                                    <span style="color: #4f4f4f; font-size: 15px; font-weight: 500;">@if(isset($resume->contact_info['address']))
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
                                    </ul>
                                </div>
                            </div>
                        </li>
                    @endif
                    @if($value == "skills")
                        <li id="skills" style="padding: 15px 35px;">
                            <div id="Group_20655" style="padding-top: 50px;" class="skills">
                                <div class="resumeAction">
                                    <a class="btn-custom btn-red handle" title="move" id="skillsMove" href="#">
                                        <i class="fa fa-arrows"></i>
                                    </a>

                                    <a class="btn-custom btn-red" title="Edit" id="skillsEdit"
                                       href="{{ route('resume.skills',$resume->id) }}">Edit</a>
                                </div>

                                <div class="title-box" style="width: 100%;">
                                    <h3 style="font-size: 19px; text-transform: uppercase; padding-bottom: 10px; padding-top: 10px; letter-spacing: 4px;" class="resume-section-heading">
                                        SKILLS</h3>
                                </div>
                                <div class="slills-box" style="display: flex; align-items: center; margin: 15px 0;">
                                    <svg class="Rectangle_1784" style="width: 8px; height: 8px; margin-right: 15px;">
                                        <rect id="Rectangle_1784" rx="4" ry="4" x="0" y="0" width="8" height="8"></rect>
                                    </svg>
                                    <span>{!! $resume->skills !!}</span>
                                </div>
                            </div>
                        </li>
                    @endif
                @endforeach

            </ul>
            <ul class="sortable resume-card-right" style="width: 65%;padding-bottom: 50px;">
                @foreach($resume->sortable as $value)
                    @if($value == "education")
                        <li class="experience-card-right" id="education">
                            <div class="education-card-right-inner title-bg education">
                                <div class="title-box" style="width: 100%; padding-bottom: 20px;">
                                    <div class="resumeAction">
                                        <a class="btn-custom btn-red handle" title="move" id="educationMove" href="#">
                                            <i class="fa fa-arrows"></i>
                                        </a>

                                        <a class="btn-custom btn-red" title="Edit" id="educationEdit"
                                           href="{{ route('resume.education-review',$resume->id) }}">Edit</a>
                                    </div>
                                    <h3 style="font-size: 19px; text-transform: uppercase; padding-bottom: 10px; padding-top: 10px; letter-spacing: 4px; padding-left: 25px; position: relative;" class="resume-section-heading">
                                        Education
                                        <div
                                            style="border-bottom: 1px solid #ccc; width: 50px; height: 1px; position: absolute; left: 25px; bottom: 0;"></div>
                                    </h3>
                                </div>
                                @if(isset($resume->education) && !empty($resume->education))
                                    @foreach($resume->education as $education)
                                        <div class="education-bottom-box" style="width: 100%; padding: 0 0 25px 25px;">
                                            <div class="education-bottom-box-right"
                                                 style="display: flex; padding-bottom: 15px;">
                                                <div class="box-title" style="width: 25%;">
                                                    <p style="font-size: 12px; color: #7f888f; letter-spacing: 1px; font-weight: normal; margin-bottom: 4px;">
                                                        @if(isset($education['currently_attend']) && $education['currently_attend'] == true)
                                                            Currently Attend
                                                        @else
                                                            @if(isset($education['month']))
                                                                {{ $education['month'] }}
                                                            @endif

                                                            @if(isset($education['year']))
                                                                {{ $education['year'] }}
                                                            @endif
                                                        @endif</p>
                                                </div>
                                                <div class="sub-title" style="width: 75%;">
                                                    <p style="font-size: 15px; font-weight: 500; margin-bottom: 5px;">
                                                        @if(isset($education['school_name']))
                                                            {{ $education['school_name'] }}
                                                        @endif</p>
                                                    <text style="color: #ecc9b9;display: block;margin: 10px 0;">
                                                        @if(isset($education['degree']))
                                                            {{ $education['degree'] }}
                                                        @endif

                                                        @if(isset($education['field']))
                                                            {{ $education['field'] }}
                                                        @endif
                                                    </text>
                                                    <span
                                                        style="font-size: 15px; line-height: 24px; letter-spacing: 0; color: #636c71;">{!!  $education['description'] !!}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        </li>
                    @endif
                    @if($value == "experience")
                        <li id="experience" class="experience-info experience">
                            <div class="contact-info-right experience">
                                <div class="education-card-right-inner title-bg">
                                    <div class="resumeAction">
                                        <a class="btn-custom btn-red handle" title="move" id="experienceMove" href="#">
                                            <i class="fa fa-arrows"></i>
                                        </a>

                                        <a class="btn-custom btn-red" title="Edit" id="experienceEdit" href="{{ route('resume.experience-review',$resume->id) }}">Edit</a>
                                    </div>
                                    <div class="title-box" style="width: 100%; padding-bottom: 40px;">
                                        <h3 style="font-size: 19px; text-transform: uppercase; padding-bottom: 10px; padding-top: 10px; letter-spacing: 4px; padding-left: 25px; position: relative;" class="resume-section-heading">
                                            Experience
                                            <div
                                                style="border-bottom: 1px solid #ccc; width: 50px; height: 1px; position: absolute; left: 25px; bottom: 0;"></div>
                                        </h3>
                                    </div>
                                    @if(isset($resume->experience_info) && !empty($resume->experience_info))
                                        @foreach($resume->experience_info as $experience)
                                    <div class="education-bottom-box"
                                         style="width: 100%; padding-bottom: 25px; padding-left: 25px;">
                                        <div class="education-bottom-box-right"
                                             style="display: flex; padding-bottom: 15px;">
                                            <div class="box-title" style="width: 25%;">
                                                <p style="font-size: 15px; color: #7f888f; letter-spacing: 1px; font-weight: normal; margin-bottom: 4px;">

                                                    @if(isset($experience['start_year']))
                                                        {{ $experience['start_year'] }}
                                                    @endif

                                                    -

                                                    @if(isset($experience['is_present']) && $experience['is_present'] == true)
                                                        Preset
                                                    @else

                                                        @if(isset($experience['end_year']))
                                                            {{ $experience['end_year'] }}
                                                        @endif
                                                    @endif</p>
                                            </div>
                                            <div class="sub-title" style="width: 75%;">
                                                <p style="font-size: 15px; font-weight: 500; margin-bottom: 5px;">@if(isset($experience['job_title']))
                                                        {{ $experience['job_title'] }}
                                                    @endif</p>
                                                <text style="color: #ecc9b9;display: block;margin: 10px 0;">{{ $experience['employer'] }}
                                                </text>
                                                <span
                                                    style="font-size: 15px; line-height: 24px; letter-spacing: 0; color: #636c71; display: block;">
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
                            </div>
                        </li>
                    @endif
                        @if(isset($resume->extra_section[$value]) && !empty($resume->extra_section[$value]))
                            <li id="{{ $value }}" class="extra-sec-p">
                                <div class="@if(in_array($value,$resume->extra_section)) {{ $value }} @else other @endif">
                                    <div class="inner-box-text">
                                        <div class="resumeAction @if(in_array($value,$resume->extra_section)) {{ $value }} @else other @endif">
                                            <a class="btn-custom btn-red handle" title="move" id="{{$value}}SectionMove" href="#">
                                                <i class="fa fa-arrows"></i>
                                            </a>

                                            <a class="btn-custom btn-red" title="Edit" id="{{$value}}SectionEdit" href="{{ route('resume.section',[$resume->id,$value]) }}">Edit</a>
                                        </div>
                                        <div class="title-box" style="width: 100%; padding-bottom: 40px;">
                                            <h3 style="font-size: 19px; text-transform: uppercase; padding-bottom: 10px; padding-top: 10px; letter-spacing: 4px; padding-left: 25px; position: relative;" class="resume-section-heading">
                                                {{ $value }}
                                                <div
                                                    style="border-bottom: 1px solid #ccc; width: 50px; height: 1px; position: absolute; left: 25px; bottom: 0;"></div>
                                            </h3>
                                        </div>
                                            {!! $resume->extra_section[$value] !!}
                                    </div>
                                </div>
                            </li>
                        @endif
                @endforeach
                    @if(isset($resume->extra_section) && !empty($resume->extra_section))
                        @foreach($resume->extra_section as $sectionKey => $section)
                            @if(!in_array($sectionKey,$resume->sortable))
                                <li id="{{ $sectionKey }}" style="padding-bottom: 20px;" class="extra-sec-p">
                                    <div class="inner-box-text other">
                                        <div class="resumeAction {{ $sectionKey }}">
                                            <a class="btn-custom btn-red handle" title="move" id="{{$sectionKey}}SectionMove" href="#">
                                                <i class="fa fa-arrows"></i>
                                            </a>

                                            <a class="btn-custom btn-red" title="Edit" id="{{$sectionKey}}SectionEdit" href="{{ route('resume.section',[$resume->id,$sectionKey]) }}">Edit</a>
                                        </div>
                                        <div class="title-box" style="width: 100%; padding-bottom: 40px;">
                                            <h3 style="font-size: 19px; text-transform: uppercase; padding-bottom: 10px; padding-top: 10px; letter-spacing: 4px; padding-left: 25px; position: relative;" class="resume-section-heading">
                                                {{ $sectionKey }}
                                                <div
                                                    style="border-bottom: 1px solid #ccc; width: 50px; height: 1px; position: absolute; left: 25px; bottom: 0;"></div>
                                            </h3>
                                        </div>
                                            {!! $resume->extra_section[$sectionKey] !!}
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    @endif
            </ul>
        </div>
    </div>
