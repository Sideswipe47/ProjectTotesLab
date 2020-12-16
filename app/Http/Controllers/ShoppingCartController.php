<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    public function getPage1(){

        $user = Auth::user();
        $shoppingCart = $user->shoppingCart;
        dd($shoppingCart);
        return view('cart.page1', compact('shoppingCart'));
    }
}
