<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Création de 10 écoles
        \App\Models\School::factory(10)->create();

        $this->call([
            UserSeeder::class,
        ]);
    }
}