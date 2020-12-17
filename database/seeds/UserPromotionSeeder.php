<?php

use App\Promotion;
use App\User;
use Carbon\Carbon;
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
        $promotions = Promotion::all();
        $user_promotion_data = [];

        foreach ($users as $user) {
            if ($user->role == 'member') {
                foreach ($promotions as $promotion) {
                    if(rand(0, 1) == 1) {
                        $user_promotion_data[] = [
                            'user_id' => $user->id,
                            'promotion_id' => $promotion->id,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                        ];
                    }
                }
            }
        }

        DB::table('user_promotions')->insert($user_promotion_data);

    }
}
