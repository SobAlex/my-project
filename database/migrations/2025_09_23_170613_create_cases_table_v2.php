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
        Schema::create('cases_v2', function (Blueprint $table) {
            $table->id();
            $table->string('case_id')->unique(); // Уникальный ID кейса (seo-case-1, etc.)
            $table->string('title'); // Название кейса
            $table->string('client'); // Название клиента
            $table->text('description'); // Описание проекта
            $table->longText('content')->nullable(); // Основной контент кейса
            $table->string('image'); // Изображение кейса
            $table->string('industry'); // Отрасль (electronics, production, clothing, furniture)
            $table->string('period'); // Период работы
            $table->json('results')->nullable(); // Ключевые результаты (массив строк)
            $table->json('before_after')->nullable(); // Метрики до/после (JSON объект)
            $table->string('meta_title')->nullable(); // SEO заголовок
            $table->text('meta_description')->nullable(); // SEO описание
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
        Schema::dropIfExists('cases_v2');
    }
};
