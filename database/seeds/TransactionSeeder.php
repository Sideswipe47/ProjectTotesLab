<?php

use App\DeliveryService;
use App\Promotion;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // Faker
        $faker = Faker\Factory::create();

        $users = User::all();
        $promotions = Promotion::all();
        $delivery_services = DeliveryService::all();
        $transaction_data = [];
        $max_transaction = 10;

        foreach ($users as $user) {
            if ($user->role == 'member') {
                $count = 1;
                for ($i = 0; $i < rand(3, 15); ++$i) {
                    $delivery_service = $delivery_services[rand(0, count($delivery_services) - 1)];
                    $delivery_option = $delivery_service->deliveryOptions[rand(0, count($delivery_service->deliveryOptions) - 1)];
                    $promotion = null;
                    if (rand(0, 1) == 1) {
                        $promotion = $promotions[rand(0, count($promotions) - 1)]->id;
                    }
                    $transaction_data[] = [
                        'user_id' => $user->id,
                        'delivery_service_id' => $delivery_service->id,
                        'delivery_option_id' => $delivery_option->id,
                        'promotion_id' => $promotion,
                        'card_number' => $faker->creditCardNumber(),
                        'address' => $faker->address,
                        'note' => $faker->sentences(rand(1, 3), true),
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ];
                    $count += 1;
                    if ($count >= $max_transaction) {
                        break;
                    }
                }
            }
        }

        DB::table('transactions')->insert($transaction_data);

    }
}
