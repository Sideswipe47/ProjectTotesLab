<?php

use App\User;
use Illuminate\Database\Seeder;

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
        $transaction_data = [];
        foreach ($users as $user) {
            
        }

    }
}
