<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPromotion extends Model
{
    
    // Fillables Property
    protected $fillable = ['user_id', 'promotion_id', 'status'];

    // User Promotion belongs to one User
    public function user() {
        return $this->belongsTo(User::class);
    }

    // User Promotion refers to a Promotion
    public function promotion() {
        return $this->belongsTo(Promotion::class);
    }

}
