<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductElectro extends Model
{
    protected $table = 'products_electro';
    use HasFactory;

    public function getPriceByQuantity() {
        if (!is_null($this->pivot)) {
            return $this->pivot->quantity * $this->price_uah;
        }
        return $this->price_uah;
    }
}
