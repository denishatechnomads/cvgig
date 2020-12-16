@section('styles')
    @include('template.resume.style')
    <div class="custom-resume-card custom_resume_card"
         style="min-height:29cm;max-width: 944px; margin: 0 auto; width: 100%; position: relative; z-index:0; ">
        <div class="resume-card-inner" style="padding: 50px 35px; position: relative;">
            <ul class="contact-info ui-sortable"
                style="display: flex; padding-bottom: 20px;justify-content: center;    flex-wrap: wrap;">
                <li>
                    <div class="profile-info"
                         style="background-repeat: no-repeat;
                             background-position: center center;
                             background-size: cover;display: inline-block;width: 200px;height: 200px;background-image: url('{{key_exists('image', $resume->contact_info) ? '/storage/'.$resume->contact_info['image'] : '/storage/images/user_resume/default.jpg'}}');border-radius: 100%;margin: 0px auto ;">

                    </div>
                </li>
                <li style="display: flex;flex-wrap: wrap; width: 100%;" id="contact_name">
                    <div style="display: flex; flex-wrap: wrap;padding-top: 30px;justify-content: center;width: 100%;"
                         class="contact_name">
                        <div class="title-resume-card" style="padding: 0px 0 20px;">
                            <div class="resumeAction">

                                <a class="btn-custom btn-red" title="Edit" id="contactInfoEdit"
                                   href="{{ route('resume.contact',$resume->id) }}">Edit</a>
                            </div>
                            <h1 class="resume-section-heading"
                                style="color: #000;font-size: 56px; margin-bottom: 0; text-transform: capitalize; font-weight: 500; position: relative;letter-spacing: 0.25px;">
                                <span
                                    style="position: relative; z-index: 3;">{{ $resume->contact_info['name'] }}</b></span>

                            </h1>

                        </div>
                        <div class="icon-box-top" style="width: 100%;display: flex;justify-content: space-between;">
                            @if(isset($resume->contact_info['phone']))
                                <div class="icon-box"
                                     style="display: flex;align-items: center;margin-bottom: 20px;    padding-right: 15px;">
                                    <svg class="Path_769" viewBox="99.136 292.733 12.882 14.163"
                                         style="    width: 12.882px;height: 14.163px;">
                                        <path style="fill: #eec2a5;" id="Path_769"
                                              d="M 100.3174896240234 299.7904052734375 L 101.7605285644531 301.4761352539063 L 103.3780975341797 303.5084533691406 L 104.8199005126953 305.1855163574219 C 106.4585113525391 307.0965270996094 109.2691040039063 307.4517517089844 111.3284912109375 306.0184936523438 C 112.105712890625 305.4763488769531 112.2554626464844 304.37109375 111.6292266845703 303.6495666503906 L 110.4572143554688 302.2732543945313 C 110.1490478515625 301.9167785644531 109.7084655761719 301.7298889160156 109.2691040039063 301.7298889160156 C 108.9312438964844 301.7298889160156 108.5946197509766 301.8325805664063 108.3136749267578 302.057861328125 C 107.6478424072266 302.5628356933594 106.7023162841797 302.4700317382813 106.1589965820313 301.8325805664063 L 105.8124694824219 301.4204711914063 L 104.1862640380859 299.3869018554688 L 103.8397216796875 298.9747619628906 C 103.2964172363281 298.3472595214844 103.3422088623047 297.4016418457031 103.9424438476563 296.8211975097656 C 104.2704010009766 296.5117797851563 104.4288330078125 296.099609375 104.4288330078125 295.6874389648438 C 104.4288330078125 295.3322448730469 104.3075408935547 294.9671020507813 104.0550689697266 294.67626953125 L 102.8743743896484 293.2999267578125 C 102.2568206787109 292.5697021484375 101.1429595947266 292.5411987304688 100.4870452880859 293.2343139648438 C 98.75439453125 295.05126953125 98.67889404296875 297.8880615234375 100.3174896240234 299.7904052734375 Z">
                                        </path>
                                    </svg>
                                    <span
                                        style="margin-left: 10px;font-size: 15px;">{{ $resume->contact_info['phone'] }}</span>
                                </div>
                            @endif
                            @if(isset($resume->contact_info['email']))
                                <div class="icon-box"
                                     style="display: flex;align-items: center;margin-bottom: 20px;    padding-right: 15px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 12" width="17" height="12">
                                        <defs>
                                            <clipPath clipPathUnits="userSpaceOnUse" id="cp19">
                                                <path d="M-362 -382L582 -382L582 961L-362 961Z"/>
                                            </clipPath>
                                        </defs>

                                        <g id="New 1" clip-path="url(#cp19)">
                                            <g id="Group 2091">
                                                <g id="Group 2092">
                                                    <g id="Group 2094">
                                                        <g id="Group 1823">
                                                            <g id="Group 2096">
                                                                <g id="Group 1815">
                                                                    <g id="Group 1814">
                                                                        <g id="Group 1813">
                                                                            <g id="Group 1812">
                                                                                <g id="Group 1811">
                                                                                    <g id="Group 1809">
                                                                                        <path style="fill: #eec2a5;"
                                                                                              id="Path 771"
                                                                                              fill-rule="evenodd"
                                                                                              class="shp0"
                                                                                              d="M16.6 11.56L0 11.56L0 1L16.6 1L16.6 11.56ZM2 9.56L14.6 9.56L14.6 3L2 3L2 9.56Z"/>
                                                                                    </g>
                                                                                    <g id="Group 1810">
                                                                                        <path style="fill: #eec2a5;"
                                                                                              id="Path 772" class="shp0"
                                                                                              d="M8.3 7.44L0.5 2.86L1.5 1.14L8.3 5.12L15.1 1.14L16.1 2.86L8.3 7.44Z"/>
                                                                                    </g>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <span
                                        style="margin-left: 10px;font-size: 15px;">{{ $resume->contact_info['email'] }}</span>
                                </div>
                            @endif
                            @if(isset($resume->contact_info['address']) || isset($resume->contact_info['city']))
                                <div class="icon-box"
                                     style="display: flex;align-items: center;margin-bottom: 20px;;min-width: 190px;">
                                    <svg class="Path_773" viewBox="255.365 290.657 15.261 18.423"
                                         style="    width: 12.882px;height: 14.163px;">
                                        <path style="fill: #eec2a5;" id="Path_773"
                                              d="M 268.3929748535156 292.891357421875 C 266.9069519042969 291.3960571289063 264.9466247558594 290.6570434570313 262.9968566894531 290.6570434570313 C 261.0457763671875 290.6570434570313 259.0867919921875 291.3960571289063 257.6007690429688 292.891357421875 C 254.6194458007813 295.871337890625 254.6194458007813 300.7022705078125 257.6007690429688 303.68359375 L 262.9968566894531 309.0796508789063 L 268.3929748535156 303.68359375 C 269.8789978027344 302.1882934570313 270.6260070800781 300.2371826171875 270.6260070800781 298.2874755859375 C 270.6260070800781 296.3363647460938 269.8789978027344 294.38525390625 268.3929748535156 292.891357421875 Z M 266.0137329101563 301.3043212890625 C 264.3459167480469 302.97216796875 261.6465148925781 302.97216796875 259.9786682128906 301.3043212890625 C 259.1407775878906 300.4756469726563 258.7297668457031 299.3809204101563 258.7297668457031 298.2874755859375 C 258.7297668457031 297.1926879882813 259.1407775878906 296.0992431640625 259.9786682128906 295.2705688476563 C 260.81787109375 294.4406127929688 261.902099609375 294.0203247070313 262.9968566894531 294.0203247070313 C 264.09033203125 294.0203247070313 265.1758728027344 294.4406127929688 266.0137329101563 295.2705688476563 C 266.8529052734375 296.0992431640625 267.2626342773438 297.1926879882813 267.2626342773438 298.2874755859375 C 267.2626342773438 299.3809204101563 266.8529052734375 300.4756469726563 266.0137329101563 301.3043212890625 Z">
                                        </path>
                                    </svg>
                                    <span style="margin-left: 10px;font-size: 15px;">
                                        @if(isset($resume->contact_info['address']))
                                            {{ $resume->contact_info['address'] }}
                                        @endif
                                        @if(isset($resume->contact_info['city']))
                                            , {{ $resume->contact_info['city'] }}
                                        @endif</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </li>
            </ul>
            <div class="experience-info" style="display: flex; padding: 0px 0 15px;border-top: 2px solid #eec2a5;">
                <ul class="sortable contact-info-right"
                    style="padding-top: 40px;width: 62%; display: inline-block; position: relative; margin-right: 3%;border-right: 2px solid #eec2a5;padding-right: 3%;">
                    @foreach($resume->sortable as $value)
                        @if($value == "summary")

                            <li id="summary" class="contact-border-line" style="padding-bottom: 60px;">
                                <div class="inner-box-text summary">
                                    <div class="resumeAction">
                                        <a class="btn-custom btn-red handle" title="move" id="contactInfoMove" href="#">
                                            <i class="fa fa-arrows"></i>
                                        </a>

                                        <a class="btn-custom btn-red" title="Edit" id="contactInfoEdit"
                                           href="{{ route('resume.contact',$resume->id) }}">Edit</a>
                                    </div>
                                    <h3 style="color: #eec2a5;font-size: 21px; text-transform: uppercase;letter-spacing: 2px; font-weight: 700; margin-bottom: 20px; position: relative; padding-bottom: 3px; width: 100%;"
                                        class="resume-section-heading">
                                        <span style="position: relative; z-index: 2;">SUMMARY</span>

                                    </h3>
                                    <p style="font-size: 15px; font-weight: 400; line-height: 24px; color: #5b5b5b;">
                                        {!! $resume->summary !!}
                                    </p>
                                </div>
                            </li>
                        @endif
                        @if($value == "experience")
                            <li id="experience" class="education-card-right-inner title-bg">
                                <div class="experience">
                                    <div class="resumeAction">
                                        <a class="btn-custom btn-red handle" title="move" id="experienceMove" href="#">
                                            <i class="fa fa-arrows"></i>
                                        </a>

                                        <a class="btn-custom btn-red" title="Edit" id="experienceEdit"
                                           href="{{ route('resume.experience-review',$resume->id) }}">Edit</a>
                                    </div>
                                    <h3 class="resume-section-heading"
                                        style="color: #eec2a5;font-size: 21px; text-transform: uppercase;letter-spacing: 2px; font-weight: 700; margin-bottom: 20px; position: relative; padding-bottom: 3px; width: 100%;">
                                        <span style="position: relative; z-index: 2;">Experience</span>
                                    </h3>
                                    @if(isset($resume->experience_info) && !empty($resume->experience_info))
                                        @foreach($resume->experience_info as $experience)
                                            <div class="education-bottom-box"
                                                 style="width: 100%; padding-bottom: 30px; padding-right: 0;">
                                                <div class="education-bottom-box-right">
                                                    <div class="box-title"
                                                         style="display: flex; justify-content: space-between;">
                                                        <p style="font-size: 12px; margin-bottom: 8px; font-weight: 700; letter-spacing: 1.2px;">
                                                            @if(isset($experience['job_title']))
                                                                {{ $experience['job_title'] }}
                                                            @endif</p>
                                                        <span
                                                            style="font-size: 10px; line-height: 18px; color:#eec2a5;">@if(isset($experience['start_month']))
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
                                                            @endif</span>
                                                    </div>
                                                    <div class="sub-title" style="font-size: 11px; margin-bottom: 8px;">
                                                        {{ $experience['employer'] }}
                                                    </div>
                                                    <span style="font-size: 10px; line-height: 18px; opacity: 50%;">
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
                                                <h3 style="color: #eec2a5;font-size: 21px; text-transform: uppercase;letter-spacing: 2px; font-weight: 700; margin-bottom: 20px; position: relative; padding-bottom: 3px; width: 100%;"
                                                    class="resume-section-heading">
                                                    <span style="position: relative; z-index: 2;">{{ $sectionKey }}</span>

                                                </h3>
                                            </div>
                                            <p style="font-size: 15px; font-weight: 400; line-height: 24px; color: #5b5b5b;">
                                                {!! $resume->extra_section[$sectionKey] !!}
                                            </p>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                </ul>
                <div class="experience-card-right" style="width: 35%; padding: 15px; position: relative;">
                    <ul class="sortable education-card-right-inner title-bg" style="display: flex; flex-wrap: wrap;">
                        @foreach($resume->sortable as $value)
                            @if($value == "education")
                                <li style="width: 100%;" id="education">
                                    <div class="education">
                                        <div class="resumeAction">
                                            <a class="btn-custom btn-red handle" title="move" id="educationMove"
                                               href="#">
                                                <i class="fa fa-arrows"></i>
                                            </a>

                                            <a class="btn-custom btn-red" title="Edit" id="educationEdit"
                                               href="{{ route('resume.education-review',$resume->id) }}">Edit</a>
                                        </div>
                                        <h3 style="color: #eec2a5;font-size: 21px; text-transform: uppercase;letter-spacing: 2px; font-weight: 700; margin-bottom: 20px; position: relative; padding-bottom: 3px; width: 100%;"
                                            class="resume-section-heading">
                                            <span style="position: relative; z-index: 2;">Education</span>

                                        </h3>
                                        @if(isset($resume->education) && !empty($resume->education))
                                            @foreach($resume->education as $education)
                                                <div class="education-bottom-box"
                                                     style="padding-bottom: 35px; width: 100%;">
                                                    <div class="education-bottom-box-right">
                                                        <div class="box-title"
                                                             style="display: flex; justify-content: space-between;">
                                                            <p style="font-size: 12px; letter-spacing: 1.2px; margin-bottom: 15px; font-weight: 700;">
                                                                @if(isset($education['degree']))
                                                                    {{ $education['degree'] }}
                                                                @endif

                                                                @if(isset($education['field']))
                                                                    {{ $education['field'] }}
                                                                @endif</p>

                                                        </div>
                                                        <div class="sub-title"
                                                             style="font-size: 11px; margin-bottom: 8px;">
                                                            @if(isset($education['school_name']))
                                                                {{ $education['school_name'] }}
                                                            @endif
                                                        </div>
                                                        <span style="font-size: 9px;">@if(isset($education['currently_attend']) && $education['currently_attend'] == true)
                                                                Currently Attend
                                                            @else
                                                                @if(isset($education['month']))
                                                                    {{ $education['month'] }}
                                                                @endif

                                                                @if(isset($education['year']))
                                                                    {{ $education['year'] }}
                                                                @endif
                                                            @endif</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </li>
                            @endif
                            @if($value == "skills")
                                <li class="skills-info" id="skills" style="padding-top: 55px;    width: 100%;">
                                    <div class="skills-info-left title-bg">
                                        <div class="skills-info-box skills">
                                            <div class="resumeAction">
                                                <a class="btn-custom btn-red handle" title="move" id="skillsMove"
                                                   href="#">
                                                    <i class="fa fa-arrows"></i>
                                                </a>

                                                <a class="btn-custom btn-red" title="Edit" id="skillsEdit"
                                                   href="{{ route('resume.skills',$resume->id) }}">Edit</a>
                                            </div>
                                            <h3 style="color: #eec2a5;font-size: 21px; text-transform: uppercase;letter-spacing: 2px; font-weight: 700; margin-bottom: 20px; position: relative; padding-bottom: 3px; width: 100%;"
                                                class="resume-section-heading">
                                                <span style="position: relative; z-index: 2;">Skills</span>

                                            </h3>
                                            {!! $resume->skills !!}
                                        </div>
                                    </div>
                                </li>
                            @endif
                                @if(isset($resume->extra_section[$value]) && !empty($resume->extra_section[$value]))
                                    <li id="{{ $value }}" style="width: 100%;">
                                        <div class="@if(in_array($value,$resume->extra_section)) {{ $value }} @else other @endif">
                                            <div class="inner-box-text">
                                                <div class="resumeAction @if(in_array($value,$resume->extra_section)) {{ $value }} @else other @endif">
                                                    <a class="btn-custom btn-red handle" title="move" id="{{$value}}SectionMove" href="#">
                                                        <i class="fa fa-arrows"></i>
                                                    </a>

                                                    <a class="btn-custom btn-red" title="Edit" id="{{$value}}SectionEdit" href="{{ route('resume.section',[$resume->id,$value]) }}">Edit</a>
                                                </div>

                                                <div class="title-box">
                                                    <h3 style="color: #eec2a5;font-size: 21px; text-transform: uppercase;letter-spacing: 2px; font-weight: 700; margin-bottom: 20px; position: relative; padding-bottom: 3px; width: 100%;"
                                                        class="resume-section-heading">
                                                        <span style="position: relative; z-index: 2;">{{ $value }}</span>

                                                    </h3>
                                                </div>

                                                <p style="font-size: 15px; font-weight: 400; line-height: 24px; color: #5b5b5b;">
                                                    {!! $resume->extra_section[$value] !!}
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="bottomline" style="position: absolute;top: 0;z-index: -1;left: 0;">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 944 1343" width="944" height="1343">
                    <defs>
                        <clipPath clipPathUnits="userSpaceOnUse" id="cp1">
                            <path d="M0 0L944 0L944 1343L0 1343Z"/>
                        </clipPath>
                    </defs>
                    <style>
                        tspan {
                            white-space: pre
                        }

                        .shp0 {
                            fill: #eec2a5
                        }
                    </style>
                    <g id="New 4" clip-path="url(#cp1)">
                        <g id="BG">
                            <g id="Bg">
                                <path id="Path 1474" class="shp0"
                                      d="M1155.99 -702.08C1155.99 -702.08 1012.99 -686.08 576.02 -55.32C445.98 132.38 384.58 -76.43 206.07 69.72C27.56 215.88 -230.26 -276.53 -107.15 -587.53C15.97 -898.52 -456.09 -1096.4 -203.15 -1199.79C49.79 -1303.17 -25.22 -1620.2 320.5 -1481.44C666.21 -1342.69 1264.45 -1119.56 1155.99 -702.08Z"/>
                                <path id="Path 1481" class="shp0"
                                      d="M788.67 1245.69C822.15 1262 859.5 1256.28 895.25 1258.6C915.73 1259.93 936.69 1260.49 957.18 1258.91C978.39 1257.27 998.12 1259.06 1019.18 1262.21C1053.72 1267.39 1086.49 1255.37 1120.58 1253.32C1162.62 1250.79 1204.94 1254.39 1247.01 1253.65C1253.49 1253.53 1253.5 1241.81 1247.01 1241.7C1204.98 1240.95 1162.62 1241.13 1120.58 1242.21C1086.5 1243.08 1050.05 1248.04 1016.14 1242.02C977.72 1235.2 939.33 1241.84 900.71 1238.19C863.69 1234.68 826.89 1236.69 789.94 1234.59C784.13 1234.26 784.07 1243.46 788.67 1245.69Z"/>
                                <path id="Path 1482" class="shp0"
                                      d="M799.32 1205.18C819.11 1204.28 839.36 1208.41 859.28 1208.55C879.82 1208.7 900.16 1210.72 920.63 1210.98C941.15 1211.24 961.66 1211.02 982.18 1211.17C1002.72 1211.33 1022.63 1215.41 1043.11 1216.82C1083.31 1219.61 1124.17 1217.29 1164.44 1217.33C1174.03 1217.34 1184.53 1215.7 1194.04 1216.88C1201.38 1217.78 1208.8 1220.32 1216.18 1221.53C1228.18 1223.49 1246.46 1232.06 1257.88 1223.57C1267.91 1216.12 1258.15 1196.87 1248.67 1204.89C1243.5 1209.27 1230.93 1203.6 1225.01 1203.04C1217.13 1202.3 1209.41 1201.99 1201.58 1200.65C1184.48 1197.71 1166.2 1199.97 1148.86 1199.99C1109.7 1200.04 1069.86 1202.56 1030.81 1198.9C1011.87 1197.12 993.91 1194.96 974.84 1195.06C953.19 1195.17 931.31 1196.74 909.68 1195.52C874.16 1193.52 833.25 1187.82 798.85 1201.06C797.03 1201.76 797.25 1205.27 799.32 1205.18Z"/>
                                <path id="Path 1483" class="shp0"
                                      d="M788.37 1175.77C810.02 1178.1 830.96 1172.68 852.56 1171.97C873.66 1171.28 894.78 1172.93 915.88 1171.73C959.68 1169.25 1002.68 1163.25 1046.65 1163.4C1067.7 1163.47 1089.07 1162.31 1110.1 1163.93C1128.22 1165.33 1145.91 1170.43 1164.06 1171.36C1181.56 1172.26 1198.81 1175.22 1216.26 1176.98C1235.32 1178.9 1254.52 1183.67 1273.63 1183.45C1286.64 1183.29 1286.53 1158.66 1273.63 1159.55C1237.33 1162.04 1200.42 1150.65 1164.06 1149.66C1145.97 1149.17 1128.19 1143.79 1110.1 1142.54C1089.06 1141.1 1067.71 1142.36 1046.65 1142.43C1002.67 1142.58 959.68 1148.86 915.88 1151.62C895.64 1152.89 875.39 1151.39 855.14 1152.19C832.55 1153.08 810.67 1159.98 788.37 1163.5C781.86 1164.53 781.6 1175.05 788.37 1175.77Z"/>
                                <path id="Path 1484" class="shp0"
                                      d="M804.02 1124.08C825.21 1125.13 846.04 1127.2 867.34 1126.92C887.47 1126.66 907.6 1125.39 927.73 1124.77C967.52 1123.56 1007.31 1124.41 1047.1 1124.71C1085.02 1125 1122.63 1127.02 1160.57 1127.06C1181.34 1127.07 1202.11 1127.08 1222.89 1127.11C1232.19 1127.13 1241.63 1126.6 1250.92 1127.14C1260.69 1127.7 1270.11 1130.89 1279.89 1131.5C1290.86 1132.19 1290.98 1111.25 1279.89 1111.16C1260.92 1111 1242.01 1108.12 1222.89 1108.12C1203.06 1108.13 1183.23 1108.17 1163.4 1108.19C1124.52 1108.23 1085.98 1106.42 1047.1 1106.8C1008.27 1107.18 969.42 1106.98 930.61 1108.79C888.32 1110.75 846.18 1116.22 804.02 1118.58C801.05 1118.75 801.04 1123.93 804.02 1124.08Z"/>
                                <path id="Path 1485" class="shp0"
                                      d="M802.46 1083.85C824.2 1085.36 845.83 1082.93 867.57 1083.06C889.86 1083.2 912.15 1083.58 934.44 1083.65C979.17 1083.78 1023.82 1078.8 1068.52 1080.4C1110.41 1081.91 1152.28 1084.25 1194.14 1080.6C1209.82 1079.24 1224.48 1079.04 1240.16 1081.44C1254.72 1083.67 1269.82 1086.97 1284.58 1086.59C1295.28 1086.31 1295.25 1066.29 1284.58 1066.89C1254.86 1068.55 1225.58 1057.79 1195.61 1061.59C1175.47 1064.15 1154.52 1063.37 1134.22 1063.69C1112.17 1064.03 1090.49 1062.55 1068.52 1061.84C1023.82 1060.39 979.16 1065.92 934.44 1066.14C913.09 1066.24 891.68 1065.76 870.35 1066.92C847.23 1068.19 825.33 1074.07 802.46 1077.06C798.85 1077.53 798.71 1083.58 802.46 1083.85Z"/>
                                <path id="Path 1486" class="shp0"
                                      d="M811.85 1041.11C852.86 1046.97 895.9 1044.96 937.21 1044.84C981.22 1044.7 1024.56 1037.13 1068.61 1038.08C1090.21 1038.55 1111.76 1036.25 1133.37 1036.22C1153.48 1036.2 1173.36 1039.7 1193.41 1039.88C1212.28 1040.04 1230.8 1044.19 1249.55 1045.82C1258.56 1046.61 1266.6 1044.73 1275.59 1046.51C1283.64 1048.1 1292.06 1047.26 1300.24 1047.25C1310.57 1047.24 1310.58 1028.2 1300.24 1028.19C1291.76 1028.19 1284 1028.2 1275.76 1026.56C1266.56 1024.73 1257.52 1027.72 1248.32 1026.48C1230.72 1024.1 1213.36 1020.94 1195.61 1020.6C1175.72 1020.23 1156.1 1016.84 1136.17 1016.93C1113.62 1017.02 1091.13 1019.08 1068.61 1018.82C1025.43 1018.31 983.04 1026.19 939.92 1026.85C918.06 1027.18 896.2 1026.71 874.35 1027.58C863.75 1028.01 852.93 1027.78 842.37 1028.97C832.1 1030.13 822.18 1033.31 811.85 1034.33C808.12 1034.7 808.23 1040.6 811.85 1041.11Z"/>
                                <path id="Path 1476" class="shp0"
                                      d="M2002.99 -499.08C2002.99 -499.08 1711.99 -826.08 1410.99 -633.08C1109.99 -440.08 1031.99 -256.08 1031.99 -256.08C1031.99 -256.08 1020.99 -122.08 870.99 -133.08C720.99 -144.08 613.99 -111.08 603.99 -67.08C593.99 -23.08 688.99 102.92 802.99 152.92C916.99 202.92 1086.99 330.92 1237.99 279.92C1388.99 228.92 2164.99 339.92 2188.99 6.92C2212.99 -326.08 2002.99 -499.08 2002.99 -499.08Z"/>
                                <path id="Path 1579" class="shp0"
                                      d="M21.52 1301.51C22.05 1301.18 26.5 1300.7 24.2 1300.66C22.08 1300.62 20.46 1301.06 18.6 1301.84C16.72 1302.63 14.93 1303.64 13.54 1305.22C11.81 1306.84 13.29 1306.04 17.97 1302.81C17.65 1302.89 17.33 1302.96 17 1303C18.34 1302.82 19.67 1302.64 21.01 1302.46C15.82 1303.03 10.8 1303.9 6.99 1308.01C1.72 1313.7 -0.04 1322.05 4.07 1328.99C8.47 1336.43 18.06 1338.73 25.54 1334.62C28.59 1332.95 29.89 1330.95 31.94 1328.28C31.1 1329.37 30.26 1330.46 29.41 1331.55C34.11 1327.19 37.02 1320.3 36.16 1313.92C36.08 1313.33 35.33 1307.81 35.97 1313.29C35.81 1312 35.65 1310.37 35.35 1309C34.83 1306.59 33.76 1304.74 32.15 1302.88C29.68 1300.03 24.64 1299.58 21.52 1301.51Z"/>
                                <path id="Path 1580" class="shp0"
                                      d="M50.75 1330.75C50.06 1333.8 48.32 1335.51 46.36 1337.74C42.75 1341.82 39.37 1346.39 39.46 1352.1C39.58 1358.85 46.7 1365.72 53.79 1363.02C60.67 1360.39 64.49 1354.65 65.63 1347.47C66.5 1341.96 67.12 1336.09 65.11 1330.75C62.72 1324.41 52.5 1322.97 50.75 1330.75Z"/>
                                <path id="Path 1587" class="shp0"
                                      d="M111.03 1281.53C109.04 1282.4 107.41 1283.72 105.72 1285.08C105.25 1285.46 104.21 1286.72 103.64 1286.81C103.99 1286.56 104.34 1286.3 104.68 1286.04C104.35 1286.28 104.01 1286.52 103.67 1286.75C101.32 1288.42 99.02 1290.05 97.43 1292.52C95.03 1296.24 94.93 1302.03 97.33 1305.64C99.75 1309.28 105.01 1312.44 109.57 1310.62C111.57 1309.82 113.28 1309.18 114.88 1307.59C116.79 1305.07 117.22 1304.52 116.16 1305.95C115.09 1307.39 115.53 1306.83 117.5 1304.25C118.43 1302.48 118.96 1300.49 119.59 1298.61C119.99 1297.42 120.3 1296.22 120.61 1295.02C120.8 1294.28 121.01 1293.56 121.23 1292.84C121.73 1291.22 120.69 1293.74 121.64 1292.14C123.39 1289.18 122.85 1285.17 120.42 1282.74C117.8 1280.12 114.23 1280.13 111.03 1281.53Z"/>
                                <path id="Path 1588" class="shp0"
                                      d="M149.84 1293.77C152.14 1291.76 148.66 1294.56 148.2 1294.92C150.36 1293.27 148.35 1294.68 147.84 1294.96C146.58 1295.63 145.32 1296.27 144.08 1296.97C137.52 1300.74 133.08 1306.43 132.75 1314.26C132.42 1322.12 139.03 1328.8 146.47 1329.81C153.39 1330.73 162.78 1326.27 163.83 1318.47C164.05 1316.86 164.27 1315.24 164.49 1313.63C164.43 1313.3 164.41 1312.96 164.44 1312.62C164.48 1311.42 164.37 1312.16 164.12 1314.82C164.26 1313.92 164.39 1313.02 164.49 1312.12C164.66 1310.87 164.84 1309.62 164.97 1308.37C165.18 1306.42 164.42 1311.76 164.92 1309C166.07 1302.52 165.88 1296.38 159.73 1292.49C156.52 1290.46 152.52 1291.43 149.84 1293.77Z"/>
                                <path id="Path 1596" class="shp0"
                                      d="M203.08 1237.31C197.73 1242.41 191 1246.8 188.8 1254.28C185.75 1264.69 198.19 1274.9 207.64 1268.75C212.86 1265.35 214.4 1261.22 215.64 1255.52C216.33 1252.34 217.48 1249.29 218.26 1246.14C220.45 1237.3 209.7 1231.01 203.08 1237.31Z"/>
                                <path id="Path 1590" class="shp0"
                                      d="M347.95 1249.93C346.21 1254.18 342.45 1257.51 339.7 1261.1C334.3 1268.14 332.82 1276.65 339.07 1283.71C343.61 1288.84 350.87 1287.4 355.6 1283.71C360.56 1279.83 360.77 1272.6 361.97 1266.92C363.22 1261.04 362.85 1255.55 360.74 1249.93C358.33 1243.52 350.46 1243.81 347.95 1249.93Z"/>
                                <path id="Path 1594" class="shp0"
                                      d="M455.85 1271.39C454.42 1272.86 453.01 1274.35 451.47 1275.72C450.68 1276.42 448.88 1277.36 451.95 1275.45C451.52 1275.72 451.13 1276.04 450.7 1276.31C449.52 1277.03 448.34 1277.82 447.31 1278.75C446.48 1279.65 445.72 1280.61 445.04 1281.63C446.53 1279.73 446.9 1279.23 446.14 1280.14C442.74 1284.11 441.2 1290.07 444.24 1294.8C447.24 1299.46 452.49 1301.62 457.91 1300.36C467.23 1298.21 469.74 1288.66 471.71 1280.62C472.68 1276.67 471.11 1271.89 467.35 1269.9C463.64 1267.95 458.88 1268.28 455.85 1271.39Z"/>
                                <path id="Path 1593" class="shp0"
                                      d="M588.44 1212.48C588.34 1212.87 588.05 1213.76 588.42 1212.91C588.39 1212.99 587.09 1214.87 587.77 1214.03C588.43 1213.22 587.26 1214.5 587.13 1214.62C586.62 1215.11 586.12 1215.61 585.61 1216.1C583.18 1218.42 580.98 1220.85 579.15 1223.69C576.74 1227.42 576.62 1233.36 579.15 1237.08C579.28 1237.27 579.41 1237.45 579.53 1237.64C583.09 1242.87 590.99 1246.39 596.84 1242.18C601.9 1238.53 603.48 1235.15 603.81 1229.12C603.8 1228.71 603.81 1228.29 603.85 1227.88C603.98 1226.58 603.95 1226.8 603.75 1228.57C603.55 1227.97 604.1 1226.56 604.19 1225.97C605.09 1220.39 605.04 1215.86 602.8 1210.6C600.07 1204.18 590.01 1206.44 588.44 1212.48Z"/>
                                <path id="Path 1595" class="shp0"
                                      d="M688.82 1226.77C688.54 1227.05 688.27 1227.29 687.96 1227.53C688.63 1227.02 689.3 1226.5 689.97 1225.99C689.22 1226.54 688.41 1226.92 687.59 1227.35C685.59 1228.39 683.03 1230.92 681.85 1232.86C678.59 1238.19 679.58 1245.49 685.14 1248.83C690.58 1252.1 697.15 1249.94 700.95 1245.35C702.67 1243.27 703.9 1241.04 704.38 1238.4C704.67 1236.78 704.98 1235.07 704.84 1233.41C704.52 1229.59 702.74 1226.38 699.07 1224.83C695.62 1223.38 691.51 1224.1 688.82 1226.77Z"/>
                                <path id="Path 1592" class="shp0"
                                      d="M880.96 1285.83C880.18 1286.63 879.7 1287.63 879 1288.47C879.74 1287.58 877.83 1289.42 877.88 1289.38C876.39 1290.67 875.79 1290.88 873.83 1292.53C870.11 1295.66 867.08 1298.99 865.54 1303.72C863.45 1310.12 868.49 1316.74 874.78 1317.59C880.8 1318.4 888.06 1313.46 887.37 1306.67C887.17 1304.64 886.49 1307.74 887.41 1305.88C886.18 1308.37 889.22 1301.72 888.46 1303.34C887.87 1304.6 888.32 1303.62 888.73 1302.96C889.21 1302.18 889.72 1301.44 890.23 1300.67C892.94 1296.59 894.81 1291.98 892.34 1287.3C890.16 1283.18 884.12 1282.61 880.96 1285.83Z"/>
                                <path id="Path 1591" class="shp0"
                                      d="M726.88 1295.44C725.96 1297.61 727.34 1295.38 726.48 1296.43C726.07 1296.93 724.66 1297.91 725.85 1297.05C723.91 1298.44 721.91 1299.74 720.21 1301.43C716.42 1305.18 713.07 1311.56 713.73 1317C714.67 1324.73 720.23 1329.5 728.17 1328C735.62 1326.58 739.43 1319.25 741.56 1312.72C743.13 1307.87 744.12 1302.39 742.35 1297.46C741.21 1294.25 738.83 1291.81 735.32 1291.39C732.31 1291.03 728.19 1292.34 726.88 1295.44Z"/>
                                <path id="Path 1584" class="shp0"
                                      d="M623.94 1290.2C623.64 1291.69 623.06 1290.71 624.38 1289.46C624.11 1289.72 623.92 1290.38 623.74 1290.7C623.48 1291.17 623.2 1291.64 622.91 1292.09C622.65 1292.49 621.04 1294.6 622.51 1292.78C623.96 1290.97 622.34 1292.94 622.02 1293.27C621.67 1293.64 621.19 1293.97 620.88 1294.38C622.66 1292.04 623.54 1292.47 622.19 1293.27C620.83 1294.07 619.43 1294.98 618.41 1296.2C614.46 1300.92 612.58 1307.83 616.18 1313.42C619.64 1318.79 625.93 1321.58 632.23 1319.95C641 1317.68 644.35 1308.91 644.11 1300.72C643.99 1296.46 643.4 1291.72 641.28 1287.93C637.48 1281.18 625.52 1282.05 623.94 1290.2Z"/>
                                <path id="Path 1585" class="shp0"
                                      d="M262 1277.02C261.44 1279.01 262.86 1275.74 262.25 1276.62C261.96 1277.04 261.75 1277.51 261.46 1277.93C260.88 1278.79 260.22 1279.6 259.62 1280.44C256.32 1285.11 255.91 1290.91 258.74 1295.94C262.16 1302.01 272.17 1304.06 276.98 1298.29C279.44 1295.34 280.73 1292.62 281.13 1288.76C281.19 1288.14 281.23 1287.53 281.26 1286.91C281.37 1284.95 280.92 1289.31 281.12 1287.86C281.65 1284.04 282 1280.83 281.08 1277.02C280.1 1272.97 275.75 1269.56 271.54 1269.75C267.17 1269.95 263.19 1272.69 262 1277.02Z"/>
                                <path id="Path 1586" class="shp0"
                                      d="M53.36 1256.63C53.07 1257.61 52.87 1258.69 52.48 1259.62C52.31 1259.88 52.13 1260.15 51.96 1260.41C52.28 1259.95 52.21 1259.98 51.78 1260.5C51.35 1260.99 50.94 1261.49 50.49 1261.97C50.17 1262.32 49.84 1262.66 49.49 1262.98C51.03 1261.93 51.28 1261.68 50.25 1262.24C41.72 1266.5 42.59 1279.25 50.25 1283.73C58.79 1288.73 68.4 1282.22 68.98 1272.99C69.34 1267.17 66.11 1261.94 64.37 1256.63C62.64 1251.32 54.99 1251.08 53.36 1256.63Z"/>
                                <path id="Path 1583" class="shp0"
                                      d="M211.72 1305.3C211.4 1306.63 212.53 1304.29 211.92 1305.05C211.72 1305.3 211.43 1305.77 211.31 1306.06C210.94 1306.99 212.53 1304.75 211.43 1305.95C211.06 1306.34 210.71 1306.76 210.33 1307.15C208.41 1309.18 206.31 1310.88 204.84 1313.33C201.11 1319.56 204.08 1327.69 210.6 1330.44C213.71 1331.75 216.79 1331.75 219.9 1330.44C223.63 1328.87 225.37 1326.25 226.88 1322.63C227.98 1319.98 227.99 1316.08 227.99 1313.14C227.99 1309.75 227.45 1306.48 225.89 1303.45C222.84 1297.55 213.25 1298.97 211.72 1305.3Z"/>
                                <path id="Path 1581" class="shp0"
                                      d="M390.08 1300.87C387.8 1303.25 385.17 1305.13 382.77 1307.34C376.29 1313.3 376.3 1324.89 385.18 1328.64C393.26 1332.05 400.97 1325.9 402.6 1318.02C403.37 1314.31 404.05 1310.58 404.36 1306.79C404.95 1299.46 394.86 1295.88 390.08 1300.87Z"/>
                                <path id="Path 1582" class="shp0"
                                      d="M525.73 1310.71C525.26 1312.31 526.68 1309.4 525.66 1310.92C525.51 1311.13 524.55 1312.72 525.25 1311.66C525.94 1310.61 524.82 1312.13 524.63 1312.33C524.14 1312.85 523.63 1313.35 523.1 1313.82C520.18 1316.44 516.52 1320.66 517.04 1324.93C517.54 1329.1 519.67 1333.17 524.13 1334.24C536.93 1337.31 542.99 1320.74 540.69 1310.71C538.92 1303.03 527.82 1303.64 525.73 1310.71Z"/>
                            </g>
                        </g>
                    </g>
                </svg>
            </div>
        </div>
    </div>
