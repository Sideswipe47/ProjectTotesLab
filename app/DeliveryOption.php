<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryOption extends Model
{
    
    // Fillables Property
    protected $fillable = ['delivery_service_id', 'name', 'cost'];

    // A Delivery Options belongs to a Delivery Service
    public function deliveryService() {
        return $this->belongsTo(DeliveryService::class);
    }

}
