<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'first_name' => 'demo',
            'last_name' => 'demo',
            'email' => 'demo',
            'password' => bcrypt('demo')
        ]);
    }
}
