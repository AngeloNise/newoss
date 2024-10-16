<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Mang Juan',
            'name_of_organization' => 'IBits',
            'email' => 'test@example.com',
        ]);

        User::factory()->create([
            'name' => 'maria',
            'name_of_organization' => 'TPG',
            'email' => 'test12344@example.com',
        ]);

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password1'),
            'is_admin' => 1
        ]);
    }
}
