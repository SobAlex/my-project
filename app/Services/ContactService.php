<?php

namespace App\Services;

use App\Models\Contact;
use App\Models\Faq;

class ContactService
{
    /**
     * Get all contact settings.
     */
    public function getContactSettings(): array
    {
        return Contact::getContactData();
    }

    /**
     * Get contact information formatted for display.
     */
    public function getContactInfo(): array
    {
        $contact = Contact::getContactData();

        return [
            'address' => $contact['address'] ?? 'Адрес не указан',
            'phone' => $contact['phone'] ?? 'Телефон не указан',
            'email' => $contact['email'] ?? 'Email не указан',
            'working_hours' => $contact['working_hours'] ?? 'Часы работы не указаны',
            'social' => $contact['social'] ?? []
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
