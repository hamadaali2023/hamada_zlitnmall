<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    //
    protected $fillable = [
        'City_name',
    ];

    // public function products()
    // {
    //     return $this->belongsToMany('App\product','product_city','id','product_id');
    // }
    public function shop()
    {
        return $this->hasMany(product::class);
    }
}
