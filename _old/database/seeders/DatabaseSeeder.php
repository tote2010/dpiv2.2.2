<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Rolles & Permssions
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);

        $this->call(TeamSeeder::class);
        
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@test.com',
            'password' => bcrypt('test'),
        ])->assignRole('Superadmin');
    }
}
