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
        Schema::create('hero_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Заголовок Hero блока');
            $table->text('description')->comment('Описание Hero блока');
            $table->string('image')->nullable()->comment('Путь к изображению');
            $table->string('button_text')->default('Получить консультацию')->comment('Текст кнопки');
            $table->string('button_link')->default('#contact')->comment('Ссылка кнопки');
            $table->boolean('is_active')->default(true)->comment('Активен ли Hero блок');
            $table->integer('sort_order')->default(0)->comment('Порядок сортировки');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_sections');
    }
};
