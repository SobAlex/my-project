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
        Schema::create('blogs_v2', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Заголовок статьи
            $table->string('slug')->unique(); // URL-слаг для SEO
            $table->text('excerpt')->nullable(); // Краткое описание
            $table->longText('content')->nullable(); // Основной контент
            $table->string('image')->nullable(); // Изображение статьи
            $table->string('category')->default('seo-news'); // Категория (seo-news, analytics, tips)
            $table->string('meta_title')->nullable(); // SEO заголовок
            $table->text('meta_description')->nullable(); // SEO описание
            $table->boolean('is_published')->default(false); // Опубликована ли статья
            $table->integer('sort_order')->default(0); // Порядок сортировки
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Автор статьи
            $table->timestamp('published_at')->nullable(); // Дата публикации
            $table->timestamps();

            // Индексы для оптимизации
            $table->index(['is_published', 'sort_order']);
            $table->index('category');
            $table->index('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs_v2');
    }
};
