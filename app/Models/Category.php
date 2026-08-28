<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Override;

class Category extends Model
{
    //
    protected $fillable = ['name'];

    //banyak produk dimiliki oleh satu kategori
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
