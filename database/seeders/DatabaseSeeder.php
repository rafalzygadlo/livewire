<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User\User::create([
            'first_name' => 'demo',
            'last_name' => 'demo',
            'email' => 'demo',
            'password' => bcrypt('demo'),
            'status' => \App\Models\User\UserStatus::$active
        ]);


        \App\Models\User\User::factory()->count(500)->create();
        \App\Models\Employee::factory()->count(11500)->create();



    }
}
