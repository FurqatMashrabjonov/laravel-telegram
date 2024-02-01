<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'id' => config('admin.admin_id'),
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin12345'),
        ]);

        $this->call(TextSeeder::class);
        $this->call(SettingsSeeder::class);
    }
}
