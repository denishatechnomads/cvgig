<footer class=" pt-0 home-footer">
    <div class="footer-top  ">
        <div class="container">
            <div class="text-center mb-5">
                <div class="footer-logo ">
                    <img src="{{ asset('front/images/logo.png') }}" height="90" alt="">
                </div>
                <h3 class="text-white text-uppercase fw-700 mb-4">{{ __("message.getStartedTitle") }}</h3>
                <a type="submit" class="btn primary-btn text-uppercase" href="{{ route('build_resume') }}">{{ __('message.Create your resume') }}</a>
            </div>
            <div class="row ">
                <div class="col-md-3 col-sm-6">
                    <h4 class="primary-color fw-600 mb-4">{{ __("message.getStarted") }}</h4>
                    <div class="footer-links">
                        <ul>
                            <li><a href="{{ route('build_resume') }}">{{ __("message.createResume") }}</a></li>
                            <li><a href="#">{{ __("message.pricing") }}</a></li>
                            <li><a href="#">{{ __("message.terms") }}</a></li>
                            <li><a href="#">{{ __("message.privacyPolicy") }}</a></li>
                            <li><a href="#">{{ __("message.HtmlSiteMap") }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <h4 class="primary-color fw-600 mb-4">{{ __("message.goodies") }}</h4>
                    <div class="footer-links">
                        <ul>
                            <li><a href="#">{{ __("message.resources") }}</a></li>
                            <li><a href="#">{{ __("message.skillExamples") }}</a></li>
                            <li><a href="#">{{ __("message.resumeExamples") }}</a></li>
                            <li><a href="#">{{ __("message.resumeTemplates") }}</a></li>
                            <li><a href="#">{{ __("message.coverLetters") }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <h4 class="primary-color fw-600 mb-4">{{ __("message.aboutUs") }}</h4>
                    <div class="footer-links">
                        <ul>
                            <li><a href="#">{{ __("message.company") }}</a></li>
                            <li><a href="#">{{ __("message.careers") }}</a></li>
                            <li><a href="#">{{ __("message.blog") }}</a></li>
                            <li><a href="#">{{ __("message.help") }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <h4 class="primary-color fw-600 mb-4">{{ __("message.contact") }}</h4>
                    <div class="footer-links">
                        <ul>
                            <li><a href="#">{{ __("message.terms") }}</a></li>
                            <li><a href="#">{{ __("message.privacyPolicy") }}</a></li>
                            <li><a href="#">{{ __("message.cookiePolicy") }}</a></li>
                            <li><a href="#">{{ __("message.userAgreement") }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="footer-bottom">
        <div class="container">
            <div class="copyright">
                <p class="mb-0">{{ date('Y') }} CVGig, All Rights Reserved.</p>
            </div>
        </div>
    </div> --}}
</footer>
