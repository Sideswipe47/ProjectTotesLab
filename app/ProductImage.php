<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    // Fillables Property
    protected $fillable = ['product_id', 'path'];

    // Product Image belongs to a Product
    public function product() {
        return $this->belongsTo(Product::class);
    }
}
