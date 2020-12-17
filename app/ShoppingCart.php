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

    // Shopping Cart has 1 Delivery Service Provider
    public function deliveryService() {
        return $this->belongsTo(DeliveryService::class);
    }

    // Shopping Cart has 1 Delivery Option of the Service
    public function deliveryOption() {
        return $this->belongsTo(DeliveryOption::class);
    }

    // Shopping Cart has 0 or 1 Promo
    public function userPromotion() {
        return $this->belongsTo(UserPromotion::class, 'promotion_id');
    }

    // Function to Get Discount Amount
    public function getDiscountAttribute() {
        return $this->cartItems->map(function ($item, $key) {
            return $item->subtotal;
        })->sum() * (1 - ($this->userPromotion->promotion->discount / 100));
    }

    // Function to Get Total
    public function getTotalAttribute() {
        return $this->cartItems->map(function ($item, $key) {
            return $item->subtotal;
        })->sum();
    }

    // Function to Get Grand Total
    public function getGrandTotalAttribute() {
        $total = $this->cartItems->map(function ($item, $key) {
            return $item->subtotal;
        })->sum();

        if ($this->userPromotion) {
            $total *= ($this->userPromotion->promotion->discount / 100);
        }

        $total += $this->deliveryOption->cost;

        return $total;

    }
}
