<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Order::all()->where('user_id', auth()->user()->id);
        return view("clientside_view.orders_list", compact('orders'));
    }
}
