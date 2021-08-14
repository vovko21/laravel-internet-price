<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;
use Session;

class Order extends Model
{
    use HasFactory;
    public function products_electro()
    {
        return $this->belongsToMany(ProductElectro::class,'orders_product_electro')->withPivot('quantity')->withTimestamps();
    }

    public function getFullPrice()
    {
        $sum = 0;
        foreach ($this->products_electro as $product) {
            $sum += $product->getPriceByQuantity();
        }
        return $sum;
    }

    public function count_products_electro()
    {
        return count($this->products_electro);
    }

    public function saveOrder($name, $phone)
    {
        if ($this->status == 0) {
            $this->name = $name;
            $this->phone = $phone;
            $this->status = 1;
            $this->save();
            return true;
        } else {
            return false;
        }
    }
}
