<?php
/**********************************/
/* Created By Jitendra Prajapati  */
/**********************************/

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller {

    public function index(Request $request) {
        $user = Auth::user();

        if ($user) {
            return redirect()->route('user.dashboard');
        }

        return view("index");
    }

}
