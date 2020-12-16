<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliveryServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $delivery_service_data = [
            ['name' => 'JNE'],
            ['name' => 'AnterAja'],
            ['name' => 'TiKi'],
        ];

        DB::table('delivery_services')->insert($delivery_service_data);

    }
}
