<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
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
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'role' => UserRole::ADMIN,
        ]);
        User::factory()->create([
            'name' => 'Agent',
            'email' => 'agent@example.com',
            'role' => UserRole::AGENT,
        ]);
        user::factory()->create([
            'name' => 'Customer',
            'email' => 'customer@example.com',
            'role' => UserRole::CUSTOMER,
        ]);
    }
}
