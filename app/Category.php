<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['nama', 'slug'];
    public $timestamps = true;

    public function product()
    {
        return $this->hasMany('App\Product', 'category_id');
    }
}
