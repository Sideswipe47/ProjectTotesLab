<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    
    // Fillables Property
    protected $fillable = ['user_id', 'delivery_service_id', 'delivery_option_id', 'promotion_id', 'card_number', 'address', 'note'];

    // Transaction belongs to a User
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Transaction has many Cart Items
    public function transactionDetails() {
        return $this->hasMany(TransactionDetail::class);
    }

    // Transaction has many Status
    public function transactionStatuses() {
        return $this->hasMany(TransactionStatus::class);
    }

    // Transaction has 1 Delivery Service Provider
    public function deliveryService() {
        return $this->belongsTo(DeliveryService::class);
    }

    // Transaction has 1 Delivery Option of the Service
    public function deliveryOption() {
        return $this->belongsTo(DeliveryOption::class);
    }

    // Transaction has 1 Promotion
    public function userPromotion() {
        return $this->belongsTo(UserPromotion::class, 'promotion_id');
    }

    // Transaction Grand Total
    public function getGrandTotalAttribute() {
        $total = $this->transactionDetails->map(function ($item, $key) {
            return $item->subtotal;
        })->sum();

        if ($this->userPromotion) {
            $total *= ($this->userPromotion->promotion->discount / 100);
        }

        $total += $this->deliveryOption->cost;

        return $total;

    }

}
