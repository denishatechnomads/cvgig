<?php
/**********************************/
/* Created By Jitendra Prajapati  */
/**********************************/

namespace App\Http\Controllers;

use App\Model\Degree;
use Illuminate\Http\Request;
use Validator;

class DegreeController extends Controller
{

    public function index()
    {
//        $degrees = Degree::orderBy("updated_at")->paginate();
//        return view("admin.degree.list", compact('degrees'));
        return view("admin.degree.list");
    }


    function validation($request)
    {
        $requestData = $request->validate([
            'name' => 'required|unique:degrees,name',
        ]);
        return $requestData;
    }

    public function create()
    {
        return view("admin.degree.create");
    }

    public function store(Request $request)
    {
        //
    }


    public function show(Degree $degree)
    {
        return view("admin.degree.show");
    }

    public function edit(Degree $degree)
    {
        return view("admin.degree.edit", compact('degree'));
    }


    public function update(Request $request, Degree $degree)
    {
        //
    }

    public function destroy(Degree $degree)
    {
        //
    }

    /* API */
    public function getDegree(Request $request)
    {
        try {
            $degrees = Degree::orderBy("updated_at","DESC")->get();
            return response()->json(['Success' => true, 'Message' => "Degree created successfully.","Data" => $degrees]);
        } catch (\Exception $e) {
            return response()->json(['Success' => false, 'Message' => $e->getMessage()]);
        }
    }

    public function createDegree(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:degrees,name'
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => false, 'message' => 'Validation failed.', 'errors' => $validator->errors()], 422);
            }

            Degree::create(["name"=>$request->name]);
            return response()->json(['Success' => true, 'Message' => "Degree created successfully."]);
        } catch (\Exception $e) {
            return response()->json(['Success' => false, 'Message' => $e->getMessage()]);
        }
    }
    public function updateDegree(Request $request,$id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:degrees,name,'.$id
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => false, 'message' => 'Validation failed.', 'errors' => $validator->errors()], 422);
            }

            Degree::where("id",$id)->update(["name"=>$request->name]);
            return response()->json(['Success' => true, 'Message' => "Degree updated successfully."]);
        } catch (\Exception $e) {
            return response()->json(['Success' => false, 'Message' => $e->getMessage()]);
        }
    }
    public function deleteDegree($id)
    {
        try {
            Degree::where("id",$id)->delete();
            return response()->json(['Success' => true, 'Message' => "Degree deleted successfully."]);
        } catch (\Exception $e) {
            return response()->json(['Success' => false, 'Message' => $e->getMessage()]);
        }
    }
}
