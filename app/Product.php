<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    // Fillables Property
    protected $fillable = ['category_id', 'material_id', 'size_id', 'name', 'price'];

    // Product has 1 Material
    public function material() {
        return $this->belongsTo(Material::class);
    }

    // Product has 1 Size
    public function size() {
        return $this->belongsTo(Size::class);
    }

    // Product has 1 Category
    public function category() {
        return $this->belongsTo(Category::class);
    }

    // Product has many Reviews
    public function reviews() {
        return $this->hasMany(UserReview::class);
    }

    // Product Rating
    public function getRatingAttribute() {
        $review = $this->reviews;
        return $review->avg('rating');
    }

    // Product has many images
    public function images() {
        return $this->hasMany(ProductImage::class);
    }

    // Get First Image
    public function image() {
        return $this->hasOne(ProductImage::class);
    }

}
