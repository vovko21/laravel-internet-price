<?php

namespace App\ViewModels;

use App\Constants\Constants;
use App\Models\Order;
use App\Models\ProductElectro;
use App\Notifications\OrderNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class Cart
{
    protected $order;

    /**
     * Basket constructor.
     * @param  bool  $createOrder
     */
    public function __construct($createOrder = false)
    {
        $order = session(Constants::$Order);

        if (is_null($order) && $createOrder) {
            $data = [];
            if (Auth::check()) {
                $data['user_id'] = Auth::id();
            }

            $this->order = new Order($data);
            session([Constants::$Order => $this->order]);
        } else {
            $this->order = $order;
        }
    }

    public function getOrder()
    {
        return $this->order;
    }

    public function saveOrder($name, $phone)
    {
        $this->order->saveOrderWithUser($name, $phone, Auth::user()->id);
        Auth::user()->notify(new OrderNotification('info','Ваше замовлення [№'. $this->order->getId() .'] прийнято в обробку!'));
        return true;
    }

    public function removeProduct(ProductElectro $product)
    {
        if ($this->order->products_electro->contains($product)) {
            $pivotRow = $this->order->products_electro->where('id', $product->id)->first();
            if ($pivotRow->quantity < 2) {
                $this->order->products_electro->pop($product);
            } else {
                $pivotRow->quantity--;
            }
        }
    }

    public function removeFullProduct(ProductElectro $product)
    {
        if ($this->order->products_electro->contains($product)) {
            $this->order->products_electro->forget($product);
        }
    }

    public function addProduct(ProductElectro $product)
    {
        if ($this->order->products_electro->contains($product)) {
            $pivotRow = $this->order->products_electro->where('id', $product->id)->first();
            $pivotRow->quantity++;
        } else {
            $this->order->products_electro->push($product);
        }

        return true;
    }
}
