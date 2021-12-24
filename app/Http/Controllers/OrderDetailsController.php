<?php

namespace App\Http\Controllers;

use App\OrderDetails;
use Illuminate\Http\Request;
use App\Orders;

use App\Http\Requests\orderdetailspost;

class OrderDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $orderId)
    {
        $ordersdetail = OrderDetails::with('order', 'products');
        //    ->where('order', '=', $orderId)
        //    ->get();
            //
        if($request->costumer) {
            $ordersdetail->where('costumer.name','LIKE', '%'.$request->costumer.'%');
        }
        if($request->productName) {
            $ordersdetail->whereHas('products', function($query) use($request) {
                $query->where('name',$request->productName);
            });
        }
        $detail_filtered = $ordersdetail
            ->where('order', '=', $orderId)
            ->get();
        return response()->json($detail_filtered, 200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(orderdetailspost $request)
    {
        $validated_data = $request->validated();
        $Order = Orders::create($validated_data);
        return response()
            ->json($Order, 200);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrderDetails  $orderDetails
     * @return \Illuminate\Http\Response
     */
    public function show($id_order)
    {
        $Order = Orders::find($id_order);
        $details = $Order->OrderDetails()->find($id_order);
        return response()->json($details);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderDetails  $orderDetails
     * @return \Illuminate\Http\Response
     */
    public function update(orderdetailspost $request, OrderDetails $orderDetails)
    {
        $validated_data= $request->validated();
        $updatedetails = orderDetails::updated($validated_data);
        return response()->json($updatedetails);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderDetails  $orderDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderDetails $orderdetails,  $orderdetailId)
    {
        $orderdetails = OrderDetails::findOrFail($orderdetailId);
        $orderdetails->delete();
        return response()->json(200);
        //
    }
}
