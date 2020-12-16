<?php

namespace App\Http\Controllers;

use App\Category;
use App\Material;
use App\Product;
use App\Size;
use Illuminate\Http\Request;

class MainController extends Controller
{
    
    // Get for Viewing Home Page
    public function getHome(Request $request) {

        // Products
        $products = Product::all()->toQuery();

        // Filtering Products
        if ($request->product_id) {
            $products = $products->where('product_id', $request->product_id);
        }
        if ($request->material_id) {
            $products = $products->where('material_id', $request->material_id);
        }
        if ($request->category_id) {
            $products = $products->where('category_id', $request->category_id);
        }

        // Filters
        $categories = Category::all();
        $materials = Material::all();
        $sizes = Size::all();

        $products = $products->paginate(9);
        return view('main.home', compact('categories', 'materials', 'sizes', 'products', 'request'));

    }

}
