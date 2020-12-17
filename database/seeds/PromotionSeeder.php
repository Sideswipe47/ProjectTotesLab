<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $promotion_data = [];
        $promotion_max = 5;
        
        for ($i = 0; $i < rand(5, 10); ++$i) {
            $promotion_data[] = [
                'name' => 'Promotion #' . ($i + 1),
                'discount' => 5 * rand(1, 10),
                'expired_date' => Carbon::now()->addDays(rand(30, 360))->format('Y-m-d')
            ];
        }

        DB::table('promotions')->insert($promotion_data);

    }
}
