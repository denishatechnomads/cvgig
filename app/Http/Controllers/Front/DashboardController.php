<?php
/**********************************/
/* Created By Jitendra Prajapati  */
/**********************************/

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\UserLetter;
use App\Model\UserResumes;
use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller {

    public function index(Request $request) {
        try {
//        echo "<pre>";print_r($request->all());exit();
            $userId  = Auth::user()->id;
            $resumes = UserResumes::where("user_id", $userId)->get();
            $letters = UserLetter::where("user_id", $userId)->get();
//        echo "<pre>";print_r($resumes[0]);exit();

            $type         = 'Resume';
            $selectedData = isset($resumes[0]) ? $resumes[0] : [];
            if ($request->type == 'Letter') {
                $type         = 'Letter';
                $selectedData = UserLetter::where("user_id", $userId)->where("id", $request->record_id)->first();
            } else if ($request->type == 'Resume') {
                $type         = 'Resume';
                $selectedData = UserResumes::where(["user_id" => $userId, "id" => $request->record_id])->first();
            }
            return view("dashboard", compact('resumes', 'letters', 'selectedData', 'type'));
        } catch (\Exception $e) {
            echo "<pre>";
            print_r($e->getMessage());exit();
            return redirect()->back()->withError("Error: " . $e->getMessage());
        }
    }

}
