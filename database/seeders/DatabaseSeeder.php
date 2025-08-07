<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*
        \App\Models\Company::factory()
            ->count(5)
            ->create()
            ->each(function ($company) {
                $company->users()->createMany(
                    \App\Models\User::factory()->count(10)->make(['password' => Hash::make('password')])->toArray()
                );
            });
        */
        \App\Models\Company::factory()
            ->count(5)
            ->create()
            ->each(function ($company) {
                    \App\Models\User::factory()->count(5)->create([
                'company_id' => $company->id,
            ]);
         });

        /*
        $company = \App\Models\Company::factory()->create();

        \App\Models\User::factory()->count(1000)->create([
            'company_id' => $company->id,
        ]);
        \App\Models\Employee::factory()->count(1000)->create();
        */

        \App\Models\User::create([
	        'company_id' => 1,
            'first_name' => 'demo',
            'last_name' => 'demo',
            'email' => 'demo',
            'password' => bcrypt('demo'),
            'status' => 1
        ]);


    }
}
