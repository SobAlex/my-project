<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'phone',
        'address',
        'working_hours',
        'social_telegram',
        'social_whatsapp',
        'social_vk',
        'social_instagram',
        'social_youtube',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the single contact instance (singleton pattern).
     */
    public static function getInstance()
    {
        return static::firstOrCreate(
            ['id' => 1], // Always use ID 1 for singleton
            [
                'email' => '',
                'phone' => '',
                'address' => '',
                'working_hours' => '',
                'social_telegram' => '',
                'social_whatsapp' => '',
                'social_vk' => '',
                'social_instagram' => '',
                'social_youtube' => '',
                'is_active' => true,
            ]
        );
    }

    /**
     * Get contact data for frontend.
     */
    public static function getContactData(): array
    {
        $contact = static::getInstance();

        return [
            'email' => $contact->email,
            'phone' => $contact->phone,
            'address' => $contact->address,
            'working_hours' => $contact->working_hours,
            'social' => [
                'telegram' => $contact->social_telegram,
                'whatsapp' => $contact->social_whatsapp,
                'vk' => $contact->social_vk,
                'instagram' => $contact->social_instagram,
                'youtube' => $contact->social_youtube,
            ],
        ];
    }
}
