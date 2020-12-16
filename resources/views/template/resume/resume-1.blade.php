@section('styles')
    @include('template.resume.style')
    <div class="row">
        <div class="col-sm-12 custom_resume_card custom-resume-card" style="box-shadow: 0 3px 4px rgba(0,0,0,.16);">
            <ul class='sortable contact-info ui-sortable'>
                @foreach($resume->sortable as $value)
                    @if($value == "contact_info")
                        <li id="contact_info" class="resume-card-left">
                            <div class="card-inner">
                                <div class="card-inner-left">
                                    <div class="dots">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                    <div class="dots">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                    <div class="dots">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>

                                <div class="card-inner-right contactInfo">
                                    <div class="resumeAction">
                                        <a class="btn-custom btn-red handle" title="move" id="contactInfoMove" href="#"><i
                                                class="fa fa-arrows"></i> </a>
                                        <a class="btn-custom btn-red" title="Edit" id="contactInfoEdit"
                                           href="{{ route('resume.contact',$resume->id) }}">Edit</a>
                                    </div>

                                    <h1 class="resume-section-heading">{{ $resume->contact_info['name'] }}</h1>
                                    <p>@if(isset($experience['job_title'])){{ $experience['job_title'] }}@endif</p>

                                    <div class="contact-icon">
                                        <hr>
                                        <ul class="contact-icon-inner">
                                            <li class="icon-inner-left">
                                                <a href="#">
                                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                                    <span>
                                                        @if(isset($resume->contact_info['phone']))
                                                            {{ $resume->contact_info['phone'] }}<br>
                                                        @endif
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="icon-inner-line">

                                            </li>
                                            <li class="icon-inner-right">
                                                <a href="#">
                                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                                    <span>
                                                        @if(isset($resume->contact_info['email']))
                                                            {{ $resume->contact_info['email'] }}<br>
                                                        @endif
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endif

                    @if($value == "summary")
                        <li class="resume-card-right" id="summary">
                            <div class="resume-card-right-inner summary">
                                <div class="resumeAction">
                                    <a class="btn-custom btn-red handle" title="move" id="summaryMove" href="#"><i
                                            class="fa fa-arrows"></i> </a>
                                    <a class="btn-custom btn-red" title="Edit" id="summaryEdit"
                                       href="{{ route('resume.summary',$resume->id) }}">Edit</a>
                                </div>

                                <h4 class="resume-section-heading">Professional Info</h4>

                                <p>{!! $resume->summary !!}</p>
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>

            <ul class="sortable experience-info ui-sortable">
                @foreach($resume->sortable as $value)
                    @if($value == "experience")
                        <li class="experience-card-left" id="experience">
                            <div class="experience-card-left-inner experience">
                                <div class="resumeAction">
                                    <a class="btn-custom btn-red handle" title="move" id="experienceMove"
                                       href="#"><i
                                            class="fa fa-arrows"></i> </a>
                                    <a class="btn-custom btn-red" title="Edit" id="experienceEdit"
                                       href="{{ route('resume.experience-review',$resume->id) }}">Edit</a>
                                </div>

                                <h3>Experience</h3>

                                <div class="experience-top-box"></div>

                                @if(isset($resume->experience_info) && !empty($resume->experience_info))
                                    @foreach($resume->experience_info as $experience)
                                        <div class="experience-bottom-box">
                                            <div class="experience-bottom-box-left">
                                                <p>
                                                    @if(isset($experience['is_present']) && $experience['is_present'] == true)
                                                        <span>Current</span>
                                                    @else
                                                        <span>
                                                            @if(isset($experience['start_year']))
                                                                {{ $experience['start_year'] }}
                                                            @endif

                                                            @if(isset($experience['end_year']))
                                                                - {{ $experience['end_year'] }}
                                                            @endif
                                                        </span>
                                                    @endif
                                                </p>
                                            </div>

                                            <div class="experience-bottom-box-right">
                                                <p>
                                                    @if(isset($experience['job_title']))
                                                        {{ $experience['job_title'] }}
                                                    @endif
                                                </p>

                                                <p>{{ $experience['employer'] }}</p>

                                                <span>
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

                    @if($value == "education")
                        <li class="experience-card-right" id="education">
                            <div class="education-card-right-inner education">
                                <div class="resumeAction">
                                    <a class="btn-custom btn-red handle" title="move" id="educationMove" href="#"><i class="fa fa-arrows"></i> </a>
                                    <a class="btn-custom btn-red" title="Edit" id="educationEdit"
                                       href="{{ route('resume.education-review',$resume->id) }}">Edit</a>
                                </div>

                                <h3 class="resume-section-heading">EDUCATION</h3>

                                @if(isset($resume->education) && !empty($resume->education))
                                    @foreach($resume->education as $education)
                                        <div class="education-bottom-box">
                                            <div class="education-bottom-box-left">
                                                <p>
                                                    @if(isset($education['currently_attend']) && $education['currently_attend'] == true)
                                                    Preset
                                                    @else
                                                        <span>
                                                            @if(isset($education['month']))
                                                                {{ $education['month'] }}
                                                            @endif

                                                            @if(isset($education['year']))
                                                                {{ $education['year'] }}
                                                            @endif
                                                        </span>
                                                    @endif
                                                </p>
                                            </div>

                                            <div class="education-bottom-box-right">
                                                <p>
                                                    @if(isset($education['school_name']))
                                                        {{ $education['school_name'] }}
                                                    @endif
                                                </p>

                                                <span class="Bachelor-text">
                                                    @if(isset($education['degree']))
                                                        {{ $education['degree'] }}
                                                    @endif

                                                    @if(isset($education['field']))
                                                        ({{ $education['field'] }})
                                                    @endif
                                                </span>

                                                <span>{!!  $education['description'] !!}</span>
                                            </div>

                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>

            <ul class="sortable skills-info ui-sortable">
                @foreach($resume->sortable as $value)
                    @if($value == "skills")
                        <li class="skills-info-left" id="skills">
                            <div class="skills">
                                <div class="resumeAction">
                                    <a class="btn-custom btn-red handle" title="move" id="skillsMove" href="#"><i
                                            class="fa fa-arrows"></i> </a>
                                    <a class="btn-custom btn-red" title="Edit" id="skillsEdit"
                                       href="{{ route('resume.skills',$resume->id) }}">Edit</a>
                                </div>

                                <h3 class="resume-section-heading">SKILLS</h3>

                                <p>{!! $resume->skills !!}</p>
                            </div>
                        </li>
                    @endif

                    @if($value == "contact_info")
                        <li class="contact-info-right" id="contact_info">
                            <div class="contactInfo">
                                <div class="resumeAction">
                                    <a class="btn-custom btn-red handle" title="move" id="contactInfoMove" href="#"><i
                                            class="fa fa-arrows"></i> </a>
                                    <a class="btn-custom btn-red" title="Edit" id="contactInfoEdit"
                                       href="{{ route('resume.contact',$resume->id) }}">Edit</a>
                                </div>

                                <h3 class="resume-section-heading">Contact</h3>
                                <ul>
                                    @if(isset($resume->contact_info['phone']))
                                        <li class="contact-inner-number">
                                            <a href="#">
                                                <i class="fa fa-phone" aria-hidden="true"></i>
                                                <span>{{ $resume->contact_info['phone'] }}<br></span>
                                            </a>
                                        </li>
                                    @endif

                                    @if(isset($resume->contact_info['email']))
                                        <li class="Contact-inner-email">
                                            <a href="#">
                                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                                <span>{{ $resume->contact_info['email'] }}</span>
                                            </a>
                                        </li>
                                    @endif

                                    @if(isset($resume->contact_info['address']) || isset($resume->contact_info['city']) || isset($resume->contact_info['state']) || isset($resume->contact_info['country']) || isset($resume->contact_info['zipcode']))
                                        <li class="Contact-inner-map">
                                            <a href="#">
                                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                <span>
                                                    @if(isset($resume->contact_info['address']))
                                                        {{ $resume->contact_info['address'] }} <br>
                                                    @endif

                                                    @if(isset($resume->contact_info['city']))
                                                        {{ $resume->contact_info['city'] }},
                                                    @endif

                                                    @if(isset($resume->contact_info['state']))
                                                        {{ $resume->contact_info['state'] }},
                                                    @endif

                                                    @if(isset($resume->contact_info['country']))
                                                        {{ $resume->contact_info['country'] }} -
                                                    @endif

                                                    @if(isset($resume->contact_info['zipcode']))
                                                        {{ $resume->contact_info['zipcode'] }}
                                                    @endif
                                                </span>
                                            </a>
                                        </li>
                                    @endif

                                    <li class="Contact-inner-dots">
                                        <div class="card-inner-left">
                                            <div class="dots">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="dots">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="dots">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="dots">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="dots">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="dots">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="dots">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            <div>
                        </li>
                    @endif
                @endforeach
            </ul>

            @if(isset($resume->extra_section[$value]) && !empty($resume->extra_section[$value]))
                <ul class="sortable ui-sortable">
                    <li id="{{ $value }}">
                        <div class="row @if(in_array($value,$resume->extra_section)) {{ $value }} @else other @endif">
                            <div class="col-sm-12">
                                <div
                                    class="resumeAction @if(in_array($value,$resume->extra_section)) {{ $value }} @else other @endif">
                                    <a class="btn-custom btn-red handle" title="move"
                                       id="{{$value}}SectionMove"
                                       href="#"><i class="fa fa-arrows"></i> </a>
                                    <a class="btn-custom btn-red" title="Edit" id="{{$value}}SectionEdit"
                                       href="{{ route('resume.section',[$resume->id,$value]) }}">Edit</a>
                                </div>
                                <h3 class="resume-section-heading">{{ $value }}</h3>
                                <hr>
                                <p>{!! $resume->extra_section[$value] !!}</p>
                                <br>
                            </div>
                        </div>
                    </li>
                </ul>
            @endif

            @if(isset($resume->extra_section) && !empty($resume->extra_section))
                <ul class="sortable ui-sortable">
                    @foreach($resume->extra_section as $sectionKey => $section)
                        @if(!in_array($sectionKey,$resume->sortable))
                            <li id="{{ $sectionKey }}">
                                <div class="row other">
                                    <div class="col-sm-12">
                                        <div class="resumeAction {{ $sectionKey }}">
                                            <a class="btn-custom btn-red handle" title="move"
                                               id="{{$sectionKey}}SectionMove"
                                               href="#"><i class="fa fa-arrows"></i> </a>
                                            <a class="btn-custom btn-red" title="Edit" id="{{$sectionKey}}SectionEdit"
                                               href="{{ route('resume.section',[$resume->id,$sectionKey]) }}">Edit</a>
                                        </div>
                                        <h3 class="resume-section-heading">{{ $sectionKey }}</h3>
                                        <hr>
                                        <p>{!! $resume->extra_section[$sectionKey] !!}</p>
                                        <br>
                                    </div>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
