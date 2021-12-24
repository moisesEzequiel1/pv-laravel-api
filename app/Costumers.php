<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Costumers extends Model
{
    //
    static $rules = [
		'id_costumers' => 'required',
		'name' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_costumers','name'];

    protected $hidden = [
        'updated_at','required',
        'created_at','required',
    ];
    public $timestamps = true;
    protected $primaryKey='id_costumers';
    protected $table = "costumers";
    
    public function Orders()
    {
        return $this->hasMany(Orders::class, 'costumer', 'id_costumers');
    }


}
