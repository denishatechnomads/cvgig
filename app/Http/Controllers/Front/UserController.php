<?php
/**********************************/
/* Created By Jitendra Prajapati  */
/**********************************/

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\UserLetter;
use App\Model\UserResumes;
use App\Services\SocialGoogleAccountService;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Session;
use Socialite;
use Str;

class UserController extends Controller {

    public function login() {
        return view("login");
    }

    public function postLogin(Request $request) {
        $request->validate([
            'email'    => 'required',
            'password' => 'required',
        ]);

        try {
            $credentials         = $request->except(['_token']);
            $credentials['type'] = 'user';
            if (auth()->attempt($credentials, true)) {

                if ($request->type == "finalize") {
                    return redirect()->back();
                }
                // $result = $this->redirectionResumeOrLatter(Auth::user());
                // if (!empty($result)) {
                //     return redirect()->to($result);
                // } else {
                //     return redirect()->route('user.dashboard');
                // }
                return redirect()->route('user.dashboard');
            } else {
                return redirect()->back()->withError(trans("auth.Login failed"));
            }

        } catch (\Exception $e) {
            return redirect()->route('front.login')->withError(trans("auth.Login failed"));
        }
    }

    public function redirectToProvider() {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback(SocialGoogleAccountService $service) {
        $googleUser = Socialite::driver('google')->stateless()->user();
        $user       = User::whereEmail($googleUser['email'])->first();

        if (!$user) {
            $user = User::create([
                'provider_id' => $googleUser['id'],
                'provider'    => 'google',
                'email'       => $googleUser['email'],
                'name'        => $googleUser['name'],
                'password'    => bcrypt(rand(1, 10000)),
                'type'        => 'user',
            ]);
        }

        Auth::login($user);
        $result = $this->redirectionResumeOrLatter($user);
        if (!empty($result)) {
            return redirect()->to($result);
        } else {
            return redirect()->route('user.dashboard');
        }

    }

    public function forgotPassword() {
        return view("forgot-password");
    }

    public function forgotPasswordEmail(Request $request) {
        $request->validate(['email' => 'required']);
        try {
            $credentials = ['email' => $request->email];
            $user        = User::where($credentials)->first();

            if (empty($user)) {
                return redirect()->back()->withError(trans('auth.User does not exist'));
            }

            $token = Str::random(60);
            DB::table('password_resets')->insert([
                'email'      => $request->email,
                'token'      => $token,
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            if ($this->sendResetEmail($request->email, $token)) {
                return redirect()->back()->withSuccess(trans('auth.A reset link has been sent to your email address'));
            } else {
                return redirect()->back()->withErrors(trans('auth.A reset link sending failed'));
            }

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(trans('auth.A reset link sending failed'));
        }
    }

    private function sendResetEmail($email, $token) {

        //Retrieve the user from the database
        $user = User::where('email', $email)->select('name', 'email')->first();
        //Generate, the password reset link. The token generated is embedded in the link
        //            $link = config('base_url') . 'password/reset/' . $token . '?email=' . urlencode($user->email);
        $link = route('front.password.reset', [$token, "email" => $user->email]);

        try {
            Mail::send('emails.forgot_password', ["user" => $user, "link" => $link], function ($message) use ($user) {
                $message->to($user['email'], $user['name'])
                    ->subject("Your reset password link");
            });

            return true;
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }

    }

    public function validatePasswordRequest($token, Request $request) {

        return view('password-reset');
    }
    public function resetPassword(Request $request) {
        //Validate input
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|confirmed',
            'token'    => 'required',

        ]);

        // Validate the token
        $tokenData = DB::table('password_resets')->where('token', $request->token)->first();

        // Redirect the user back to the password reset request form if the token is invalid
        if (!$tokenData) {
            return view('forgot-password');
        }

        $user = User::where('email', $tokenData->email)->first();

        // Redirect the user back if the email is invalid
        if (!$user) {
            return redirect()->route("front.password.reset")->withErrors(trans('auth.Email not found'));
        }

        //Hash and update the new password
        $user->password = bcrypt($request->password);
        $user->update();
        $user->save();

        //login the user immediately they change password successfully
        Auth::login($user);

        //Delete the token
        DB::table('password_resets')->where('email', $user->email)->delete();

        return redirect()->route('home')->withSuccess(trans('auth.Login successfully'));

    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return back();
    }

    public function registration() {
        return view("registration");
    }

    public function postRegistration(Request $request) {
        $requestData = $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|max:255',
        ]);

        try {
            $requestData['password'] = bcrypt($requestData['password']);
            $requestData['type']     = "user";
            $user                    = User::create($requestData);
            if (!empty($user)) {
                Auth::login($user);
                $result = $this->redirectionResumeOrLatter($user);
                if (!empty($result)) {
                    return redirect()->to($result);
                } else {
                    return redirect()->route('user.dashboard');
                }

                return redirect()->route('user.dashboard')->withSuccess(trans("Registration successfully"));
            } else {
                return redirect()->route('front.registration')->withError(trans("Registration failed"));
            }

        } catch (\Exception $e) {
            return redirect()->route('front.registration')->withError("Registration failed");
        }

    }

    public function redirectionResumeOrLatter($user) {

        if (Session::has('letterId')) {
            $letterId   = Session::get("letterId");
            $userLetter = UserLetter::where("id", $letterId)->get();
            if (!isset($userLetter->user_id) || empty($userLetter->user_id)) {
                UserLetter::where("id", $letterId)->update(['user_id' => $user->id]);
            }
            return route('letter.finalize', $letterId);
        } elseif (Session::has('resumeId')) {
            $resumeId   = Session::get("resumeId");
            $userResume = UserResumes::where("id", $resumeId)->get();
            if (!isset($userLetter->user_id) || empty($userResume->user_id)) {
                UserResumes::where("id", $resumeId)->update(['user_id' => $user->id]);
            }
            return route('resume.finalize', $resumeId);
        }

    }

    public function postGuestRegistration(Request $request) {
        $requestData = $request->validate([
            'name'  => 'required',
            'email' => 'required|email|max:255',
        ]);

        try {
            $requestData['password'] = bcrypt(rand(0, 9000000));
            $requestData['type']     = "guest";
            $user                    = User::where("email", $request->email)->first();

            if (empty($user)) {
                $user = User::create($requestData);
            } else {
                $user->name = $request->name;
                $user->save();
            }
            Auth::login($user);
            return redirect()->back()->withSuccess("Guest registration successfully done.");
        } catch (\Exception $e) {
            return redirect()->route('front.registration')->withError("Guest registration failed");
        }

    }

}
