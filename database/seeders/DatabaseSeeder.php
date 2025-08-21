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

        $this->call(RoleSeeder::class);

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ])->assignRole('Administrator');

        User::factory()->create([
            'name' => 'Simple User',
            'email' => 'user@example.com',
        ])->assignRole('User');

        $this->call([
            RoleAndPermissionSeeder::class,
            TaskSeeder::class,
            UserSeeder::class,

        ]);
    }
}
