<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Session;

class CartController extends Controller
{
    public function cart()
    {
        $order_id = Session('order_id');
        if (!is_null($order_id)) {
            $order = Order::findOrFail($order_id);
            Session(['order_id' => $order->id]);
        }
        return view('clientside_view/cart', compact('order'));
    }

    public function cartConfirmation()
    {
        $orderId = session('order_id');
        if (is_null($orderId)) {
            return redirect()->route('index');
        }
        $order = Order::find($orderId);
        return view('clientside_view/order', compact('order'));
    }

    public function cartConfirm(Request $request)
    {
        $orderId = session('order_id');
        if (is_null($orderId)) {
            return redirect()->route('/');
        }
        $order = Order::find($orderId);
        $success = $order->saveOrder($request->name, $request->phone);
        session()->forget('order_id');

        if ($success) {
            session()->flash('success', 'Ваш заказ принят в обработку!');
        } else {
            session()->flash('warning', 'Случилась ошибка');
        }

        return redirect()->route('/');
    }

    public function cartAdd($product_id)
    {
        $order_id = Session('order_id');
        if (is_null($order_id)) {
            $order = Order::create();
            Session(['order_id' => $order->id]);
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
        $orderId = session('order_id');
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
        $orderId = session('order_id');
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
