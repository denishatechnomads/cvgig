<?php
/**********************************/
/* Created By Jitendra Prajapati  */
/**********************************/

namespace App\Http\Controllers;

use App\Model\Prewritten_content;
use Illuminate\Http\Request;
use Redirect;

class PrewrittenContentController extends Controller
{
    protected $contentType = [
        'experience', 'skills', 'summary', 'opener','education',
        "Community Service","Language","Affiliations","Awards",
        "Additional Information","Publication","Accomplishments","Letter Subject","Greeting","Opener","Body","call-to-action","closer"
    ];

    public function index()
    {
        $preContents = Prewritten_content::orderBy("updated_at","DESC")->paginate();
        return view("admin.pre_content.list",compact('preContents'));
    }


    public function create()
    {
        $contentType = $this->contentType;
        return view("admin.pre_content.create",compact('contentType'));
    }

    function validation($request)
    {
        $requestData = $request->validate([
            'type'=>'required',
            'title'=>'required',
            'description'=>'required',
        ]);
        return $requestData;
    }

    public function store(Request $request)
    {
        $requestData = $this->validation($request);

        try {
//            echo "<pre>";print_r($requestData);exit();
            Prewritten_content::create($requestData);
            return redirect()->route('prewritten_content.index')->withSuccess("Pre written content created successfully.!");
        }catch (\Exception $e){
            return Redirect::back()->withError($e->getMessage());
        }
    }


    public function show(Prewritten_content $prewritten_content)
    {
        return view("admin.pre_content.show",compact('prewritten_content'));
    }


    public function edit(Prewritten_content $prewritten_content)
    {
        $contentType = $this->contentType;
        return view("admin.pre_content.edit",compact('prewritten_content','contentType'));
    }


    public function update(Request $request, Prewritten_content $prewritten_content)
    {
        $requestData = $this->validation($request);

        try {

            $prewritten_content->update($requestData);
            return redirect()->route('prewritten_content.index')->withSuccess("Pre written content updated successfully.!");
        }catch (\Exception $e){
            return Redirect::back()->withError($e->getMessage());
        }
    }


    public function destroy(Prewritten_content $prewritten_content)
    {
        try {
            $prewritten_content->delete();
            return redirect()->route('prewritten_content.index')->withSuccess("Pre written content deleted successfully.!");
        }catch (\Exception $e){
            return Redirect::back()->withError($e->getMessage());
        }
    }
}
