<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientSideController extends Controller
{
    public function index() {
        return view("clientside_view/index");
    }
}
