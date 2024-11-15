<?php

namespace Elokaily\Dashboard\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Elokaily\Dashboard\Mail\ResetPasswordMail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function dashboard() {
        $data["title"] = __('Dashboard');
        return view("dashboard::dashboard", $data);
    }
    public function login()
    {
        $data["title"] = __("Login");
        return view("dashboard::auth.login" , $data);
    }

    public function authenticate(Request $request) {
        // Validate input fields
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // Authentication was successful
            return redirect()->route('dashboard.main');
        }

        // Authentication failed
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email'));
    }

    public function register()
    {
        $data["title"] = __("Register");
        return view("dashboard::auth.register", $data);
    }

    public function createUser(Request $request) {
        $data = $request->validate([
            "firstName"     => "required|string|max:255|min:3",
            "secondName"    => "required|string|max:255|min:3",
            "email"         => "required|string|email|max:255|unique:users",
            "password"      => "required|string|min:8|confirmed",
        ]);
        $data['name'] = $data['firstName'] . ' ' . $data['secondName'];
        unset($data['firstName'], $data['secondName']);
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        Auth::login($user);
        return redirect()->route("dashboard.main");
    }

    public function authProviderRedirect($provider){
        if ($provider) {
            return Socialite::driver($provider)->redirect();
        }
        abort(404);
    }

    public function socialAuthentication ($provide) {
        dd($provide);
        $googleUser = Socialite::driver('google')->user();

        $user = User::updateOrCreate([
            'google_id' => $googleUser->id,
        ], [
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            "password" => Hash::make("123456789"),
            "google_id" => $googleUser->id,
            "picture" => $googleUser->getAvatar()
        ]);
        Auth::login($user);
        return redirect('/dashboard');
    }
    public function logout(Request $request)
    {
        // Log out the user
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the session token to prevent CSRF attacks
        $request->session()->regenerateToken();

        // Redirect to the login page or any other route you prefer
        return redirect()->route('dashboard.login');
    }

    public function forgetPassword() {
        $data["title"] = __("Forgot Password");
        return view("dashboard::auth.forget-password", $data);
    }

    public function sendMailReset(Request $request) {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

       if ($user){
           $existingToken = \DB::table('password_reset_tokens')->where('email', $request->input('email'))->first();
           if ($existingToken) {
               return back()->with('success', 'A password reset link has already been sent to your email. Please check your inbox.');
           }
           $token = Str::random(60);
           \DB::table('password_reset_tokens')->insert([
               'email' => $request->input('email'),
               'token' => $token,
               'created_at' => Carbon::now()
           ]);
           Mail::to($user)->send(new ResetPasswordMail($token));
       }
        return back()->with('success', 'A reset password link has been sent to your email.');
    }

    public function resetPassword($token) {
        $data['title'] = __("Reset Password");
        $data['token'] = $token;
        $passwordReset = \DB::table('password_reset_tokens')->where('token', $token)->first();
        if (!$passwordReset || Carbon::parse($passwordReset->created_at)->addMinutes(10)->isPast()) {
            return redirect()->route('dashboard.login')->with('error', 'This password reset link has expired or is invalid.');
        }
        return view('dashboard::auth.password-reset' , $data);
    }

    public function updatePassword(Request $request) {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);
        $passwordReset = \DB::table('password_reset_tokens')->where('token', $request->token)->first();
        if (!$passwordReset || Carbon::parse($passwordReset->created_at)->addMinutes(10)->isPast()) {
            return redirect()->route('dashboard.login')->with('error', 'This password reset link has expired or is invalid.');
        }
        $user = User::where('email', $passwordReset->email)
            ->update(['password' => Hash::make($request->password)]);
        \DB::table('password_reset_tokens')->where(['email'=> $passwordReset->email])->delete();
        return to_route("dashboard.login")->with("success" , "Your password has been changed!");
    }
}
