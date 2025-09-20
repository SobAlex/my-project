<?php

namespace Database\Seeders;

use App\Models\ContactSetting;
use Illuminate\Database\Seeder;

class ContactSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Создаем основные контактные настройки с конкретными ключами
        ContactSetting::factory()
            ->email()
            ->active()
            ->create([
                'key' => 'email',
                'label' => 'Email',
                'description' => 'Основной email для связи'
            ]);

        ContactSetting::factory()
            ->phone()
            ->active()
            ->create([
                'key' => 'phone',
                'label' => 'Телефон',
                'description' => 'Основной телефон для связи'
            ]);

        ContactSetting::factory()
            ->url()
            ->active()
            ->create([
                'key' => 'address',
                'label' => 'Адрес',
                'value' => 'г. Москва, ул. Примерная, д. 123, офис 456',
                'type' => 'text',
                'description' => 'Адрес офиса'
            ]);

        ContactSetting::factory()
            ->active()
            ->create([
                'key' => 'working_hours',
                'label' => 'Часы работы',
                'value' => 'Пн-Пт: 9:00-18:00, Сб: 10:00-16:00',
                'type' => 'text',
                'description' => 'Режим работы'
            ]);

        // Социальные сети
        ContactSetting::factory()
            ->url()
            ->active()
            ->create([
                'key' => 'social_telegram',
                'label' => 'Telegram',
                'value' => 'https://t.me/example',
                'type' => 'url',
                'description' => 'Наш Telegram канал'
            ]);

        ContactSetting::factory()
            ->url()
            ->active()
            ->create([
                'key' => 'social_whatsapp',
                'label' => 'WhatsApp',
                'value' => 'https://wa.me/79001234567',
                'type' => 'url',
                'description' => 'Наш WhatsApp'
            ]);

        ContactSetting::factory()
            ->url()
            ->active()
            ->create([
                'key' => 'social_vk',
                'label' => 'ВКонтакте',
                'value' => 'https://vk.com/example',
                'type' => 'url',
                'description' => 'Наша группа ВКонтакте'
            ]);
    }
}
