<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    protected $fillable = [
        'categories_name', 'categories_descraption',
    ];

    public function product()
    {
        return $this->hasMany(product::class);
    }

    public function shop()
    {
        return $this->hasMany(Shop::class,'shop_catogary');
    }
}
