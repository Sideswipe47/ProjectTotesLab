<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    
    // Fillables Property
    protected $fillable = ['user_id', 'delivery_service_id', 'delivery_option_id', 'promotion_id', 'card_number', 'address', 'note'];

    // Shopping Cart belongs to a User
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Shopping Cart has many Cart Items
    public function cartItems() {
        return $this->hasMany(CartItem::class);
    }

    public function getGrandTotalAttribute(){
        return $this->cartItems->map(function ($item, $key) {
            return $item->subtotal;
        })->sum();
    }
}
