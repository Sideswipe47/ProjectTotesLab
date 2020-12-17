<?php

namespace App\Http\Controllers;

use App\CartItem;
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
    public function getPage2(Request $request) {

        $shoppingCart = Auth::user()->shoppingCart;
        $delivery = $shoppingCart->deliveryService ? $shoppingCart->deliveryService->id : $request->delivery;
        $deliveryServices = DeliveryService::all();

        if ($delivery) {
            $deliveryOptions = DeliveryService::findOrFail($delivery)->deliveryOptions;
        } else {
            $deliveryOptions = null;
        }
        
        $userPromotions = Auth::user()->promotions->where('status', 'not used');
        return view('cart.page2', compact('deliveryServices', 'deliveryOptions', 'userPromotions', 'delivery', 'shoppingCart'));
    }

    // Post Page 2
    public function postPage2(Request $request) {

        $request->validate([
            'carrier' => ['required', 'exists:delivery_services,id'],
            'option' => ['required', 'exists:delivery_options,id'],
            'promo' => ['nullable', 'exists:user_promotions,id'],
            'address' => ['required', 'min:10', 'max:500'],
            'note' => ['nullable', 'min:1', 'max:1000']
        ]);

        $shoppingCart = Auth::user()->shoppingCart;
        $shoppingCart->delivery_service_id = $request->carrier;
        $shoppingCart->delivery_option_id = $request->option;
        $shoppingCart->promotion_id = $request->promo;
        $shoppingCart->address = $request->address;
        $shoppingCart->note = $request->note;
        $shoppingCart->save();

        return redirect()->route('cart/page/3');

    }

    // Get Page 3 - Payment Options
    public function getPage3() {
        $shoppingCart = Auth::user()->shoppingCart;
        return view('cart.page3', compact('shoppingCart'));
    }

    // Post Page 3
    public function postPage3(Request $request) {

        $request->validate([
            'cardHolder' => ['required', 'min:1'],
            'expiredMonth' => ['required', 'date', 'date_format("m")'],
            'expiredYear' => ['required', 'date', 'date_format("y")']
        ]);

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

        return redirect()->route('cart/page/1')->with(['success' . $request->id => 'Quantity has been updated']);

    }

}
