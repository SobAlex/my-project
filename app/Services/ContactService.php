<?php

namespace App\Services;

use App\Models\ContactSetting;
use App\Models\Faq;

class ContactService
{
    /**
     * Get all contact settings.
     */
    public function getContactSettings(): array
    {
        return ContactSetting::getAllSettings();
    }

    /**
     * Get contact information formatted for display.
     */
    public function getContactInfo(): array
    {
        $contactSettings = $this->getContactSettings();

        return [
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
    }

    /**
     * Get active FAQs.
     */
    public function getActiveFaqs()
    {
        return Faq::active()->ordered()->get();
    }

    /**
     * Get contact page data.
     */
    public function getContactPageData(): array
    {
        return [
            'title' => 'Контакты',
            'contactInfo' => $this->getContactInfo(),
            'faqs' => $this->getActiveFaqs()
        ];
    }
}

