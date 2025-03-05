<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Admin',
            'email' => 'miloudybouchra01@gmail.com',
            'password' => Hash::make('Samar123$'),
            'role' => 'Admin',
            'salaire' => 10000.00,
            'Budjet' => 5000.00,
            'date_credit' => now(),
            'last_login' => now(),
        ]);

        $this->call([
            UserSeeder::class,
            CategorieSeeder::class,

        ]);
    }
}
