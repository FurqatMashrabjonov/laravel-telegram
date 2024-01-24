<?php

namespace Database\Seeders;

use App\Models\Text;
use Illuminate\Database\Seeder;

class TextSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $texts = [
            [
                'key' => 'main.start',
                'text' => [
                    'en' => 'Hello, :name!',
                    'ru' => 'Привет, :name!',
                    'uz' => 'Salom, :name!',
                ],
            ],
            [
                'key' => 'lang.ask_language',
                'text' => [
                    'en' => 'Please select a language',
                    'ru' => 'Пожалуйста, выберите язык',
                    'uz' => 'Iltimos, tilni tanlang',
                ],
            ],
            [
                'key' => 'phone.ask_phone',
                'text' => [
                    'en' => 'Please send your phone number',
                    'ru' => 'Пожалуйста, отправьте свой номер телефона',
                    'uz' => 'Iltimos, telefon raqamingizni yuboring',
                ],
            ]
        ];

        foreach ($texts as $key => $text) {
            $texts[$key]['text'] = json_encode($text['text']);
        }

        Text::query()->insert($texts);

    }
}
