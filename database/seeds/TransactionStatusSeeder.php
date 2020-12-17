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
            $transaction_status_data = [
                [
                    'transaction_id' => $transaction->id,
                    'description' => 'Waiting for Payment Confirmation',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ], 
                [
                    'transaction_id' => $transaction->id,
                    'description' => 'Payment Accepted and Order Processed',
                    'created_at' => Carbon::now()->addHours(rand(1, 5))->format('Y-m-d H:i:s')
                ], 
            ];
        }

        DB::table('transaction_statuses')->insert($transaction_status_data);

    }
}
