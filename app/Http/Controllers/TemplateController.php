<?php
/**********************************/
/* Created By Jitendra Prajapati  */
/**********************************/

namespace App\Http\Controllers;

use App\Model\Template;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TemplateController extends Controller
{

    public function index()
    {
        $templates = Template::orderBy('created_at',"desc")->paginate(10);
        return view('admin.template.list',compact('templates'));
    }

    public function create()
    {
        return view('admin.template.create');
    }

    function validation($request)
    {
        $request->validate([
            'name'=>'required',
            'path'=>'required',
            'description'=>'required',
            'image'=>'nullable|image:jpeg,jpg,png',
            'tag'=>'required',
            'type'=>'required',
        ]);
    }

    public function store(Request $request)
    {
        $this->validation($request);

        try {
            $templateData = [
                'name' => $request->name,
                'description' => $request->description,
                'path' => $request->path,
                'tag' => $request->tag,
                'type' => $request->type,
                'is_active' => $request->is_active == 'on' ? true : false,
                'required_image' => $request->required_image == 'on' ? true : false,
            ];

            $template = Template::create($templateData);
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_template.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('images/template', $imageName);
                $template->image = $imagePath;
                $template->save();
            }
            return redirect()->route('template.index')->withSuccess("Template created successfully.!");
        }catch (\Exception $e){
//            echo "<pre>";print_r($e->getMessage());exit();
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function show(Template $template)
    {
        return view('admin.template.show');
    }

    public function edit(Template $template)
    {
        return view('admin.template.edit',compact('template'));
    }

    public function update(Request $request, Template $template)
    {
        $this->validation($request);
        try {
            $template->name = $request->name;
            $template->description = $request->description;
            $template->path = $request->path;
            $template->tag = $request->tag;
            $template->type = $request->type;
            $template->is_active = $request->is_active == 'on' ? true : false;
            $template->required_image = $request->required_image == 'on' ? true : false;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_template.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('images/template', $imageName);
                $template->image = $imagePath;

            }
            $template->save();

            return redirect()->route('template.index')->withSuccess("Template updated successfully.!");
        }catch (\Exception $e){
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function destroy(Template $template)
    {
        try {
            $template->delete();
            return redirect()->route('template.index')->withSuccess("Template deleted successfully.!");
        }catch (\Exception $e){
            return Redirect::back()->withError($e->getMessage());
        }
    }
}
