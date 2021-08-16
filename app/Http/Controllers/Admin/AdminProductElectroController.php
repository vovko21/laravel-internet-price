<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductElectroRequest;
use App\Models\ProductElectro;
use Illuminate\Http\Request;

class AdminProductElectroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productsElectro = ProductElectro::get();
        return view("adminside_view.products-electro", compact('productsElectro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminside_view.form-product-electro');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductElectroRequest $request)
    {
        ProductElectro::create($request->all());
        return redirect()->route('electro.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductElectro  $productElectro
     * @return \Illuminate\Http\Response
     */
    public function show(ProductElectro $electro)
    {
        return view('adminside_view.view-product-electro', compact('electro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductElectro  $electro
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductElectro $electro)
    {
        return view('adminside_view.form-product-electro', compact('electro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\ProductElectro  $electro
     * @return \Illuminate\Http\Response
     */
    public function update(ProductElectroRequest $request, ProductElectro $electro)
    {
        $electro->update($request->all());
        return redirect()->route('electro.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductElectro  $electro
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductElectro $electro)
    {
        $electro->delete();
        return redirect()->route('electro.index');
    }
}
