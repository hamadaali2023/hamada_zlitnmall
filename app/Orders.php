<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table='orders';
    public $timestamps = false;
    
    
     public function OrderItems()
    {

       return $this->hasMany(Orders_Item::class,'order_id','id'::class);

    }

    public function User()
    {
       return $this->belongsTo(User::class, 'userID', 'id');

    }
}
