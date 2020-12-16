<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $material_data = [
            [
                'name' => 'Cotton',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Canvas',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Jute',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];

        DB::table('materials')->insert($material_data);

    }
}
