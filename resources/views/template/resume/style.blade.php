@if(isset($resume->style_section) && !empty($resume->style_section))
    <style>
        .resume-section-heading {
            @if(isset($resume->style_section['color']))
color: {{ $resume->style_section['color'] }};
            @endif
            @if(isset($resume->style_section['font_size']))
font-size: {{ $resume->style_section['font_size'] }};
            @endif
            @if(isset($resume->style_section['font_weight']))
font-weight: {{ $resume->style_section['font_weight'] }};
            @endif
            @if(isset($resume->style_section['font_style']) && !empty($resume->style_section['font_style']))
font-style: {{ $resume->style_section['font_style'] }};
            @endif
            @if(isset($resume->style_section['line_height']))
line-height: {{ $resume->style_section['line_height'] }}
                @endif;
        }

        .custom_resume_card {
            @if(isset($resume->style_section['font_family']) && !empty($resume->style_section['font_family']))
font-family: {{ $resume->style_section['font_family'] }};
        @endif;
            @if(isset($resume->style_section['paragraph_height']))
line-height: {{ $resume->style_section['paragraph_height'] }};
            @endif
            @if(isset($resume->style_section['side_padding']))
padding-left: {{ $resume->style_section['side_padding'] }}px;
            padding-right: {{ $resume->style_section['side_padding'] }}px;
        @endif;

            @if(isset($resume->style_section['top_bottom_padding']))
padding-top: {{ $resume->style_section['top_bottom_padding'] }}px;
            padding-bottom: {{ $resume->style_section['top_bottom_padding'] }}px;
        @endif;
        }

        @if(isset($resume->style_section['paragraph_indent']) && !empty($resume->style_section['paragraph_indent']))
                ..custom_resume_card p,ul{
            padding-left: {{ $resume->style_section['paragraph_indent'] }}px;
        }
        @endif
    </style>
@endif
<style>
    .resumeAction{
        display: none;
        color: #fff;
        position: absolute;
        z-index: 10;
        /*padding-left: 590px;*/
        font-family: Poppins;
    }

    .finalized .contactInfo:hover .resumeAction, .finalized .experience:hover .resumeAction, .finalized .education:hover .resumeAction,
    .finalized .summary:hover .resumeAction, .finalized .skills:hover .resumeAction,.finalized .Additional:hover .resumeAction,
    .finalized .Awards:hover .resumeAction, .finalized .Community:hover .resumeAction, .finalized .Language:hover .resumeAction,
    .finalized .Affiliations:hover .resumeAction, .finalized .Publication:hover .resumeAction, .finalized .Accomplishments:hover .resumeAction,
    .finalized .other:hover .resumeAction, .finalized .contact_name:hover .resumeAction{
        display: block;
    }
</style>
@if($resume->template_id == 21)

    <style>
        *,
        *::after,
        *::before {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-size: 14px;
            font-weight: 400;
            font-family: 'Roboto', sans-serif;
            color: #4F4F4F;

        }
        img {
            max-width: 100%;
        }
        li{
            list-style:none;
        }
        h1,h2,h3,h4,h5{
            font-weight: bold;
        }
        @media print{
            .resume-card-left, li.mine-title .left-bg, .card-inner-bottom .card-inner-box > div{
                background-color: #ECC9B9 !important;
                -webkit-print-color-adjust: exact;
            }
            .padding-top .education-bottom-box-right .box-title:after{
                background-color: #4F4F4F !important;
                -webkit-print-color-adjust: exact;
            }
        }
        #skills-info ul{
            padding: 0 25px 20px;
            display: flex;
            flex-wrap: wrap;
        }

        #skills-info li{
            margin-bottom: 10px;
            position: relative;
            letter-spacing: 1.4px;
            width: 33.33%;
        }
    </style>
@endif
@if($resume->template_id == 22)
    <style>
        *,
        *::after,
        *::before {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-size: 14px;
            font-weight: 400;
            font-family: "Montserrat", sans-serif;
            color: #5b5b5b;
        }
        img {
            max-width: 100%;
        }
        li {
            list-style: none;
        }
        a {
            text-decoration: none;
        }
        h1,
        h2,
        h3,
        h4,
        h5 {
            font-weight: bold;
        }
        @media print {
            .icon {
                background-color: #f7e2da !important;
                -webkit-print-color-adjust: exact;
            }
            .top-title-bg,
            .contact-info-right {
                background-color: #ccd0ba !important;
                -webkit-print-color-adjust: exact;
            }
        }
        .summary-box ul li ul{
            padding-left: 60px;
        }
        .summary-box ul li ul li{
            font-size: 14px;
            margin-bottom: 15px;
            margin-top: 0;
            position: relative;
        }
        .skills-info-box p{
            padding-left: 63px;
        }
    </style>
@endif
@if($resume->template_id == 23)
    <style>
        *,
        *::after,
        *::before {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-size: 14px;
            font-weight: 400;
            font-family: "Montserrat", sans-serif;
            color: #212121;
        }
        img {
            max-width: 100%;
        }
        li {
            list-style: none;
        }
        a {
            text-decoration: none;
        }
        h1,
        h2,
        h3,
        h4,
        h5 {
            font-weight: bold;
        }
        .skills-info ul li{
            font-size: 14px; margin-bottom: 20px; margin-top: 0; position: relative;
        }.skills-info ul li span{
             font-size: 15px; font-weight: 500;
         }

        @media print {
            .resume-card-left, .right-shape {
                background-color: #2890e8 !important;
                -webkit-print-color-adjust: exact;
            }
        }
    </style>
@endif
@if($resume->template_id == 24)
    <style>
        *,
        *::after,
        *::before {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-size: 14px;
            font-weight: 400;
            font-family: "Poppins", sans-serif;
            color: #000;
        }
        img {
            max-width: 100%;
        }
        li {
            list-style: none;
        }
        h1,
        h2,
        h3,
        h4,
        h5 {
            font-weight: bold;
        }
        @media print {
            ul.contact-border-line .line-box:after {
                background-color: #ff965c !important;
                -webkit-print-color-adjust: exact;
            }
            .title-bg-dott p,
            h3 > div {
                background-color: #ff965c !important;
                -webkit-print-color-adjust: exact;
            }
        }
    </style>
@endif
@if($resume->template_id == 30)
    <style>
        *,
        *::after,
        *::before {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-size: 14px;
            font-weight: 400;
            font-family: "Montserrat", sans-serif;
            color: #000;
        }
        img {
            max-width: 100%;
        }
        li {
            list-style: none;
        }
        a {
            text-decoration: none;
        }
        @media print {

            .profile-info{
                background-color: #000 !important;
                -webkit-print-color-adjust: exact;
            }
            .custom-resume-card h3{
            !important;
                -webkit-print-color-adjust: exact;
            }
        }
    </style>
@endif
@if($resume->template_id == 29)
    <style>
        *,
        *::after,
        *::before {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-size: 14px;
            font-weight: 400;
            font-family: "Montserrat", sans-serif;
            color: #000;
        }
        img {
            max-width: 100%;
        }
        li {
            list-style: none;
        }
        a {
            text-decoration: none;
        }
        @media print {

            .profile-info, .title-resume-card > div, .dots{
                background-color: #000 !important;
                -webkit-print-color-adjust: exact;
            }
        }
        .summ-p p{
            font-size: 15px; font-weight: 400; line-height: 24px; color: #5b5b5b;
        }
        .skill-ul ul li{
            font-size: 16px; margin-bottom: 15px; margin-top: 0; position: relative;
        }
    </style>
@endif
@if($resume->template_id == 28)
    <style>
        *,
        *::after,
        *::before {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-size: 14px;
            font-weight: 400;
            font-family: "Montserrat", sans-serif;
            color: #000;
        }
        img {
            max-width: 100%;
        }
        li {
            list-style: none;
        }
        a {
            text-decoration: none;
        }
        @media print {

            .profile-info{
                background-color: #000 !important;
                -webkit-print-color-adjust: exact;
            }
        }
    </style>
@endif
@if($resume->template_id == 26)
    <style>
        *,
        *::after,
        *::before {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-size: 14px;
            font-weight: 400;
            font-family: "Montserrat", sans-serif;
            color: #35383c;
        }
        img {
            max-width: 100%;
        }
        li {
            list-style: none;
        }
        h1,
        h2,
        h3,
        h4,
        h5 {
            font-weight: bold;
        }
        @media print {
            .education-bottom-box-right .box-title p:after {
                background-color: #444242 !important;
                -webkit-print-color-adjust: exact;
            }

            .right-shape,
            ul.footer > div {
                background-color: #e08573 !important;
                -webkit-print-color-adjust: exact;
            }
        }
        .personal-box-p p{
            line-height: 23px;
        }
        .skill-text ul li{
            margin-top: 0px; position: relative;
        }
        .skill-text ul li span {
            font-size: 14px; font-weight: 500;
        }
        .extra-ses span p{
            padding-left: 62px;
        }
    </style>
@endif
@if($resume->template_id == 27)
    <style id="applicationStylesheet" type="text/css">
        .mediaViewInfo {
            --web-view-name: New 30;
            --web-view-id: New_30;
            --web-scale-on-resize: true;
            --web-enable-deep-linking: true;
        }
        body {
            font-size: 14px;
            font-weight: 400;
            font-family: 'Open Sans', sans-serif;
            color: #212121;

        }
        :root {
            --web-view-ids: New_30;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            border: none;
        }
        li {
            list-style: none;
        }
        #New_30 {
            position: absolute;
            width: 944px;
            background-color: rgba(255,255,255,1);
            overflow: hidden;
            --web-view-name: New 30;
            --web-view-id: New_30;
            --web-scale-on-resize: true;
            --web-enable-deep-linking: true;
        }
        #BG {
            position: absolute;
            width: 950px;
            height: 1343px;
            left: 0px;
            top: 0px;
            overflow: visible;
        }
        #Group_20626 {
            position: absolute;
            width: 897.123px;
            height: 1080.19px;
            left: 47px;
            top: 92.5px;
            overflow: visible;
        }
        #ANGELA_MORRISON {
            left: 1px;
            top: 0px;
            position: absolute;
            overflow: visible;
            width: 343px;
            white-space: nowrap;
            line-height: 80px;
            margin-top: -8.5px;
            text-align: left;
            font-style: normal;
            font-weight: 500;
            font-size: 63px;
            color: rgba(255,255,255,1);
        }
        #Group_703 {
            position: absolute;
            width: 488.123px;
            height: 570.69px;
            left: 449px;
            top: 599.5px;
            overflow: visible;
        }
        #Group_19838 {
            position: absolute;
            width: 474.935px;
            height: 225.69px;
            left: 0px;
            top: 345px;
            overflow: visible;
        }
        #SENIOR_PRODUCT_DESIGNER {
            left: 0px;
            top: 0.35px;
            position: absolute;
            overflow: visible;
            width: 195px;
            white-space: nowrap;
            line-height: 16.99051284790039px;
            margin-top: -1.4158763885498047px;
            text-align: left;
            font-style: normal;
            font-weight: 600;
            font-size: 14.158760070800781px;
            color: rgba(45,44,45,1);
        }
        #ID2013_-_2016 {
            left: 367px;
            top: 0px;
            position: absolute;
            overflow: visible;
            width: 78px;
            white-space: nowrap;
            line-height: 16.99051284790039px;
            margin-top: -1.4158763885498047px;
            text-align: left;
            font-style: normal;
            font-weight: 600;
            font-size: 14.158760070800781px;
            color: rgba(49,49,51,1);
        }
        #INIPAGI_STUDIO {
            left: 0.004px;
            top: 31.845px;
            position: absolute;
            overflow: visible;
            width: 108px;
            white-space: nowrap;
            line-height: 16.99051284790039px;
            margin-top: -1.4952564239501953px;
            text-align: left;
            font-style: normal;
            font-weight: 600;
            font-size: 14px;
            color: rgba(49,49,51,1);
        }
        #Group_2030 {
            position: absolute;
            width: 473.347px;
            height: 51.69px;
            left: 1.588px;
            top: 65.85px;
            overflow: visible;
        }
        #Porttitor_amet_massa_Done_cpor {
            left: 20.436px;
            top: 0px;
            position: absolute;
            overflow: hidden;
            width: 453.912px;
            height: 51.6903076171875px;
            line-height: 18.249069213867188px;
            margin-top: -3.1245346069335938px;
            text-align: left;
            font-family: Open Sans;
            font-style: normal;
            font-weight: normal;
            font-size: 12px;
            color: rgba(99,101,104,1);
        }
        #Ellipse_86 {
            fill: rgba(0,56,109,1);
        }
        .Ellipse_86 {
            position: absolute;
            overflow: visible;
            width: 7.866px;
            height: 7.866px;
            left: 0px;
            top: 5.214px;
        }
        #Group_2031 {
            position: absolute;
            width: 473.347px;
            height: 51.69px;
            left: 1.588px;
            top: 119.953px;
            overflow: visible;
        }
        #Porttitor_amet_massa_Done_cpor_w {
            left: 20.436px;
            top: 0px;
            position: absolute;
            overflow: hidden;
            width: 453.912px;
            height: 51.69046401977539px;
            line-height: 18.249069213867188px;
            margin-top: -3.1245346069335938px;
            text-align: left;
            font-family: Open Sans;
            font-style: normal;
            font-weight: normal;
            font-size: 12px;
            color: rgba(99,101,104,1);
        }
        #Ellipse_87 {
            fill: rgba(0,56,109,1);
        }
        .Ellipse_87 {
            position: absolute;
            overflow: visible;
            width: 7.866px;
            height: 7.866px;
            left: 0px;
            top: 5.213px;
        }
        #Group_2032 {
            position: absolute;
            width: 473.347px;
            height: 51.69px;
            left: 1.588px;
            top: 174px;
            overflow: visible;
        }
        #Porttitor_amet_massa_Done_cpor_z {
            left: 20.436px;
            top: 0px;
            position: absolute;
            overflow: hidden;
            width: 453.912px;
            height: 51.69046401977539px;
            line-height: 18.249069213867188px;
            margin-top: -3.1245346069335938px;
            text-align: left;
            font-family: Open Sans;
            font-style: normal;
            font-weight: normal;
            font-size: 12px;
            color: rgba(99,101,104,1);
        }
        #Ellipse_88 {
            fill: rgba(0,56,109,1);
        }
        .Ellipse_88 {
            position: absolute;
            overflow: visible;
            width: 7.866px;
            height: 7.866px;
            left: 0px;
            top: 5.269px;
        }
        #Group_19839 {
            position: absolute;
            width: 488.123px;
            height: 303.69px;
            left: 0px;
            top: 0px;
            overflow: visible;
        }
        #LEAD_PRODUCT_DESIGNER {
            left: 0.002px;
            top: 63.777px;
            position: absolute;
            overflow: visible;
            width: 179px;
            white-space: nowrap;
            line-height: 16.99051284790039px;
            margin-top: -1.4158763885498047px;
            text-align: left;
            font-style: normal;
            font-weight: 600;
            font-size: 14.158760070800781px;
            color: rgba(49,49,51,1);
        }
        #ID2016_-_Present {
            left: 347px;
            top: 63.428px;
            position: absolute;
            overflow: visible;
            width: 98px;
            white-space: nowrap;
            line-height: 16.99051284790039px;
            margin-top: -1.4158763885498047px;
            text-align: left;
            font-style: normal;
            font-weight: 600;
            font-size: 14.158760070800781px;
            color: rgba(49,49,51,1);
        }
        #INIPAGI_STUDIO_ {
            left: 0.006px;
            top: 95.272px;
            position: absolute;
            overflow: visible;
            width: 108px;
            white-space: nowrap;
            line-height: 16.99051284790039px;
            margin-top: -1.4952564239501953px;
            text-align: left;
            font-style: normal;
            font-weight: 600;
            font-size: 14px;
            color: rgba(49,49,51,1);
        }
        #Group_2029 {
            position: absolute;
            width: 473.347px;
            height: 51.69px;
            left: 1.59px;
            top: 134px;
            overflow: visible;
        }
        #Porttitor_amet_massa_Done_cpor_ {
            left: 20.436px;
            top: 0px;
            position: absolute;
            overflow: hidden;
            width: 453.912px;
            height: 51.69046401977539px;
            line-height: 18.249069213867188px;
            margin-top: -3.1245346069335938px;
            text-align: left;
            font-size: 12px;
            color: rgba(99,101,104,1);
        }
        #Ellipse_82 {
            fill: rgba(0,56,109,1);
        }
        .Ellipse_82 {
            position: absolute;
            overflow: visible;
            width: 7.866px;
            height: 7.866px;
            left: 0px;
            top: 5.214px;
        }
        #Group_2028 {
            position: absolute;
            width: 473.347px;
            height: 51.69px;
            left: 1.59px;
            top: 193px;
            overflow: visible;
        }
        #Porttitor_amet_massa_Done_cpor_ba {
            left: 20.436px;
            top: 0px;
            position: absolute;
            overflow: hidden;
            width: 453.912px;
            height: 51.69046401977539px;
            line-height: 18.249069213867188px;
            margin-top: -3.1245346069335938px;
            text-align: left;
            font-size: 12px;
            color: rgba(99,101,104,1);
        }
        #Ellipse_84 {
            fill: rgba(0,56,109,1);
        }
        .Ellipse_84 {
            position: absolute;
            overflow: visible;
            width: 7.866px;
            height: 7.866px;
            left: 0px;
            top: 5.214px;
        }
        #Group_2027 {
            position: absolute;
            width: 473.347px;
            height: 51.69px;
            left: 1.59px;
            top: 252px;
            overflow: visible;
        }
        #Porttitor_amet_massa_Done_cpor_bc {
            left: 20.436px;
            top: 0px;
            position: absolute;
            overflow: hidden;
            width: 453.912px;
            height: 51.6903076171875px;
            line-height: 18.249069213867188px;
            margin-top: -3.1245346069335938px;
            text-align: left;
            font-size: 12px;
            color: rgba(99,101,104,1);
        }
        #Ellipse_85 {
            fill: rgba(0,56,109,1);
        }
        .Ellipse_85 {
            position: absolute;
            overflow: visible;
            width: 7.866px;
            height: 7.866px;
            left: 0px;
            top: 5.214px;
        }
        #EXPERIENCE {
            left: 0px;
            top: 0px;
            position: absolute;
            overflow: visible;
            width: 123px;
            white-space: nowrap;
            line-height: 24.54184913635254px;
            margin-top: -2.045154571533203px;
            text-align: left;
            font-style: normal;
            font-weight: 600;
            font-size: 20.451539993286133px;
            color: rgba(0,0,0,1);
        }
        #Rectangle_3 {
            position: absolute;
            width: 345.234px;
            height: 1.573px;
            left: 142.889px;
            top: 13px;
            overflow: visible;
        }
        #Rectangle_590 {
            fill: rgba(211,211,211,1);
        }
        .Rectangle_590 {
            position: absolute;
            overflow: visible;
            width: 345.234px;
            height: 1.573px;
            left: 0px;
            top: 0px;
        }
        #Group_709 {
            position: absolute;
            width: 217px;
            height: 300.621px;
            left: 0px;
            top: 423.5px;
            overflow: visible;
        }
        #Group_708 {
            position: absolute;
            width: 217px;
            height: 300.621px;
            left: 0px;
            top: 0px;
            overflow: visible;
        }
        #Group_706 {
            position: absolute;
            width: 217px;
            height: 268.059px;
            left: 0px;
            top: 32.562px;
            overflow: visible;
        }
        #Group_705 {
            position: absolute;
            width: 217px;
            height: 268.059px;
            left: 0px;
            top: 0px;
            overflow: visible;
        }
        #Group_704 {
            position: absolute;
            width: 217px;
            height: 268.059px;
            left: 0px;
            top: 0px;
            overflow: visible;
        }
        #CONTACT {
            left: 0px;
            top: 0px;
            position: absolute;
            overflow: visible;
            width: 135px;
            white-space: nowrap;
            line-height: 31px;
            margin-top: -3px;
            text-align: center;
            font-weight: bold;
            font-size: 25px;
            color: rgba(255,255,255,1);
            letter-spacing: 1px;
        }
        #Group_1715 {
            position: absolute;
            width: 212.534px;
            height: 199px;
            left: 4.466px;
            top: 69.059px;
            overflow: visible;
        }
        #Group_1714 {
            position: absolute;
            width: 212.534px;
            height: 199px;
            left: 0px;
            top: 0px;
            overflow: visible;
        }
        #Group_1700 {
            position: absolute;
            width: 165.533px;
            height: 36px;
            left: 0px;
            top: 163px;
            overflow: visible;
        }
        #Group_1699 {
            position: absolute;
            width: 165.533px;
            height: 36px;
            left: 0px;
            top: 0px;
            overflow: visible;
        }
        #Group_1696 {
            position: absolute;
            width: 131px;
            height: 36px;
            left: 34.533px;
            top: 0px;
            overflow: visible;
        }
        #ID715_Mataram_City__New_York_N {
            left: 0px;
            top: 0px;
            position: absolute;
            overflow: visible;
            width: 132px;
            white-space: nowrap;
            line-height: 16.99051284790039px;
            margin-top: -1.4952564239501953px;
            text-align: left;
            font-size: 14px;
            color: rgba(255,255,255,1);
        }
        #Group_1698 {
            position: absolute;
            width: 12.159px;
            height: 18.38px;
            left: 0px;
            top: 0px;
            overflow: visible;
        }
        #Group_1697 {
            position: absolute;
            width: 12.159px;
            height: 18.38px;
            left: 0px;
            top: 0px;
            overflow: visible;
        }
        #Path_748 {
            fill: rgba(255,255,255,1);
        }
        .Path_748 {
            overflow: visible;
            position: absolute;
            width: 12.159px;
            height: 18.38px;
            left: 0px;
            top: 0px;
            transform: matrix(1,0,0,1,0,0);
        }
        #Group_1703 {
            position: absolute;
            width: 141.534px;
            height: 19px;
            left: 0px;
            top: 0px;
            overflow: visible;
        }
        #Group_1702 {
            position: absolute;
            width: 141.534px;
            height: 19px;
            left: 0px;
            top: 0px;
            overflow: visible;
        }
        #Group_1701 {
            position: absolute;
            width: 107px;
            height: 19px;
            left: 34.534px;
            top: 0px;
            overflow: visible;
        }
        #ID92_232_534_234 {
            left: 0px;
            top: 0px;
            position: absolute;
            overflow: visible;
            width: 108px;
            white-space: nowrap;
            line-height: 16.99051284790039px;
            margin-top: -1.4952564239501953px;
            text-align: left;
            font-size: 14px;
            color: rgba(255,255,255,1);
        }
        #Path_749 {
            fill: rgba(255,255,255,1);
        }
        .Path_749 {
            overflow: visible;
            position: absolute;
            width: 13.643px;
            height: 13.635px;
            left: 0px;
            top: 3px;
            transform: matrix(1,0,0,1,0,0);
        }
        #Group_1708 {
            position: absolute;
            width: 200.533px;
            height: 19px;
            left: 0px;
            top: 109px;
            overflow: visible;
        }
        #Group_1707 {
            position: absolute;
            width: 200.533px;
            height: 19px;
            left: 0px;
            top: 0px;
            overflow: visible;
        }
        #Group_1704 {
            position: absolute;
            width: 166px;
            height: 19px;
            left: 34.533px;
            top: 0px;
            overflow: visible;
        }
        #wwwtravisandersoncom {
            left: 0px;
            top: 0px;
            position: absolute;
            overflow: visible;
            width: 167px;
            white-space: nowrap;
            line-height: 16.99051284790039px;
            margin-top: -1.4952564239501953px;
            text-align: left;
            font-size: 14px;
            color: rgba(255,255,255,1);
        }
        #Group_1706 {
            position: absolute;
            width: 16.114px;
            height: 16.115px;
            left: 0px;
            top: 1px;
            overflow: visible;
        }
        #Group_1705 {
            position: absolute;
            width: 16.114px;
            height: 16.115px;
            left: 0px;
            top: 0px;
            overflow: visible;
        }
        #Path_750 {
            fill: rgba(255,255,255,1);
        }
        .Path_750 {
            overflow: visible;
            position: absolute;
            width: 16.114px;
            height: 16.115px;
            left: 0px;
            top: 0px;
            transform: matrix(1,0,0,1,0,0);
        }
        #Group_1713 {
            position: absolute;
            width: 212.533px;
            height: 19px;
            left: 0px;
            top: 54px;
            overflow: visible;
        }
        #Group_1712 {
            position: absolute;
            width: 212.533px;
            height: 19px;
            left: 0px;
            top: 0px;
            overflow: visible;
        }
        #Group_1709 {
            position: absolute;
            width: 178px;
            height: 19px;
            left: 34.533px;
            top: 0px;
            overflow: visible;
        }
        #travisandersongmailcom {
            left: 0px;
            top: 0px;
            position: absolute;
            overflow: visible;
            width: 179px;
            white-space: nowrap;
            line-height: 16.99051284790039px;
            margin-top: -1.4952564239501953px;
            text-align: left;
            font-size: 14px;
            color: rgba(255,255,255,1);
        }
        #Group_1711 {
            position: absolute;
            width: 15.503px;
            height: 11.627px;
            left: 0px;
            top: 4px;
            overflow: visible;
        }
        #Group_1710 {
            position: absolute;
            width: 15.503px;
            height: 11.627px;
            left: 0px;
            top: 0px;
            overflow: visible;
        }
        #Path_751 {
            fill: rgba(255,255,255,1);
        }
        .Path_751 {
            overflow: visible;
            position: absolute;
            width: 15.503px;
            height: 11.627px;
            left: 0px;
            top: 0px;
            transform: matrix(1,0,0,1,0,0);
        }
        #Line_53 {
            fill: transparent;
            stroke: rgba(255,255,255,1);
            stroke-width: 1px;
            stroke-linejoin: miter;
            stroke-linecap: butt;
            stroke-miterlimit: 10;
            shape-rendering: auto;
        }
        .Line_53 {
            overflow: visible;
            position: absolute;
            width: 200.069px;
            height: 1px;
            left: 4.799px;
            top: 0px;
            transform: matrix(1,0,0,1,0,0);
        }
        #Group_20625 {
            position: absolute;
            width: 356px;
            height: 126.028px;
            left: 1px;
            top: 243.5px;
            overflow: visible;
        }
        #LOREM_IPSUM_DOLOR_SIT_AMET_CON {
            left: 0px;
            top: 52.028px;
            position: absolute;
            overflow: visible;
            width: 357px;
            white-space: nowrap;
            line-height: 20px;
            margin-top: -5px;
            text-align: left;
            font-family: Open Sans;
            font-style: normal;
            font-weight: normal;
            font-size: 10px;
            color: rgba(255,255,255,1);
        }
        #Group_682 {
            position: absolute;
            width: 218px;
            height: 29px;
            left: 0px;
            top: 0px;
            overflow: visible;
        }
        #Personal_INFO {
            left: 0px;
            top: 0px;
            position: absolute;
            overflow: visible;
            width: 219px;
            white-space: nowrap;
            line-height: 30px;
            margin-top: -3px;
            text-align: center;
            font-style: normal;
            font-weight: 700;
            font-size: 24px;
            color: rgba(255,255,255,1);
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        #Group_20628 {
            position: absolute;
            width: 203.47px;
            height: 292.355px;
            left: 1.398px;
            top: 775.5px;
            overflow: visible;
        }
        #Group_708_cl {
            position: absolute;
            width: 203.47px;
            height: 292.355px;
            left: 0px;
            top: 0px;
            overflow: visible;
        }
        #Group_706_cm {
            position: absolute;
            width: 110.066px;
            height: 248.355px;
            left: 0px;
            top: 44px;
            overflow: visible;
        }
        #Group_705_cn {
            position: absolute;
            width: 110.066px;
            height: 248.355px;
            left: 0px;
            top: 0px;
            overflow: visible;
        }
        #Group_704_co {
            position: absolute;
            width: 110.066px;
            height: 248.355px;
            left: 0px;
            top: 0px;
            overflow: visible;
        }
        #SKILLS {
            left: 0.602px;
            top: 0px;
            position: absolute;
            overflow: visible;
            width: 95px;
            white-space: nowrap;
            line-height: 31px;
            margin-top: -3px;
            text-align: center;
            font-family: Open Sans;
            font-style: normal;
            font-weight: bold;
            font-size: 25px;
            color: rgba(255,255,255,1);
            letter-spacing: 1px;
        }
        #Photoshop_Illustrator_Indesign {
            left: 30.066px;
            top: 62.355px;
            position: absolute;
            overflow: visible;
            width: 81px;
            white-space: nowrap;
            line-height: 40.903079986572266px;
            margin-top: -12.585559844970703px;
            text-align: left;
            font-size: 15.73196029663086px;
            color: rgba(255,255,255,1);
        }
        #Group_1747 {
            position: absolute;
            width: 7.866px;
            height: 171.866px;
            left: 0px;
            top: 70.125px;
            overflow: visible;
        }
        #Ellipse_89 {
            fill: rgba(255,255,255,1);
        }
        .Ellipse_89 {
            position: absolute;
            overflow: visible;
            width: 7.866px;
            height: 7.866px;
            left: 0px;
            top: 0px;
        }
        #Ellipse_90 {
            fill: rgba(255,255,255,1);
        }
        .Ellipse_90 {
            position: absolute;
            overflow: visible;
            width: 7.866px;
            height: 7.866px;
            left: 0px;
            top: 40px;
        }
        #Ellipse_91 {
            fill: rgba(255,255,255,1);
        }
        .Ellipse_91 {
            position: absolute;
            overflow: visible;
            width: 7.866px;
            height: 7.866px;
            left: 0px;
            top: 82px;
        }
        #Ellipse_92 {
            fill: rgba(255,255,255,1);
        }
        .Ellipse_92 {
            position: absolute;
            overflow: visible;
            width: 7.866px;
            height: 7.866px;
            left: 0px;
            top: 123px;
        }
        #Ellipse_93 {
            fill: rgba(255,255,255,1);
        }
        .Ellipse_93 {
            position: absolute;
            overflow: visible;
            width: 7.866px;
            height: 7.866px;
            left: 0px;
            top: 164px;
        }
        #Line_53_cx {
            fill: transparent;
            stroke: rgba(255,255,255,1);
            stroke-width: 1px;
            stroke-linejoin: miter;
            stroke-linecap: butt;
            stroke-miterlimit: 10;
            shape-rendering: auto;
        }
        .Line_53_cx {
            overflow: visible;
            position: absolute;
            width: 200.069px;
            height: 1px;
            left: 3.4px;
            top: 0px;
            transform: matrix(1,0,0,1,0,0);
        }
        #Group_20627 {
            position: absolute;
            width: 505.123px;
            height: 467.096px;
            left: 454px;
            top: 97px;
            overflow: visible;
        }
        #Porttitor_amet_massa_Done_cpor_cz {
            left: 18.025px;
            top: 137.438px;
            position: absolute;
            overflow: hidden;
            width: 453.912px;
            height: 51.6903076171875px;
            line-height: 18.249069213867188px;
            margin-top: -3.1245346069335938px;
            text-align: left;
            font-family: Open Sans;
            font-style: normal;
            font-weight: normal;
            font-size: 12px;
            color: rgba(99,101,104,1);
        }
        #Ellipse_83 {
            fill: rgba(0,56,109,1);
        }
        .Ellipse_83 {
            position: absolute;
            overflow: visible;
            width: 7.866px;
            height: 7.866px;
            left: 0px;
            top: 141.653px;
        }
        #Group_20670 {
            position: absolute;
            width: 474.937px;
            height: 117.509px;
            left: 0px;
            top: 205.586px;
            overflow: visible;
        }
        #BACHELOR_OF_ART {
            left: 0px;
            top: 0px;
            position: absolute;
            overflow: visible;
            width: 128px;
            white-space: nowrap;
            line-height: 16.99051284790039px;
            margin-top: -1.4158763885498047px;
            text-align: left;
            font-style: normal;
            font-weight: 600;
            font-size: 14.158760070800781px;
            color: rgba(45,44,45,1);
        }
        #ID2011_-_2013 {
            left: 369px;
            top: 0px;
            position: absolute;
            overflow: visible;
            width: 78px;
            white-space: nowrap;
            line-height: 16.99051284790039px;
            margin-top: -1.4158763885498047px;
            text-align: left;
            font-style: normal;
            font-weight: 600;
            font-size: 14.158760070800781px;
            color: rgba(49,49,51,1);
        }
        #Porttitor_amet_massa_Done_cpor_c {
            left: 22.025px;
            top: 65.819px;
            position: absolute;
            overflow: hidden;
            width: 453.912px;
            height: 51.6903076171875px;
            line-height: 18.249069213867188px;
            margin-top: -3.1245346069335938px;
            text-align: left;
            font-family: Open Sans;
            font-style: normal;
            font-weight: normal;
            font-size: 12px;
            color: rgba(99,101,104,1);
        }
        #YELLOW_UNIVERSITY {
            left: 0px;
            top: 28.813px;
            position: absolute;
            overflow: visible;
            width: 139px;
            white-space: nowrap;
            line-height: 16.99051284790039px;
            margin-top: -1.4952564239501953px;
            text-align: left;
            font-style: normal;
            font-weight: 600;
            font-size: 14px;
            color: rgba(49,49,51,1);
        }
        #Path_747 {
            fill: rgba(0,56,109,1);
        }
        .Path_747 {
            overflow: visible;
            position: absolute;
            width: 7.866px;
            height: 7.865px;
            left: 0px;
            top: 71.032px;
            transform: matrix(1,0,0,1,0,0);
        }
        #Group_2034 {
            position: absolute;
            width: 505.123px;
            height: 28px;
            left: 0px;
            top: 0px;
            overflow: visible;
        }
        #Education_ {
            left: 0px;
            top: 0px;
            position: absolute;
            overflow: visible;
            width: 127px;
            white-space: nowrap;
            line-height: 24.54184913635254px;
            margin-top: -2.045154571533203px;
            text-align: left;
            font-style: normal;
            font-weight: 700;
            font-size: 20.451539993286133px;
            color: rgba(0,0,0,1);
            text-transform: uppercase;
        }
        #Rectangle_3_c {
            position: absolute;
            width: 374.234px;
            height: 1.573px;
            left: 130.889px;
            top: 13px;
            overflow: visible;
        }
        #Rectangle_591 {
            fill: rgba(211,211,211,1);
        }
        .Rectangle_591 {
            position: absolute;
            overflow: visible;
            width: 374.234px;
            height: 1.573px;
            left: 0px;
            top: 0px;
        }
        #MASTER_OF_ART {
            left: 0px;
            top: 70.586px;
            position: absolute;
            overflow: visible;
            width: 109px;
            white-space: nowrap;
            line-height: 16.99051284790039px;
            margin-top: -1.4158763885498047px;
            text-align: left;
            font-style: normal;
            font-weight: 600;
            font-size: 14.158760070800781px;
            color: rgba(45,44,45,1);
        }
        #ID2013_-_2015 {
            left: 369px;
            top: 70.586px;
            position: absolute;
            overflow: visible;
            width: 78px;
            white-space: nowrap;
            line-height: 16.99051284790039px;
            margin-top: -1.4158763885498047px;
            text-align: left;
            font-style: normal;
            font-weight: 600;
            font-size: 14.158760070800781px;
            color: rgba(49,49,51,1);
        }
        #YELLOW_UNIVERSITY_dd {
            left: 0px;
            top: 100.435px;
            position: absolute;
            overflow: visible;
            width: 139px;
            white-space: nowrap;
            line-height: 16.99051284790039px;
            margin-top: -1.4952564239501953px;
            text-align: left;
            font-style: normal;
            font-weight: 60;
            font-size: 14px;
            color: rgba(49,49,51,1);
        }
        #Group_20671 {
            position: absolute;
            width: 474.937px;
            height: 117.509px;
            left: 0px;
            top: 349.586px;
            overflow: visible;
        }
        #BACHELOR_OF_ART_df {
            left: 0px;
            top: 0px;
            position: absolute;
            overflow: visible;
            width: 128px;
            white-space: nowrap;
            line-height: 16.99051284790039px;
            margin-top: -1.4158763885498047px;
            text-align: left;
            font-style: normal;
            font-weight: 60;
            font-size: 14.158760070800781px;
            color: rgba(45,44,45,1);
        }
        #ID2011_-_2013_dg {
            left: 369px;
            top: 0px;
            position: absolute;
            overflow: visible;
            width: 78px;
            white-space: nowrap;
            line-height: 16.99051284790039px;
            margin-top: -1.4158763885498047px;
            text-align: left;
            font-style: normal;
            font-weight: 600;
            font-size: 14.158760070800781px;
            color: rgba(49,49,51,1);
        }
        #Porttitor_amet_massa_Done_cpor_dh {
            left: 22.025px;
            top: 65.819px;
            position: absolute;
            overflow: hidden;
            width: 453.912px;
            height: 51.6903076171875px;
            line-height: 18.249069213867188px;
            margin-top: -3.1245346069335938px;
            text-align: left;
            font-family: Open Sans;
            font-style: normal;
            font-weight: normal;
            font-size: 12px;
            color: rgba(99,101,104,1);
        }
        #YELLOW_UNIVERSITY_di {
            left: 0px;
            top: 28.813px;
            position: absolute;
            overflow: visible;
            width: 139px;
            white-space: nowrap;
            line-height: 16.99051284790039px;
            margin-top: -1.4952564239501953px;
            text-align: left;
            font-style: normal;
            font-weight: 600;
            font-size: 14px;
            color: rgba(49,49,51,1);
        }
        #Path_747_dj {
            fill: rgba(0,56,109,1);
        }
        .Path_747_dj {
            overflow: visible;
            position: absolute;
            width: 7.866px;
            height: 7.865px;
            left: 0px;
            top: 71.032px;
            transform: matrix(1,0,0,1,0,0);
        }
        .summ-p p{
            padding-right: 2px;
        }
    </style>
@endif
@if($resume->template_id == 25)
    <style>
        *,
        *::after,
        *::before {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-size: 14px;
            font-weight: 400;
            font-family: "Roboto", sans-serif;
            color: #4f4f4f;
        }
        img {
            max-width: 100%;
        }
        li {
            list-style: none;
        }
        h1,
        h2,
        h3,
        h4,
        h5 {
            font-weight: bold;
        }
        @media print {
            .resume-card-left,
            li.mine-title .left-bg,
            .card-inner-bottom .card-inner-box > div {
                background-color: #ecc9b9 !important;
                -webkit-print-color-adjust: exact;
            }
            .padding-top .education-bottom-box-right .box-title:after {
                background-color: #4f4f4f !important;
                -webkit-print-color-adjust: exact;
            }
        }
        .extra-sec-p p{
            padding-left: 27px;
            line-height: 28px;
            font-size: 16px;
            color: rgba(61, 68, 69, 1);
            letter-spacing: -0.25px;
            margin-top: 20px;
        }
    </style>
@endif
@if($resume->template_id == 27)
    <style>
        *,
        *::after,
        *::before {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-size: 14px;
            font-weight: 400;
            font-family: "Montserrat", sans-serif;
            color: #000;
        }
        img {
            max-width: 100%;
        }
        li {
            list-style: none;
        }
        a {
            text-decoration: none;
        }
        @media print {

            .profile-info{
                background-color: #000 !important;
                -webkit-print-color-adjust: exact;
            }
        }
        .summ-p p{
            font-size: 15px;
            font-weight: 400;
            line-height: 24px;
            color: #5b5b5b;
        }
    </style>
@endif
@if($resume->template_id == 15)
    <style>
        @charset "utf-8";
        *,
        *::after,
        *::before {
            margin: 0;
            padding: 0;
            box-sizing: border-box
        }

        body {
            font-size: 14px;
            font-weight: 400;
            font-family: 'Roboto', sans-serif;
            color: #333
        }

        img {
            max-width: 100%
        }

        li {
            list-style: none
        }

        .custom-resume-card {
            max-width: 900px;
            margin: 0 auto;
            width: 100%;
            border: 1px solid #ccc
        }

        .contact-info {
            padding: 20px 20px 10px;
            display: flex
        }

        ul.contact-icon-inner a i.fa {
            padding-right: 6px
        }

        .contact-info-right li a i.fa {
            padding-right: 14px;
            width: 25px;
            font-size: 15px
        }

        .resume-card-left {
            width: 62%;
            padding-right: 5%
        }

        .card-inner-left span {
            width: 8px;
            height: 8px;
            border-radius: 50px;
            background-color: #ef4a49;
            display: flex;
            margin-bottom: 8px
        }

        .card-inner-left {
            display: flex
        }

        .card-inner-left .dots {
            margin-right: 15px
        }

        .card-inner-left .dots:last-child {
            margin: 0
        }

        .resume-card-right {
            width: 38%
        }

        .card-inner {
            display: flex
        }

        .card-inner-right {
            padding-left: 25px
        }

        .card-inner-right h1 {
            font-size: 45px;
            margin-bottom: 5px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 2px
        }

        .card-inner-right p {
            font-size: 20px;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 2px
        }

        .card-inner-left img {
            max-height: 120px
        }

        .custom-resume-card hr {
            margin: 8px 0
        }

        .contact-icon-inner {
            display: flex
        }

        ul.contact-icon-inner {
            display: flex;
            align-items: center;
            padding-top: 10px
        }

        ul.contact-icon-inner a img {
            width: 14px;
            margin-right: 8px
        }

        ul.contact-icon-inner a {
            color: #333;
            text-decoration: none;
            font-size: 12px;
            display: inline-block
        }

        .resume-card-right-inner h4 {
            font-size: 20px;
            letter-spacing: 3px;
            text-transform: uppercase;
            font-weight: 500;
            margin-bottom: 15px
        }

        .resume-card-right-inner p {
            font-size: 14px;
            line-height: 23px
        }

        .contact-icon {
            padding: 5px 5px 10px
        }

        ul.contact-icon-inner li {
            padding-right: 15px
        }

        ul.contact-icon-inner li:last-child {
            padding: 0
        }

        .contact-icon-inner li.icon-inner-line {
            width: 18px;
            height: 30px;
            padding: 0;
            border-left: 1px solid #ccc
        }

        li.experience-card-left {
            width: 62%;
            padding-right: 5%
        }

        ul.experience-info {
            display: flex
        }

        li.experience-card-right {
            width: 38%
        }

        .experience-card-left-inner {
            background-color: #ef4a49;
            padding: 40px
        }

        .experience-card-left-inner h3 {
            font-size: 24px;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 5px;
            font-weight: 500;
            margin-bottom: 25px
        }

        .experience-bottom-box-left {
            transform: rotate(270deg);
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-left: 0;
            height: 80px;
            width: 80px
        }

        .experience-bottom-box {
            display: flex;
            padding: 20px 0 20px 30px
        }

        .experience-bottom-box-right {
            color: #fff;
            margin-left: -30px
        }

        .experience-bottom-box-right p {
            font-size: 15px;
            margin-bottom: 15px
        }

        .experience-bottom-box-left p {
            white-space: nowrap
        }

        .education-card-right-inner h3 {
            font-size: 24px;
            text-transform: uppercase;
            letter-spacing: 5px;
            font-weight: 500;
            margin-bottom: 20px
        }

        .education-bottom-box-left {
            transform: rotate(270deg);
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-left: 0;
            height: 70px;
            width: 80px
        }

        .education-bottom-box {
            display: flex;
            padding: 10px 20px 10px 20px;
            justify-content: flex-start
        }

        .education-bottom-box-left p {
            white-space: nowrap
        }

        .education-bottom-box-right {
            margin-left: -30px
        }

        .education-bottom-box-right p {
            font-size: 14px;
            margin-bottom: 7px
        }

        span.Bachelor-text {
            display: block;
            margin-bottom: 15px;
            font-size: 12px
        }

        .skills-info {
            padding: 10px 20px 10px 80px;
            display: flex
        }

        .skills-info h3 {
            font-size: 24px;
            text-transform: uppercase;
            letter-spacing: 5px;
            font-weight: 500;
            margin-bottom: 15px
        }

        .skills-info-left li {
            font-size: 16px;
            margin-bottom: 15px;
            margin-top: 10px
        }

        .skills-info-left {
            width: 62%;
            padding-right: 5%
        }

        .contact-info-right li {
            padding: 10px 10px
        }

        .contact-info-right li a {
            color: #333;
            text-decoration: none
        }

        .contact-info-right li a img {
            margin-right: 15px
        }

        .Contact-inner-map a {
            display: flex;
            align-items: flex-start
        }

        .Contact-inner-map span {
            display: inline-block
        }

        li.Contact-inner-dots {
            text-align: right
        }

        li.contact-info-right {
            width: 38%;
            display: inline-block
        }

        li.Contact-inner-dots img {
            width: 120px
        }

        li.Contact-inner-dots .card-inner-left {
            justify-content: flex-end
        }

        @media print {
            .experience-card-left-inner,
            .card-inner-left span {
                background-color: #ef4a49!important;
                -webkit-print-color-adjust: exact
            }
        }
    </style>
@endif

@if($resume->template_id == 16)
    <style>
        *, *::after, *::before {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-size: 14px;
            font-weight: 400;
            font-family: 'Montserrat', sans-serif;
            color: #333;

        }
        img {
            max-width: 100%;
        }
        li{
            list-style:none;
        }
        @media print{
            .green-bg, .border-right, .border-bottom {
                background-color: #11AF97 !important;
                -webkit-print-color-adjust: exact;

            }
        }
    </style>
@endif

@if($resume->template_id == 17)
    <style>
        *,
        *::after,
        *::before {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-size: 15px;
            font-weight: 400;
            font-family: "Open Sans", sans-serif;
            color: #757473;
        }
        img {
            max-width: 100%;
        }
        li {
            list-style: none;
        }
        h1,
        h2,
        h3,
        h4,
        h5 {
            font-weight: bold;
        }
        @media print {

            .contact-border-line .icon {
                background-color: #334a50 !important;
                -webkit-print-color-adjust: exact;
            }
        }
    </style>
@endif

@if($resume->template_id == 18)
    <style>
        *,
        *::after,
        *::before {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-size: 14px;
            font-weight: 400;
            font-family: 'Montserrat', sans-serif;
            color: #000;
        }
        img {
            max-width: 100%;
        }
        li {
            list-style: none;
        }
        a {
            text-decoration: none;
        }
        @media print {
            .resume-card-right-inner .icon {
                background-color: #89245b !important;
                -webkit-print-color-adjust: exact;
            }
        }
    </style>
@endif

@if($resume->template_id == 19)
    <style>
        *,
        *::after,
        *::before {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-size: 14px;
            font-weight: 400;
            font-family: "Montserrat", sans-serif;
            color: #000;
        }
        img {
            max-width: 100%;
        }
        li {
            list-style: none;
        }
        a {
            text-decoration: none;
        }
        @media print {

            h3 .title-bg,
            h1 .title-bg {
                background-color: #7996f8 !important;
                -webkit-print-color-adjust: exact;
            }
        }
    </style>
@endif

@if($resume->template_id == 20)
    <style>
        *,
        *::after,
        *::before {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-size: 14px;
            font-weight: 400;
            font-family: "Montserrat", sans-serif;
            color: #212121;
        }
        img {
            max-width: 100%;
        }
        li {
            list-style: none;
        }
        a {
            text-decoration: none;
        }
        h1,
        h2,
        h3,
        h4,
        h5 {
            font-weight: bold;
        }
        @media print {
            .experience-card-right {
                background-color: #88c8af !important;
                -webkit-print-color-adjust: exact;
            }
        }
    </style>
@endif
