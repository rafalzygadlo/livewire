<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name' => 'OpenAI Sp. z o.o.',
            'slug' => 'openai',
            'address' => 'Warszawa, ul. Przykładowa 1',
            'email' => 'kontakt@openai.pl',
        ]);
    }
}
