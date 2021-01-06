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

        // Searching Products
        $products = $products->where('name', 'like', '%' . $request->search . '%');

        // Filtering Products
        if ($request->size) {
            $products = $products->whereIn('size_id', $request->size);
        }
        if ($request->material) {
            $products = $products->whereIn('material_id', $request->material);
        }
        if ($request->category) {
            $products = $products->whereIn('category_id', $request->category);
        }

        // Filters
        $categories = Category::all();
        $materials = Material::all();
        $sizes = Size::all();

        // Append
        $products = $products->paginate(9);
        $products->appends(['search' => $request->search, 'size' => $request->size, 'material' => $request->material, 'category' => $request->category]);

        return view('main.home', compact('categories', 'materials', 'sizes', 'products', 'request'));

    }

}
