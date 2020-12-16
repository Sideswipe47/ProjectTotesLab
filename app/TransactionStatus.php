<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionStatus extends Model
{
    
    // Fillables Property
    protected $fillable = ['status'];

    // Transaction Status belongs to a Transaction
    public function transaction() {
        return $this->belongsTo(Transaction::class);
    }

}
