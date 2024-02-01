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
                    'en' => 'Please send your phone number.
 <b>Phone number lenght should be 12 without +</b>

 You can also send your phone number by clicking the button below.',
                    'ru' => 'Пожалуйста, отправьте свой номер телефона.
 <b>Длина номера телефона должна быть 12 без +</b>

 Вы также можете отправить свой номер телефона, нажав на кнопку ниже.',
                    'uz' => 'Iltimos, telefon raqamingizni yuboring.
 <b>Telefon raqamingiz uzunligi + belgisiz 12 ta bo\'lishi kerak</b>

 Siz quyidagi tugmani bosib ham telefon raqamingizni yuborishingiz mumkin.',
                ],
            ],
            [
                'key' => 'lang.selected',
                'text' => [
                    'en' => 'Language selected',
                    'ru' => 'Язык выбран',
                    'uz' => 'Til tanlandi',
                ],
            ],
            [
                'key' => 'phone.selected',
                'text' => [
                    'en' => 'Phone number selected',
                    'ru' => 'Номер телефона выбран',
                    'uz' => 'Telefon raqami tanlandi',
                ],
            ],
            [
                'key' => 'phone.send_my_phone',
                'text' => [
                    'en' => '📱Send my phone number',
                    'ru' => '📱Отправить мой номер телефона',
                    'uz' => '📱Telefon raqamimni yuborish',
                ],
            ],
        ];

        foreach ($texts as $key => $text) {
            $texts[$key]['text'] = json_encode($text['text']);
        }

        Text::query()->insert($texts);

    }
}
