<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Products::with('order_details')
            ->get();
        return response()
            ->json($products, 200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated_data = $request->validated();
        $product = Products::create($validated_data);
        return response()
            ->json($product, 200);
        


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($productId)
    {
        $product = Products::with('order_details')
            ->findOrFail($productId);
        return response()->json($product);
        //
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $producto)
    {
        $validator = Validator::make($request->all(), [
            'id_producto' => 'required',
            'name' => 'required',
            'items_available' => 'required',
        ])->validated();

        $producto = Products::findOrFail($request->id_producto);
        $producto->name = $request->name;
        $producto->items_available = $request->items_available;
        $producto->update();
        return response()
            ->json($producto);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($productId)
    {
        $product = Products::findOrFail($productId);
        $product->delete();
        return response()->json(200);
    }
}
