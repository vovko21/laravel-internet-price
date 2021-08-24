<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Notifications\OrderNotification;
use Illuminate\Http\Request;
use App\Constants\Constants;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Session;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function cart()
    {
        $order_id = Session(Constants::$OrderId);
        $order = null;
        if (!is_null($order_id)) {
            $order = Order::findOrFail($order_id);
            Session([Constants::$OrderId => $order->id]);
        }
        return view('clientside_view/cart', compact('order'));
    }

    public function cartConfirmation()
    {
        $orderId = session(Constants::$OrderId);
        if (is_null($orderId)) {
            return redirect()->route('index');
        }
        $order = Order::find($orderId);
        return view('clientside_view/order', compact('order'));
    }

    public function cartConfirm(Request $request)
    {
        $orderId = session(Constants::$OrderId);
        if (is_null($orderId)) {
            return redirect()->route('/');
        }
        $order = Order::find($orderId);
        $success = false;
        if (Auth::check()) {
            $success = $order->saveOrderWithUser($request->name, $request->phone, Auth::user()->id);
        } else {
            $success = $order->saveOrder($request->name, $request->phone);
        }
        session()->forget(Constants::$OrderId);

        if ($success) {
            session()->flash('success', 'Ваше замовлення прийнято в обробку!');
            if (Auth::check()) {
                Notification::send(Auth::user(), new OrderNotification('info','Ваше замовлення [№'.$order->id.'] прийнято в обробку!'));
            }
        } else {
            session()->flash('warning', 'Невідома помилка');
            if (Auth::check()) {
                Notification::send(Auth::user(), new OrderNotification('error','Невідома помилка'));
            }
        }

        return redirect()->route('home');
    }

    public function cartAdd($product_id)
    {
        $order_id = Session(Constants::$OrderId);
        if (is_null($order_id)) {
            $order = Order::create();
            Session([Constants::$OrderId => $order->id]);
        } else {
            $order = Order::find($order_id);
        }

        if ($order->products_electro->contains($product_id)) {
            $pivotRow = $order->products_electro()->where('product_electro_id', $product_id)->first()->pivot;
            $pivotRow->quantity++;
            $pivotRow->update();
        } else {
            $order->products_electro()->attach($product_id);
        }

        return redirect()->route('cart');
    }

    public function cartRemove($product_id)
    {
        $orderId = session(Constants::$OrderId);
        if (is_null($orderId)) {
            return redirect()->route('cart');
        }
        $order = Order::find($orderId);

        if ($order->products_electro->contains($product_id)) {
            $pivotRow = $order->products_electro()->where('product_electro_id', $product_id)->first()->pivot;
            if ($pivotRow->quantity < 2) {
                $order->products_electro()->detach($product_id);
            } else {
                $pivotRow->quantity--;
                $pivotRow->update();
            }
        }

        return redirect()->route('cart');
    }

    public function cartQuantity($product_id, $quantity)
    {
        $orderId = session(Constants::$OrderId);
        if (is_null($orderId)) {
            return redirect()->route('cart');
        }
        $order = Order::find($orderId);

        if ($order->products_electro->contains($product_id)) {
            $pivotRow = $order->products_electro()->where('product_electro_id', $product_id)->first()->pivot;
            if (is_integer($quantity)) {
                $pivotRow->quantity = $quantity;
                $pivotRow->update();
            }
        }

        return redirect()->route('cart');
    }
}
