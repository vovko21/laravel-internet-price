<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Array_;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function notifications() {
        $index = 0;
        $notifications = [];
        foreach (Auth::user()->notifications as $notification) {
            $notifications[$index] = (array)json_decode($notification);
            $index++;
        }

        return view("clientside_view.account_notifications", compact('notifications'));
    }
}
