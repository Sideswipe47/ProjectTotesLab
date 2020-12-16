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

        $this->call(MaterialSeeder::class);
        $this->call(SizeSeeder::class);
        $this->call(CategorySeeder::class);

        $this->call(ProductSeeder::class);
        $this->call(UserReviewSeeder::class);

        $this->call(ShoppingCartSeeder::class);
        $this->call(CartItemSeeder::class);

    }
}
