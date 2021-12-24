<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model

{
    static $rules = [
		'order' => 'required',
		'product' => 'required',
		'unit_price' => 'required',
        'num_items' =>'required',
		'iva' => 'required',
		'total' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable =
        [
        'order',
        'product',
        'unit_price',
        'discount',
        'num_items',
        'iva',
        'total',
        ];
    
    protected $hidden =
        [
        'created_at',
        'updated_at',
        ];
    public $timestamps = true;
    protected $primaryKey='id_order_details';
    protected $table = "order_details";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function order()
    {
        return $this->belongsTo(Orders::class, 'order','id_orders' );
    }
    public function products()
    {
        return $this->belongsTo(Products::class, 'product', 'id_producto');
    }
}

