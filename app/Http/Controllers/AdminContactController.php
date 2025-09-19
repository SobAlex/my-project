<?php

namespace App\Http\Controllers;

use App\Models\ContactSetting;
use App\Http\Requests\UpdateContactSettingsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminContactController extends Controller
{
    /**
     * Display the contact settings management page.
     */
    public function index()
    {
        $settings = ContactSetting::ordered()->get();

        return view('admin.contacts.index', compact('settings'));
    }

    /**
     * Show the form for editing contact settings.
     */
    public function edit()
    {
        $settings = ContactSetting::ordered()->get();

        return view('admin.contacts.edit', compact('settings'));
    }

    /**
     * Update the contact settings.
     */
    public function update(UpdateContactSettingsRequest $request)
    {
        $validated = $request->validated();

        try {
            foreach ($validated['settings'] as $settingData) {
                $setting = ContactSetting::findOrFail($settingData['id']);
                $setting->update([
                    'value' => $settingData['value'] ?? '',
                    'is_active' => isset($settingData['is_active']) ? (bool)$settingData['is_active'] : false,
                ]);
            }

            $settings = ContactSetting::ordered()->get();
            return view('admin.contacts.edit', compact('settings'))->with('success', 'Контактные данные успешно обновлены!');
        } catch (\Exception $e) {
            $settings = ContactSetting::ordered()->get();
            return view('admin.contacts.edit', compact('settings'))->with('error', 'Произошла ошибка при обновлении контактных данных: ' . $e->getMessage());
        }
    }

    /**
     * Create default contact settings if they don't exist.
     */
    public function createDefaults()
    {
        $defaultSettings = [
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

        foreach ($defaultSettings as $settingData) {
            ContactSetting::updateOrCreate(
                ['key' => $settingData['key']],
                $settingData
            );
        }

        Session::flash('success', 'Настройки контактов по умолчанию созданы!');
        return Redirect::route('admin.contacts.edit');
    }
}
