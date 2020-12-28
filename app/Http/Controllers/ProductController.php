<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function getProduct(Request $request){
        $product = Product::find($request->id);
        $reviews = $product->reviews;
        return view('main.productDetail', compact('product', 'reviews'));
    }
}
