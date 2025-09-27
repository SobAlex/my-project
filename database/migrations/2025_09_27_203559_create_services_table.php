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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Название услуги');
            $table->string('slug')->unique()->comment('URL-friendly название');
            $table->text('description')->nullable()->comment('Краткое описание');
            $table->longText('content')->nullable()->comment('Полное описание услуги');
            $table->string('icon')->nullable()->comment('Иконка Material Icons');
            $table->string('color', 7)->default('#06b6d4')->comment('Цвет в HEX формате');
            $table->string('image')->nullable()->comment('Изображение услуги');
            $table->decimal('price_from', 10, 2)->nullable()->comment('Цена от');
            $table->string('price_type')->default('project')->comment('Тип цены: project, hour, month');
            $table->json('features')->nullable()->comment('Список особенностей услуги');
            $table->string('meta_title')->nullable()->comment('SEO заголовок');
            $table->text('meta_description')->nullable()->comment('SEO описание');
            $table->string('meta_keywords')->nullable()->comment('SEO ключевые слова');
            $table->boolean('is_published')->default(true)->comment('Опубликована ли услуга');
            $table->boolean('is_featured')->default(false)->comment('Рекомендуемая услуга');
            $table->integer('sort_order')->default(0)->comment('Порядок сортировки');
            $table->timestamps();

            $table->index(['is_published', 'sort_order']);
            $table->index('is_featured');
            $table->index('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
