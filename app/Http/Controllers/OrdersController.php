<?php

namespace App\Http\Controllers;

use App\Orders;
use App\OrderDetails;
use Illuminate\Http\Request;

use App\Http\Requests\Orderpost;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $orders = Orders::with('costumer');
        if($request->userId) {
            $orders->where('user', $request->userId);
        }
        if($request->costumerId) {
            $orders->whereHas('costumer', function($query) use($request) {
                $query->where('id_costumers',$request->costumerId);
            });
        }
        if($request->costumerName) {
            $orders->whereHas('costumer', function($query) use($request) {
                $query->where('name',$request->costumerName);
            });
        }
        if($request->productName) {
            $orders->whereHas('products', function($query) use($request) {
                $query->where('name',$request->productName);
            });
        }

        if($request->sortBy && in_array($request->sortBy,['id_orders','created_at'])) {
            $sortBy = $request->sortBy;

        }else{
            $sortBy = 'id_orders';
        }
        if($request->sortOrder && in_array($request->sortBy,['asc','desc'])) {
            $sortOrder = $request->sortOrder;

        }else{
            $sortOrder = 'desc';
        }
        $order_filtered = $orders->orderBy($sortBy,$sortOrder)->get();
        return response()->json($order_filtered, 200);
 
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Orderpost $request)
    {
        $validated_data = $request->validated();
        $Order = Orders::create($validated_data);
        return response()
            ->json($Order, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function show($order_id)
    {
        //
        $orders = Orders::with('OrderDetails', 'costumer')->find($order_id);
        return response()->json($orders, 200);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function update(Orderpost $request, $orderId)
    {
        $order  = Orders::findOrFail($orderId);
        $order->user = $request->user;
        $order->costumer = $request->costumer;
        $order->sub_total = $request->sub_total;
        $order->discount = $request->discount;
        $order->iva = $request->iva;
        $order->total = $request->total;
        $order->update();
        return response()
            ->json($order);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orders $master, $orderId)
    {
        $order = Orders::findOrFail($orderId);
        $order->delete();
        return response()->json();
       // delete related  
  
    }
}
