<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Orders extends Model
{
    static $rules = [
		//'id_orders' => 'required',
		'user' => 'required',
		'costumer' => 'required',
		'sub_total' => 'required',
		'discount' => 'required',
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
            'user',
            'costumer',
            'sub_total',
            'discount', 
            'iva', 
            'total',
        ];
    protected $hidden =
        [
            'created_at',
            'updated_at',
        ];
    public $timestamps = true;
    protected $primaryKey='id_orders';
    protected $table = "orders";
    public function OrderDetails()
    {
        return $this->hasMany(OrderDetails::class, 'order', 'id_orders');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user', 'id_user');
    }
    public function costumer()

    {
        return $this->belongsTo(Costumers::class, 'costumer', 'id_costumers');
    }
    public function delete()
    {
        return DB::transaction(function () {
            $this->OrderDetails()->delete();
            parent::delete();
        });
    }


}
