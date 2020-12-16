<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShoppingCartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $users = User::all();
        $shopping_cart_data = [];

        foreach ($users as $user) {
            if ($user->role == 'member') {
                $shopping_cart_data[] = [
                    'user_id' => $user->id
                ];
            }
        }

        DB::table('shopping_carts')->insert($shopping_cart_data);

    }
}
