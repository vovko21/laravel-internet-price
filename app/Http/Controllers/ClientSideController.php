<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsFilterRequest;
use App\Models\ProductElectro;

class ClientSideController extends Controller
{
    public function index()
    {
        $allProductsElectro = ProductElectro::all();
        return view("clientside_view.index", compact('allProductsElectro'));
    }

    public function allProducts(ProductsFilterRequest $request)
    {
        $productsQuery = ProductElectro::query();

        if ($request->filled('price_from')) {
            $productsQuery->where('price_uah', '>=', (int)$request->price_from);
        }

        if ($request->filled('price_to')) {
            $productsQuery->where('price_uah', '<=', (int)$request->price_to);
        }

        foreach (['hit', 'new', 'sale'] as $field) {
            if ($request->has($field)) {
                $productsQuery->where($field, 1);
            }
        }

        $filteredProducts = $productsQuery->paginate(6)->withPath("?".$request->getQueryString());
        return view("clientside_view.all_products", compact('filteredProducts'));
    }

    public function view($id)
    {
        $productsElectro = ProductElectro::all()->where('id',$id);
        if($productsElectro->all() == null) return redirect("error_pages/404");
        $productsElectro = $productsElectro->first();
        return view("clientside_view/product_electro_view", compact('productsElectro'));
    }
}
;
