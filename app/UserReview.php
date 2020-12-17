<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserReview extends Model
{
    
    // Fillable Property
    protected $fillable = ['user_id', 'product_id', 'subject', 'description', 'rating'];

    // Review belongs to a User
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Review refer to one Product
    public function product() {
        return $this->belongsTo(Product::class);
    }

}
