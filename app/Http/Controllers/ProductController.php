<?php

namespace App\Http\Controllers;

use App\Category;
use App\Material;
use App\Product;
use App\Size;
use App\UserReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // Get for a Product Page
    public function getProduct(Request $request){
        $product = Product::find($request->id);
        $reviews = $product->reviews;
        $relateds[] = Product::where('size_id', $product->size_id)->where('id', '!=', $product->id)->inRandomOrder()->first();
        $relateds[] = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->inRandomOrder()->first();
        $relateds[] = Product::where('material_id', $product->material_id)->where('id', '!=', $product->id)->inRandomOrder()->first();
        $cartItem = null;
        if (Auth::check() && Auth::user()->role == "member") {
            $cartItem = Auth::user()->shoppingCart->cartItems->where('product_id', $product->id)->first();
        }
        return view('product.index', compact('product', 'reviews', 'relateds', 'cartItem'));
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

    // Get for Update
    public function getUpdate(Request $request) {
        $product = Product::findOrFail($request->id);
        $categories = Category::all();
        $sizes = Size::all();
        $materials = Material::all();
        return view('product.update', compact('product', 'categories', 'sizes', 'materials'));
    }

    // Post for Update
    public function postUpdate(Request $request) {
        $request->validate([
            'category' => ['required', 'exists:categories,id'],
            'material' => ['required', 'exists:materials,id'],
            'size' => ['required', 'exists:sizes,id'],
            'name' => ['required', 'unique:products,name,' . $request->id],
            'description' => ['nullable'],
            'price' => ['required', 'integer', 'gt:0']
        ]);

        $product = Product::findOrFail($request->id);
        $product->fill([
            'category_id' => $request->category,
            'material_id' => $request->material,
            'size_id' => $request->size,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price
        ])->save();

        return redirect()->route('product/update', $product->id)->with(['success' => $product->name . ' has been updated']);
    }

    // Post for Delete
    public function postDelete(Request $request) {
        $product = Product::findOrFail($request->id);
        $product->delete();
        return redirect()->back()->with(['success' => $product->name . ' is deleted.']);
    }

    //create a review 
    public function postReview(Request $request){
        $request->validate([
            'description'=>['required'],
            'title'=>['required']
        ]);
        $r = new UserReview;
        $r->rating = $request->rating;
        $r->subject = $request->title;
        $r->description = $request->description;
        $r->user_id = Auth::user()->id;
        $r->product_id = $request->id;
        $r->save();

        return redirect()->back();
    }
}
