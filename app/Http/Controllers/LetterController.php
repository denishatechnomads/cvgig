<?php
/**********************************/
/* Created By Jitendra Prajapati  */
/**********************************/

namespace App\Http\Controllers;

use App\Model\Letter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
class LetterController extends Controller
{

    public function index()
    {
        $letters = Letter::orderBy("updated_at")->paginate();
        return view("admin.letter.list",compact('letters'));
    }

    public function create()
    {
        $mainLetters = Letter::orderBy("updated_at")->where("parent_id",0)->get();
        return view("admin.letter.create",compact('mainLetters'));
    }

    function validation($request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
        ]);
    }

    public function store(Request $request)
    {
        $this->validation($request);

        try {
            $templateData = [
                'name' => $request->name,
                'description' => $request->description,
                'parent_id' => $request->parent_id
            ];
            Letter::create($templateData);
            return redirect()->route('letter_type.index')->withSuccess("Letter type created successfully.!");
        }catch (\Exception $e){
//            echo "<pre>";print_r($e->getMessage());exit();
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function show(Letter $letter)
    {
        //
    }

    public function edit($letterId)
    {
        $letter = Letter::where("id",$letterId)->first();
        $mainLetters = Letter::orderBy("updated_at")->where("parent_id",0)->get();
        return view("admin.letter.edit",compact('letter','mainLetters'));
    }


    public function update(Request $request, $letterId)
    {
        $this->validation($request);

        try {
            $templateData = [
                'name' => $request->name,
                'description' => $request->description,
                'parent_id' => $request->parent_id
            ];

            Letter::where("id",$letterId)->update($templateData);

            return redirect()->route('letter_type.index')->withSuccess("Letter type updated successfully.!");
        }catch (\Exception $e){
//            echo "<pre>";print_r($e->getMessage());exit();
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function destroy($letterId)
    {
        try {
            Letter::where("id",$letterId)->delete();
            return redirect()->route('letter_type.index')->withSuccess("Letter type deleted successfully.!");
        }catch (\Exception $e){
            return Redirect::back()->withError($e->getMessage());
        }
    }
}
