<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table='shop';
    public $timestamps = false;

    public function product()
    {
        return $this->hasMany(product::class);
    }
    public function category()
    {
        return $this->belongsTo(category::class,'shop_catogary');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function city()
    {
        return $this->belongsTo(city::class,'shop_city');
    }
}
