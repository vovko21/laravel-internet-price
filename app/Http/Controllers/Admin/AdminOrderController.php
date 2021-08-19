<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Notifications\OrderNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Notification;

class AdminOrderController extends Controller
{
    public function notAceptedOrders()
    {
        $orders = Order::all()->where('status',Constants::$OrderStatus['CREATED']);
        return view("adminside_view/orders", compact('orders'));
    }

    public function acceptOrder($id)
    {
        $order = Order::find($id);
        if ($order != null) {
            $order->status = Constants::$OrderStatus['ACCEPTED'];
            $order->save();
            Notification::send($order->user, new OrderNotification('info','Ваше замовлення [№'.$order->id.'] підтвердженно і передано на виконання'));
        }
        return redirect()->route('orders.index');
    }

    public function declineOrder($id)
    {
        $order = Order::find($id);
        if ($order != null) {
            $order->status = Constants::$OrderStatus['ZERO'];
            $order->save();
            Notification::send($order->user, new OrderNotification('info','Ваше замовлення не було підтвердженне'));
        }
        return redirect()->route('orders.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $orders = Order::all();
        return view("adminside_view/orders", compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //No need to create order myself
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  OrderRequest  $orderRequest
     * @return Response
     */
    public function store(OrderRequest $orderRequest)
    {
        //No need to create order myself
    }

    /**
     * Display the specified resource.
     *
     * @param Order $order
     * @return Response
     */
    public function show(Order $order)
    {
        return view('adminside_view.view-order', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Order $order
     * @return Response
     */
    public function edit(Order $order)
    {
        return view('adminside_view.form-orders', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param OrderRequest $orderRequest
     * @param Order $order
     * @return RedirectResponse
     */
    public function update(OrderRequest $orderRequest, Order $order)
    {
        $order->update($orderRequest->all());
        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Order $order
     * @return RedirectResponse
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index');
    }
}
