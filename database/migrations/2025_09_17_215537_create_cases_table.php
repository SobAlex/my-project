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
        Schema::create('cases', function (Blueprint $table) {
            $table->id();
            $table->string('case_id')->unique(); // Уникальный ID кейса (seo-case-1, etc.)
            $table->string('title'); // Название кейса
            $table->string('client'); // Название клиента
            $table->string('industry'); // Отрасль (electronics, production, clothing, furniture)
            $table->string('period'); // Период работы
            $table->string('image'); // Изображение кейса
            $table->text('description'); // Описание проекта
            $table->json('results'); // Ключевые результаты (массив строк)
            $table->json('before_after'); // Метрики до/после (JSON объект)
            $table->string('service_key')->default('seo-promotion'); // Ключ сервиса
            $table->boolean('is_published')->default(true); // Опубликован ли кейс
            $table->integer('sort_order')->default(0); // Порядок сортировки
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Автор кейса
            $table->timestamps();

            // Индексы для оптимизации
            $table->index(['is_published', 'sort_order']);
            $table->index('industry');
            $table->index('service_key');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cases');
    }
};
