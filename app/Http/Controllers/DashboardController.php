<?php
/**********************************/
/* Created By Jitendra Prajapati  */
/**********************************/

namespace App\Http\Controllers;

use App\Model\Payment;
use App\Model\Template;
use App\Model\UserResumes;
use App\User;
use Illuminate\Routing\Controller as BaseController;

class DashboardController extends BaseController
{
    function index(){
        $data = [];
        $data['total_user'] = User::count();
        $data['total_template'] = Template::count();
        $data['total_order'] = Payment::where("payment_status","succeed")->count();
        $data['total_resume'] = UserResumes::count();
    	return view('admin.dashboard.index',compact('data'));
    }
}
