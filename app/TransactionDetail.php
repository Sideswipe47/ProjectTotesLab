<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    
    // Fillables Property
    protected $fillable = ['transaction_id', 'product_id', 'quantity'];

    // Transaction Detail belongs to a Shopping Cart
    public function transaction() {
        return $this->belongsTo(Transaction::class);
    }

    // Transaction Detail refers to one Product
    public function product() {
        return $this->belongsTo(Product::class);
    }

    // Function to Calculate Subtotal
    public function getSubtotalAttribute() {
        return $this->price * $this->quantity;
    }

}
