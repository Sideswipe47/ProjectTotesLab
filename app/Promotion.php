<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    
    // Fillables Property
    protected $fillable = ['name', 'discount', 'expired_date'];
    
}
