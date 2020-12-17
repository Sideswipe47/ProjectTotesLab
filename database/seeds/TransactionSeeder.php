<?php

use App\DeliveryService;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $users = User::all();
        $delivery_services = DeliveryService::all();
        $transaction_data = [];
        $max_transaction = 5;

        foreach ($users as $user) {
            if ($user->role == 'member') {
                $count = 1;
                for ($i = 0; $i < rand(1, $max_transaction); ++$i) {
                    $transaction_data[] = [
                        'user_id' => $user->id,
                        'card_number' => Str::random(16),
                    ];
                    $count += 1;
                    if ($count >= $max_transaction) {
                        break;
                    }
                }
            }
        }

    }
}
