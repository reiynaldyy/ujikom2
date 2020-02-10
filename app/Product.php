<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['nama', 'slug', 'stok', 'category_id', 'harga', 'gambar', 'deskripsi'];
    public $timestamps = true;

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    // public function stokmasuk()
    // {
    //     return $this->hasMany('App\StokMasuk', 'id_produk');
    // }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
