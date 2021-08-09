<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminSideController extends Controller
{
    public function index() {
        return view("adminside_view/index");
    }
}
