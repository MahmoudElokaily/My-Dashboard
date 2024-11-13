<?php

namespace Elokaily\Dashboard\Controllers\Auth;

use App\Http\Controllers\Controller;

class AuthConttoller extends Controller
{
    public function login() {
        $data["title"] = __("Login");
        return view("dashboard::auth.login");
    }
}
