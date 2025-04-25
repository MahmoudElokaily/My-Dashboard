<?php

namespace Elokaily\Dashboard\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Elokaily\Dashboard\helpers\ImageHelpers;
use Elokaily\Dashboard\Mail\ResetPasswordMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class DashboardController extends Controller
{
   public function adminNav() {
       $data["title"] = "Admin Nav";
       return view('dashboard::dashboard.admin-nav', $data);
   }
}
