<?php

use App\Product;
use App\Transaction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $transactions = Transaction::all();
        $products = Product::all();
        $transaction_detail_data = [];
        $max_product = 5;
        $max_quantity = 5;

        foreach ($transactions as $transaction) {
            $count = 1;
            foreach ($products as $product) {
                if (rand(0, 1) == 1) {
                    $transaction_detail_data[] = [
                        'transaction_id' => $transaction->id,
                        'product_id' => $product->id,
                        'quantity' => rand(1, $max_quantity),
                        'price' => $product->price
                    ];
                    $count += 1;
                    if ($count >= $max_product) {
                        break;
                    }
                }
            }
        }

        DB::table('transaction_details')->insert($transaction_detail_data);

    }
}
