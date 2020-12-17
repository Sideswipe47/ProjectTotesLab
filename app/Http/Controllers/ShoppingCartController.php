<?php

namespace App\Http\Controllers;

use App\CartItem;
use App\DeliveryOption;
use App\DeliveryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ShoppingCartController extends Controller
{

    // Get Page 1 - Shopping Cart Details
    public function getPage1(){
        $shoppingCart = Auth::user()->shoppingCart;
        return view('cart.page1', compact('shoppingCart'));
    }

    // Get Page 2 - Delivery Options
    public function getPage2() {
        $deliveryServices = DeliveryService::all();
        $deliveryOptions = DeliveryOption::all();
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

    // Post for Updating Cart Item
    public function postUpdateItem(Request $request) {

        $validator = Validator::make($request->all(), [
            'quantity' => ['required', 'gt:0']
        ]);

        if ($validator->fails()) {
            return redirect()->route('cart/page/1')->withErrors([$request->id => $validator->errors()->first('quantity')]);
        }

        $cartItem = CartItem::findOrFail($request->id);
        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return redirect()->route('cart/page/1')->with([$request->id => 'Quantity has been updated']);

    }

}
