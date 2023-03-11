<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartApi extends Model
{
    protected $table = 'cartapi';
    public $timestamps = false;
   

    public function products()
    {
        // return $this->hasMany(product::class,'id','product_id'::class);
          return $this->belongsTo(product::class,'product_id');
    }
    // -----------
   
}
