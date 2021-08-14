<?php

namespace App\Http\Controllers;

use App\Models\ProductElectro;
use Illuminate\Http\Request;

class ClientSideController extends Controller
{
    public function index() {
        $allProductsElectro = ProductElectro::all();
        return view("clientside_view/index", compact('allProductsElectro'));
    }

    public function view($id) {
        $productsElectro = ProductElectro::all()->where('id',$id);
        if($productsElectro->all() == null) return redirect("error_pages/404");
        $productsElectro = $productsElectro->first();
        return view("clientside_view/product_electro_view", compact('productsElectro'));
    }
}
