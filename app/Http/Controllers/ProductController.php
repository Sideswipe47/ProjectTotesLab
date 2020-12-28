<?php

namespace App\Http\Controllers;

use App\Category;
use App\Material;
use App\Product;
use App\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Get for a Product Page
    public function getProduct(Request $request){
        $product = Product::find($request->id);
        $reviews = $product->reviews;
        return view('product.index', compact('product', 'reviews'));
    }

    // Get for Create
    public function getCreate() {
        $categories = Category::all();
        $sizes = Size::all();
        $materials = Material::all();
        return view('product.create', compact('categories', 'sizes', 'materials'));
    }
}
