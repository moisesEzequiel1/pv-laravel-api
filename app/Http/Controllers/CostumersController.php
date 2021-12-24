<?php

namespace App\Http\Controllers;

use App\Costumers;
use Illuminate\Http\Request;
use App\Http\Requests\CostumerPostRequest;

class CostumersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $costumers = Costumers::with('Orders')
            ->get();
        return response()
            ->json($costumers, 200);
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CostumerPostRequest $request)
    {
        $validated_data  = $request->validated();
        $costumer = Costumers::create($validated_data);
        return  response()
            ->json($costumer, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Costumers  $costumers
     * @return \Illuminate\Http\Response
     */
    public function show($costumerId, Costumers $costumers)
    {
        //
        $costumer = Costumers::with('Orders')
            ->findOrFail($costumerId);
        return response()
            ->json($costumer, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Costumers  $costumers
     * @return \Illuminate\Http\Response
     */
    public function update(CostumerPostRequest $request,$costumerId)
    {
        $costumer  = Costumers::findOrFail($costumerId);
        $costumer->name = $request->name;
        $costumer->update();

        return response()
            ->json($costumer);
        
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Costumers  $costumers
     * @return \Illuminate\Http\Response
     */
    public function destroy($costumerId)
    {
        $costumer = Costumers::findOrFail($costumerId);
        $costumer->delete();
        return response()->json(200);
        //
    }
}
