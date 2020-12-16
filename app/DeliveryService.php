<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryService extends Model
{
    
    // Fillables Property
    protected $fillable = ['name', 'status'];

    // A Delivery Service has many Delivery Options
    public function deliveryOptions() {
        return $this->hasMany(DeliveryOption::class);
    }

}
