<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class section extends Model
{
    //
    protected $fillable = [
        'sections_name',
    ];

    public function products()
    {
        return $this->belongsToMany('App\product','product_sections','section_id','product_id');
    }
}
