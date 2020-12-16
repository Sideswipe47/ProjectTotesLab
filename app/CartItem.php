<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    
    // Fillables Property
    protected $fillable = ['shopping_cart_id', 'product_id', 'quantity'];

    // Cart Item belongs to a Shopping Cart
    public function shoppingCart() {
        return $this->belongsTo(ShoppingCart::class);
    }

    // Cart Item refers to one Product
    public function product() {
        return $this->belongsTo(Product::class);
    }

    // Function to get Shopping Cart Subtotal
    public function getSubtotalAttribute() {
        return $this->quantity * $this->product->price;
    }

}
