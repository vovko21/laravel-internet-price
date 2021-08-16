<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductElectro extends Model
{
    use HasFactory;

    protected $table = 'products_electro';
    protected $fillable = [
        'article',
        'name',
        'price_dollar',
        'price_uah',
        'price_discount',
        'code_UKTZED'
    ];

    public function getPriceByQuantity() {
        if (!is_null($this->pivot)) {
            return $this->pivot->quantity * $this->price_uah;
        }
        return $this->price_uah;
    }
}
