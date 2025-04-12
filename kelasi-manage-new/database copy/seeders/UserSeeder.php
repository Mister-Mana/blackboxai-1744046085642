<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Création d'un super admin
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@kelasi.com',
            'password' => Hash::make('password'),
            'role' => 'super_admin'
        ]);

        // Création de 50 utilisateurs (admins, enseignants, parents, élèves)
        User::factory(50)->create();
    }
}