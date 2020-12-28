<?php

use App\Product;
use App\User;
use Carbon\Carbon;
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
        
        // Faker
        $faker = Faker\Factory::create();

        $users = User::all();
        $products = Product::all();
        $user_review_data = [];

        foreach ($users as $user) {
            foreach ($products as $product) {
                $user_review_data[] = [
                    'user_id' => $user->id,
                    'product_id' => $product->id,
                    'subject' => ucwords($faker->words(rand(1, 5), true)),
                    'description' => $faker->sentences(rand(2, 5), true),
                    'rating' => rand(0, 5),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ];
            }
        }

        DB::table('user_reviews')->insert($user_review_data);

    }
}
