<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContactSetting;

class ContactSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'key' => 'address',
                'value' => 'г. Санкт-Петербург, Невский проспект, 7',
                'type' => 'text',
                'label' => 'Адрес офиса',
                'description' => 'Основной адрес офиса компании',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'key' => 'phone',
                'value' => '8 800 123 45 67',
                'type' => 'phone',
                'label' => 'Телефон',
                'description' => 'Основной телефон для связи',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'key' => 'email',
                'value' => 'info@sobalex.com',
                'type' => 'email',
                'label' => 'Email',
                'description' => 'Основной email для связи',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'key' => 'working_hours',
                'value' => 'Пн-Пт: 9:00 - 18:00',
                'type' => 'text',
                'label' => 'Часы работы',
                'description' => 'Рабочие часы офиса',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'key' => 'social_telegram',
                'value' => 'https://t.me/sobalex',
                'type' => 'url',
                'label' => 'Telegram',
                'description' => 'Ссылка на Telegram канал',
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'key' => 'social_whatsapp',
                'value' => 'https://wa.me/78001234567',
                'type' => 'url',
                'label' => 'WhatsApp',
                'description' => 'Ссылка на WhatsApp',
                'is_active' => true,
                'sort_order' => 6,
            ],
            [
                'key' => 'social_vk',
                'value' => 'https://vk.com/sobalex',
                'type' => 'url',
                'label' => 'ВКонтакте',
                'description' => 'Ссылка на страницу ВКонтакте',
                'is_active' => true,
                'sort_order' => 7,
            ],
        ];

        foreach ($settings as $settingData) {
            ContactSetting::updateOrCreate(
                ['key' => $settingData['key']],
                $settingData
            );
        }
    }
}
