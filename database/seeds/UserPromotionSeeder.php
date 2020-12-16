<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserPromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $users = User::all();
        $promotions = [];
        $user_promotion_data = [];

        foreach ($users as $user) {
            if ($user->role == 'member') {
                foreach ($promotions as $promotion) {
                    if(rand(0, 1) == 1) {
                        $user_promotion_data[] = [
                            'user_id' => $user->id,
                            'promotion_id' => $promotion->id
                        ];
                    }
                }
            }
        }

        DB::table('user_promotions')->insert($user_promotion_data);

    }
}
