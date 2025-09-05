<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Страница контактов
     */
    public function contacts()
    {
        return view('pages.contacts', [
            'title' => 'Контакты',
            'contactInfo' => [
                'address' => 'г. Санкт-Петербург, Невский проспект, 7',
                'phone' => '8 800 123 45 67',
                'email' => 'info@sobalex.com',
                'working_hours' => 'Пн-Пт: 9:00 - 18:00',
                'social' => [
                    'telegram' => 'https://t.me/sobalex',
                    'whatsapp' => 'https://wa.me/78001234567',
                    'vk' => 'https://vk.com/sobalex',
                ]
            ]
        ]);
    }
}
