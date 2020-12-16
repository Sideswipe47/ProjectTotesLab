<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $user_data = [
            [
                'name' => 'Andra Ardiansyah',
                'email' => 'andra@gmail.com',
                'password' => bcrypt('andra123'),
                'role' => 'member',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Mario Halim',
                'email' => 'mario@gmail.com',
                'password' => bcrypt('mario123'),
                'role' => 'admin',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Li Jialong',
                'email' => 'lijia@gmail.com',
                'password' => bcrypt('lijia123'),
                'role' => 'member',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Melvin Maitri',
                'email' => 'melvin@gmail.com',
                'password' => bcrypt('melvin123'),
                'role' => 'member',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Kalyana Cecilia Libitha Tanubrata',
                'email' => 'cecil@gmail.com',
                'password' => bcrypt('cecil123'),
                'role' => 'member',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ];

        DB::table('users')->insert($user_data);

    }
}
