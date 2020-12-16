<?php

use App\Product;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $users = User::all();
        $products = Product::all();
        $user_review_data = [];

        foreach ($users as $user) {
            foreach ($products as $product) {
                $user_review_data[] = [
                    'user_id' => $user->id,
                    'product_id' => $product->id,
                    'rating' => rand(0, 5)
                ];
            }
        }

        DB::table('user_reviews')->insert($user_review_data);

    }
}
