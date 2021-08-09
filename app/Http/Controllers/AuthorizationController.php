<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorizationController extends Controller
{
    public function login() {
        return view("adminside_view/login");
    }

    public function register() {
        return view("adminside_view/register");
    }
}
