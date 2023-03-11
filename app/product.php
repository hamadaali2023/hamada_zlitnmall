<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{    protected $fillable=['products_title','products_descraption','products_color'
                         , 'products_price','products_stock'];
  
  
    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function user()
    {
        return $this->belongsTo(user::class);
    }
    
      public function CartApis()
    {
         return $this->hasMany(CartApi::class,'id','product_id'::class);
          //return $this->belongsTo(product::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id');
    }
}
