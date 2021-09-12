<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ProductElectro;
use App\Notifications\OrderNotification;
use App\ViewModels\Cart;
use Illuminate\Http\Request;
use App\Constants\Constants;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Session;

class CartController extends Controller
{
    public function cart()
    {
        $order = (new Cart())->getOrder();
        return view('clientside_view/cart', compact('order'));
    }

    public function cartConfirmation()
    {
        $order = (new Cart())->getOrder();
        return view('clientside_view/order', compact('order'));
    }

    public function cartConfirm(Request $request)
    {
//        $email = Auth::check() ? Auth::user()->email : $request->email;
        if ((new Cart())->saveOrder($request->name, $request->phone)) {
            session()->flash('success', 'Успіх! Відправленно в обробку');
        } else {
            session()->flash('warning', 'Помилка');
        }

        return redirect()->route('home');
    }

    public function cartAdd(ProductElectro $product)
    {
        $result = (new Cart(true))->addProduct($product);

        return redirect()->route('cart');
    }

    public function cartRemove(ProductElectro $product)
    {
        (new Cart())->removeProduct($product);

        return redirect()->route('cart');
    }

    public function cartFullRemove(ProductElectro $product)
    {
        (new Cart())->removeFullProduct($product);

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
