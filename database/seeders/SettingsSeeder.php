<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'key' => 'locale',
                'value' => 'uz',
            ],
            [
                'key' => 'bot_token',
                'value' => config('nutgram.token', ''),
            ],
        ];

        DB::table('settings')->insert($settings);
    }
}
