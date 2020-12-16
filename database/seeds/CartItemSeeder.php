<?php

use App\Product;
use App\ShoppingCart;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $shopping_carts = ShoppingCart::all();
        $products = Product::all();
        $cart_item_data = [];
        $max_product = 5;
        $max_quantity = 5;

        foreach ($shopping_carts as $shopping_cart) {
            $count = 1;
            foreach ($products as $product) {
                if (rand(0, 1) == 1) {
                    $cart_item_data[] = [
                        'shopping_cart_id' => $shopping_cart->id,
                        'product_id' => $product->id,
                        'quantity' => rand(1, $max_quantity)
                    ];
                    $count += 1;
                    if ($count >= $max_product) {
                        break;
                    }
                }
            }
        }

        DB::table('cart_items')->insert($cart_item_data);

    }
}
