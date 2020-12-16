@if(isset($userLetter->style_section) && !empty($userLetter->style_section))

    <style>
        .custom_resume_card {
            @if(isset($userLetter->style_section['color']))
 color: {{ $userLetter->style_section['color'] }};
            @endif
            @if(isset($userLetter->style_section['font_size']))
 font-size: {{ $userLetter->style_section['font_size'] }};
            @endif
            @if(isset($userLetter->style_section['font_weight']))
 font-weight: {{ $userLetter->style_section['font_weight'] }};
            @endif
            @if(isset($userLetter->style_section['font_style']) && !empty($userLetter->style_section['font_style']))
 font-style: {{ $userLetter->style_section['font_style'] }};
            @endif
            @if(isset($userLetter->style_section['line_height']))
 line-height: {{ $userLetter->style_section['line_height'] }}
                @endif;

            @if(isset($userLetter->style_section['font_family']) && !empty($userLetter->style_section['font_family']))
 font-family: {{ $userLetter->style_section['font_family'] }};
        @endif;
            @if(isset($userLetter->style_section['paragraph_height']))
 line-height: {{ $userLetter->style_section['paragraph_height'] }};
            @endif
            @if(isset($userLetter->style_section['side_padding']))
 padding-left: {{ $userLetter->style_section['side_padding'] }}px;
            padding-right: {{ $userLetter->style_section['side_padding'] }}px;
        @endif;

            @if(isset($userLetter->style_section['top_bottom_padding']))
 padding-top: {{ $userLetter->style_section['top_bottom_padding'] }}px;
            padding-bottom: {{ $userLetter->style_section['top_bottom_padding'] }}px;
        @endif;
        }

        @if(isset($userLetter->style_section['paragraph_indent']) && !empty($userLetter->style_section['paragraph_indent']))
                .custom_resume_card p, ul {
            padding-left: {{ $userLetter->style_section['paragraph_indent'] }}px;
        }
        @endif
    </style>
@endif
<style>
    .letterAction {
        display: none;
        color: #fff;
        position: absolute;
        z-index: 10;
        font-family: Poppins;
    }

    .finalized .contact:hover .letterAction, .finalized .recipient:hover .letterAction,
    .finalized .subject:hover .letterAction, .finalized .greeting:hover .letterAction,
    .finalized .opener:hover .letterAction, .finalized .body:hover .letterAction,
    .finalized .closer:hover .letterAction, .finalized .call_to_action:hover .letterAction {
        display: block;
    }
</style>
