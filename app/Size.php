<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    
    // Fillables Property
    protected $fillable = ['width', 'height'];

    // Category has many Products
    public function products() {
        return $this->hasMany(Product::class);
    }

    // Function for Printing
    public function getToStringAttribute() {
        return $this->width . 'cm * ' . $this->height . 'cm';
    }

}
