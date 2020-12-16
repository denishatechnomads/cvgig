@section('styles')
    @include('template.resume.style')
    <div class="row">
        <div class="col-sm-12 custom_resume_card">
            <ul class='sortable'>
                Empire
                @foreach($resume->sortable as $value)

                    @if($value == "contact_info")
                        <li id="contact_info">
                            <div class="row contactInfo">
                                <div class="resumeAction">
                                    <a class="btn-custom btn-red handle" title="move" id="contactInfoMove" href="#"><i
                                            class="fa fa-arrows"></i> </a>
                                    <a class="btn-custom btn-red" title="Edit" id="contactInfoEdit"
                                       href="{{ route('resume.contact',$resume->id) }}">Edit</a>
                                </div>
                                <div class="col-sm-6">
                                    <img
                                        src="https://ui-avatars.com/api/?rounded=true&&name={{$resume->contact_info['name']}}">
                                    <span class="resume-section-heading">{{ $resume->contact_info['name'] }}</span>
                                </div>
                                <div class="col-sm-6">
                                    <div class="float-right">
                                        <p>
                                            @if(isset($resume->contact_info['phone']))
                                                {{ $resume->contact_info['phone'] }}<br>
                                            @endif
                                            @if(isset($resume->contact_info['email']))
                                                {{ $resume->contact_info['email'] }}<br>
                                            @endif
                                            @if(isset($resume->contact_info['address']))
                                                {{ $resume->contact_info['address'] }},
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


                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endif

                    @if($value == "summary")
                        <li id="summary">
                            <div class="row summary">
                                <div class="col-sm-12">
                                    <div class="resumeAction">
                                        <a class="btn-custom btn-red handle" title="move" id="summaryMove" href="#"><i
                                                class="fa fa-arrows"></i> </a>
                                        <a class="btn-custom btn-red" title="Edit" id="summaryEdit"
                                           href="{{ route('resume.summary',$resume->id) }}">Edit</a>
                                    </div>
                                    <h5 class="resume-section-heading">Professional Summary</h5>
                                    <hr>
                                    <p> {!! $resume->summary !!} </p>
                                </div>
                            </div>
                        </li>
                    @endif

                    @if($value == "skills")
                        <li id="skills">
                            <div class="row skills">
                                <div class="col-sm-12">
                                    <div class="resumeAction">
                                        <a class="btn-custom btn-red handle" title="move" id="skillsMove" href="#"><i
                                                class="fa fa-arrows"></i> </a>
                                        <a class="btn-custom btn-red" title="Edit" id="skillsEdit"
                                           href="{{ route('resume.skills',$resume->id) }}">Edit</a>
                                    </div>
                                    <h5 class="resume-section-heading">Skills</h5>
                                    <hr>
                                    <p>{!! $resume->skills !!}</p>
                                </div>
                            </div>
                        </li>
                    @endif

                    @if($value == "experience")
                        <li id="experience">
                            <div class="row experience">
                                <div class="col-sm-12">
                                    <div class="resumeAction">
                                        <a class="btn-custom btn-red handle" title="move" id="experienceMove"
                                           href="#"><i
                                                class="fa fa-arrows"></i> </a>
                                        <a class="btn-custom btn-red" title="Edit" id="experienceEdit"
                                           href="{{ route('resume.experience-review',$resume->id) }}">Edit</a>
                                    </div>

                                    <h5 class="resume-section-heading">Experience</h5>
                                    <hr>
                                    <p>
                                        @if(isset($resume->experience_info) && !empty($resume->experience_info))
                                            @foreach($resume->experience_info as $experience)
                                                <strong> {{ $experience['employer'] }}
                                                    - @if(isset($experience['job_title'])){{ $experience['job_title'] }}@endif</strong>
                                                <span>
                                    @if(isset($experience['start_month']))
                                                        {{ $experience['start_month'] }}
                                                    @endif
                                                    @if(isset($experience['start_year']))
                                                        {{ $experience['start_year'] }}</span> -
                                                @endif
                                                @if(isset($experience['is_present']) && $experience['is_present'] == true)
                                                    <span>Present</span>
                                                @else
                                                    <span>
                                            @if(isset($experience['end_month']))
                                                            {{ $experience['end_month'] }}
                                                        @endif
                                                        @if(isset($experience['end_year']))
                                                            {{ $experience['end_year'] }}</span>
                                    @endif
                                    @endif

                                    <p>
                                        @if(isset($experience['job_description']))
                                            {!!  $experience['job_description'] !!}
                                        @endif
                                    </p>
                                    <br>
                                    @endforeach
                                    @endif
                                    </p>
                                </div>
                            </div>
                        </li>
                    @endif

                    @if($value == "education")
                        <li id="education">
                            <div class="row education">
                                <div class="col-sm-12">
                                    <div class="resumeAction">
                                        <a class="btn-custom btn-red handle" title="move" id="educationMove" href="#"><i
                                                class="fa fa-arrows"></i> </a>
                                        <a class="btn-custom btn-red" title="Edit" id="educationEdit"
                                           href="{{ route('resume.education-review',$resume->id) }}">Edit</a>
                                    </div>
                                    <h5 class="resume-section-heading">Education</h5>
                                    <hr>
                                    <p>
                                        @if(isset($resume->education) && !empty($resume->education))
                                            @foreach($resume->education as $education)
                                                <strong> @if(isset($education['school_name'])) {{ $education['school_name'] }} - @endif</strong>
                                                @if(isset($education['degree']))
                                                    {{ $education['degree'] }}
                                                @endif
                                                @if(isset($education['field']))
                                                    ({{ $education['field'] }})
                                                @endif
                                                <br>
                                                @if(isset($education['currently_attend']) && $education['currently_attend'] == true)
                                                    Currently Attend
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
                                                @if(isset($education['is_present']) && $education['is_present'] == true)
                                                    <span>Current</span>
                                    @endif

                                    <p>{!!  $education['description'] !!}</p>

                                    <br>
                                    @endforeach
                                    @endif
                                    </p>
                                </div>
                            </div>
                        </li>
                    @endif

                    @if(isset($resume->extra_section[$value]) && !empty($resume->extra_section[$value]))
                        <li id="{{ $value }}">
                            <div class="row @if(in_array($value,$sections)) {{ $value }} @else other @endif">
                                <div class="col-sm-12">
                                    <div
                                        class="resumeAction @if(in_array($value,$sections)) {{ $value }} @else other @endif">
                                        <a class="btn-custom btn-red handle" title="move"
                                           id="{{$value}}SectionMove"
                                           href="#"><i class="fa fa-arrows"></i> </a>
                                        <a class="btn-custom btn-red" title="Edit" id="{{$value}}SectionEdit"
                                           href="{{ route('resume.section',[$resume->id,$value]) }}">Edit</a>
                                    </div>
                                    <h5 class="resume-section-heading">{{ $value }}</h5>
                                    <hr>
                                    <p>{!! $resume->extra_section[$value] !!}</p>
                                    <br>
                                </div>
                            </div>
                        </li>
                    @endif
                @endforeach
                @if(isset($resume->extra_section) && !empty($resume->extra_section))
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
                                        <h5 class="resume-section-heading">{{ $sectionKey }}</h5>
                                        <hr>
                                        <p>{!! $resume->extra_section[$sectionKey] !!}</p>
                                        <br>
                                    </div>
                                </div>
                            </li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
