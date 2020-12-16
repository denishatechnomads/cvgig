@section('styles')
    @include('template.resume.style')
    <div class="row">
        <div class="custom_resume_card"
             style="min-height:29cm;overflow: hidden;max-width: 950px; margin: 0 auto; width: 100%; border: 1px solid #ccc;box-shadow: 0 3px 4px rgba(0,0,0,.16);">
            <ul class="contact-info ui-sortable" style="display: flex;flex-wrap: wrap;">
                <li class="mine-title contact_name" style="width: 100%;
                    position: relative;
                    display: flex;
                    margin-bottom: 20px;">
                    <div class="left-bg contact_name" style="width: 45px;
                        height: 40px;
                        background-color: #ecc9b9;
                        position: absolute;
                        bottom: 50px;"></div>
                    <div class="card-inner" style="display: flex;
                                align-items: center;
                                padding: 20px 60px 0 60px;
                                width: 35%">
                        <div class="card-inner-right">
                            <div class="resumeAction">
                                <a class="btn-custom btn-red" title="Edit" id="contactInfoEdit"
                                   href="{{ route('resume.contact',$resume->id) }}">Edit</a>
                            </div>
                            <div class="title-resume-card">
                                <h2 class="resume-section-heading"
                                    style="font-size: 45px;font-weight: 600;text-transform: uppercase;letter-spacing: 3px;">{{ $resume->contact_info['name'] }}</h2>

                                <p style="font-size: 18px;
                            margin-bottom: 10px;
                            text-transform: uppercase;
                            letter-spacing: 2px;
                            margin-top: 10px;">@if(isset($experience['job_title'])){{ $experience['job_title'] }}@else
                                        &nbsp;&nbsp;&nbsp;@endif</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-inner-bottom" style="width: 65%;
                    padding-left: 25px;">
                        <div class="card-inner-box" style="border-left: 2px solid #8d959d;
                    height: 100%;
                    position: relative;
                    margin-left: 20px;">
                            <div style="width: 40px;
                                height: 40px;
                                background-color: #ecc9b9;
                                position: absolute;
                                bottom: 0;
                                left: -20px;"></div>
                        </div>
                    </div>
                </li>
                <li class="sortable resume-card-left" style="width: 35%;background-color: #ecc9b9;min-height:26cm">
                    @foreach($resume->sortable as $value)
                        @if($value == "summary")
                            <ul class="contact-border-line" id="summary" style="display: flex;
                    flex-wrap: wrap;
                    width: 100%;
                    padding: 15px 35px;">
                                <li class="inner-box-text summary">
                                        <div class="resumeAction">
                                            <a class="btn-custom btn-red handle" title="move" id="summaryMove" href="#">
                                                <i class="fa fa-arrows"></i>
                                            </a>

                                            <a class="btn-custom btn-red" title="Edit" id="summaryEdit"
                                               href="{{ route('resume.summary',$resume->id) }}">Edit</a>
                                        </div>
                                        <div class="title-box" style="width: 100%;">
                                            <h3 style="font-size: 17px;
                                            text-transform: uppercase;
                                            padding-bottom: 10px;
                                            padding-top: 10px;
                                            letter-spacing: 4px;" class="resume-section-heading">Summury</h3>
                                        </div>
                                        <p style="font-size: 12px;
        line-height: 24px;">{!! $resume->summary !!}</p>
                                </li>
                            </ul>
                        @endif
                        @if($value == "contact_info")
                            <ul class="contact-us-info" style="padding: 15px 35px;" id="contact_info">
                                <li class="contact-us-info-left title-bg contact_info contactInfo">
                                    <div class="contactInfo">
                                        <div class="resumeAction">
                                            <a class="btn-custom btn-red handle" title="move" id="contactInfoMove"
                                               href="#">
                                                <i class="fa fa-arrows"></i>
                                            </a>

                                            <a class="btn-custom btn-red" title="Edit" id="contactInfoEdit"
                                               href="{{ route('resume.contact',$resume->id) }}">Edit</a>
                                        </div>
                                        <div class="contact-us-info-box">
                                            <div class="title-box" style="width: 100%;">
                                                <h3 style="font-size: 17px;
                    text-transform: uppercase;
                    padding-bottom: 10px;
                    padding-top: 10px;
                    letter-spacing: 4px;" class="resume-section-heading">Contact</h3>
                                            </div>
                                            <ul style="margin-top: 20px;">
                                                @foreach($resume->sortable as $value)
                                                    @if($value == "contact_info")

                                                        @if(isset($resume->contact_info['phone']))
                                                            <li>
                                                                <a href="#" style="padding: 5px 0 5px;
    display: flex;
    align-items: center;
    text-decoration: none;
    color: #4f4f4f;">
                                                                    <i style="font-size: 18px;
    margin: 0 10px 0 0;
    text-align: center;
    width: 30px;" class="fa fa-phone" aria-hidden="true"></i>
                                                                    <span style="color: #4f4f4f;
    font-size: 15px;
    font-weight: 500;">{{ $resume->contact_info['phone'] }}</span>
                                                                </a>
                                                            </li>
                                                        @endif
                                                        @if(isset($resume->contact_info['email']))
                                                            <li>
                                                                <a href="#" style="padding: 5px 0 5px;
    display: flex;
    align-items: center;
    text-decoration: none;
    color: #4f4f4f;">
                                                                    <i style="font-size: 18px;
    margin: 0 10px 0 0;
    text-align: center;
    width: 30px;" class="fa fa-envelope" aria-hidden="true"></i>
                                                                    <span style="color: #4f4f4f;
    font-size: 15px;
    font-weight: 500;">{{ $resume->contact_info['email'] }}</span>
                                                                </a>
                                                            </li>
                                                        @endif
                                                        @if(isset($resume->contact_info['address']) || isset($resume->contact_info['city']) || isset($resume->contact_info['state']) || isset($resume->contact_info['country']) || isset($resume->contact_info['zipcode']))
                                                            <li>
                                                                <a href="#" style="padding: 5px 0 5px;
    display: flex;
    align-items: center;
    text-decoration: none;
    color: #4f4f4f;">
                                                                    <i style="font-size: 18px;
    margin: 0 10px 0 0;
    text-align: center;
    width: 30px;" class="fa fa-map-marker" aria-hidden="true"></i>
                                                                    <span style="color: #4f4f4f;
    font-size: 15px;
    font-weight: 500;">@if(isset($resume->contact_info['address']))
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
                                                        <li>
                                                            <a href="#" style="padding: 5px 0 5px;
    display: flex;
    align-items: center;
    text-decoration: none;
    color: #4f4f4f;">
                                                                <i style="font-size: 18px;
    margin: 0 10px 0 0;
    text-align: center;
    width: 30px;" class="fa fa-globe" aria-hidden="true"></i>
                                                                <span style="color: #4f4f4f;
    font-size: 15px;
    font-weight: 500;">www.loremipsum.com</span>
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        @endif
                    @endforeach
                </li>
                <li class="sortable resume-card-right" style="width: 65%;">
                    @foreach($resume->sortable as $value)
                        @if($value == "education")
                            <div class="experience-card-right" id="education">
                                <div class="education-card-right-inner title-bg education">
                                    <div class="resumeAction">
                                        <a class="btn-custom btn-red handle" title="move" id="educationMove"
                                           href="#">
                                            <i class="fa fa-arrows"></i>
                                        </a>

                                        <a class="btn-custom btn-red" title="Edit" id="educationEdit"
                                           href="{{ route('resume.education-review',$resume->id) }}">Edit</a>
                                    </div>
                                    <div class="title-box" style="width: 100%;    padding-bottom: 20px;">
                                        <h3 style="font-size: 17px;
    text-transform: uppercase;
    padding-bottom: 10px;
    padding-top: 10px;
    letter-spacing: 4px;    padding-left: 25px;position:relative;" class="resume-section-heading">Education
                                            <div style="border-bottom: 1px solid #ccc;
                                                width: 50px;
                                                height: 1px;
                                                position: absolute;
                                                left: 25px;
                                                bottom: 0;"></div>
                                        </h3>
                                    </div>
                                    @if(isset($resume->education) && !empty($resume->education))
                                        @foreach($resume->education as $education)
                                            <div class="education-bottom-box"
                                                 style="width: 100%;padding: 0 0 0 25px;">
                                                <div class="education-bottom-box-right"
                                                     style="display: flex;padding-bottom: 15px;">
                                                    <div class="box-title" style="width: 25%;">
                                                        <p style="font-size: 12px;
    color: #7f888f;
    letter-spacing: 1px;
    font-weight: normal;
    margin-bottom: 4px;">
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
                                                        </p>
                                                    </div>
                                                    <div class="sub-title" style="width: 75%;">
                                                        <p style="font-size: 15px;
font-weight: 500;
margin-bottom: 5px;"> @if(isset($education['school_name']))
                                                                {{ $education['school_name'] }}
                                                            @endif</p>
                                                        <span style="font-size: 12px;
line-height: 18px;
letter-spacing: 0;
color: #636c71;">{!!  $education['description'] !!}</span>
                                                    </div>
                                                </div>
                                            </div>@endforeach
                                    @endif
                                </div>
                            </div>
                        @endif
                        <ul class="sortable experience-info">
                            @if($value == "experience")
                                <li class="contact-info-right" id="experience">
                                    <div class="education-card-right-inner title-bg experience">
                                        <div class="resumeAction">
                                            <a class="btn-custom btn-red handle" title="move" id="experienceMove"
                                               href="#">
                                                <i class="fa fa-arrows"></i>
                                            </a>

                                            <a class="btn-custom btn-red" title="Edit" id="experienceEdit"
                                               href="{{ route('resume.experience-review',$resume->id) }}">Edit</a>
                                        </div>
                                        <div class="title-box" style="width: 100%;    padding-bottom: 20px;">
                                            <h3 style="font-size: 17px;
    text-transform: uppercase;
    padding-bottom: 10px;
    padding-top: 10px;
    letter-spacing: 4px;    padding-left: 25px;position:relative;" class="resume-section-heading">Experience
                                                <div style="border-bottom: 1px solid #ccc;
    width: 50px;
    height: 1px;
    position: absolute;
    left: 25px;
    bottom: 0;"></div>
                                            </h3>
                                        </div>
                                        @if(isset($resume->experience_info) && !empty($resume->experience_info))
                                            @foreach($resume->experience_info as $experience)
                                                <div class="education-bottom-box"
                                                     style="width: 100%;padding-bottom: 10px;padding-left: 25px;">
                                                    <div class="education-bottom-box-right"
                                                         style="display: flex;padding-bottom: 15px;">
                                                        <div class="box-title" style="width: 25%;">
                                                            <p style="font-size: 12px;
    color: #7f888f;
    letter-spacing: 1px;
    font-weight: normal;
    margin-bottom: 4px;">

                                                                @if(isset($experience['start_year']))
                                                                    {{ $experience['start_year'] }}
                                                                @endif

                                                                -

                                                                @if(isset($experience['is_present']) && $experience['is_present'] == true)
                                                                    Present
                                                                @else

                                                                    @if(isset($experience['end_year']))
                                                                        {{ $experience['end_year'] }}
                                                                    @endif
                                                                @endif</p>
                                                        </div>
                                                        <div class="sub-title" style="width: 75%;">
                                                            <p style="font-size: 15px;
    font-weight: 500;
    margin-bottom: 5px;">{{ $experience['employer'] }}</p>
                                                            <span style="font-size: 12px;
                                                             line-height: 18px;
                                                                letter-spacing: 0;
                                                                color: #636c71;
                                                                display: block;
                                                            padding-right: 6px">
                                                            @if(isset($experience['job_description']))
                                                                    {!!  $experience['job_description'] !!}
                                                                @endif</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </li>
                            @endif
                            @if($value == "skills")
                                <li class="skills-info" id="skills">
                                    <div class="skills-info-left title-bg skills">
                                        <div class="skills-info-box">
                                            <div class="resumeAction">
                                                <a class="btn-custom btn-red handle" title="move" id="skillsMove"
                                                   href="#">
                                                    <i class="fa fa-arrows"></i>
                                                </a>

                                                <a class="btn-custom btn-red" title="Edit" id="skillsEdit"
                                                   href="{{ route('resume.skills',$resume->id) }}">Edit</a>
                                            </div>
                                            <div class="title-box" style="width: 100%;    padding-bottom: 20px;">
                                                <h3 style="font-size: 17px;
                                            text-transform: uppercase;
                                            padding-bottom: 10px;
                                            padding-top: 10px;
                                            letter-spacing: 4px;    padding-left: 25px;position:relative;" class="resume-section-heading">Skills
                                                    <div style="border-bottom: 1px solid #ccc;
                                            width: 50px;
                                            height: 1px;
                                            position: absolute;
                                            left: 25px;
                                            bottom: 0;"></div>
                                                </h3>
                                            </div>
                                            <div style="padding-left: 25px;line-height: 18px;
                                            letter-spacing: 0;
                                            color: #636c71;
                                            display: block;">
                                                <p>{!! $resume->skills !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif
                                @if(isset($resume->extra_section[$value]) && !empty($resume->extra_section[$value]))
                                    <li id="{{ $value }}" style="padding-top: 13px;">
                                        <div class="@if(in_array($value,$resume->extra_section)) {{ $value }} @else other @endif">
                                            <div
                                                class="resumeAction @if(in_array($value,$resume->extra_section)) {{ $value }} @else other @endif">
                                                <a class="btn-custom btn-red handle" title="move" id="{{$value}}SectionMove" href="#">
                                                    <i class="fa fa-arrows"></i>
                                                </a>

                                                <a class="btn-custom btn-red" title="Edit" id="{{$value}}SectionEdit"
                                                   href="{{ route('resume.section',[$resume->id,$value]) }}">Edit</a>
                                            </div>
                                            <div class="title-box" style="width: 100%;    padding-bottom: 20px;">
                                                <h3 style="font-size: 17px;
                                            text-transform: uppercase;
                                            padding-bottom: 10px;
                                            padding-top: 10px;
                                            letter-spacing: 4px;    padding-left: 25px;position:relative;" class="resume-section-heading">{{ $value }}
                                                    <div style="border-bottom: 1px solid #ccc;
                                            width: 50px;
                                            height: 1px;
                                            position: absolute;
                                            left: 25px;
                                            bottom: 0;"></div>
                                                </h3>
                                            </div>
                                            <div style="padding-left: 25px;line-height: 18px;
                                            letter-spacing: 0;
                                            color: #636c71;
                                            display: block;">
                                                <p>{!! $resume->extra_section[$value] !!}</p>
                                            </div>

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
                                        <a class="btn-custom btn-red handle" title="move"
                                           id="{{$sectionKey}}SectionMove" href="#">
                                            <i class="fa fa-arrows"></i>
                                        </a>

                                        <a class="btn-custom btn-red" title="Edit" id="{{$sectionKey}}SectionEdit"
                                           href="{{ route('resume.section',[$resume->id,$sectionKey]) }}">Edit</a>
                                    </div>
                                    <div class="title-box" style="width: 100%;    padding-bottom: 20px;">
                                        <h3 style="font-size: 17px;
                                            text-transform: uppercase;
                                            padding-bottom: 10px;
                                            padding-top: 10px;
                                            letter-spacing: 4px;    padding-left: 25px;position:relative;" class="resume-section-heading">{{ $sectionKey }}
                                            <div style="border-bottom: 1px solid #ccc;
                                            width: 50px;
                                            height: 1px;
                                            position: absolute;
                                            left: 25px;
                                            bottom: 0;"></div>
                                        </h3>
                                    </div>
                                    <div style="padding-left: 25px;line-height: 18px;
                                            letter-spacing: 0;
                                            color: #636c71;
                                            display: block;">
                                        <p>{!! $resume->extra_section[$sectionKey] !!}</p>
                                    </div>
                                </div>
                            </li>
                        @endif
                    @endforeach
                    @endif
                    </ul>
                </li>
            </ul>
        </div>
    </div>
