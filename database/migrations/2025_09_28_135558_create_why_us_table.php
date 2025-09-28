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
        Schema::create('why_us', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Заголовок блока');
            $table->text('description')->nullable()->comment('Описание блока');
            $table->string('icon')->nullable()->comment('Иконка Material Icons');
            $table->string('color')->default('#06b6d4')->comment('Цвет иконки');
            $table->string('image')->nullable()->comment('Путь к изображению');
            $table->boolean('is_active')->default(true)->comment('Активен ли блок');
            $table->integer('sort_order')->default(0)->comment('Порядок сортировки');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('why_us');
    }
};
