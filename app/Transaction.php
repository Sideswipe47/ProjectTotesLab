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

}
