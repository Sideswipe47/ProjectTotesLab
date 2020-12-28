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

    // Post for Create
    public function postCreate(Request $request) {
        $request->validate([
            'category' => ['required', 'exists:categories,id'],
            'material' => ['required', 'exists:materials,id'],
            'size' => ['required', 'exists:sizes,id'],
            'name' => ['required', 'unique:products,name'],
            'description' => ['nullable'],
            'price' => ['required', 'integer', 'gt:0']
        ]);

        $product = Product::create([
            'category_id' => $request->category,
            'material_id' => $request->material,
            'size_id' => $request->size,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price
        ]);

        return redirect()->route('product/create')->with(['success' => $product->name . ' has been inserted']);
    }
}
