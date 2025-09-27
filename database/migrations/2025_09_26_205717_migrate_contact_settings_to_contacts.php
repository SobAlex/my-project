<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\ContactSetting;
use App\Models\Contact;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Migrate data from contact_settings to contacts
        $settings = ContactSetting::all()->pluck('value', 'key')->toArray();

        Contact::create([
            'email' => $settings['email'] ?? '',
            'phone' => $settings['phone'] ?? '',
            'address' => $settings['address'] ?? '',
            'working_hours' => $settings['working_hours'] ?? '',
            'social_telegram' => $settings['social_telegram'] ?? '',
            'social_whatsapp' => $settings['social_whatsapp'] ?? '',
            'social_vk' => $settings['social_vk'] ?? '',
            'social_instagram' => $settings['social_instagram'] ?? '',
            'social_youtube' => $settings['social_youtube'] ?? '',
            'is_active' => true,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
