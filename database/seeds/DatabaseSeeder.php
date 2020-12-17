<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(UserSeeder::class);

        $this->call(DeliveryServiceSeeder::class);
        $this->call(DeliveryOptionSeeder::class);

        $this->call(MaterialSeeder::class);
        $this->call(SizeSeeder::class);
        $this->call(CategorySeeder::class);

        $this->call(ProductSeeder::class);
        $this->call(UserReviewSeeder::class);

        $this->call(ShoppingCartSeeder::class);
        $this->call(CartItemSeeder::class);

        $this->call(PromotionSeeder::class);
        $this->call(UserPromotionSeeder::class);

        $this->call(TransactionSeeder::class);
        $this->call(TransactionDetailSeeder::class);

    }
}
