<?php

use App\Model\UserResumes;
use App\helper\ScreenshotMachine;

Route::get('/', "HomeController@index");
Route::get('/home', "HomeController@index")->name('home');

Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::group(['namespace' => 'Front'], function () {
    Route::get('/login', "UserController@login")->name('front.login');
    Route::post('/login', "UserController@postLogin")->name('front.login.post');
    Route::get('/forgot-password', "UserController@forgotPassword")->name('front.forgot-password');
    Route::post('/forgot-password', "UserController@forgotPasswordEmail")->name('front.forgot-password.post');
    Route::post('/logout', "UserController@logout")->name('front.logout');
    Route::get('/registration', "UserController@registration")->name('front.registration');

    Route::post('/guest_registration', "UserController@postGuestRegistration")->name('front.guest.registration');

    Route::post('/registration', "UserController@postRegistration")->name('front.registration.post');

    Route::get('/password/reset/{token}', 'UserController@validatePasswordRequest')->name('front.password.reset');
    Route::post('/password/reset', "UserController@resetPassword")->name('front.password.reset.post');

    Route::get('/google/redirect', 'UserController@redirectToProvider')->name("google.login");
    Route::get('/google/callback', 'UserController@handleProviderCallback');

    Route::get('/build_resume', 'ResumeController@buildResume')->name("build_resume");

    Route::group(['prefix' => 'resume'], function () {
        Route::get('/choose-template', 'ResumeController@chooseTemplate')->name("resume.choose-template");
        Route::get('/template/{templateId}/select', 'ResumeController@selectedTemplate')->name("resume.template.select");
        Route::get('{resumeId}/template/{templateId}/update', 'ResumeController@updateTemplate')->name("resume.template.update");
        Route::post('/upload', 'ResumeController@uploadResume')->name("resume.upload");
        Route::get('/contact/{resumeId?}', 'ResumeController@resumeContact')->name("resume.contact");
//        Route::get('/upload', 'ResumeController@resumeUpload')->name("resume.upload");
        Route::post('/save', 'ResumeController@saveResumeData')->name("resume.save");
        Route::post('/{resumeId}/style/update', 'ResumeController@updateStyle')->name("resume.style.update");
        Route::get('/{resumeId}/style/reset', 'ResumeController@restStyle')->name("resume.style.reset");

        Route::get('/experience/{countExpInfo?}', 'ResumeController@experience')->name("resume.experience");
        Route::get('{resumeId}/experience/create', 'ResumeController@experienceCreateById')->name("resume.experience.createById");
        Route::get('/experience/{countExpInfo}/edit', 'ResumeController@experienceEdit')->name("resume.experience.edit");
        Route::get('{resumeId}/experience/{countExpInfo}/edit', 'ResumeController@experienceEditById')->name("resume.experience.editById");
        Route::get('{resumeId}/experience/{countExpInfo}/delete', 'ResumeController@experienceDelete')->name("resume.experience.delete");
        Route::get('/experience/{countExpInfo}/description', 'ResumeController@experienceDescription')->name("resume.experience.description");
        Route::get('{resumeId}/experience/{countExpInfo}/description/edit', 'ResumeController@experienceDescriptionEditById')->name("resume.experience.description.editById");
        Route::get('/experience-review/{resumeId?}', 'ResumeController@experienceReview')->name("resume.experience-review");

        Route::get('/education', 'ResumeController@education')->name("resume.education");
        Route::get('{resumeId}/education/create', 'ResumeController@educationCreateById')->name("resume.education.createById");
        Route::get('/education/{countExpInfo}/edit', 'ResumeController@educationEdit')->name("resume.education.edit");
        Route::get('{resumeId}/education/{countExpInfo}/edit', 'ResumeController@educationEditById')->name("resume.education.editById");
        Route::get('{resumeId}/education/{countExpInfo}/delete', 'ResumeController@educationDelete')->name("resume.education.delete");
        Route::get('/education/{countExpInfo}/description', 'ResumeController@educationDescription')->name("resume.education.description");
        Route::get('{resumeId}/education/{countExpInfo}/description/edit', 'ResumeController@educationDescriptionEditById')->name("resume.education.description.editById");
        Route::get('/education-review/{resumeId?}', 'ResumeController@educationReview')->name("resume.education-review");

        Route::get('/skills/{resumeId?}', 'ResumeController@skills')->name("resume.skills");
//        Route::get('/skills/{counterInfo}/edit', 'ResumeController@skillsEdit')->name("resume.skills.edit");

        Route::get('/summary/{resumeId?}', 'ResumeController@summary')->name("resume.summary");
        Route::get('{resumeId}/section/{section}', 'ResumeController@section')->name("resume.section");
        Route::get('/finalize/{resumeId}', 'ResumeController@finalize')->name("resume.finalize");

        Route::post('/update/{resumeId}', 'ResumeController@resumeUpdate')->name("resume.update");
        Route::post('/updateAjax/{resumeId}', 'ResumeController@updateAjax')->name("resume.updateAjax");
        Route::get('/download/{resumeId}', 'ResumeController@downloadPDF')->name("resume.download");
        Route::get('/print/{resumeId}', 'ResumeController@printPreview')->name("resume.print");
        Route::get('/email/{resumeId}', 'ResumeController@sendEmail')->name("resume.email");

        Route::get('/copy/{resumeId}', 'ResumeController@copyResume')->name("resume.copy");
        Route::get('/delete/{resumeId}', 'ResumeController@deleteResume')->name("resume.delete");

        Route::post('/update/sortable/{resumeId}', 'ResumeController@updateSortable')->name("resume.update.sortable");

    });

    Route::get('/build_letter', 'LetterController@buildLetter')->name("build_letter");

    Route::group(['prefix' => 'letter'], function () {
        Route::get('/choose-template', 'LetterController@chooseTemplate')->name("letter.choose-template");
        Route::get('/template/{templateId}/select', 'LetterController@selectedTemplate')->name("letter.template.select");
        Route::get('/choose-type/', 'LetterController@selectLetterType')->name("letter.type");
        Route::post('/choose-type/select', 'LetterController@selectedLetterType')->name("letter.type.selected");
        Route::get('/choose-subtype', 'LetterController@selectLetterSubType')->name("letter.subtype");
        Route::post('/choose-subtype/select', 'LetterController@selectedLetterSubType')->name("letter.subtype.selected");
        Route::get('{letterId}/template/{templateId}/update', 'LetterController@updateTemplate')->name("letter.template.update");
        Route::get('/contact/{letterId?}', 'LetterController@letterContact')->name("letter.contact");
        Route::post('/save', 'LetterController@saveLetterData')->name("letter.save");
        Route::get('/recipient/{letterId?}', 'LetterController@letterRecipient')->name("letter.recipient");
        Route::get('/subject/{letterId?}', 'LetterController@letterSubject')->name("letter.subject");
        Route::get('/greeting/{letterId?}', 'LetterController@letterGreeting')->name("letter.greeting");
        Route::get('/opener/{letterId?}', 'LetterController@letterOpener')->name("letter.opener");
        Route::get('/body/{letterId?}', 'LetterController@letterBody')->name("letter.body");
        Route::get('/call-to-action/{letterId?}', 'LetterController@letterCallToAction')->name("letter.call-to-action");
        Route::get('/closer/{letterId?}', 'LetterController@letterCloser')->name("letter.closer");
        Route::get('/finalize/{resumeId}', 'LetterController@finalize')->name("letter.finalize");
        Route::post('/{letterId}/style/update', 'LetterController@updateStyle')->name("letter.style.update");
        Route::get('/{letterId}/style/reset', 'LetterController@restStyle')->name("letter.style.reset");

        Route::post('/update/{letterId}', 'LetterController@letterUpdate')->name("letter.update");
        Route::get('/download/{letterId}', 'LetterController@downloadPDF')->name("letter.download");
        Route::get('/print/{letterId}', 'LetterController@printPreview')->name("letter.print");
        Route::get('/email/{letterId}', 'LetterController@sendEmail')->name("letter.email");
        Route::get('/copy/{letterId}', 'LetterController@copyLetter')->name("letter.copy");
        Route::get('/delete/{letterId}', 'LetterController@deleteLetter')->name("letter.delete");

        Route::post('/update/sortable/{letterId}', 'LetterController@updateSortable')->name("letter.update.sortable");
    });
    Route::group(['prefix' => 'user', 'middleware' => ['auth', 'can:isUser']], function () {
        Route::match(['GET', 'POST'], '/dashboard', 'DashboardController@index')->name("user.dashboard");
    });

    Route::group(['prefix' => 'user', 'middleware' => ['auth']], function () {
        Route::get('/checkout/{type}/{id}', 'PaymentController@checkout')->name("user.checkout");
    });

    /* paypal */
    Route::post('{type}/{id}/paypal/success', 'PaymentController@paypalResponse')->name("user.paypal.response");
    Route::post('payment/request', 'PaymentController@paymentRequest')->name("user.payment.request");
//    Route::get('/paypal/success', 'PaymentController@paypalResponse')->name("user.paypal.success");
    //    Route::get('/paypal/cancel', 'PaymentController@paypalResponse')->name("user.paypal.cancel");
});

Route::get('/storage', function () {
    Artisan::call('storage:link');
    return "Storage link generated successfully.";
});

Route::get('/cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return "All cache clear successfully.";
});

/* Backend Routes */

Route::group(['prefix' => 'backend'], function () {
    Auth::routes(['register' => false]);
    Route::group(['middleware' => ['auth', 'can:isAdmin']], function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');
        Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
        /* Profile */
        Route::get('profile/my-profile', 'ProfileController@myProfile')->name('profile.my-profile');
        Route::resource('user', 'UserController');
        Route::get('user/{userId}/resumes', 'UserController@getResumes')->name('user.resumes');
        Route::get('user/{userId}/resume/{resumeId}', 'UserController@getResumeDetail')->name('user.resume.detail');
        Route::resource('template', 'TemplateController');
        Route::resource('payment', 'PaymentController');
        Route::resource('letter_type', 'LetterController');
        Route::resource('prewritten_content', 'PrewrittenContentController');
        Route::resource('degree', 'DegreeController');
        Route::resource('contacts', 'ContactController');

    });
});

Route::get('resume-25/{id}', function ($id){
    $resume = UserResumes::with('template')->where('id', $id)->first();
    $sections = ["Community Service", "Language", "Affiliations", "Awards", "Additional Information", "Publication", "Accomplishments"];

    return view('template.resume.resume-3', ['resume' => $resume, 'sections' => $sections]);
});
Route::get('test',function (){
    $customer_key = "9d661e";
    $secret_phrase = "45621";
    $machine = new ScreenshotMachine($customer_key, $secret_phrase);

    $options['url'] = "https://www.google.com";

    $options['dimension'] = "1366x768";
    $options['device'] = "desktop";
    $options['format'] = "png";
    $options['cacheLimit'] = "0";
    $options['delay'] = "200";
    $options['zoom'] = "100";

    $api_url = $machine->generate_screenshot_api_url($options);

    echo '<img src="' . $api_url . '">' . PHP_EOL;
});
