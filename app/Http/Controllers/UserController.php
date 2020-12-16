<?php
/**********************************/
/* Created By Jitendra Prajapati  */
/**********************************/

namespace App\Http\Controllers;

use App\Model\UserResumes;
use App\Model\UserSubscription;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    public function index()
    {
        $users = User::where("type","user")->paginate(10);
        return view('admin.user.list',compact('users'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
        return view('admin.user.show',compact('user'));
    }

    public function edit(User $contact)
    {
        //
    }

    public function update(Request $request, User $contact)
    {
        //
    }

    public function destroy($userId)
    {
        try {
            User::where("id",$userId)->delete();
            return redirect()->route('user.index')->withSuccess("User deleted successfully.!");
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function getSubscription($userId)
    {
        try{
            $user = User::with('subscription')->where("id",$userId)->first();
//            echo "<pre>";print_r($user->toArray());exit();
            return view('admin.user.subscription',compact('user'));
        }catch (\Exception $e){
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function getResumes($userId)
    {
        try{
            $user = User::where("id",$userId)->first();
            $resumes = UserResumes::with('template')->where("user_id",$userId)->paginate(10);
            return view('admin.user.resumes',compact('user','resumes'));
        }catch (\Exception $e){
            return Redirect::back()->withError($e->getMessage());
        }
    }
    public function getResumeDetail($userId,$resumeId)
    {
        try{
            $resume = UserResumes::with('template')->where(["id"=>$resumeId])->first();
//            echo "<pre>";print_r($user->toArray());exit();
            return view('admin.user.resumes_detail',compact('resume'));
        }catch (\Exception $e){
            return Redirect::back()->withError($e->getMessage());
        }
    }
}
