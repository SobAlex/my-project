<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('faqs', function (Blueprint $table) {
            // Удаляем старые поля
            $table->dropColumn(['is_active_services', 'is_active_cases']);

            // Добавляем правильные поля
            $table->boolean('show_on_homepage')->default(true)->after('is_active')->comment('Показывать на главной странице');
            $table->boolean('show_on_services')->default(true)->after('show_on_homepage')->comment('Показывать на странице услуг');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('faqs', function (Blueprint $table) {
            // Удаляем новые поля
            $table->dropColumn(['show_on_homepage', 'show_on_services']);

            // Возвращаем старые поля
            $table->boolean('is_active_services')->default(true)->after('is_active');
            $table->boolean('is_active_cases')->default(true)->after('is_active_services');
        });
    }
};
