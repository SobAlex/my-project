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
        Schema::create('industry_categories_v2', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Название категории отрасли
            $table->string('slug')->unique(); // URL-слаг для SEO
            $table->text('description')->nullable(); // Описание категории
            $table->string('icon')->nullable(); // Иконка категории
            $table->string('color')->default('#3B82F6'); // Цвет категории
            $table->boolean('is_active')->default(true); // Активна ли категория
            $table->integer('sort_order')->default(0); // Порядок сортировки
            $table->timestamps();

            // Индексы для оптимизации
            $table->index(['is_active', 'sort_order']);
            $table->index('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('industry_categories_v2');
    }
};
