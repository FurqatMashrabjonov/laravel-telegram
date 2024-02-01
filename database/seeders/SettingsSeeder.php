<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            'enable_language_selection' => true,
            'enable_phone_number' => false,
            'language_selection_mode' => 'markup',
            'key' => 'main',
        ];

        Settings::query()->create($settings);
    }
}
