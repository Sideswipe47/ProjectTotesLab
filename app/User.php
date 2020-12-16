<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Member has one Shopping Cart
    public function shoppingCart() {

        // Check Shopping Cart
        $shopping_cart = $this->hasOne(ShoppingCart::class);

        // Create Shopping Cart if NULL
        if (!$shopping_cart) {
            $shopping_cart = ShoppingCart::create(['user_id' => $this->id]);
        }

        return $shopping_cart;

    }

    // Member has many Transactions done
    public function transactions() {
        return $this->hasMany(Transaction::class);
    }

    // Member has many Promotion cards
    public function promotions() {
        return $this->hasMany(UserPromotion::class);
    }

    // Member has many reviews
    public function reviews() {
        return $this->hasMany(UserReview::class);
    }

}
