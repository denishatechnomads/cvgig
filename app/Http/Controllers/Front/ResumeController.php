<?php
/**********************************/
/* Created By Jitendra Prajapati  */
/**********************************/

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\Degree;
use App\Model\Payment;
use App\Model\Prewritten_content;
use App\Model\Template;
use App\Model\UserResumes;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF;
use Session;
use Smalot\PdfParser\Parser;
use Converter;

class ResumeController extends Controller {

    public function buildResume() {
        Session::forget('resumeId');
        return view("build_resume");
    }

    /* Choose Template Step */
    public function chooseTemplate() {
        $templates = Template::where("type", 'resume')->where('is_active', true)->get();
        return view("resume.choose_template", compact('templates'));
    }

    public function selectedTemplate($templateId) {
        Session::put('templateId', $templateId);

        if (Session::has('resumeId')) {
            $resumeId                = Session::get('resumeId');
            $userResume              = UserResumes::where("id", $resumeId)->first();
            $userResume->template_id = $templateId;
            $userResume->save();
        }

        return redirect()->route('resume.contact');
    }

    /* Contact Step */
    public function resumeContact($resumeId = null) {
        $templateId = Session::get('templateId');
        $resume     = [];
        $resumeEdit = true;

        if ($resumeId == null) {
            $resumeEdit = false;
        }
        if (Session::has('resumeId') && $resumeId == null) {
            $resumeId   = Session::get('resumeId');
            $resumeEdit = false;
        }

        if ($resumeId > 0) {
            $resume     = UserResumes::where('id', $resumeId)->first();
            $templateId = $resume->template_id;
        }

        $template = Template::where("id", $templateId)->first();
        return view("resume.contact", compact('template', 'resume', 'resumeEdit'));
    }

    /* Save All Steps info */
    public function saveResumeData(Request $request) {
        $isNew = true;
        if (isset($request->resume_id) && $request->resume_id > 0) {
            $isNew = false;
        }
        if (Session::has('resumeId')) {
            $isNew = false;
        }

        $resumeData = [];
        if (Auth::check()) {
            $resumeData['user_id'] = Auth::user()->id;
        }
        $templateId = Session::get('templateId');

        if (isset($request->type) && $request->type == 'contact') {
            /* Step: contact details save */

            $requestData = $request->validate([
                'name'    => 'required',
                'email'   => 'required|email',
                'phone'   => 'required|numeric',
                'address' => 'required',
                'country' => 'nullable',
                'city'    => 'nullable',
                'state'   => 'nullable',
                'zipcode' => 'nullable|numeric',
                'image'   => "nullable|mimes:jpeg,jpg,png,gif|max:50000",
            ]);

            try {
                $resumeData['complete_step'] = 1;

                if (Session::has('templateId')) {
                    $templateId                = Session::get('templateId');
                    $resumeData['template_id'] = $templateId;
                }

                if ($request->hasFile('image')) {
                    $image                = $request->file('image');
                    $imageName            = time() . '_user.' . $image->getClientOriginalExtension();
                    $imagePath            = $image->storeAs('images/user_resume/', $imageName);
                    $requestData['image'] = $imagePath;
                }

                $requestData                = array_filter($requestData);
                $resumeData['contact_info'] = json_encode($requestData);
                if ($isNew) {
                    $resumeData['title'] = "Resume " . rand(0, 100);
                    $userResume          = UserResumes::create($resumeData);
                    $this->defaultSortable($userResume->id);
                    Session::put('resumeId', $userResume->id);
                } else {
                    $resumeId   = $request->resume_id;
                    $userResume = UserResumes::where("id", $resumeId)->first();
                    $userResume->update($resumeData);
                    $userResume->save();
                    $this->defaultSortable($resumeId);
                }

                if ($request->has('resume_edit') && $request->resume_edit == true) {
                    return redirect()->route('resume.finalize', $userResume->id);
                }
                if (!empty($userResume->experience_info)) {
                    return redirect()->route('resume.experience-review');
                } else {
                    return redirect()->route('resume.experience');
                }

            } catch (\Exception $e) {
                return redirect()->back()->withError($e->getMessage());
            }
        } else if ($request->type == 'experience') {
            /* Step: Experience save */
            $requestData = $request->validate([
                'employer'    => 'nullable',
                'job_title'   => 'nullable',
                'country'     => 'nullable',
                'city'        => 'nullable',
                'state'       => 'nullable',
                'zipcode'     => 'nullable|numeric',
                'start_month' => 'nullable',
                'start_year'  => 'nullable',
                'end_month'   => 'nullable',
                'end_year'    => 'nullable',
                'is_present'  => 'nullable',
            ]);

            if (!isset($request->is_present) && $request->is_present != true) {
                if (!empty($request->start_month) && !empty($request->start_year)) {
                    $request->validate(['end_month' => 'required', 'end_year' => 'required']);
                }
            }

            if (isset($request->end_month) && isset($request->end_year)) {
                if (!empty($request->end_month) && !empty($request->end_year)) {

                    if ($request->end_year == $request->start_year) {
                        $start_month = date('m', strtotime($request->start_month));
                        $end_month   = date('m', strtotime($request->end_month));
                        if ($end_month <= $start_month) {
                            $request->validate([
                                'end_month' => "gt:$start_month",
                            ], [
                                'gt' => 'Your end month should be grater then start month',
                            ]);
                        }

                    }

                    $request->validate([
                        'end_year' => 'after_or_equal:start_year',
                    ], [
                        'after_or_equal' => 'Your end year should be equal to or grater then start year',
                    ]);
                }
            }

            try {
                $resumeData['complete_step'] = 2;
                $resumeData['template_id']   = $templateId;

                $userResume = UserResumes::where("id", $request->resume_id)->first();

                $requestData = array_filter($requestData);
                if (empty($requestData)) {
                    if ($request->has('resume_edit') && $request->resume_edit == true) {
                        return redirect()->route('resume.experience-review', $userResume->id);
                    } else {
                        return redirect()->route('resume.experience-review');
                    }
                }

                if (!isset($userResume->experience_info) || empty($userResume->experience_info)) {
                    $countExpInfo      = 0;
                    $requestData['id'] = $countExpInfo;
                } else if (isset($request->countExpInfo)) {
                    $countExpInfo      = $request->countExpInfo;
                    $requestData['id'] = $countExpInfo;
                } else {
                    $countExpInfo      = count($userResume->experience_info);
                    $requestData['id'] = $countExpInfo;
                }

                if (!isset($userResume->experience_info) || empty($userResume->experience_info)) {
                    if (!empty($requestData)) {
                        $userResume->experience_info = json_encode([$requestData]);
                    }
                } else {
                    if (!empty($requestData)) {
                        $tempArray = $userResume->experience_info;
                        if (isset($tempArray[$countExpInfo]['job_description'])) {
                            $requestData['job_description'] = $tempArray[$countExpInfo]['job_description'];
                        }

                        $tempArray[$countExpInfo]    = $requestData;
                        $userResume->experience_info = json_encode($tempArray);
                    }
                }
                $userResume->complete_step = 2;
                $userResume->save();

                if ($request->has('resume_edit') && $request->resume_edit == true) {
                    return redirect()->route('resume.experience.description.editById', [$userResume->id, $countExpInfo]);
                }
                return redirect()->route('resume.experience.description', $countExpInfo);
            } catch (\Exception $e) {
                return redirect()->back()->withError($e->getMessage());
            }
        } else if ($request->type == "experienceDescription") {
            /* Step: Experience Description save */
            $requestData = $request->validate([
                'job_description' => 'nullable',
            ]);
            try {
                $resumeData['complete_step'] = 2;

                if (isset($request->countExpInfo) && $request->countExpInfo > 0) {
                    $countExpInfo = $request->countExpInfo;
                } else {
                    $countExpInfo = 0;
                }
                $requestData                                                = array_filter($requestData);
                $userResume                                                 = UserResumes::where("id", $request->resume_id)->first();
                $userResumeExperienceInfo                                   = $userResume->experience_info;
                $userResumeExperienceInfo[$countExpInfo]['job_description'] = !empty($requestData['job_description']) ? $requestData['job_description'] : null;
                $userResume->experience_info                                = json_encode($userResumeExperienceInfo);
                $userResume->complete_step                                  = 2;
                $userResume->save();
                if ($request->has('resume_edit') && $request->resume_edit == true) {
                    return redirect()->route('resume.experience-review', $userResume->id);
                }

                return redirect()->route('resume.experience-review');
            } catch (\Exception $e) {
                return redirect()->back()->withError($e->getMessage());
            }
        } else if ($request->type == "education") {
            /* Step: Education save */
            $requestData = $request->validate([
                'school_name'      => 'nullable',
                'country'          => 'nullable',
                'city'             => 'nullable',
                'state'            => 'nullable',
                'degree'           => 'nullable',
                'field'            => 'nullable',
                'month'            => 'nullable',
                'year'             => 'nullable',
                'currently_attend' => 'nullable',
            ]);
            try {

                $userResume = UserResumes::where("id", $request->resume_id)->first();

                $requestData = array_filter($requestData);
                if (empty($requestData)) {
                    if ($request->has('resume_edit') && $request->resume_edit == true) {
                        return redirect()->route('resume.education-review', $userResume->id);
                    } else {
                        return redirect()->route('resume.education-review');
                    }
                }

                if (!isset($userResume->education) || empty($userResume->education)) {
                    $countExpInfo      = 0;
                    $requestData['id'] = $countExpInfo;
                } else if (isset($request->countExpInfo)) {
                    $countExpInfo      = $request->countExpInfo;
                    $requestData['id'] = $countExpInfo;
                } else {

                    $countExpInfo      = count($userResume->experience_info);
                    $requestData['id'] = $countExpInfo;
                }

                $userResume = UserResumes::where("id", $request->resume_id)->first();

                if (!isset($userResume->education) || empty($userResume->education)) {
                    if (!empty($requestData)) {
                        $userResume->education = json_encode([$requestData]);
                    }
                } else {
                    if (!empty($requestData)) {
                        $tempArray = $userResume->education;
                        if (isset($tempArray[$countExpInfo]) && isset($tempArray[$countExpInfo]['description'])) {
                            $requestData['description'] = $tempArray[$countExpInfo]['description'];
                        }
                        $tempArray[$countExpInfo] = $requestData;
                        $userResume->education    = json_encode($tempArray);
                    }
                }
                $userResume->complete_step = 3;
                $userResume->save();

                if ($request->has('resume_edit') && $request->resume_edit == true) {
                    return redirect()->route('resume.education.description.editById', [$userResume->id, $countExpInfo]);
                }
                return redirect()->route('resume.education.description', $countExpInfo);
            } catch (\Exception $e) {
                return redirect()->back()->withError($e->getMessage());
            }
        } else if ($request->type == "educationDescription") {
            /* Step: Education Description save */
            $requestData = $request->validate([
                'description' => 'nullable',
            ]);

            try {

                if (isset($request->countExpInfo) && $request->countExpInfo > 0) {
                    $countExpInfo = $request->countExpInfo;
                } else {
                    $countExpInfo = 0;
                }

                $requestData = array_filter($requestData);
//                if (!empty($requestData)) {
                $userResume                                        = UserResumes::where("id", $request->resume_id)->first();
                $userResumeEducation                               = $userResume->education;
                $userResumeEducation[$countExpInfo]['description'] = isset($requestData['description']) ? $requestData['description'] : null;
                $userResume->education                             = json_encode($userResumeEducation);
                $userResume->complete_step                         = 3;
                $userResume->save();
//                }
                if ($request->has('resume_edit') && $request->resume_edit == true) {
                    return redirect()->route('resume.education-review', $userResume->id);
                }

                return redirect()->route('resume.education-review');
            } catch (\Exception $e) {
                return redirect()->back()->withError($e->getMessage());
            }
        } else if ($request->type == "skills") {
            /* Step: Skills save */
            $requestData = $request->validate([
                'skills' => 'nullable',
            ]);

            try {
                $requestData = array_filter($requestData);
//                if (!empty($requestData)) {
                $userResume                = UserResumes::where("id", $request->resume_id)->first();
                $userResume->skills        = isset($requestData['skills']) ? $requestData['skills'] : null;
                $userResume->complete_step = 4;
                $userResume->save();
//                }
                if ($request->has('resume_edit') && $request->resume_id == true) {
                    return redirect()->route('resume.finalize', $userResume->id);
                }

                return redirect()->route('resume.summary');
            } catch (\Exception $e) {
                return redirect()->back()->withError($e->getMessage());
            }
        } else if ($request->type == "summary") {
            /* Step: Summary save */
            $requestData = $request->validate([
                'summary' => 'nullable',
            ]);

            try {
                $requestData = array_filter($requestData);
//                if (!empty($requestData)) {
                $userResume                = UserResumes::where("id", $request->resume_id)->first();
                $userResume->summary       = isset($requestData['summary']) ? $requestData['summary'] : null;
                $userResume->complete_step = 5;
                $userResume->save();
//                }
                if ($request->has('resume_edit') && $request->resume_id == true) {
                    return redirect()->route('resume.finalize', $request->resume_id);
                }
                return redirect()->route('resume.finalize', $request->resume_id);
            } catch (\Exception $e) {
                return redirect()->back()->withError($e->getMessage());
            }
        } else if ($request->type == "sectionDescription") {
            /* Step: Section Description save */
            $requestData = $request->validate([
                'description' => 'nullable',
            ]);

            try {
                $section = "other";
                if (isset($request->section) && !empty($request->section)) {
                    $section = $request->section;
                }
                $requestData                 = array_filter($requestData);
                $userResume                  = UserResumes::where("id", $request->resume_id)->first();
                $userResumeSection           = $userResume->extra_section;
                $userResumeSection[$section] = isset($requestData['description']) ? $requestData['description'] : null;
                $userResume->extra_section   = json_encode($userResumeSection);
                $userResume->complete_step   = 6;
                $userResume->save();
                return redirect()->route('resume.finalize', $userResume->id);
            } catch (\Exception $e) {
                return redirect()->back()->withError($e->getMessage());
            }
        } else if ($request->type == "finalize") {

            if (Auth::user()->type == 'admin') {
                Session::put("resumeId", $request->resume_id);
                return redirect()->route('front.login');
            }
            $userResume                = UserResumes::where("id", $request->resume_id)->first();
            $userResume->complete_step = 6;
            $userResume->user_id       = Auth::user()->id;
            $userResume->save();
//            return redirect()->back()->withSuccess("Your resume saved successfully.");
            return redirect()->route('user.checkout', ['resume', $request->resume_id]);

        }
    }

    /* Experience Step */
    public function experience(Request $request) {
        try {
            $templateId   = Session::get('templateId');
            $template     = Template::where("id", $templateId)->first();
            $resume       = [];
            $countExpInfo = 0;
            if (Session::has('resumeId')) {
                $resumeId = Session::get('resumeId');
                $resume   = UserResumes::where('id', $resumeId)->first();

                if (isset($resume->experience_info) && !empty($resume->experience_info)) {
                    $countExpInfo = count($resume->experience_info);
                } else if (isset($request->countExpInfo)) {
                    $countExpInfo = $request->countExpInfo;
                }

            }
            return view("resume.experience", compact('template', 'resume', 'countExpInfo'));
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /* Experience Create Step */
    public function experienceCreateById($resumeId, Request $request) {
        try {
            $resume             = UserResumes::where('id', $resumeId)->first();
            $template           = Template::where("id", $resume->template_id)->first();
            $resumeEdit         = true;
            $preWrittenContents = Prewritten_content::where("type", "experience")->orderBy("title")->get();
            $countExpInfo       = isset($resume->experience_info) && !empty($resume->experience_info) ? count($resume->experience_info) : 0;
            return view("resume.experience", compact('template', 'resume', 'countExpInfo', 'preWrittenContents', 'resumeEdit'));
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /* Experience Edit Step */
    public function experienceEdit($countExpInfo, Request $request) {
        try {
            $templateId = Session::get('templateId');
            $template   = Template::where("id", $templateId)->first();
            $resume     = [];

            if (Session::has('resumeId')) {
                $resumeId = Session::get('resumeId');
                $resume   = UserResumes::where('id', $resumeId)->first();
            }
            $preWrittenContents = Prewritten_content::where("type", "experience")->orderBy("title")->get();
            return view("resume.experience", compact('template', 'resume', 'countExpInfo', 'preWrittenContents'));
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /* Experience Edit By Id Step */
    public function experienceEditById($resumeId, $countExpInfo, Request $request) {
        try {
            $resume             = UserResumes::where('id', $resumeId)->first();
            $template           = Template::where("id", $resume->template_id)->first();
            $resumeEdit         = true;
            $preWrittenContents = Prewritten_content::where("type", "experience")->orderBy("title")->get();

            return view("resume.experience", compact('template', 'resume', 'countExpInfo', 'preWrittenContents', 'resumeEdit'));
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /* Experience Delete Step */
    public function experienceDelete($resumeId, $countExpInfo, Request $request) {
        try {
            $resume = UserResumes::where('id', $resumeId)->first();
            if (isset($resume->experience_info) && !empty($resume->experience_info)) {
                $count     = 0;
                $tempArray = [];
                foreach ($resume->experience_info as $key => $experience) {
                    if (isset($experience['id']) && $experience['id'] == $countExpInfo && $key == $countExpInfo) {
                        //remove array elements
                    } else {
                        $experience['id']    = $count;
                        $tempArray[$count++] = $experience;
                    }
                }
                $resume->experience_info = json_encode($tempArray);
                $resume->save();
            }

            if (Session::has('resumeId')) {
                return redirect()->route('resume.experience-review')->withSuccess("Experience deleted successfully.");
            }
            return redirect()->route('resume.experience-review', $resumeId)->withSuccess("Experience deleted successfully.");
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /* Experience Description Step */
    public function experienceDescription($countExpInfo) {
        try {
            $templateId = Session::get('templateId');
            $template   = Template::where("id", $templateId)->first();
            $resume     = [];
            if (Session::has('resumeId')) {
                $resumeId = Session::get('resumeId');
                $resume   = UserResumes::where('id', $resumeId)->first();
//            echo "<pre>";print_r($resume->toArray());exit();
            }
            $preWrittenContents = Prewritten_content::where("type", "experience")->orderBy("title")->get();
            return view("resume.experience_description", compact('template', 'resume', 'countExpInfo', 'preWrittenContents'));
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /* Experience Description Edit Step */
    public function experienceDescriptionEditById($resumeId, $countExpInfo) {
        try {
            $templateId         = Session::get('templateId');
            $template           = Template::where("id", $templateId)->first();
            $resume             = UserResumes::where('id', $resumeId)->first();
            $preWrittenContents = Prewritten_content::where("type", "experience")->orderBy("title")->get();
            $resumeEdit         = true;
            return view("resume.experience_description", compact('template', 'resume', 'countExpInfo', 'preWrittenContents', 'resumeEdit'));
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function experienceReview($resumeId = 0) {
        try {
            $templateId = Session::get('templateId');
            $resume     = [];
            $resumeEdit = true;
            if (Session::has('resumeId') && $resumeId == 0) {
                $resumeId   = Session::get('resumeId');
                $resumeEdit = false;
            }

            if ($resumeId > 0) {
                $resume     = UserResumes::where('id', $resumeId)->first();
                $templateId = $resume->template_id;
                if (isset($resume->exprinace_info) && empty($resume->exprinace_info)) {
                    return redirect()->route('resume.experience');
                }
            }

            $template = Template::where("id", $templateId)->first();

            return view("resume.experience_review", compact('template', 'resume', 'resumeEdit'));
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /* Education Step */
    public function education(Request $request) {
        try {
            $templateId   = Session::get('templateId');
            $template     = Template::where("id", $templateId)->first();
            $resume       = [];
            $countExpInfo = 0;
            if (Session::has('resumeId')) {
                $resumeId = Session::get('resumeId');
                $resume   = UserResumes::where('id', $resumeId)->first();

                if (isset($resume->education) && !empty($resume->education)) {
                    $countExpInfo = count($resume->experience_info);
                } else if (isset($request->countExpInfo)) {
                    $countExpInfo = $request->countExpInfo;
                }

            }

            $degrees = Degree::orderBy("name")->get();
            return view("resume.education", compact('template', 'resume', 'countExpInfo', 'degrees'));
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /* Education Create Step */
    public function educationCreateById($resumeId, Request $request) {
        try {
            $resume       = UserResumes::where('id', $resumeId)->first();
            $template     = Template::where("id", $resume->template_id)->first();
            $resumeEdit   = true;
            $countExpInfo = isset($resume->education) && !empty($resume->education) ? count($resume->education) : 0;
            $degrees      = Degree::orderBy("name")->get();
            return view("resume.education", compact('template', 'resume', 'countExpInfo', 'degrees', 'resumeEdit'));
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /* Education Edit Step */
    public function educationEdit($countExpInfo, Request $request) {
        try {
            $templateId = Session::get('templateId');
            $template   = Template::where("id", $templateId)->first();
            $resume     = [];

            if (Session::has('resumeId')) {
                $resumeId = Session::get('resumeId');
                $resume   = UserResumes::where('id', $resumeId)->first();
            }
            $degrees = Degree::orderBy("name")->get();
            return view("resume.education", compact('template', 'resume', 'countExpInfo', 'degrees'));
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /* Education Edit By Id Step */
    public function educationEditById($resumeId, $countExpInfo, Request $request) {
        $resume     = UserResumes::where('id', $resumeId)->first();
        $template   = Template::where("id", $resume->template_id)->first();
        $resumeEdit = true;
        $degrees    = Degree::orderBy("name")->get();
        return view("resume.education", compact('template', 'resume', 'countExpInfo', 'degrees', 'resumeEdit'));
    }

    /* Education Delete Step */
    public function educationDelete($resumeId, $countExpInfo, Request $request) {
        try {
            $resume = UserResumes::where('id', $resumeId)->first();
            if (isset($resume->education) && !empty($resume->education)) {
                $count     = 0;
                $tempArray = [];
                foreach ($resume->education as $key => $education) {

                    if (isset($education['id']) && $education['id'] == $countExpInfo && $key == $countExpInfo) {
                        //remove array elements
                    } else {
                        $education['id']     = $count;
                        $tempArray[$count++] = $education;
                    }
                }
                $resume->education = json_encode($tempArray);
                $resume->save();
            }

            if (Session::has('resumeId')) {
                return redirect()->route('resume.education-review')->withSuccess("Education deleted successfully.");
            }
            return redirect()->route('resume.education-review', $resumeId)->withSuccess("Education deleted successfully.");
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /* Education Description Step */
    public function educationDescription($countExpInfo) {
        try {
            $templateId = Session::get('templateId');
            $template   = Template::where("id", $templateId)->first();
            $resume     = [];
            if (Session::has('resumeId')) {
                $resumeId = Session::get('resumeId');
                $resume   = UserResumes::where('id', $resumeId)->first();
//            echo "<pre>";print_r($resume->toArray());exit();
            }
            $preWrittenContents = Prewritten_content::where("type", "education")->orderBy("title")->get();
            return view("resume.education_description", compact('template', 'resume', 'countExpInfo', 'preWrittenContents'));
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /* Experience Description Edit Step */
    public function educationDescriptionEditById($resumeId, $countExpInfo) {
        try {
            $templateId         = Session::get('templateId');
            $template           = Template::where("id", $templateId)->first();
            $resume             = UserResumes::where('id', $resumeId)->first();
            $preWrittenContents = Prewritten_content::where("type", "education")->orderBy("title")->get();
            $resumeEdit         = true;
            return view("resume.education_description", compact('template', 'resume', 'countExpInfo', 'preWrittenContents', 'resumeEdit'));
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /* Education Review */
    public function educationReview($resumeId = 0) {
        try {
            $templateId = Session::get('templateId');
            $resume     = [];
            $resumeEdit = true;
            if (Session::has('resumeId') && $resumeId == 0) {
                $resumeId   = Session::get('resumeId');
                $resumeEdit = false;
            }

            if ($resumeId > 0) {
                $resume     = UserResumes::where('id', $resumeId)->first();
                $templateId = $resume->template_id;
                if (isset($resume->education) && empty($resume->education)) {
                    return redirect()->route('resume.education');
                }
            }
            $template = Template::where("id", $templateId)->first();

            return view("resume.education_review", compact('template', 'resume', 'resumeEdit'));
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /* Skills Step */
    public function skills(Request $request, $resumeId = 0) {
        try {
            $templateId = Session::get('templateId');

            $resume       = [];
            $countExpInfo = 0;
            $resumeEdit   = true;
            if (Session::has('resumeId') && $resumeId == 0) {
                $resumeId   = Session::get('resumeId');
                $resumeEdit = false;
            }

            if ($resumeId > 0) {
                $resume     = UserResumes::where('id', $resumeId)->first();
                $templateId = $resume->template_id;
                if (isset($resume->education) && !empty($resume->education)) {
                    $countExpInfo = count($resume->experience_info);
                } else if (isset($request->countExpInfo)) {
                    $countExpInfo = $request->countExpInfo;
                }
            }

            $template           = Template::where("id", $templateId)->first();
            $preWrittenContents = Prewritten_content::where("type", "skills")->orderBy("title")->get();
            return view("resume.skills", compact('template', 'resume', 'countExpInfo', 'preWrittenContents', 'resumeEdit'));
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /* Education Edit Step */
    public function skillsEdit($countExpInfo, Request $request) {
        try {
            $templateId = Session::get('templateId');
            $template   = Template::where("id", $templateId)->first();
            $resume     = [];

            if (Session::has('resumeId')) {
                $resumeId = Session::get('resumeId');
                $resume   = UserResumes::where('id', $resumeId)->first();
            }
            $preWrittenContents = Prewritten_content::where("type", "skills")->orderBy("title")->get();
            return view("resume.skills", compact('template', 'resume', 'countExpInfo', 'preWrittenContents'));
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /* Summary Edit Step */
    public function summary(Request $request, $resumeId = 0) {
        try {
            $resume       = [];
            $countExpInfo = 0;
            $resumeEdit   = true;
            if (Session::has('resumeId') && $resumeId == 0) {
                $resumeId   = Session::get('resumeId');
                $resumeEdit = false;
            }

            if ($resumeId > 0) {
                $resume = UserResumes::where('id', $resumeId)->first();
                if (isset($resume->education) && !empty($resume->education)) {
                    $countExpInfo = count($resume->experience_info);
                } else if (isset($request->countExpInfo)) {
                    $countExpInfo = $request->countExpInfo;
                }
            }

            $preWrittenContents = Prewritten_content::where("type", "summary")->orderBy("title")->get();
            return view("resume.summary", compact('resume', 'countExpInfo', 'preWrittenContents', 'resumeEdit'));
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /* Extra Section Step */
    public function section($resumeId, $section, Request $request) {
        try {
            $resume             = UserResumes::where('id', $resumeId)->first();
            $preWrittenContents = Prewritten_content::where("type", $section)->orderBy("title")->get();
            $sections           = ["Community Service", "Language", "Affiliations", "Awards", "Additional Information", "Publication", "Accomplishments"];
            return view("resume.section", compact('resume', 'section', 'preWrittenContents', 'sections'));
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function finalize($resumeId, Request $request) {
        try {
            $resume    = UserResumes::with(['template','user'])->where('id', $resumeId)->first();
            $templates = Template::where("type", 'resume')->where('is_active', true)->get();
            $sections  = ["Community Service", "Language", "Affiliations", "Awards", "Additional Information", "Publication", "Accomplishments"];
            return view("resume.finalize", compact('resume', 'templates', 'sections'));
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function resumeUpdate($resumeId, Request $request) {
        try {
            $resume        = UserResumes::with('template')->where('id', $resumeId)->first();
            $resume->title = $request->title;
            $resume->save();
            return redirect()->back()->withSucess("Resume renamed successfully.");
//            return redirect()->route('resume.finalize', $resumeId);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function updateAjax($resumeId, Request $request) {
        try {
            $resume        = UserResumes::with('template')->where('id', $resumeId)->first();
            $resume->title = $request->title;
            $resume->save();

            return '1';
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function downloadPDF($resumeId, Request $request) {
        try {
            if (!Auth::check()) {
                Session::put("resumeId", $resumeId);
                return redirect()->route('front.registration');
            }

            if (Auth::user()->type == 'admin') {
                Session::put("resumeId", $resumeId);
                return redirect()->route('front.login');
            }
            $resume = UserResumes::with('template')->where('id', $resumeId)->first();
//            return view('template.resume.common', ['resume' => $resume]);

            // return $resume;
//            $payment = Payment::where("user_id", Auth::user()->id)/*->where("is_active", true)*/->orderBy("created_at", "DESC")->first();

            /*if (empty($payment)) {
                return redirect()->route('user.checkout',['type' => 'resume','id' => $resume->id]);
            }*/
            $sections = ["Community Service", "Language", "Affiliations", "Awards", "Additional Information", "Publication", "Accomplishments"];
            $fileName = $resume->title . ".pdf";

            // $pdf = PDF::loadView('template.resume.common', ['resume' => $resume, 'sections' => $sections]);
            switch ($resume->template_id) {
            case 15:
//                $html = view('template.resume.resume-1', ['resume' => $resume, 'sections' => $sections])->render();
                 $pdf = PDF::loadView('template.resume.resume-1', ['resume' => $resume, 'sections' => $sections]);
                break;
            case 16:
//                $html = view('template.resume.resume-6', ['resume' => $resume, 'sections' => $sections])->render();
                 $pdf = PDF::loadView('template.resume.resume-6', ['resume' => $resume, 'sections' => $sections]);
                break;
            case 17:
//                $html = view('template.resume.resume-21', ['resume' => $resume, 'sections' => $sections])->render();
                 $pdf = PDF::loadView('template.resume.resume-21', ['resume' => $resume, 'sections' => $sections]);
                break;
            case 18:
//                $html = view('template.resume.resume-22', ['resume' => $resume, 'sections' => $sections])->render();
                 $pdf = PDF::loadView('template.resume.resume-22', ['resume' => $resume, 'sections' => $sections]);
                break;
            case 19:
//                $html = view('template.resume.resume-23', ['resume' => $resume, 'sections' => $sections])->render();
                 $pdf = PDF::loadView('template.resume.resume-23', ['resume' => $resume, 'sections' => $sections]);
                break;
            case 20:
//                $html = view('template.resume.resume-24', ['resume' => $resume, 'sections' => $sections])->render();
                 $pdf = PDF::loadView('template.resume.resume-24', ['resume' => $resume, 'sections' => $sections]);
                break;
            case 21:
//                $html = view('template.resume.resume-24', ['resume' => $resume, 'sections' => $sections])->render();
                  $pdf = PDF::loadView('template.resume.resume-25', ['resume' => $resume, 'sections' => $sections]);
                    break;
            case 22:
//                $html = view('template.resume.resume-24', ['resume' => $resume, 'sections' => $sections])->render();
                $pdf = PDF::loadView('template.resume.resume-26', ['resume' => $resume, 'sections' => $sections]);
                break;
            case 23:
//                $html = view('template.resume.resume-24', ['resume' => $resume, 'sections' => $sections])->render();
                $pdf = PDF::loadView('template.resume.resume-27', ['resume' => $resume, 'sections' => $sections]);
                break;
            case 24:
//                $html = view('template.resume.resume-24', ['resume' => $resume, 'sections' => $sections])->render();
                $pdf = PDF::loadView('template.resume.resume-28', ['resume' => $resume, 'sections' => $sections]);
                break;
            case 25:
//                $html = view('template.resume.resume-24', ['resume' => $resume, 'sections' => $sections])->render();
                    $pdf = PDF::loadView('template.resume.resume-29', ['resume' => $resume, 'sections' => $sections]);
                    break;
            case 26:
//                $html = view('template.resume.resume-24', ['resume' => $resume, 'sections' => $sections])->render();
                    $pdf = PDF::loadView('template.resume.resume-30', ['resume' => $resume, 'sections' => $sections]);
                    break;
            case 27:
//                $html = view('template.resume.resume-24', ['resume' => $resume, 'sections' => $sections])->render();
                    $pdf = PDF::loadView('template.resume.resume-2', ['resume' => $resume, 'sections' => $sections]);
                    break;
            case 28:
//                $html = view('template.resume.resume-24', ['resume' => $resume, 'sections' => $sections])->render();
                    $pdf = PDF::loadView('template.resume.resume-3', ['resume' => $resume, 'sections' => $sections]);
                    break;
            case 29:
//                $html = view('template.resume.resume-24', ['resume' =$pdf = PDF::loadView('pdf.invoice', $data);> $resume, 'sections' => $sections])->render();
                    $pdf = PDF::loadView('template.resume.resume-4', ['resume' => $resume, 'sections' => $sections]);
                    break;
            case 30:
//                $html = view('template.resume.resume-24', ['resume' => $resume, 'sections' => $sections])->render();
                    $pdf = PDF::loadView('template.resume.resume-5', ['resume' => $resume, 'sections' => $sections]);
                    break;
            default:
//                $html = view('template.resume.common', ['resume' => $resume, 'sections' => $sections])->render();
                 $pdf = PDF::loadView('template.resume.common', ['resume' => $resume, 'sections' => $sections]);
            }

            return $pdf->download($fileName);
        } catch (\Exception $e) {

            return redirect()->back()->withError($e->getMessage());
        }

    }

    public function printPreview($resumeId, Request $request) {
        try {
//            if (!Auth::check()) {
            ////                $resumeData['user_id'] = Auth::user()->id;
            //                Session::put("resumeId", $resumeId);
            //                return redirect()->route('front.registration');
            //            }

            $resume = UserResumes::with('template')->where('id', $resumeId)->first();

            switch ($resume->template_id) {
            case 15:
                return view('template.resume.resume-1', ['resume' => $resume]);
                break;
            case 16:
                return view('template.resume.resume-6', ['resume' => $resume]);
                break;
            case 17:
                return view('template.resume.resume-21', ['resume' => $resume]);
                break;
            case 18:
                return view('template.resume.resume-22', ['resume' => $resume]);
                break;
            case 19:
                return view('template.resume.resume-23', ['resume' => $resume]);
                break;
            case 20:
                return view('template.resume.resume-24', ['resume' => $resume]);
                break;
            case 21:
                return view('template.resume.resume-25', ['resume' => $resume]);
                break;
            case 22:
                return view('template.resume.resume-26', ['resume' => $resume]);
                break;
            case 23:
                return view('template.resume.resume-27', ['resume' => $resume]);
                break;
            case 24:
                return view('template.resume.resume-28', ['resume' => $resume]);
                break;
            case 25:
                return view('template.resume.resume-29', ['resume' => $resume]);
                break;
            case 26:
                return view('template.resume.resume-30', ['resume' => $resume]);
                break;
            case 27:
                return view('template.resume.resume-2', ['resume' => $resume]);
                break;
            case 28:
                return view('template.resume.resume-3', ['resume' => $resume]);
                break;
            case 29:
                return view('template.resume.resume-4', ['resume' => $resume]);
                break;
            case 30:
                return view('template.resume.resume-5', ['resume' => $resume]);
                break;
            default:
                return view('template.resume.common', ['resume' => $resume]);
            }
            // return view('template.resume.common', ['resume' => $resume]);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }

    }

    public function sendEmail($resumeId, Request $request) {
        try {
            if (!Auth::check()) {
                Session::put("resumeId", $resumeId);
                return redirect()->route('front.login');
            }

            if (Auth::user()->type == 'admin') {
                Session::put("resumeId", $resumeId);
                return redirect()->route('front.login');
            }
            $resume = UserResumes::with('template', 'user')->where('id', $resumeId)->first();

            if (empty($resume->user)) {
                Session::put("resumeId", $resumeId);
                return redirect()->route('front.registration');
            }
            $sections = ["Community Service", "Language", "Affiliations", "Awards", "Additional Information", "Publication", "Accomplishments"];

            switch ($resume->template_id) {
            case 15:
                $html = view('template.resume.resume-1', ['resume' => $resume, 'sections' => $sections])->render();
                // $pdf = PDF::loadView('template.resume.resume-1', ['resume' => $resume, 'sections' => $sections]);
                break;
            case 16:
                $html = view('template.resume.resume-6', ['resume' => $resume, 'sections' => $sections])->render();
                // $pdf = PDF::loadView('template.resume.resume-6', ['resume' => $resume, 'sections' => $sections]);
                break;
            case 17:
                $html = view('template.resume.resume-21', ['resume' => $resume, 'sections' => $sections])->render();
                // $pdf = PDF::loadView('template.resume.resume-21', ['resume' => $resume, 'sections' => $sections]);
                break;
            case 18:
                $html = view('template.resume.resume-22', ['resume' => $resume, 'sections' => $sections])->render();
                // $pdf = PDF::loadView('template.resume.resume-22', ['resume' => $resume, 'sections' => $sections]);
                break;
            case 19:
                $html = view('template.resume.resume-23', ['resume' => $resume, 'sections' => $sections])->render();
                // $pdf = PDF::loadView('template.resume.resume-23', ['resume' => $resume, 'sections' => $sections]);
                break;
            case 20:
                $html = view('template.resume.resume-24', ['resume' => $resume, 'sections' => $sections])->render();
                // $pdf = PDF::loadView('template.resume.resume-24', ['resume' => $resume, 'sections' => $sections]);
                break;
            case 21:
//                $html = view('template.resume.resume-24', ['resume' => $resume, 'sections' => $sections])->render();
                $pdf = PDF::loadView('template.resume.resume-25', ['resume' => $resume, 'sections' => $sections]);
                break;
            case 22:
//                $html = view('template.resume.resume-24', ['resume' => $resume, 'sections' => $sections])->render();
                $pdf = PDF::loadView('template.resume.resume-26', ['resume' => $resume, 'sections' => $sections]);
                break;
            case 23:
//                $html = view('template.resume.resume-24', ['resume' => $resume, 'sections' => $sections])->render();
                $pdf = PDF::loadView('template.resume.resume-27', ['resume' => $resume, 'sections' => $sections]);
                break;
            case 24:
//                $html = view('template.resume.resume-24', ['resume' => $resume, 'sections' => $sections])->render();
                $pdf = PDF::loadView('template.resume.resume-28', ['resume' => $resume, 'sections' => $sections]);
                break;
            case 25:
//                $html = view('template.resume.resume-24', ['resume' => $resume, 'sections' => $sections])->render();
                $pdf = PDF::loadView('template.resume.resume-29', ['resume' => $resume, 'sections' => $sections]);
                break;
            case 26:
//                $html = view('template.resume.resume-24', ['resume' => $resume, 'sections' => $sections])->render();
                $pdf = PDF::loadView('template.resume.resume-30', ['resume' => $resume, 'sections' => $sections]);
                break;
            case 27:
//                $html = view('template.resume.resume-24', ['resume' => $resume, 'sections' => $sections])->render();
                $pdf = PDF::loadView('template.resume.resume-2', ['resume' => $resume, 'sections' => $sections]);
                break;
            case 28:
//                $html = view('template.resume.resume-24', ['resume' => $resume, 'sections' => $sections])->render();
                $pdf = PDF::loadView('template.resume.resume-3', ['resume' => $resume, 'sections' => $sections]);
                break;
            case 29:
//                $html = view('template.resume.resume-24', ['resume' => $resume, 'sections' => $sections])->render();
                $pdf = PDF::loadView('template.resume.resume-4', ['resume' => $resume, 'sections' => $sections]);
                break;
            case 30:
//                $html = view('template.resume.resume-24', ['resume' => $resume, 'sections' => $sections])->render();
                    $pdf = PDF::loadView('template.resume.resume-5', ['resume' => $resume, 'sections' => $sections]);
                    break;
            default:
                $html = view('template.resume.common', ['resume' => $resume, 'sections' => $sections])->render();
                // $pdf = PDF::loadView('template.resume.common', ['resume' => $resume, 'sections' => $sections]);
            }

            // $pdf = PDF::loadView('template.resume.common', ['resume' => $resume, 'sections' => $sections]);

            $client   = new \GuzzleHttp\Client();
            $response = $client->request('POST', 'https://hcti.io/v1/image', [
                'auth'        => ['ee03af00-4789-4c99-b2b2-9b2f8c78b980', '27a07187-24e4-4fe7-992c-7aafe0f081b1'],
                'form_params' => ['html' => $html],
            ]);
            $responseUrl = json_decode($response->getBody(), true);
            $url         = $responseUrl['url'];
            $pdf         = PDF::loadHTML('<img width="100%" src="' . $url . '">');

            $fileName = $resume->title . ".pdf";
            $user     = $resume->user->toArray();
            Mail::send('emails.send_resume', ["user" => $user], function ($message) use ($user, $pdf, $fileName) {
                $message->to($user['email'], $user['name'])
                    ->subject("Your resume is $fileName")
                    ->attachData($pdf->output(), $fileName);
            });
            return redirect()->back()->withSuccess("Please check Your email address " . $user['email']);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }

    }

    public function updateStyle($resumeId, Request $request) {
        /* Step: Style  save */
        $requestData = $request->validate([
            'type'  => 'required',
            'value' => 'nullable',
        ]);
        try {
            $userResume                     = UserResumes::where("id", $resumeId)->first();
            $userResumeData                 = $userResume->style_section;
            $userResumeData[$request->type] = $request->value;
            $userResume->style_section      = json_encode($userResumeData);
            $userResume->save();
            echo "style updated successfully.";
            exit();
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function restStyle($resumeId, Request $request) {
        try {
            $userResume                = UserResumes::where("id", $resumeId)->first();
            $userResume->style_section = null;
            $userResume->save();
            return redirect()->back()->withSuccess("Applied default style successfully.");
        } catch (\Exception $e) {
            return redirect()->back()->withError("Error: " . $e->getMessage());
        }
    }

    public function copyResume($resumeId, Request $request) {
        try {
            $userResume           = UserResumes::where("id", $resumeId)->first();
            $newUserResume        = $userResume->replicate();
            $newUserResume->title = "Copy Of " . $userResume->title;
            $newUserResume->save();
            return redirect()->back()->withSuccess("Resume duplicated successfully.");
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function deleteResume($resumeId, Request $request) {
        try {
            UserResumes::where("id", $resumeId)->delete();
            return redirect()->back()->withSuccess("Resume deleted successfully.");
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /* Update Template Step */
    public function updateTemplate($resumeId, $templateId) {
        try {
            $resume                = UserResumes::where("id", $resumeId)->first();
            $resume->template_id   = $templateId;
            $resume->style_section = null;
            $resume->save();

            return redirect()->back()->withSuccess("Template applied successfully.");
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function uploadResume(Request $request) {
        $requestData = $request->validate([
            'upload_file' => 'required|mimes:pdf|max:10000',
        ]);

        try {
            $file       = $request->file('upload_file');
            $title      = strstr($file->getClientOriginalName(), ".", true);
            $fileName   = time() . '_resume.' . $file->getClientOriginalExtension();
            $filePath   = $file->storeAs('resume', $fileName);
            $userResume = UserResumes::create(['upload_file' => $filePath, "template_id" => 1, "title" => $title]);
            $this->defaultSortable($userResume->id);

//            echo "<pre>";print_r($userResume->toArray());exit();
            $resumeData = $this->makeResumeContent($filePath, $userResume);

//            echo "<pre>";print_r($resumeData);exit();

            Session::put('resumeUploaded', true);
            Session::put('resumeId', $userResume->id);

            return redirect()->route('resume.choose-template');
//            upload_file
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }

    }

    public function makeResumeContent($filePath, $userResume) {
        try {
            // return asset('storage/' . $filePath);
            $file      = asset('storage/' . $filePath);
            $PDFParser = new Parser();
            $pdf       = $PDFParser->parseFile($file);
            $pages     = $pdf->getPages();
            $text      = "";
            foreach ($pages as $page) {
                $text .= $page->getText();
            }

            $data         = [];
            $parts        = preg_split('/[\n]+/', $text);
            $parts        = preg_replace('/\s+/', ' ', $parts);
            $parts        = array_filter($parts);
            $emailPattern = '/[a-z0-9_\-\+\.]+@[a-z0-9\-]+\.([a-z]{2,4})(?:\.[a-z]{2})?/i';
            if (count($parts) > 1) {

                $parts_trimmed = array_map(function ($el) {return str_replace(' ', '', $el);}, $parts);

                $emailMatches = preg_grep($emailPattern, $parts_trimmed);
                if (isset($emailMatches) && count($emailMatches) > 0) {
                    $emailData = $emailMatches[array_key_first($emailMatches)];
                    preg_match($emailPattern, $emailData, $output);
                    $data['contact_info']['email'] = isset($output[0]) ? $output[0] : '';
                }

                $re1 = '((?:[a-z][a-z]+))';
                if ($data) {
                    if ($c = preg_match_all("/" . $re1 . "/is", $data['contact_info']['email'], $matches)) {
                        $name                         = $matches[1][0];
                        $nameMatches                  = preg_grep("/" . $name . "[^.@]/is", $parts);
                        $data['contact_info']['name'] = isset($nameMatches[0]) ? $nameMatches[0] : $name;
                    }
                }

                $phonePattern1  = "/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/";
                $phonePattern2  = "/^[0-9]{10,15}$/";
                $phonePattern3  = '/^[0-9\-\(\)\/\+\s]*$/';
                $phonePattern05 = '/[0-9]{3}[\-][0-9]{6}|[0-9]{3}[\s][0-9]{6}|[0-9]{3}[\s][0-9]{3}[\s][0-9]{4}|[0-9]{9}|[0-9]{3}[\-][0-9]{3}[\-][0-9]{4}|[0-9]{9,16}/';
                $parts_in_text  = implode(' ', $parts);
                $parts_in_text  = preg_replace('/[\x00-\x1F\x7F-\xFF]/', '', $parts_in_text);

                $phoneMatches = '';
                $phoneText    = str_replace(array('\'', '"', ',', ';', '<', '>', '(', ')', '[', ']', '-', '+', '{'), '', $parts_in_text);

                if (preg_match_all($phonePattern05, $phoneText, $phoneMatches)) {
                    $phoneMatches                  = isset($phoneMatches[0][0]) ? $phoneMatches[0][0] : '';
                    $data['contact_info']['phone'] = str_replace(' ', '', $phoneMatches);
                }

                if (!empty($phoneMatches = array_filter(preg_grep($phonePattern3, $parts))) ||
                    !empty($phoneMatches = array_filter(preg_grep($phonePattern2, $parts))) ||
                    !empty($phoneMatches = array_filter(preg_grep($phonePattern1, $parts)))) {
                    $phone = $phoneMatches[array_key_first($phoneMatches)];
                    if (strlen($phone) >= 10 && strlen($phone) <= 14) {
                        $data['contact_info']['phone'] = $phone;
                    }
                }

                $phonePattern4 = "/phone/i";
                $phoneResult1  = preg_grep($phonePattern4, $parts);
                $phoneResult1  = preg_replace('/\s+/', ' ', $phoneResult1);
                if (!empty($phoneResult1)) {
                    $phoneResult1 = $phoneResult1[array_key_first($phoneResult1)];
                    $res          = preg_replace("/[^0-9]/", "", $phoneResult1);
                    if (!empty($res)) {
                        $data['contact_info']['phone'] = substr($res, 0, 12);
                    }
                }

                $addressPattern1 = "/address/i";
                $addressResult1  = preg_grep($addressPattern1, $parts);
                $addressResult1  = preg_replace('/\s+/', ' ', $addressResult1);

                if (!empty($addressResult1)) {
                    $addressResult1                  = $addressResult1[array_key_first($addressResult1)];
                    $addressResult1                  = preg_replace($addressPattern1, "", $addressResult1);
                    $data['contact_info']['address'] = preg_replace("/[^a-zA-Z0-9,\- ]/", "", $addressResult1);
                    $data['contact_info']['address'] = trim($data['contact_info']['address']);
                }

                //address
                if (empty($data['contact_info']['address']) && isset($parts[3])) {
                    $data['contact_info']['address'] = $parts[3];
                    $arr                             = explode(',', $parts[3]);
                    if (isset($arr) && count($arr) > 0) {
                        if (isset($arr[0])) {
                            $data['contact_info']['address'] = $arr[0];
                        }

                        if (isset($arr[1])) {
                            $data['contact_info']['city'] = $arr[1];
                        }

                        if (isset($arr[2])) {
                            $data['contact_info']['state'] = $arr[2];
                        }

                        if (isset($arr[3])) {
                            $arrCountryZip                   = explode('-', $arr[3]);
                            $data['contact_info']['country'] = $arrCountryZip[0];
                            $data['contact_info']['zipcode'] = isset($arrCountryZip[1]) ? $arrCountryZip[1] : '';
                        }

                    }
                }

                //echo "<pre>"; print_r(str_replace("  ","-+-",$phoneText)); die;

                $pincodeMatches  = '';
                $pincodePattern1 = "/[1-9]{1}[0-9]{5}/";
                if (!isset($data['contact_info']['zipcode']) || $data['contact_info']['zipcode'] == '') {
                    if (preg_match_all($pincodePattern1, $phoneText, $pincodeMatches)) {
                        $pincodeMatches                  = isset($pincodeMatches[0][0]) ? $pincodeMatches[0][0] : '';
                        $data['contact_info']['zipcode'] = $pincodeMatches;

                    }
                }
                //echo "<pre>"; print_r(987); die;

                $summaryMatches = preg_grep("/summary/i", $parts);
                if (!empty($summaryMatches)) {
                    for ($i = array_key_first($summaryMatches) + 1; $i < count($parts); $i++) {
                        $parts[$i] = preg_replace('/\s+/', ' ', $parts[$i]);
//                        echo"<pre>";print_r($parts[$i]);
                        if (!empty($parts[$i])) {
                            if ($this->checkOtherConditions($parts[$i], 'summary')) {
                                $userResume->summary .= $parts[$i] . "\n";
                            } else {
                                if (empty($userResume->summary) || $userResume->summary == "") {
                                    $userResume->summary .= $parts[$i] . "\n";
                                } else {
                                    break;
                                }

                            }
                        }
                    }
                }
//                echo"<pre>";print_r($userResume->summary);exit();

                /* Objective */
                $objectiveMatches = preg_grep("/objective/i", $parts);
                if (!empty($objectiveMatches)) {
                    for ($i = array_key_first($objectiveMatches) + 1; $i < count($parts); $i++) {
                        if ($this->checkOtherConditions($parts[$i], 'objective')) {
                            $data['extra_section']['objective'] .= $parts[$i] . "\n";
                        } else {
                            break;
                        }
                    }
                }

                /* Skill */
                $skillMatches = preg_grep("/skill/i", $parts);

                if (!empty($skillMatches)) {
                    for ($i = array_key_first($skillMatches) + 1; $i < count($parts); $i++) {
                        if ($this->checkOtherConditions($parts[$i], 'skill')) {
                            $userResume->skills .= $parts[$i] . "\n";
                        } else {
                            break;
                        }
                    }
                }
//                echo "<pre>";print_r($userResume->skills);exit();

                $communityMatches = preg_grep("/community/i", $parts);
                if (!empty($communityMatches)) {
                    for ($i = array_key_first($communityMatches) + 1; $i < count($parts); $i++) {
                        $parts[$i] = preg_replace('/\s+/', ' ', $parts[$i]);
                        if ($this->checkOtherConditions($parts[$i], 'community')) {
                            if (isset($data['extra_section']['Community Service'])) {
                                $data['extra_section']['Community Service'] .= preg_replace('/[^(\x20-\x7F)]*/', '', $parts[$i]) . "\n";
                            } else {
                                $data['extra_section']['Community Service'] = preg_replace('/[^(\x20-\x7F)]*/', '', $parts[$i]) . "\n";
                            }
                        } else {
                            break;
                        }
                    }
                }
//                echo "<pre>";print_r($data['extra_section']);exit();

                $languageMatches = preg_grep("/language/i", $parts);
                if (!empty($languageMatches)) {
                    for ($i = array_key_first($languageMatches) + 1; $i < count($parts); $i++) {
                        $parts[$i] = preg_replace('/\s+/', ' ', $parts[$i]);
                        if ($this->checkOtherConditions($parts[$i], 'language')) {
                            if (isset($data['extra_section']['Language'])) {
                                $data['extra_section']['Language'] .= preg_replace('/[^(\x20-\x7F)]*/', '', $parts[$i]) . "\n";
                            } else {
                                $data['extra_section']['Language'] = preg_replace('/[^(\x20-\x7F)]*/', '', $parts[$i]) . "\n";
                            }
                        } else {
                            break;
                        }
                    }
                }
//                echo "<pre>";print_r($data);exit();

                $affiliationsMatches = preg_grep("/affiliations/i", $parts);
                if (!empty($affiliationsMatches)) {
                    for ($i = array_key_first($affiliationsMatches) + 1; $i < count($parts); $i++) {
                        $parts[$i] = preg_replace('/\s+/', ' ', $parts[$i]);
                        if ($this->checkOtherConditions($parts[$i], 'affiliations')) {

                            if (isset($data['extra_section']['Affiliations'])) {
                                $data['extra_section']['Affiliations'] .= preg_replace('/[^(\x20-\x7F)]*/', '', $parts[$i]) . "\n";
                            } else {
                                $data['extra_section']['Affiliations'] = preg_replace('/[^(\x20-\x7F)]*/', '', $parts[$i]) . "\n";
                            }
                        } else {
                            break;
                        }
                    }
                }
//                echo "<pre>";print_r($data['extra_section']);exit();

                $additionalMatches = preg_grep("/additional information/i", $parts);
                if (!empty($additionalMatches)) {
                    for ($i = array_key_first($additionalMatches) + 1; $i < count($parts); $i++) {
                        $parts[$i] = preg_replace('/\s+/', ' ', $parts[$i]);
                        $parts[$i] = preg_replace('/\s+/', ' ', $parts[$i]);
                        if ($this->checkOtherConditions($parts[$i], 'additional information')) {
                            if (isset($data['extra_section']['Additional Information'])) {
                                $data['extra_section']['Additional Information'] .= preg_replace('/[^(\x20-\x7F)]*/', '', $parts[$i]) . "\n";
                            } else {
                                $data['extra_section']['Additional Information'] = preg_replace('/[^(\x20-\x7F)]*/', '', $parts[$i]) . "\n";
                            }
                        } else {
                            break;
                        }
                    }
                }
//                echo "<pre>";print_r($data['extra_section']);exit();

                $publicationMatches = preg_grep("/publication/i", $parts);
                if (!empty($publicationMatches)) {
                    for ($i = array_key_first($publicationMatches) + 1; $i < count($parts); $i++) {
                        $parts[$i] = preg_replace('/\s+/', ' ', $parts[$i]);
                        if ($this->checkOtherConditions($parts[$i], 'publication')) {
                            if (isset($data['extra_section']['Publication'])) {
                                $data['extra_section']['Publication'] .= preg_replace('/[^(\x20-\x7F)]*/', '', $parts[$i]) . "\n";
                            } else {
                                $data['extra_section']['Publication'] = preg_replace('/[^(\x20-\x7F)]*/', '', $parts[$i]) . "\n";
                            }
                        } else {
                            break;
                        }
                    }
                }
//                echo "<pre>";print_r($data['extra_section']);exit();

                $otherMatches = preg_grep("/other/i", $parts);
                if (!empty($otherMatches)) {
                    for ($i = array_key_first($otherMatches) + 1; $i < count($parts); $i++) {
                        $parts[$i] = preg_replace('/\s+/', ' ', $parts[$i]);
                        if ($this->checkOtherConditions($parts[$i], 'other')) {
                            if (isset($data['extra_section']['other'])) {
                                $data['extra_section']['other'] .= preg_replace('/[^(\x20-\x7F)]*/', '', $parts[$i]) . "\n";
                            } else {
                                $data['extra_section']['other'] = preg_replace('/[^(\x20-\x7F)]*/', '', $parts[$i]) . "\n";
                            }
                        } else {
                            break;
                        }
                    }
                }
//                echo "<pre>";print_r($data['extra_section']);exit();

                //Experience
                $experienceMatches = preg_grep("/experience/i", $parts);
//                echo"<pre>";print_r($experienceMatches);exit();
                $ct = 0;
                if (!empty($experienceMatches)) {

                    for ($i = array_key_first($experienceMatches) + 1; $i < count($parts); $i++) {
                        $parts[$i] = preg_replace('/\s+/', ' ', $parts[$i]);
                        if ($this->checkOtherConditions($parts[$i], 'experience')) {
//                    echo "<pre>";print_r( $parts[$i]);
                            $result = preg_match("/[A-za-zA]{3}[ -][0-9]{4}/", $parts[$i]);
                            if ($result) {
                                if (isset($data['experience_info'][$ct]['job_description'])) {
                                    $ct++;
                                }
                                $experienceInfo = array_filter(preg_split("/[-| ]/", $parts[$i]));
//                            echo "<pre>Exp:";print_r($experienceInfo);
                                if (isset($experienceInfo[0])) {
                                    $data['experience_info'][$ct]['employer'] = trim($experienceInfo[0]);
                                } else {
                                    $data['experience_info'][$ct]['employer'] = "Employer Title";
                                }

                                if (isset($experienceInfo[1])) {
                                    $data['experience_info'][$ct]['job_title'] = trim($experienceInfo[1]);
                                } else {
                                    $data['experience_info'][$ct]['job_title'] = "Job Title";
                                }

                                $years     = preg_grep("/\d+/i", $experienceInfo);
                                $tempArray = [];
                                foreach ($years as $year) {
                                    $tempArray[] = $year;
                                }
                                $years = $tempArray;

                                if (count($years) == 1) {
                                    $data['experience_info'][$ct]['start_year'] = trim($experienceInfo[0]);
                                } elseif (count($years) == 2) {
                                    if ($years[0] < $years[1]) {
                                        $data['experience_info'][$ct]['start_year'] = trim($years[0]);
                                        $data['experience_info'][$ct]['end_year']   = trim($years[1]);
                                    } else {
                                        $data['experience_info'][$ct]['end_year']   = trim($years[0]);
                                        $data['experience_info'][$ct]['start_year'] = trim($years[1]);
                                    }

                                }

                                $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                                foreach ($experienceInfo as $experience) {
                                    if (in_array($experience, $months)) {

                                        if (isset($data['experience_info'][$ct]['start_month'])) {
                                            $data['experience_info'][$ct]['end_month'] = $experience;
                                        } else {
                                            $data['experience_info'][$ct]['start_month'] = $experience;
                                        }

                                    }
                                }

                            } else {
                                if (isset($data['experience_info'][$ct]['job_description'])) {
                                    $data['experience_info'][$ct]['job_description'] .= preg_replace('/[^(\x20-\x7F)]*/', '', $parts[$i]);
                                } else {
                                    $data['experience_info'][$ct]['job_description'] = preg_replace('/[^(\x20-\x7F)]*/', '', $parts[$i]);
                                }

                            }
//
                        } else {
                            break;
                        }
                    }
                }
//                echo "<pre>";print_r($data['experience_info']);exit();

                //Education
                $educationMatches = preg_grep("/education/i", $parts);
                $ct               = 0;
                if (!empty($educationMatches)) {
                    for ($i = array_key_first($educationMatches) + 1; $i < count($parts); $i++) {
                        if ($this->checkOtherConditions($parts[$i], 'education')) {
                            $parts[$i] = preg_replace('/\s+/', ' ', $parts[$i]);
//                            echo "<pre>";print_r($parts[$i]);
                            if (empty(trim($parts[$i]))) {
                                continue;
                            }
                            $datePattern1 = "/[0-9]{2}\/[0-9]{4}/i";
                            $datePattern2 = "/[A-za-zA]{3}[ -][0-9]{4}/";
                            $date         = str_replace(' ', '', $parts[$i]);
                            preg_match_all($datePattern1, $date, $result);
                            if (!empty($result[0])) {
//                                echo "<pre>Date:";print_r($result[0]);
                                foreach ($result[0] as $output) {
                                    $tempDateArray                   = explode("/", $output);
                                    $data['education'][$ct]['month'] = isset($tempDateArray[0]) ? $tempDateArray[0] : '';
                                    $data['education'][$ct]['year']  = isset($tempDateArray[1]) ? $tempDateArray[1] : '';
                                }
                            }

                            $result2 = preg_match($datePattern2, $parts[$i]);

                            if ($result2) {
                                if (isset($data['education'][$ct]['description'])) {
                                    $ct++;
                                }
                                $experienceInfo = array_filter(preg_split("/[-| ]/", $parts[$i]));
//                            echo "<pre>Exp:";print_r($experienceInfo);
                                if (isset($experienceInfo[0])) {
                                    $data['education'][$ct]['school_name'] = trim($experienceInfo[0]);
                                }
                                if (isset($experienceInfo[1])) {
                                    $data['education'][$ct]['degree'] = trim($experienceInfo[1]);
                                }

                                $years     = preg_grep("/\d+/i", $experienceInfo);
                                $tempArray = [];
                                foreach ($years as $year) {
                                    $tempArray[] = $year;
                                }
                                $years = $tempArray;

                                if (count($years) == 1) {
                                    $data['education'][$ct]['year'] = trim($experienceInfo[0]);
                                }

                                $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                                foreach ($experienceInfo as $experience) {
                                    if (in_array($experience, $months)) {
                                        $data['education'][$ct]['month'] = $experience;
                                        break;
                                    }
                                }

                            } else {
                                if (isset($data['education'][$ct]['description'])) {
                                    $data['education'][$ct]['description'] .= preg_replace('/[^(\x20-\x7F)]*/', '', $parts[$i]);
                                } else {
                                    $data['education'][$ct]['description'] = preg_replace('/[^(\x20-\x7F)]*/', '', $parts[$i]);
                                }

                            }
//
                        } else {
                            break;
                        }
                    }
                }
//                exit();
                //echo "<pre>";print_r($data['education']);exit();
            }
            $userResume->contact_info = isset($data['contact_info']) ? json_encode($data['contact_info']) : null;
//            echo "<pre>";print_r($data['experience_info']);exit();
            $userResume->experience_info = isset($data['experience_info']) ? json_encode($data['experience_info']) : null;
            $userResume->extra_section   = isset($data['extra_section']) ? json_encode($data['extra_section']) : null;
//            echo "<pre>";print_r($userResume->toArray());exit();
            $userResume->save();
        } catch (\Exception $e) {
            echo "<pre>";
            print_r($e->getTraceAsString());exit();
            return false;
        }
    }

    public function checkOtherConditions($string, $conditionKey) {
        $keys = ["skill", "summary", "objective", "experience", "education", "community", "language", "affiliations", "awards", "additional Information"];

        $result = true;
        foreach ($keys as $checkPoint) {
            if ($conditionKey == $checkPoint) {
                continue;
            }

            if (preg_match("/$checkPoint/i", $string) != 0) {
//                if($conditionKey == "skill") {
                //                    echo "<pre>";print_r($checkPoint);
                //                }
                $result = false;
            }
        }
        return $result;
    }

    public function updateSortable($resumeId, Request $request) {
        try {
//            echo"<pre>";print_r($request->sortable);exit();
            $userResume           = UserResumes::where("id", $resumeId)->first();
            $sortableDefaultArray = ["contact_info", "summary", "objective", "skills", "experience", "education", "Community Service", "Language", "Affiliations", "Awards", "Additional Information", "Publication", "other", "contact_name"];
            $newSortingArray      = explode(",", $request->sortable);
//            echo"<pre>";print_r($newSortingArray);exit();
            foreach ($sortableDefaultArray as $item) {
                if (!in_array($item, $newSortingArray)) {
                    $newSortingArray[] = $item;
                }
            }
            $newSortingString     = implode(",", $newSortingArray);
            $userResume->sortable = $newSortingString;
            $userResume->save();
            echo "Resume Sorting updated successfully.";
            exit();
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
            exit();
//            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function defaultSortable($resumeId) {
        try {
//            echo"<pre>";print_r($request->sortable);exit();
            $userResume           = UserResumes::where("id", $resumeId)->first();
            $userResume->sortable = "contact_info,summary,skills,experience,education,Community Service,Language,Affiliations,Awards,Additional Information,Publication,other";
            $userResume->save();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
