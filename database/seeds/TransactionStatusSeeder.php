<?php

use App\Transaction;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $transactions = Transaction::all();
        $transaction_status_data = [];

        foreach ($transactions as $transaction) {

            if (true) {
                $transaction_status_data[] = [
                    'transaction_id' => $transaction->id,
                    'description' => 'Waiting for Payment Confirmation',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ];

                if (rand(0, 1) == 1) {
                    $transaction_status_data[] = [
                        'transaction_id' => $transaction->id,
                        'description' => 'Payment Accepted and Order Processed',
                        'created_at' => Carbon::now()->addHours(rand(1, 3))->format('Y-m-d H:i:s')
                    ];

                    if (rand(0, 1) == 1) {
                        $transaction_status_data[] = [
                            'transaction_id' => $transaction->id,
                            'description' => 'Delivering Product',
                            'created_at' => Carbon::now()->addHours(rand(4, 6))->format('Y-m-d H:i:s')
                        ];

                        if (rand(0, 1) == 1) {
                            $transaction_status_data[] = [
                                'transaction_id' => $transaction->id,
                                'description' => 'Transaction Complete',
                                'created_at' => Carbon::now()->addHours(rand(7, 9))->format('Y-m-d H:i:s')
                            ];
                        }

                    }

                }

            }

        }

        DB::table('transaction_statuses')->insert($transaction_status_data);

    }
}
