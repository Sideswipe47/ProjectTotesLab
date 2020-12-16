<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $size_data = [
            [
                'width' => 30,
                'height' => 40,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'width' => 35,
                'height' => 38,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'width' => 50,
                'height' => 40,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];

        DB::table('sizes')->insert($size_data);

    }
}
