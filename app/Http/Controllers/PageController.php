<?php

namespace App\Http\Controllers;

use App\Models\ContactSetting;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Страница контактов
     */
    public function contacts()
    {
        // Получаем контактные данные из базы данных
        $contactSettings = ContactSetting::getAllSettings();

        // Формируем массив контактной информации
        $contactInfo = [
            'address' => $contactSettings['address'] ?? 'Адрес не указан',
            'phone' => $contactSettings['phone'] ?? 'Телефон не указан',
            'email' => $contactSettings['email'] ?? 'Email не указан',
            'working_hours' => $contactSettings['working_hours'] ?? 'Часы работы не указаны',
            'social' => [
                'telegram' => $contactSettings['social_telegram'] ?? null,
                'whatsapp' => $contactSettings['social_whatsapp'] ?? null,
                'vk' => $contactSettings['social_vk'] ?? null,
            ]
        ];

        return view('pages.contacts', [
            'title' => 'Контакты',
            'contactInfo' => $contactInfo
        ]);
    }
}
