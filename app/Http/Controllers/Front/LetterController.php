<?php
/**********************************/
/* Created By Jitendra Prajapati  */
/**********************************/


namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\Letter;
use App\Model\Prewritten_content;
use App\Model\Template;
use App\Model\UserLetter;
use App\Model\UserResumes;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Mail;
use Socialite;
use Str;
use Session;
use Validator;
use PDF;

class LetterController extends Controller
{

    public function buildLetter()
    {
//        return view("build_letter");
        return redirect()->route('letter.choose-template');
    }

    /* Choose Template Step */
    public function chooseTemplate()
    {
        $templates = Template::where("type", 'letter')->where('is_active', true)->get();
        return view("letter.choose_template", compact('templates'));
    }

    public function selectedTemplate($templateId)
    {
        Session::put('templateId', $templateId);
        Session::forget('letterId');
        return redirect()->route('letter.type');
    }

    public function selectLetterType()
    {
        $letters = Letter::where("parent_id", 0)->get();
        return view("letter.choose_type", compact('letters'));
    }

    public function selectedLetterType(Request $request)
    {
        $requestData = $request->validate([
            'type' => 'required',
        ]);
        try {
            Session::put('letterType', $request->type);
            $letter = Letter::where("name", $request->type)->first();
            $letters = Letter::where("parent_id", $letter->id)->get();

            if ((isset($letters) && count($letters) == 0) || empty($letters)) {
                Session::put('letterSubType', 'general');
                return redirect()->route('letter.contact');
            }
            return redirect()->route('letter.subtype');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function selectLetterSubType()
    {
        if (Session::has('letterType')) {
            $type = Session::get('letterType');
            $letter = Letter::where("name", $type)->first();
            $letters = Letter::where("parent_id", $letter->id)->get();
            if ((isset($letters) && count($letters) == 0) || empty($letters)) {
                Session::put('letterSubType', 'general');
                return redirect()->route('letter.contact');
            }
            return view("letter.choose_subtype", compact('letters'));
        } else {
            return redirect()->route('letter.type');
        }
    }

    public function selectedLetterSubType(Request $request)
    {
        $request->validate([
            'sub_type' => 'required',
        ]);
        try {
            Session::put('letterSubType', $request->sub_type);
            return redirect()->route('letter.contact');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /* Contact Step */
    public function letterContact($letterId = null)
    {
        try {
            $editLetter = true;

            if($letterId == null){
                $editLetter = false;
            }
            if (Session::has('letterId') && $letterId == null) {
                $letterId = Session::get('letterId');
                $editLetter = false;
            }
            $userLetter = UserLetter::where('id', $letterId)->first();

            if ($letterId != null) {
                $templateId = $userLetter->template_id;
            } else {
                $templateId = Session::get('templateId');
            }
            $template = Template::where("id", $templateId)->first();
            return view("letter.contact", compact('template', 'userLetter', 'editLetter'));
        }catch (\Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }


    /* Save All Steps info */
    public function saveLetterData(Request $request)
    {
        $isNew = true;
        if (isset($request->letter_id) && $request->letter_id > 0) {
            $isNew = false;
        }

        if (Session::has('letterId')) {
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
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
                'phone' => 'required|numeric',
                'address' => 'required',
                'country' => 'required',
                'city' => 'required',
                'state' => 'required',
                'zipcode' => 'required|numeric'
            ]);

            try {
                $letterData['complete_step'] = 1;
                if (isset($templateId) && !empty($templateId)) {
                    $letterData['template_id'] = $templateId;
                }
                if (Session::has('letterType')) {
                    $letterData['letter_type'] = Session::get('letterType');
                }
                $letterData['letter_subtype'] = Session::has('letterSubType') ? Session::get('letterSubType') : 'general';

                $requestData = array_filter($requestData);
                if (!empty($requestData)) {
                    $letterData['contact_info'] = json_encode($requestData);
                }
                if ($isNew) {
                    $letterData['title'] = "Letter " . rand(0, 100);
                    $userLetter = UserLetter::create($letterData);
                    Session::put('letterId', $userLetter->id);
                    $this->defaultSortable($userLetter->id);
                    $letterId =  $userLetter->id;
                } else {
                    $letterId = $request->letter_id;
                    if (Session::has('letterId')) {
                        $letterId = Session::get('letterId');
                    }
                    UserLetter::where("id", $letterId)->update($letterData);
                }

                if (isset($request->letter_edit) && $request->letter_edit == true) {
                    return redirect()->route('letter.finalize', $letterId);
                }
                return redirect()->route('letter.recipient');
            } catch (\Exception $e) {
                return redirect()->back()->withError($e->getMessage());
            }
        }
        elseif (isset($request->type) && $request->type == 'recipient') {
            /* Step: contact details save */

            $requestData = $request->validate([
                'first_name' => 'nullable',
                'last_name' => 'nullable',
                'email' => 'nullable|email',
                'phone' => 'nullable|numeric',
                'address' => 'nullable',
                'country' => 'nullable',
                'city' => 'nullable',
                'state' => 'nullable',
                'zipcode' => 'nullable|numeric'
            ]);

            try {
                $letterData['complete_step'] = 2;
                $requestData = array_filter($requestData);
                $letterData['recipient_info'] = !empty($requestData) ? json_encode($requestData) : null;
                $letterId = $request->letter_id;
                $userLetter = UserLetter::where("id", $letterId)->update($letterData);
                if (isset($request->letter_edit) && $request->letter_edit == true) {
                    return redirect()->route('letter.finalize', $letterId);
                }

                return redirect()->route('letter.subject');
            } catch (\Exception $e) {
                return redirect()->back()->withError($e->getMessage());
            }
        }
        elseif (isset($request->type) && $request->type == 'subject') {
            /* Step: contact details save */

            $requestData = $request->validate([
                'subject' => 'nullable',
            ]);

            try {
                $letterData['complete_step'] = 3;
                $letterId = $request->letter_id;
                $requestData = array_filter($requestData);
                $letterData['subject'] = !empty($requestData['subject']) ? $requestData['subject'] : null;

                $userLetter = UserLetter::where("id", $letterId)->update($letterData);

                if (isset($request->letter_edit) && $request->letter_edit == true) {
                    return redirect()->route('letter.finalize', $letterId);
                }

                return redirect()->route('letter.greeting');
            } catch (\Exception $e) {
                return redirect()->back()->withError($e->getMessage());
            }
        }
        elseif (isset($request->type) && $request->type == 'greeting') {
            /* Step: contact details save */

            $requestData = $request->validate([
                'greeting' => 'nullable',
            ]);

            try {
                $letterData['complete_step'] = 4;
                $letterId = $request->letter_id;
                $requestData = array_filter($requestData);
                $letterData['greeting'] = !empty($requestData['greeting']) ? $requestData['greeting'] : null;
                $userLetter = UserLetter::where("id", $letterId)->update($letterData);
                if (isset($request->letter_edit) && $request->letter_edit == true) {
                    return redirect()->route('letter.finalize', $letterId);
                }
                return redirect()->route('letter.opener');
            } catch (\Exception $e) {
                return redirect()->back()->withError($e->getMessage());
            }
        }
        elseif (isset($request->type) && $request->type == 'opener') {
            /* Step: contact details save */

            $requestData = $request->validate([
                'opener' => 'nullable',
            ]);

            try {
                $letterData['complete_step'] = 5;
                $letterId = $request->letter_id;
                $requestData = array_filter($requestData);
                $letterData['opener'] = !empty($requestData['opener']) ? $requestData['opener'] : null;

                $userLetter = UserLetter::where("id", $letterId)->update($letterData);
                if (isset($request->letter_edit) && $request->letter_edit == true) {
                    return redirect()->route('letter.finalize', $letterId);
                }

                return redirect()->route('letter.body');
            } catch (\Exception $e) {
                return redirect()->back()->withError($e->getMessage());
            }
        }
        elseif (isset($request->type) && $request->type == 'body') {
            /* Step: contact details save */

            $requestData = $request->validate([
                'body' => 'nullable',
            ]);

            try {
                $letterData['complete_step'] = 6;
                $letterId = $request->letter_id;
                $requestData = array_filter($requestData);
                $letterData['body'] = !empty($requestData['body']) ? $requestData['body'] : null;
                $userLetter = UserLetter::where("id", $letterId)->update($letterData);
                if (isset($request->letter_edit) && $request->letter_edit == true) {
                    return redirect()->route('letter.finalize', $letterId);
                }

                return redirect()->route('letter.call-to-action');
            } catch (\Exception $e) {
                return redirect()->back()->withError($e->getMessage());
            }
        }
        elseif (isset($request->type) && $request->type == 'collToAction') {
            /* Step: contact details save */

            $requestData = $request->validate([
                'call_to_action' => 'nullable',
            ]);

            try {
                $letterData['complete_step'] = 7;
                $letterId = $request->letter_id;
                $requestData = array_filter($requestData);
                $letterData['call_to_action'] = !empty($requestData['call_to_action']) ? $requestData['call_to_action'] : null;
                $userLetter = UserLetter::where("id", $letterId)->update($letterData);
                if (isset($request->letter_edit) && $request->letter_edit == true) {
                    return redirect()->route('letter.finalize', $letterId);
                }
                return redirect()->route('letter.closer');
            } catch (\Exception $e) {
                return redirect()->back()->withError($e->getMessage());
            }
        }
        elseif (isset($request->type) && $request->type == 'closer') {
            /* Step: contact details save */

            $requestData = $request->validate([
                'closer' => 'nullable',
            ]);

            try {
                $letterData['complete_step'] = 8;
                $letterId = $request->letter_id;
                $requestData = array_filter($requestData);
                $letterData['closer'] = !empty($requestData['closer']) ? $requestData['closer'] : null;
                $userLetter = UserLetter::where("id", $letterId)->update($letterData);
                if (isset($request->letter_edit) && $request->letter_edit == true) {
                    return redirect()->route('letter.finalize', $letterId);
                }

                return redirect()->route('letter.finalize', $letterId);
            } catch (\Exception $e) {
                return redirect()->back()->withError($e->getMessage());
            }
        }
        elseif(isset($request->type) && $request->type == 'finalize'){
            try {
                if(Auth::user()->type == 'admin'){
                    Session::put("letterId", $request->letter_id);
                    return redirect()->route('front.login');
                }
                $UserLetter = UserLetter::where("id", $request->letter_id)->first();
                $UserLetter->complete_step = 10;
                $UserLetter->user_id = Auth::user()->id;
                $UserLetter->save();
//                return redirect()->back()->withSuccess("Your letter saved successfully.");
                return redirect()->route('user.checkout',['letter',$request->letter_id]);
            }catch (\Exception $e){
                return redirect()->back()->withError("Error: ".$e->getMessage());
            }
        }
        else{
            return redirect()->back()->withError("You Invalid request call");
        }
    }

    /* Recipient Step */
    public function letterRecipient(Request $request, $letterId = null)
    {
        try {
            $editLetter = true;
            if (Session::has('letterId') && $letterId == null) {
                $letterId = Session::get('letterId');
                $editLetter = false;
            }
            $userLetter = UserLetter::where('id', $letterId)->first();

            if ($letterId != null) {
                $templateId = $userLetter->template_id;
            } else {
                $templateId = Session::get('templateId');
            }
            $template = Template::where("id", $templateId)->first();
            return view("letter.recipient", compact('template', 'userLetter', 'editLetter'));
        }catch (\Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /* Subject Step */
    public function letterSubject($letterId = null,Request $request)
    {
        try {
            $editLetter = true;
            if (Session::has('letterId') && $letterId == null) {
                $letterId = Session::get('letterId');
                $editLetter = false;
            }
            $userLetter = UserLetter::where('id', $letterId)->first();

            if ($letterId != null) {
                $templateId = $userLetter->template_id;
            } else {
                $templateId = Session::get('templateId');
            }
            $template = Template::where("id", $templateId)->first();
            $preWrittenContents = Prewritten_content::where("type", "Letter Subject")->orderBy("title")->get();
            return view("letter.subject", compact('template', 'userLetter', 'preWrittenContents', 'editLetter'));
        }catch (\Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /* Subject Step */
    public function letterGreeting($letterId = null,Request $request)
    {
        try {
            $editLetter = true;
            if (Session::has('letterId') && $letterId == null) {
                $letterId = Session::get('letterId');
                $editLetter = false;
            }
            $userLetter = UserLetter::where('id', $letterId)->first();

            if ($letterId != null) {
                $templateId = $userLetter->template_id;
            } else {
                $templateId = Session::get('templateId');
            }
            $template = Template::where("id", $templateId)->first();
            $preWrittenContents = Prewritten_content::where("type", "greeting")->orderBy("title")->get();
            return view("letter.greeting", compact('template', 'userLetter', 'preWrittenContents', 'editLetter'));
        }catch (\Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /* Subject Step */
    public function letterOpener($letterId = null,Request $request)
    {
        try {
            $editLetter = true;
            if (Session::has('letterId') && $letterId == null) {
                $letterId = Session::get('letterId');
                $editLetter = false;
            }
            $userLetter = UserLetter::where('id', $letterId)->first();

            if ($letterId != null) {
                $templateId = $userLetter->template_id;
            } else {
                $templateId = Session::get('templateId');
            }
            $template = Template::where("id", $templateId)->first();
            $preWrittenContents = Prewritten_content::where("type", "Opener")->orderBy("title")->get();
            return view("letter.opener", compact('template', 'userLetter', 'preWrittenContents', 'editLetter'));
        }catch (\Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /* Body Step */
    public function letterBody($letterId = null, Request $request)
    {
        try {
            $editLetter = true;
            if (Session::has('letterId') && $letterId == null) {
                $letterId = Session::get('letterId');
                $editLetter = false;
            }
            $userLetter = UserLetter::where('id', $letterId)->first();

            if ($letterId != null) {
                $templateId = $userLetter->template_id;
            } else {
                $templateId = Session::get('templateId');
            }
            $template = Template::where("id", $templateId)->first();
            $preWrittenContents = Prewritten_content::where("type", "Body")->orderBy("title")->get();
            return view("letter.body", compact('template', 'userLetter', 'preWrittenContents', 'editLetter'));
        }catch (\Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /* Call To Action Step */
    public function letterCallToAction($letterId = null, Request $request)
    {
        try {
            $editLetter = true;
            if (Session::has('letterId') && $letterId == null) {
                $letterId = Session::get('letterId');
                $editLetter = false;
            }
            $userLetter = UserLetter::where('id', $letterId)->first();

            if ($letterId != null) {
                $templateId = $userLetter->template_id;
            } else {
                $templateId = Session::get('templateId');
            }
            $template = Template::where("id", $templateId)->first();
            $preWrittenContents = Prewritten_content::where("type", "call-to-action")->orderBy("title")->get();
            return view("letter.call_to_action", compact('template', 'userLetter', 'preWrittenContents', 'editLetter'));
        }catch (\Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /* Call To Action Step */
    public function letterCloser($letterId = null, Request $request)
    {
        try {
            $editLetter = true;
            if (Session::has('letterId') && $letterId == null) {
                $letterId = Session::get('letterId');
                $editLetter = false;
            }
            $userLetter = UserLetter::where('id', $letterId)->first();

            if ($letterId != null) {
                $templateId = $userLetter->template_id;
            } else {
                $templateId = Session::get('templateId');
            }
            $template = Template::where("id", $templateId)->first();
            $preWrittenContents = Prewritten_content::where("type", "closer")->orderBy("title")->get();
            return view("letter.closer", compact('template', 'userLetter', 'preWrittenContents', 'editLetter'));
        }catch (\Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }


    public function finalize($letterId, Request $request)
    {
        try {
            $userLetter = UserLetter::with('template')->where('id', $letterId)->first();
            $templates = $templates = Template::where("type", 'letter')->where('is_active', true)->get();
            return view("letter.finalize", compact('userLetter', 'templates'));
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function letterUpdate($letterId, Request $request)
    {
        try {
            $resume = UserLetter::where('id', $letterId)->first();
            $resume->title = $request->title;
            $resume->save();
            return redirect()->back()->withSucess("Letter renamed successfully.");
//            return redirect()->route('letter.finalize', $letterId);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function downloadPDF($letterId, Request $request)
    {
        try {
            if (!Auth::check()) {
//                $resumeData['user_id'] = Auth::user()->id;
                Session::put("letterId", $letterId);
                return redirect()->route('front.login');
            }

            if(Auth::user()->type == 'admin'){
                Session::put("resumeId", $letterId);
                return redirect()->route('front.login');
            }

            $userLetter = UserLetter::with('template')->where('id', $letterId)->first();
            if (isset($userLetter->style_section['font_family']) && !empty($userLetter->style_section['font_family'])) {
                PDF::setOptions(['defaultFont' => $userLetter->style_section['font_family']]);
            }
//            return view('template.letter.common', ['userLetter' => $userLetter]);

            $fileName = $userLetter->title . ".pdf";
            $pdf = PDF::loadView('template.letter.common', ['userLetter' => $userLetter]);
            return $pdf->download($fileName);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }

    }

    public function printPreview($letterId, Request $request)
    {
        try {
            $userLetter = UserLetter::with('template')->where('id', $letterId)->first();
            return view('template.letter.common', ['userLetter' => $userLetter]);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }

    }

    public function sendEmail($letterId, Request $request)
    {
        try {
            if (!Auth::check()) {
                Session::put("letterId", $letterId);
                return redirect()->route('front.login');
            }
            if(Auth::user()->type == 'admin'){
                Session::put("letterId", $letterId);
                return redirect()->route('front.login');
            }

            $userLetter = UserLetter::with('template', 'user')->where('id', $letterId)->first();

            if (empty($userLetter->user)) {
                Session::put("letterId", $letterId);
                return redirect()->route('front.registration');
            }
            $pdf = PDF::loadView('template.letter.common', ['userLetter' => $userLetter]);
            $fileName = $userLetter->title . ".pdf";
            $user = $userLetter->user->toArray();
            Mail::send('emails.send_letter', ["user" => $user], function ($message) use ($user, $pdf, $fileName) {
                $message->to($user['email'], $user['name'])
                    ->subject("Your resume is $fileName")
                    ->attachData($pdf->output(), $fileName);
            });
            return redirect()->back()->withSuccess("Please check Your email address " . $user['email']);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }

    }

    public function copyLetter($letterId, Request $request){
        try{
            $userLetter =  UserLetter::where("id",$letterId)->first();
            $newUserLetter = $userLetter->replicate();
            $newUserLetter->title = "Copy Of ".$userLetter->title;
            $newUserLetter->save();
            return redirect()->back()->withSuccess("Letter duplicated successfully.");
        }catch (\Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function deleteLetter($letterId, Request $request){
        try{
            UserLetter::where("id",$letterId)->delete();
            return redirect()->back()->withSuccess("Letter deleted successfully.");
        }catch (\Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function updateStyle($letterId, Request $request)
    {
        /* Step: Style  save */
        $requestData = $request->validate([
            'type' => 'required',
            'value' => 'nullable',
        ]);
        try {
            $userLetter = UserLetter::where("id", $letterId)->first();
            $userLetterData = $userLetter->style_section;
            $userLetterData[$request->type] = $request->value;
            $userLetter->style_section = json_encode($userLetterData);
            $userLetter->save();
            echo "style updated successfully.";
            exit();
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }


    public function restStyle($letterId, Request $request)
    {
        try {
            $userLetter = UserLetter::where("id", $letterId)->first();
            $userLetter->style_section = null;
            $userLetter->save();
            return redirect()->back()->withSuccess("Applied default style successfully.");
        } catch (\Exception $e) {
            return redirect()->back()->withError("Error: ".$e->getMessage());
        }
    }


    /* Update Template Step */
    public function updateTemplate($letterId,$templateId)
    {
        try{
            $userLetter = UserLetter::where("id",$letterId)->first();
            $userLetter->template_id = $templateId;
            $userLetter->style_section = null;
            $userLetter->save();
            return redirect()->back()->withSuccess("Template applied successfully.");
        }catch (\Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }


    public function updateSortable($letterId,Request $request){
        try{
//            echo"<pre>";print_r($request->sortable);exit();
            $userLetter = UserLetter::where("id",$letterId)->first();
            $sortableDefaultArray = ["contact_info", "recipient_info", "subject",
                "greeting", "opener", "body","call_to_action","closer",];
            $newSortingArray = explode(",",$request->sortable);
//            echo"<pre>";print_r($newSortingArray);exit();
            foreach ($sortableDefaultArray as $item){
                if(!in_array($item,$newSortingArray)){
                    $newSortingArray[] = $item;
                }
            }
            $newSortingString = implode(",",$newSortingArray);
            $userLetter->sortable = $newSortingString;
            $userLetter->save();
            echo "Resume Sorting updated successfully.";exit();
        }catch (\Exception $e){
            echo "Error: ".$e->getMessage();exit();
//            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function defaultSortable($letterId){
        try{
//            echo"<pre>";print_r($request->sortable);exit();
            $userLetter = UserLetter::where("id",$letterId)->first();
            $userLetter->sortable = "contact_info,recipient_info,subject,greeting,opener,body,call_to_action,closer,complete_step";
            $userLetter->save();
            return true;
        }catch (\Exception $e){
            return false;
        }
    }
}
