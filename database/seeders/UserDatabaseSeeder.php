<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['username' => 'admin', 'password' => 'trung', 'state' => 1, 'created' => time()],
            ['username' => 'admin1', 'password' => 'trung1', 'state' => 1, 'created' => time()],
            ['username' => 'admin2', 'password' => 'trung2', 'state' => 1, 'created' => time()],
        ]);
    }
}
