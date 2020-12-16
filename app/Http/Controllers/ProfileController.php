<?php
/**********************************/
/* Created By Jitendra Prajapati  */
/**********************************/

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class ProfileController extends BaseController
{
    function myProfile(){
    	return view('admin.profile.my-profile');
    }
}
