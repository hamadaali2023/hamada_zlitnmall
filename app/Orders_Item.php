<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders_Item extends Model
{
    protected $table='order_product';
    public $timestamps = false;


 public function product()
    {
     // return $this->belongsToMany('App\OrderItems')->withPivot('id');

       //return $this->hasMany(Orders_Item::class,'order_id','id'::class);
       return $this->hasOne(product::class, 'id', 'product_id'::class);
    }
}
