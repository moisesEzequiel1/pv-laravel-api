<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    static $rules = [
		'name' => 'required',
		'unit_price' => 'required',
		'items_available' => 'required'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable =
        [
        'id_producto',
        'name',
        'unit_price',
        'items_available',
        ];
    protected $hidden =
        [
        'created_at',
        'updated_at',
        ];
     

    public $timestamps = true;
    protected $primaryKey='id_producto';
    protected $table = "products";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function order_details()
    {
        return $this->hasMany(OrderDetails::class,  'product','id_producto' );
    }
}
