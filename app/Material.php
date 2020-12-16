<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    
    // Fillables Property
    protected $fillable = ['name'];

    // Category has many Products
    public function products() {
        return $this->hasMany(Product::class);
    }

}
