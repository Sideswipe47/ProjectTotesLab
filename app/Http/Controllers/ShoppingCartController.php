<?php

namespace App\Http\Controllers;

use App\DeliveryOption;
use App\DeliveryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{

    // Get Page 1 - Shopping Cart Details
    public function getPage1(){
        $shoppingCart = Auth::user()->shoppingCart;
        return view('cart.page1', compact('shoppingCart'));
    }

    // Get Page 2 - Delivery Options
    public function getPage2() {
        $delivery_services = DeliveryService::all();
        $delivery_options = DeliveryOption::all();
        $promotions = Auth::user()->promotions->where('status', 'not used');
        return view('cart.page2', compact('deliveryServices', 'deliveryOptions', 'promotions'));
    }

    // Post Page 2
    public function postPage2(Request $request) {

        $request->validate([
            'delivery' => ['required', 'exists:delivery_services,id'],
            'option' => ['required', 'exists:delivery_options,id'],
            'promotion' => ['required', 'exists:user_promotions,id'],
            'address' => ['required', 'min:10']
        ]);

    }

    // Get Page 3 - Payment Options
    public function getPage3() {
        return view('cart.page3');
    }

    // Get Page 4 - Confirmation
    public function getPage4() {
        return view('cart.page4');
    }

}
