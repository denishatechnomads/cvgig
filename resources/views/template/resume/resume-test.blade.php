@section('styles')
    @include('template.resume.style')
    <div class="custom-resume-card"
         style="min-height:29cm;max-width: 944px; margin: 0 auto; width: 100%; position: relative; z-index:2; ">
        <div class="resume-card-inner" style="padding: 50px 35px; position: relative;">
            <ul class="contact-info ui-sortable" style="padding-bottom: 20px;">

                <li>
                    <div class="profile-info" style="width: 163px;height: 163px;background-color: #000;border-radius: 100%;margin: 0px auto ;">

                    </div>
                </li>
                <li style="padding-bottom: 15px; width: 100%;text-align: center;">
                    <div style="padding-top: 30px;justify-content: center;width: 100%;">
                        <div class="title-resume-card" style="padding: 0px 0 20px;">
                            <h1 style="text-align: center;color: #0f2337;font-size: 36px; margin-bottom: 0; text-transform: capitalize; font-weight: 700; position: relative;letter-spacing: 0.25px;">
                                <span style="position: relative; z-index: 3;">{{ $resume->contact_info['name'] }}</span>

                            </h1>

                        </div>
                        <div class="icon-box-top" style="    width: 100%;
    text-align: center;
    display: inline-block;
    max-width: 70%;">
                            <div class="icon-box" style="float: left;margin-bottom: 20px;    padding-right: 15px;">
                                <svg class="Path_769" viewBox="99.136 292.733 12.882 14.163"
                                     style="    width: 12.882px;height: 14.163px;">
                                    <path style="fill: #fc6880;" id="Path_769"
                                          d="M 100.3174896240234 299.7904052734375 L 101.7605285644531 301.4761352539063 L 103.3780975341797 303.5084533691406 L 104.8199005126953 305.1855163574219 C 106.4585113525391 307.0965270996094 109.2691040039063 307.4517517089844 111.3284912109375 306.0184936523438 C 112.105712890625 305.4763488769531 112.2554626464844 304.37109375 111.6292266845703 303.6495666503906 L 110.4572143554688 302.2732543945313 C 110.1490478515625 301.9167785644531 109.7084655761719 301.7298889160156 109.2691040039063 301.7298889160156 C 108.9312438964844 301.7298889160156 108.5946197509766 301.8325805664063 108.3136749267578 302.057861328125 C 107.6478424072266 302.5628356933594 106.7023162841797 302.4700317382813 106.1589965820313 301.8325805664063 L 105.8124694824219 301.4204711914063 L 104.1862640380859 299.3869018554688 L 103.8397216796875 298.9747619628906 C 103.2964172363281 298.3472595214844 103.3422088623047 297.4016418457031 103.9424438476563 296.8211975097656 C 104.2704010009766 296.5117797851563 104.4288330078125 296.099609375 104.4288330078125 295.6874389648438 C 104.4288330078125 295.3322448730469 104.3075408935547 294.9671020507813 104.0550689697266 294.67626953125 L 102.8743743896484 293.2999267578125 C 102.2568206787109 292.5697021484375 101.1429595947266 292.5411987304688 100.4870452880859 293.2343139648438 C 98.75439453125 295.05126953125 98.67889404296875 297.8880615234375 100.3174896240234 299.7904052734375 Z">
                                    </path>
                                </svg>
                                <span
                                    style="margin-left: 10px;font-size: 15px;">{{ $resume->contact_info['phone'] }}</span>
                            </div>
                            <div class="icon-box" style="float: left;margin-bottom: 20px;    padding-right: 15px;">
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
                                                                                    <path style="fill: #fc6880;"
                                                                                          id="Path 771"
                                                                                          fill-rule="evenodd"
                                                                                          class="shp0"
                                                                                          d="M16.6 11.56L0 11.56L0 1L16.6 1L16.6 11.56ZM2 9.56L14.6 9.56L14.6 3L2 3L2 9.56Z"/>
                                                                                </g>
                                                                                <g id="Group 1810">
                                                                                    <path style="fill: #fc6880;"
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
                            <div class="icon-box" style="float: left;margin-bottom: 20px;;min-width: 190px;">
                                <svg class="Path_773" viewBox="255.365 290.657 15.261 18.423"
                                     style="    width: 12.882px;height: 14.163px;">
                                    <path style="fill: #fc6880;" id="Path_773"
                                          d="M 268.3929748535156 292.891357421875 C 266.9069519042969 291.3960571289063 264.9466247558594 290.6570434570313 262.9968566894531 290.6570434570313 C 261.0457763671875 290.6570434570313 259.0867919921875 291.3960571289063 257.6007690429688 292.891357421875 C 254.6194458007813 295.871337890625 254.6194458007813 300.7022705078125 257.6007690429688 303.68359375 L 262.9968566894531 309.0796508789063 L 268.3929748535156 303.68359375 C 269.8789978027344 302.1882934570313 270.6260070800781 300.2371826171875 270.6260070800781 298.2874755859375 C 270.6260070800781 296.3363647460938 269.8789978027344 294.38525390625 268.3929748535156 292.891357421875 Z M 266.0137329101563 301.3043212890625 C 264.3459167480469 302.97216796875 261.6465148925781 302.97216796875 259.9786682128906 301.3043212890625 C 259.1407775878906 300.4756469726563 258.7297668457031 299.3809204101563 258.7297668457031 298.2874755859375 C 258.7297668457031 297.1926879882813 259.1407775878906 296.0992431640625 259.9786682128906 295.2705688476563 C 260.81787109375 294.4406127929688 261.902099609375 294.0203247070313 262.9968566894531 294.0203247070313 C 264.09033203125 294.0203247070313 265.1758728027344 294.4406127929688 266.0137329101563 295.2705688476563 C 266.8529052734375 296.0992431640625 267.2626342773438 297.1926879882813 267.2626342773438 298.2874755859375 C 267.2626342773438 299.3809204101563 266.8529052734375 300.4756469726563 266.0137329101563 301.3043212890625 Z">
                                    </path>
                                </svg>
                                <span style="margin-left: 10px;font-size: 15px;"> @if(isset($resume->contact_info['address']))
                                        {{ $resume->contact_info['address'] }}
                                    @endif
                                    @if(isset($resume->contact_info['city']))
                                        , {{ $resume->contact_info['city'] }}
                                    @endif</span>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="experience-info" style=" padding: 10px 0 15px;display: inline-block;width: 100%;">
                <ul class="contact-info-right"
                    style="    float: left;width: 62%; display: inline-block; position: relative; margin-right: 3%;border-right: 2px solid #f8b6ce;padding-right: 3%;">
                    @foreach($resume->sortable as $value)
                        @if($value == "summary")
                            <li class="contact-border-line" style="padding-bottom: 60px;">
                                <div class="inner-box-text">
                                    <h3 style="color: #fc6880;font-size: 21px; text-transform: capitalize; font-weight: 700; margin-bottom: 20px; position: relative; padding-bottom: 3px; width: 100%;">
                                        <span style="position: relative; z-index: 2;">Personal Info</span>

                                    </h3>
                                    <p style="font-size: 15px; font-weight: 400; line-height: 24px; color: #5b5b5b;">
                                        {!! $resume->summary !!}
                                    </p>
                                </div>
                            </li>
                        @endif
                        @if($value == "experience")
                            <li class="education-card-right-inner title-bg">

                                <h3 style="color: #fc6880;font-size: 21px; text-transform: capitalize; font-weight: 700;margin-bottom: 20px; position: relative; padding-bottom: 3px; width: 100%;">
                                    <span style="position: relative; z-index: 2;">Work Experience</span>

                                </h3>
                                @if(isset($resume->experience_info) && !empty($resume->experience_info))
                                    @foreach($resume->experience_info as $experience)
                                <div class="education-bottom-box"
                                     style="width: 100%; padding-bottom: 30px; padding-right: 0;">
                                    <div class="education-bottom-box-right">
                                        <div class="box-title" style="display: inline-block;width: 100%;">
                                            <p style="float: left;font-size: 12px; margin-bottom: 8px; font-weight: 700; letter-spacing: 1.2px;">
                                                {{ $experience['employer'] }}</p>
                                            <span
                                                style="float: right;font-size: 10px; line-height: 18px; color:#fc6880;">@if(isset($experience['start_month']))
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
                                            @if(isset($experience['job_title']))
                                                {{ $experience['job_title'] }}
                                            @endif
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
                            </li>
                        @endif
                    @endforeach
                </ul>
                <div class="experience-card-right"
                     style="    float: right;width: 35%; padding: 15px; position: relative;">
                    <ul class="education-card-right-inner title-bg" style="">
                        @foreach($resume->sortable as $value)
                            @if($value == "education")
                        <li style="    width: 100%;">
                            <h3 style="color: #fc6880;font-size: 21px; text-transform: capitalize; font-weight: 700; margin-bottom: 20px; position: relative; padding-bottom: 3px; width: 100%;">
                                <span style="position: relative; z-index: 2;">Education</span>

                            </h3>
                            @if(isset($resume->education) && !empty($resume->education))
                                @foreach($resume->education as $education)
                            <div class="education-bottom-box" style="padding-bottom: 35px; width: 100%;">
                                <div class="education-bottom-box-right">
                                    <div class="box-title" style="">
                                        <p style="font-size: 12px; letter-spacing: 1.2px; margin-bottom: 15px; font-weight: 700;">
                                            @if(isset($education['degree']))
                                                {{ $education['degree'] }}
                                            @endif</p>

                                    </div>
                                    <div class="sub-title" style="font-size: 11px; margin-bottom: 8px;">
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
                        </li>
                            @endif
                        @endforeach
                            @foreach($resume->sortable as $value)
                    @if($value == "skills")
                        <li class="skills-info" style="padding-top: 55px;    width: 100%;">
                            <div class="skills-info-left title-bg">
                                <div class="skills-info-box">
                                    <h3 style="font-size: 21px; text-transform: capitalize; font-weight: 700;    color: #fc6880;margin-bottom: 20px; position: relative; padding-bottom: 3px; width: 100%;">
                                        <span style="position: relative; z-index: 2;">Skills</span>

                                    </h3>
                                    {!! $resume->skills !!}
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
                        <clipPath clipPathUnits="userSpaceOnUse" id="cp2">
                            <path d="M867.37 580.74L1300.5 580.74L1300.5 876.05L867.37 876.05L867.37 580.74Z"/>
                        </clipPath>
                        <clipPath clipPathUnits="userSpaceOnUse" id="cp3">
                            <path d="M-354.85 758.8L78.28 758.8L78.28 1054.11L-354.85 1054.11L-354.85 758.8Z"/>
                        </clipPath>
                    </defs>
                    <style>
                        tspan {
                            white-space: pre
                        }

                        .shp0 {
                            fill: #fcdbe8
                        }

                        .shp1 {
                            fill: #fdcbdd
                        }

                        .shp2 {
                            fill: #fc6880
                        }

                        .shp3 {
                            fill: #fc475e
                        }

                        .shp4 {
                            fill: #ffffff
                        }

                        .shp5 {
                            fill: #f8b6ce
                        }

                        .shp6 {
                            fill: #000000
                        }

                        .shp7 {
                            fill: #222222
                        }
                    </style>
                    <g id="New 1" clip-path="url(#cp1)">
                        <g id="BG">
                            <g id="BG">
                                <g id="Group 2075">
                                    <g id="Group 2074">
                                        <path id="Path 1274" fill-rule="evenodd" class="shp0"
                                              d="M361.31 1610.62C256.06 1610.62 170.44 1525 170.44 1419.75C170.44 1314.5 256.06 1228.87 361.31 1228.87C466.56 1228.87 552.19 1314.5 552.19 1419.75C552.19 1525 466.56 1610.62 361.31 1610.62ZM361.31 1230.35C256.88 1230.35 171.91 1315.31 171.91 1419.75C171.91 1524.19 256.88 1609.15 361.31 1609.15C465.75 1609.15 550.71 1524.19 550.71 1419.75C550.71 1315.31 465.75 1230.35 361.31 1230.35Z"/>
                                    </g>
                                </g>
                                <g id="Group 2079">
                                    <g id="Group 2078">
                                        <path id="Path 1283" class="shp1"
                                              d="M388.93 1375.96C376.29 1339.92 351.92 1305.69 316.21 1292.15C300.81 1286.31 284.14 1284.6 267.67 1284.37C225.44 1283.78 180.6 1292.01 142.82 1273.13C112.6 1258.02 92.58 1228.01 64.31 1209.5C36.75 1191.46 1.63 1185.42 -30.36 1193.23L-30.36 1392.21L388.93 1375.96Z"/>
                                        <path id="Path 1284" class="shp0"
                                              d="M317.99 1360.64C305.35 1324.59 280.99 1290.36 245.27 1276.82C229.87 1270.98 213.2 1269.28 196.73 1269.05C154.51 1268.45 109.66 1276.69 71.88 1257.8C41.66 1242.7 21.64 1212.68 -6.63 1194.17C-34.18 1176.13 -69.31 1170.1 -101.3 1177.9L-101.3 1376.89L317.99 1360.64Z"/>
                                        <path id="Path 1285" class="shp1"
                                              d="M-70.02 442.04C-26.5 414.56 37.75 420.82 68.5 379.54C92.72 347.04 84.98 297.12 112.96 267.8C139.16 240.33 185.05 243.23 215.16 220.13C239.73 201.28 249.35 167.52 245.74 136.76C242.13 106.01 227.17 77.75 210.14 51.89C189.39 20.41 165.15 -8.76 138 -34.92L-94.78 -34.92L-70.02 442.04Z"/>
                                        <path id="Path 1286" class="shp0"
                                              d="M-123 417.96C-79.47 390.48 -15.22 396.74 15.53 355.46C39.74 322.96 32.01 273.04 59.98 243.72C86.19 216.25 132.07 219.15 162.19 196.05C186.76 177.2 196.38 143.44 192.77 112.68C189.16 81.93 174.2 53.67 157.16 27.81C136.42 -3.67 112.18 -32.84 85.03 -59L-147.75 -59L-123 417.96Z"/>
                                    </g>
                                </g>
                                <g id="Group 2081">
                                    <g id="Group 2080" clip-path="url(#cp2)">
                                        <path id="Rectangle 1313" class="shp0"
                                              d="M719.69 738.12L1080.63 377.13L1081.68 378.18L720.74 739.16L719.69 738.12Z"/>
                                        <path id="Rectangle 1314" class="shp0"
                                              d="M728.63 747.06L1089.57 386.07L1090.62 387.12L729.68 748.1L728.63 747.06Z"/>
                                        <path id="Rectangle 1315" class="shp0"
                                              d="M737.58 756L1098.51 395.01L1099.56 396.06L738.62 757.04L737.58 756Z"/>
                                        <path id="Rectangle 1316" class="shp0"
                                              d="M746.51 764.94L1107.45 403.95L1108.5 405L747.56 765.98L746.51 764.94Z"/>
                                        <path id="Rectangle 1317" class="shp0"
                                              d="M755.46 773.88L1116.39 412.9L1117.44 413.94L756.5 774.92L755.46 773.88Z"/>
                                        <path id="Rectangle 1318" class="shp0"
                                              d="M764.4 782.82L1125.33 421.84L1126.38 422.88L765.44 783.86L764.4 782.82Z"/>
                                        <path id="Rectangle 1319" class="shp0"
                                              d="M773.34 791.76L1134.27 430.78L1135.32 431.82L774.38 792.8L773.34 791.76Z"/>
                                        <path id="Rectangle 1320" class="shp0"
                                              d="M782.28 800.7L1143.21 439.72L1144.26 440.76L783.32 801.74L782.28 800.7Z"/>
                                        <path id="Rectangle 1321" class="shp0"
                                              d="M791.3 809.72L1152.07 448.57L1153.11 449.61L792.34 810.76L791.3 809.72Z"/>
                                        <path id="Rectangle 1322" class="shp0"
                                              d="M800.16 818.58L1161.09 457.6L1162.14 458.64L801.2 819.62L800.16 818.58Z"/>
                                        <path id="Rectangle 1323" class="shp0"
                                              d="M809.1 827.52L1170.03 466.54L1171.08 467.58L810.14 828.56L809.1 827.52Z"/>
                                        <path id="Rectangle 1324" class="shp0"
                                              d="M818.04 836.46L1178.97 475.48L1180.02 476.52L819.08 837.5L818.04 836.46Z"/>
                                        <path id="Rectangle 1325" class="shp0"
                                              d="M826.98 845.4L1187.92 484.42L1188.96 485.46L828.02 846.44L826.98 845.4Z"/>
                                        <path id="Rectangle 1326" class="shp0"
                                              d="M835.92 854.34L1196.85 493.36L1197.9 494.4L836.96 855.38L835.92 854.34Z"/>
                                        <path id="Rectangle 1327" class="shp0"
                                              d="M844.94 863.36L1205.71 502.21L1206.75 503.26L845.98 864.4L844.94 863.36Z"/>
                                        <path id="Rectangle 1328" class="shp0"
                                              d="M853.8 872.22L1214.74 511.24L1215.78 512.28L854.84 873.26L853.8 872.22Z"/>
                                        <path id="Rectangle 1329" class="shp0"
                                              d="M862.74 881.16L1223.68 520.18L1224.72 521.22L863.78 882.2L862.74 881.16Z"/>
                                        <path id="Rectangle 1330" class="shp0"
                                              d="M871.59 890.01L1232.7 529.2L1233.74 530.25L872.64 891.06L871.59 890.01Z"/>
                                        <path id="Rectangle 1331" class="shp0"
                                              d="M880.62 899.04L1241.56 538.06L1242.6 539.1L881.66 900.08L880.62 899.04Z"/>
                                        <path id="Rectangle 1332" class="shp0"
                                              d="M889.56 907.98L1250.5 547L1251.54 548.04L890.6 909.02L889.56 907.98Z"/>
                                        <path id="Rectangle 1333" class="shp0"
                                              d="M898.5 916.92L1259.44 555.94L1260.48 556.98L899.54 917.96L898.5 916.92Z"/>
                                        <path id="Rectangle 1334" class="shp0"
                                              d="M907.44 925.86L1268.38 564.88L1269.42 565.92L908.48 926.9L907.44 925.86Z"/>
                                        <path id="Rectangle 1335" class="shp0"
                                              d="M916.38 934.8L1277.32 573.82L1278.36 574.86L917.42 935.84L916.38 934.8Z"/>
                                        <path id="Rectangle 1336" class="shp0"
                                              d="M925.32 943.74L1286.26 582.76L1287.3 583.8L926.36 944.78L925.32 943.74Z"/>
                                        <path id="Rectangle 1337" class="shp0"
                                              d="M934.26 952.68L1295.2 591.7L1296.24 592.74L935.3 953.72L934.26 952.68Z"/>
                                        <path id="Rectangle 1338" class="shp0"
                                              d="M943.2 961.62L1304.14 600.64L1305.18 601.68L944.24 962.66L943.2 961.62Z"/>
                                        <path id="Rectangle 1339" class="shp0"
                                              d="M952.14 970.56L1313.08 609.58L1314.12 610.62L953.18 971.6L952.14 970.56Z"/>
                                        <path id="Rectangle 1340" class="shp0"
                                              d="M960.99 979.41L1322.1 618.6L1323.14 619.65L962.04 980.46L960.99 979.41Z"/>
                                        <path id="Rectangle 1341" class="shp0"
                                              d="M970.02 988.44L1330.96 627.46L1332 628.5L971.06 989.48L970.02 988.44Z"/>
                                        <path id="Rectangle 1342" class="shp0"
                                              d="M978.96 997.38L1339.9 636.4L1340.94 637.44L980 998.42L978.96 997.38Z"/>
                                        <path id="Rectangle 1343" class="shp0"
                                              d="M987.9 1006.32L1348.84 645.34L1349.88 646.39L988.94 1007.36L987.9 1006.32Z"/>
                                        <path id="Rectangle 1344" class="shp0"
                                              d="M996.84 1015.26L1357.78 654.28L1358.82 655.33L997.88 1016.3L996.84 1015.26Z"/>
                                        <path id="Rectangle 1345" class="shp0"
                                              d="M1005.78 1024.2L1366.72 663.22L1367.76 664.27L1006.82 1025.24L1005.78 1024.2Z"/>
                                        <path id="Rectangle 1346" class="shp0"
                                              d="M1014.72 1033.14L1375.66 672.16L1376.71 673.21L1015.76 1034.18L1014.72 1033.14Z"/>
                                        <path id="Rectangle 1347" class="shp0"
                                              d="M1023.66 1042.08L1384.6 681.1L1385.64 682.15L1024.7 1043.12L1023.66 1042.08Z"/>
                                    </g>
                                </g>
                                <g id="Group 2083">
                                    <g id="Group 2082" clip-path="url(#cp3)">
                                        <path id="Rectangle 1349" class="shp0"
                                              d="M-136.03 1256.66L224.92 895.7L225.97 896.74L-134.99 1257.71L-136.03 1256.66Z"/>
                                        <path id="Rectangle 1350" class="shp0"
                                              d="M-145.06 1247.64L216.07 886.84L217.11 887.89L-144.02 1248.68L-145.06 1247.64Z"/>
                                        <path id="Rectangle 1351" class="shp0"
                                              d="M-153.91 1238.78L207.04 877.82L208.09 878.86L-152.87 1239.83L-153.91 1238.78Z"/>
                                        <path id="Rectangle 1352" class="shp0"
                                              d="M-162.85 1229.84L198.1 868.88L199.15 869.92L-161.81 1230.88L-162.85 1229.84Z"/>
                                        <path id="Rectangle 1353" class="shp0"
                                              d="M-171.88 1220.81L189.25 860.02L190.29 861.07L-170.84 1221.86L-171.88 1220.81Z"/>
                                        <path id="Rectangle 1354" class="shp0"
                                              d="M-180.73 1211.96L180.22 851L181.27 852.04L-179.69 1213.01L-180.73 1211.96Z"/>
                                        <path id="Rectangle 1355" class="shp0"
                                              d="M-189.67 1203.02L171.28 842.06L172.33 843.1L-188.63 1204.06L-189.67 1203.02Z"/>
                                        <path id="Rectangle 1356" class="shp0"
                                              d="M-198.61 1194.08L162.34 833.12L163.39 834.16L-197.57 1195.12L-198.61 1194.08Z"/>
                                        <path id="Rectangle 1357" class="shp0"
                                              d="M-207.47 1185.23L153.32 824.09L154.36 825.13L-206.42 1186.27L-207.47 1185.23Z"/>
                                        <path id="Rectangle 1358" class="shp0"
                                              d="M-216.49 1176.2L144.46 815.24L145.51 816.28L-215.45 1177.24L-216.49 1176.2Z"/>
                                        <path id="Rectangle 1359" class="shp0"
                                              d="M-225.43 1167.26L135.52 806.3L136.57 807.34L-224.39 1168.3L-225.43 1167.26Z"/>
                                        <path id="Rectangle 1360" class="shp0"
                                              d="M-234.37 1158.32L126.58 797.36L127.63 798.4L-233.33 1159.36L-234.37 1158.32Z"/>
                                        <path id="Rectangle 1361" class="shp0"
                                              d="M-243.31 1149.38L117.64 788.42L118.69 789.46L-242.27 1150.42L-243.31 1149.38Z"/>
                                        <path id="Rectangle 1362" class="shp0"
                                              d="M-252.26 1140.44L108.7 779.48L109.74 780.52L-251.21 1141.48L-252.26 1140.44Z"/>
                                        <path id="Rectangle 1363" class="shp0"
                                              d="M-261.19 1131.5L99.76 770.54L100.81 771.58L-260.15 1132.54L-261.19 1131.5Z"/>
                                        <path id="Rectangle 1364" class="shp0"
                                              d="M-270.14 1122.56L90.82 761.6L91.86 762.64L-269.09 1123.6L-270.14 1122.56Z"/>
                                        <path id="Rectangle 1365" class="shp0"
                                              d="M-279.08 1113.62L81.88 752.66L82.92 753.7L-278.03 1114.66L-279.08 1113.62Z"/>
                                        <path id="Rectangle 1366" class="shp0"
                                              d="M-288.02 1104.68L72.94 743.72L73.99 744.76L-286.97 1105.72L-288.02 1104.68Z"/>
                                        <path id="Rectangle 1367" class="shp0"
                                              d="M-296.96 1095.74L64 734.78L65.04 735.82L-295.91 1096.78L-296.96 1095.74Z"/>
                                        <path id="Rectangle 1368" class="shp0"
                                              d="M-305.9 1086.8L55.06 725.84L56.1 726.88L-304.85 1087.84L-305.9 1086.8Z"/>
                                        <path id="Rectangle 1369" class="shp0"
                                              d="M-314.75 1077.95L46.04 716.81L47.08 717.85L-313.71 1078.99L-314.75 1077.95Z"/>
                                        <path id="Rectangle 1370" class="shp0"
                                              d="M-323.86 1068.83L37.27 708.04L38.31 709.09L-322.82 1069.87L-323.86 1068.83Z"/>
                                        <path id="Rectangle 1371" class="shp0"
                                              d="M-332.72 1059.98L28.24 699.02L29.28 700.06L-331.67 1061.02L-332.72 1059.98Z"/>
                                        <path id="Rectangle 1372" class="shp0"
                                              d="M-341.57 1051.12L19.21 689.99L20.26 691.03L-340.53 1052.17L-341.57 1051.12Z"/>
                                        <path id="Rectangle 1373" class="shp0"
                                              d="M-350.6 1042.1L10.36 681.14L11.4 682.18L-349.55 1043.14L-350.6 1042.1Z"/>
                                        <path id="Rectangle 1374" class="shp0"
                                              d="M-359.54 1033.16L1.42 672.2L2.46 673.24L-358.49 1034.2L-359.54 1033.16Z"/>
                                        <path id="Rectangle 1375" class="shp0"
                                              d="M-368.48 1024.22L-7.52 663.26L-6.48 664.3L-367.44 1025.26L-368.48 1024.22Z"/>
                                        <path id="Rectangle 1376" class="shp0"
                                              d="M-377.42 1015.28L-16.46 654.32L-15.42 655.36L-376.38 1016.32L-377.42 1015.28Z"/>
                                        <path id="Rectangle 1377" class="shp0"
                                              d="M-386.36 1006.34L-25.4 645.38L-24.36 646.42L-385.32 1007.38L-386.36 1006.34Z"/>
                                        <path id="Rectangle 1378" class="shp0"
                                              d="M-395.3 997.4L-34.34 636.43L-33.3 637.48L-394.25 998.44L-395.3 997.4Z"/>
                                        <path id="Rectangle 1379" class="shp0"
                                              d="M-404.32 988.37L-43.2 627.58L-42.15 628.62L-403.28 989.41L-404.32 988.37Z"/>
                                        <path id="Rectangle 1380" class="shp0"
                                              d="M-413.18 979.52L-52.22 618.55L-51.18 619.6L-412.13 980.56L-413.18 979.52Z"/>
                                        <path id="Rectangle 1381" class="shp0"
                                              d="M-422.12 970.58L-61.16 609.61L-60.12 610.66L-421.07 971.62L-422.12 970.58Z"/>
                                        <path id="Rectangle 1382" class="shp0"
                                              d="M-431.14 961.55L-70.02 600.76L-68.97 601.8L-430.1 962.59L-431.14 961.55Z"/>
                                        <path id="Rectangle 1383" class="shp0"
                                              d="M-440 952.7L-79.04 591.73L-78 592.78L-438.95 953.74L-440 952.7Z"/>
                                    </g>
                                </g>
                                <g id="Group 2085">
                                    <g id="Group 2084">
                                        <path id="Path 1287" class="shp2"
                                              d="M132.69 262.73C132.69 272.71 124.59 280.81 114.61 280.81C104.63 280.81 96.53 272.71 96.53 262.73C96.53 252.74 104.63 244.65 114.61 244.65C124.59 244.65 132.69 252.74 132.69 262.73Z"/>
                                        <path id="Path 1288" class="shp1"
                                              d="M942.79 1090.48C900.41 1083.46 851.3 1081.1 820.5 1111.05C793.05 1137.75 789.61 1181.82 763.87 1210.17C740.18 1236.25 702.37 1243.89 667.16 1245.03C631.95 1246.17 596.01 1242.37 562 1251.56C526.29 1261.2 494.96 1285.24 475.13 1316.47C455.31 1347.69 446.88 1385.72 450.15 1422.56L984.6 1422.56L942.79 1090.48Z"/>
                                        <path id="Path 1289" class="shp0"
                                              d="M1037.35 1133.82C994.97 1126.79 945.86 1124.43 915.07 1154.39C887.61 1181.09 884.17 1225.16 858.43 1253.5C834.75 1279.58 796.93 1287.22 761.72 1288.37C726.51 1289.51 690.57 1285.71 656.56 1294.89C620.85 1304.53 589.52 1328.57 569.69 1359.8C549.87 1391.03 541.44 1429.05 544.71 1465.89L1079.16 1465.89L1037.35 1133.82Z"/>
                                    </g>
                                </g>
                                <g id="Group 2089">
                                    <g id="Group 2088">
                                        <path id="Path 1291" class="shp1"
                                              d="M967.76 404.45C908.88 421.94 837.51 395.36 810.67 345.93C790.05 307.95 794.23 261.74 770.49 225.2C742.78 182.54 682.3 163.46 626.6 165.58C596.75 166.71 567.43 172.88 537.69 175.44C470.58 181.22 397.34 165.89 353.03 121.06C307.82 75.33 299.37 7 250.69 -35.88C224.51 -58.95 187.82 -72.47 150.81 -72.7L973.37 -72.7L967.76 404.45Z"/>
                                        <path id="Path 1292" class="shp0"
                                              d="M966.35 329.12C911.72 333.53 857.08 292.5 846.07 238.82C837.61 197.56 820.8 254.48 809.32 213.96C795.92 166.65 748.79 135.23 700.61 125.4C674.78 120.14 648.2 119.86 622.13 116C563.3 107.29 504.33 76.79 477.25 23.84C449.62 -30.19 458.93 -98.28 427.64 -150.28C410.81 -178.25 382.68 -199.2 351.06 -207.31L1055.01 -31.8L966.35 329.12Z"/>
                                        <path id="Path 1294" class="shp3"
                                              d="M403.4 1232.23C403.4 1239.61 397.41 1245.6 390.02 1245.6C382.63 1245.6 376.64 1239.61 376.64 1232.23C376.64 1224.84 382.63 1218.85 390.02 1218.85C397.41 1218.85 403.4 1224.84 403.4 1232.23Z"/>
                                        <path id="Path 1295" fill-rule="evenodd" class="shp4"
                                              d="M722.48 103.9C640.73 103.9 574.21 37.39 574.21 -44.37C574.21 -126.12 640.73 -192.64 722.48 -192.64C804.24 -192.64 870.75 -126.12 870.75 -44.37C870.75 37.39 804.24 103.9 722.48 103.9ZM722.48 -191.16C641.54 -191.16 575.69 -125.31 575.69 -44.37C575.69 36.58 641.54 102.43 722.48 102.43C803.43 102.43 869.28 36.58 869.28 -44.37C869.28 -125.31 803.43 -191.16 722.48 -191.16Z"/>
                                        <g id="Group 2102">
                                            <path id="Rectangle 1386" class="shp3"
                                                  d="M89.23 1249.98L107.29 1231.82L108.34 1232.86L90.28 1251.02L89.23 1249.98Z"/>
                                            <path id="Rectangle 1387" class="shp3"
                                                  d="M101.38 1249.98L119.44 1231.82L120.48 1232.86L102.43 1251.02L101.38 1249.98Z"/>
                                            <path id="Rectangle 1388" class="shp3"
                                                  d="M113.53 1249.98L131.58 1231.82L132.63 1232.86L114.57 1251.02L113.53 1249.98Z"/>
                                            <path id="Rectangle 1389" class="shp3"
                                                  d="M125.67 1249.98L143.73 1231.82L144.78 1232.86L126.72 1251.02L125.67 1249.98Z"/>
                                            <path id="Rectangle 1390" class="shp3"
                                                  d="M137.82 1249.98L155.87 1231.82L156.92 1232.86L138.86 1251.02L137.82 1249.98Z"/>
                                            <path id="Rectangle 1391" class="shp3"
                                                  d="M149.96 1249.98L168.02 1231.82L169.07 1232.86L151.01 1251.02L149.96 1249.98Z"/>
                                            <path id="Rectangle 1392" class="shp3"
                                                  d="M162.11 1249.98L180.17 1231.82L181.22 1232.86L163.15 1251.02L162.11 1249.98Z"/>
                                            <path id="Rectangle 1393" class="shp3"
                                                  d="M174.26 1249.98L192.31 1231.82L193.36 1232.86L175.3 1251.02L174.26 1249.98Z"/>
                                        </g>
                                        <path id="Path 1297" class="shp5"
                                              d="M1084.46 79.04C1084.46 153.61 1024.01 214.06 949.44 214.06C874.87 214.06 814.42 153.61 814.42 79.04C814.42 4.48 874.87 -55.97 949.44 -55.97C1024.01 -55.97 1084.46 4.48 1084.46 79.04Z"/>
                                        <path id="Path 1298" class="shp3"
                                              d="M668.05 89.59C668.05 95.3 663.42 99.93 657.7 99.93C651.99 99.93 647.36 95.3 647.36 89.59C647.36 83.88 651.99 79.25 657.7 79.25C663.42 79.25 668.05 83.88 668.05 89.59Z"/>
                                        <g id="Group 2101">
                                            <path id="Path 1299" class="shp6"
                                                  d="M923.57 380.32C923.57 382.09 922.15 383.51 920.38 383.51C918.62 383.51 917.19 382.09 917.19 380.32C917.19 378.56 918.62 377.14 920.38 377.14C922.15 377.14 923.57 378.56 923.57 380.32Z"/>
                                            <path id="Path 1300" class="shp6"
                                                  d="M923.57 460.98C923.57 462.74 922.15 464.17 920.38 464.17C918.62 464.17 917.19 462.74 917.19 460.98C917.19 459.22 918.62 457.79 920.38 457.79C922.15 457.79 923.57 459.22 923.57 460.98Z"/>
                                            <path id="Path 1301" class="shp6"
                                                  d="M923.57 420.65C923.57 422.41 922.15 423.84 920.38 423.84C918.62 423.84 917.19 422.41 917.19 420.65C917.19 418.89 918.62 417.46 920.38 417.46C922.15 417.46 923.57 418.89 923.57 420.65Z"/>
                                            <path id="Path 1302" class="shp6"
                                                  d="M923.57 440.98C923.57 442.74 922.15 444.17 920.38 444.17C918.62 444.17 917.19 442.74 917.19 440.98C917.19 439.22 918.62 437.79 920.38 437.79C922.15 437.79 923.57 439.22 923.57 440.98Z"/>
                                            <path id="Path 1303" class="shp6"
                                                  d="M923.57 399.8C923.57 401.56 922.15 402.99 920.38 402.99C918.62 402.99 917.19 401.56 917.19 399.8C917.19 398.04 918.62 396.61 920.38 396.61C922.15 396.61 923.57 398.04 923.57 399.8Z"/>
                                            <path id="Path 1304" class="shp6"
                                                  d="M923.57 481.29C923.57 483.05 922.15 484.48 920.38 484.48C918.62 484.48 917.19 483.05 917.19 481.29C917.19 479.53 918.62 478.1 920.38 478.1C922.15 478.1 923.57 479.53 923.57 481.29Z"/>
                                        </g>
                                        <g id="Group 2100">
                                            <g id="Group 2099">
                                                <path id="Path 1306" class="shp7"
                                                      d="M854.57 1274.76C854.57 1276.52 853.15 1277.95 851.38 1277.95C849.62 1277.95 848.19 1276.52 848.19 1274.76C848.19 1272.99 849.62 1271.57 851.38 1271.57C853.15 1271.57 854.57 1272.99 854.57 1274.76Z"/>
                                                <path id="Path 1307" class="shp7"
                                                      d="M814.25 1274.76C814.25 1276.52 812.82 1277.95 811.06 1277.95C809.3 1277.95 807.87 1276.52 807.87 1274.76C807.87 1272.99 809.3 1271.57 811.06 1271.57C812.82 1271.57 814.25 1272.99 814.25 1274.76Z"/>
                                                <path id="Path 1308" class="shp7"
                                                      d="M794.08 1274.76C794.08 1276.52 792.66 1277.95 790.9 1277.95C789.13 1277.95 787.71 1276.52 787.71 1274.76C787.71 1272.99 789.13 1271.57 790.9 1271.57C792.66 1271.57 794.08 1272.99 794.08 1274.76Z"/>
                                                <path id="Path 1309" class="shp7"
                                                      d="M834.41 1274.76C834.41 1276.52 832.98 1277.95 831.22 1277.95C829.46 1277.95 828.03 1276.52 828.03 1274.76C828.03 1272.99 829.46 1271.57 831.22 1271.57C832.98 1271.57 834.41 1272.99 834.41 1274.76Z"/>
                                                <g id="Group 2098">
                                                    <g id="Group 2097">
                                                        <path id="Path 1310" class="shp7"
                                                              d="M854.57 1234.43C854.57 1236.19 853.15 1237.62 851.38 1237.62C849.62 1237.62 848.19 1236.19 848.19 1234.43C848.19 1232.67 849.62 1231.24 851.38 1231.24C853.15 1231.24 854.57 1232.67 854.57 1234.43Z"/>
                                                        <path id="Path 1311" class="shp7"
                                                              d="M814.25 1234.43C814.25 1236.19 812.82 1237.62 811.06 1237.62C809.3 1237.62 807.87 1236.19 807.87 1234.43C807.87 1232.67 809.3 1231.24 811.06 1231.24C812.82 1231.24 814.25 1232.67 814.25 1234.43Z"/>
                                                        <path id="Path 1312" class="shp7"
                                                              d="M794.08 1234.43C794.08 1236.19 792.66 1237.62 790.9 1237.62C789.13 1237.62 787.71 1236.19 787.71 1234.43C787.71 1232.67 789.13 1231.24 790.9 1231.24C792.66 1231.24 794.08 1232.67 794.08 1234.43Z"/>
                                                        <path id="Path 1313" class="shp7"
                                                              d="M834.41 1234.43C834.41 1236.19 832.98 1237.62 831.22 1237.62C829.46 1237.62 828.03 1236.19 828.03 1234.43C828.03 1232.67 829.46 1231.24 831.22 1231.24C832.98 1231.24 834.41 1232.67 834.41 1234.43Z"/>
                                                    </g>
                                                    <path id="Path 1314" class="shp7"
                                                          d="M854.57 1254.76C854.57 1256.52 853.15 1257.95 851.38 1257.95C849.62 1257.95 848.19 1256.52 848.19 1254.76C848.19 1253 849.62 1251.57 851.38 1251.57C853.15 1251.57 854.57 1253 854.57 1254.76Z"/>
                                                    <path id="Path 1315" class="shp7"
                                                          d="M814.25 1254.76C814.25 1256.52 812.82 1257.95 811.06 1257.95C809.3 1257.95 807.87 1256.52 807.87 1254.76C807.87 1253 809.3 1251.57 811.06 1251.57C812.82 1251.57 814.25 1253 814.25 1254.76Z"/>
                                                    <path id="Path 1316" class="shp7"
                                                          d="M794.08 1254.76C794.08 1256.52 792.66 1257.95 790.9 1257.95C789.13 1257.95 787.71 1256.52 787.71 1254.76C787.71 1253 789.13 1251.57 790.9 1251.57C792.66 1251.57 794.08 1253 794.08 1254.76Z"/>
                                                    <path id="Path 1317" class="shp7"
                                                          d="M834.41 1254.76C834.41 1256.52 832.98 1257.95 831.22 1257.95C829.46 1257.95 828.03 1256.52 828.03 1254.76C828.03 1253 829.46 1251.57 831.22 1251.57C832.98 1251.57 834.41 1253 834.41 1254.76Z"/>
                                                </g>
                                            </g>
                                            <path id="Path 1318" class="shp7"
                                                  d="M854.57 1295.07C854.57 1296.83 853.15 1298.26 851.38 1298.26C849.62 1298.26 848.19 1296.83 848.19 1295.07C848.19 1293.31 849.62 1291.88 851.38 1291.88C853.15 1291.88 854.57 1293.31 854.57 1295.07Z"/>
                                            <path id="Path 1319" class="shp7"
                                                  d="M814.25 1295.07C814.25 1296.83 812.82 1298.26 811.06 1298.26C809.3 1298.26 807.87 1296.83 807.87 1295.07C807.87 1293.31 809.3 1291.88 811.06 1291.88C812.82 1291.88 814.25 1293.31 814.25 1295.07Z"/>
                                            <path id="Path 1320" class="shp7"
                                                  d="M794.08 1295.07C794.08 1296.83 792.66 1298.26 790.9 1298.26C789.13 1298.26 787.71 1296.83 787.71 1295.07C787.71 1293.31 789.13 1291.88 790.9 1291.88C792.66 1291.88 794.08 1293.31 794.08 1295.07Z"/>
                                            <path id="Path 1321" class="shp7"
                                                  d="M834.41 1295.07C834.41 1296.83 832.98 1298.26 831.22 1298.26C829.46 1298.26 828.03 1296.83 828.03 1295.07C828.03 1293.31 829.46 1291.88 831.22 1291.88C832.98 1291.88 834.41 1293.31 834.41 1295.07Z"/>
                                        </g>
                                        <g id="Group 2103">
                                            <path id="Path 1322" class="shp7"
                                                  d="M121.88 75.12C121.88 76.88 120.45 78.31 118.69 78.31C116.93 78.31 115.5 76.88 115.5 75.12C115.5 73.36 116.93 71.93 118.69 71.93C120.45 71.93 121.88 73.36 121.88 75.12Z"/>
                                            <path id="Path 1323" class="shp7"
                                                  d="M81.56 75.12C81.56 76.88 80.13 78.31 78.37 78.31C76.61 78.31 75.18 76.88 75.18 75.12C75.18 73.36 76.61 71.93 78.37 71.93C80.13 71.93 81.56 73.36 81.56 75.12Z"/>
                                            <path id="Path 1324" class="shp7"
                                                  d="M61.39 75.12C61.39 76.88 59.96 78.31 58.2 78.31C56.44 78.31 55.01 76.88 55.01 75.12C55.01 73.36 56.44 71.93 58.2 71.93C59.96 71.93 61.39 73.36 61.39 75.12Z"/>
                                            <path id="Path 1325" class="shp7"
                                                  d="M101.72 75.12C101.72 76.88 100.29 78.31 98.53 78.31C96.77 78.31 95.34 76.88 95.34 75.12C95.34 73.36 96.77 71.93 98.53 71.93C100.29 71.93 101.72 73.36 101.72 75.12Z"/>
                                            <path id="Path 1326" class="shp7"
                                                  d="M121.88 155.77C121.88 157.54 120.45 158.96 118.69 158.96C116.93 158.96 115.5 157.54 115.5 155.77C115.5 154.01 116.93 152.59 118.69 152.59C120.45 152.59 121.88 154.01 121.88 155.77Z"/>
                                            <path id="Path 1327" class="shp7"
                                                  d="M81.56 155.77C81.56 157.54 80.13 158.96 78.37 158.96C76.61 158.96 75.18 157.54 75.18 155.77C75.18 154.01 76.61 152.59 78.37 152.59C80.13 152.59 81.56 154.01 81.56 155.77Z"/>
                                            <path id="Path 1328" class="shp7"
                                                  d="M61.39 155.77C61.39 157.54 59.96 158.96 58.2 158.96C56.44 158.96 55.01 157.54 55.01 155.77C55.01 154.01 56.44 152.59 58.2 152.59C59.96 152.59 61.39 154.01 61.39 155.77Z"/>
                                            <path id="Path 1329" class="shp7"
                                                  d="M101.72 155.77C101.72 157.54 100.29 158.96 98.53 158.96C96.77 158.96 95.34 157.54 95.34 155.77C95.34 154.01 96.77 152.59 98.53 152.59C100.29 152.59 101.72 154.01 101.72 155.77Z"/>
                                            <path id="Path 1330" class="shp7"
                                                  d="M121.88 115.45C121.88 117.21 120.45 118.64 118.69 118.64C116.93 118.64 115.5 117.21 115.5 115.45C115.5 113.69 116.93 112.26 118.69 112.26C120.45 112.26 121.88 113.69 121.88 115.45Z"/>
                                            <path id="Path 1331" class="shp7"
                                                  d="M81.56 115.45C81.56 117.21 80.13 118.64 78.37 118.64C76.61 118.64 75.18 117.21 75.18 115.45C75.18 113.69 76.61 112.26 78.37 112.26C80.13 112.26 81.56 113.69 81.56 115.45Z"/>
                                            <path id="Path 1332" class="shp7"
                                                  d="M61.39 115.45C61.39 117.21 59.96 118.64 58.2 118.64C56.44 118.64 55.01 117.21 55.01 115.45C55.01 113.69 56.44 112.26 58.2 112.26C59.96 112.26 61.39 113.69 61.39 115.45Z"/>
                                            <path id="Path 1333" class="shp7"
                                                  d="M101.72 115.45C101.72 117.21 100.29 118.64 98.53 118.64C96.77 118.64 95.34 117.21 95.34 115.45C95.34 113.69 96.77 112.26 98.53 112.26C100.29 112.26 101.72 113.69 101.72 115.45Z"/>
                                            <path id="Path 1334" class="shp7"
                                                  d="M121.88 135.78C121.88 137.54 120.45 138.96 118.69 138.96C116.93 138.96 115.5 137.54 115.5 135.78C115.5 134.01 116.93 132.59 118.69 132.59C120.45 132.59 121.88 134.01 121.88 135.78Z"/>
                                            <path id="Path 1335" class="shp7"
                                                  d="M81.56 135.78C81.56 137.54 80.13 138.96 78.37 138.96C76.61 138.96 75.18 137.54 75.18 135.78C75.18 134.01 76.61 132.59 78.37 132.59C80.13 132.59 81.56 134.01 81.56 135.78Z"/>
                                            <path id="Path 1336" class="shp7"
                                                  d="M61.39 135.78C61.39 137.54 59.96 138.96 58.2 138.96C56.44 138.96 55.01 137.54 55.01 135.78C55.01 134.01 56.44 132.59 58.2 132.59C59.96 132.59 61.39 134.01 61.39 135.78Z"/>
                                            <path id="Path 1337" class="shp7"
                                                  d="M101.72 135.78C101.72 137.54 100.29 138.96 98.53 138.96C96.77 138.96 95.34 137.54 95.34 135.78C95.34 134.01 96.77 132.59 98.53 132.59C100.29 132.59 101.72 134.01 101.72 135.78Z"/>
                                            <path id="Path 1338" class="shp7"
                                                  d="M121.88 94.6C121.88 96.36 120.45 97.79 118.69 97.79C116.93 97.79 115.5 96.36 115.5 94.6C115.5 92.84 116.93 91.41 118.69 91.41C120.45 91.41 121.88 92.84 121.88 94.6Z"/>
                                            <path id="Path 1339" class="shp7"
                                                  d="M81.56 94.6C81.56 96.36 80.13 97.79 78.37 97.79C76.61 97.79 75.18 96.36 75.18 94.6C75.18 92.84 76.61 91.41 78.37 91.41C80.13 91.41 81.56 92.84 81.56 94.6Z"/>
                                            <path id="Path 1340" class="shp7"
                                                  d="M61.39 94.6C61.39 96.36 59.96 97.79 58.2 97.79C56.44 97.79 55.01 96.36 55.01 94.6C55.01 92.84 56.44 91.41 58.2 91.41C59.96 91.41 61.39 92.84 61.39 94.6Z"/>
                                            <path id="Path 1341" class="shp7"
                                                  d="M101.72 94.6C101.72 96.36 100.29 97.79 98.53 97.79C96.77 97.79 95.34 96.36 95.34 94.6C95.34 92.84 96.77 91.41 98.53 91.41C100.29 91.41 101.72 92.84 101.72 94.6Z"/>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
            </div>
        </div>
    </div>
