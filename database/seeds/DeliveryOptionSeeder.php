<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliveryOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $delivery_option_data = [
            ['delivery_service_id' => 1, 'description' => 'Same Day Delivery', 'cost' => 20000],
            ['delivery_service_id' => 1, 'description' => 'Regular Day (1 - 3 days)', 'cost' => 10000],
            ['delivery_service_id' => 1, 'description' => 'Free Delivery (3 - 7 days)', 'cost' => 0],
            ['delivery_service_id' => 2, 'description' => 'Regular Day (1 - 5 days)', 'cost' => 5000],
            ['delivery_service_id' => 2, 'description' => 'Free Delivery (5 - 7 days)', 'cost' => 0],
            ['delivery_service_id' => 3, 'description' => 'Same Day Delivery', 'cost' => 15000],
            ['delivery_service_id' => 3, 'description' => 'Regular Day (1 - 3 days)', 'cost' => 7500],
        ];
        
        DB::table('delivery_options')->insert($delivery_option_data);

    }
}
