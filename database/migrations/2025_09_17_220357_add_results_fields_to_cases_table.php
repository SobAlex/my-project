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
        Schema::table('cases', function (Blueprint $table) {
            // Добавляем отдельные поля для результатов
            $table->string('result_1')->nullable();
            $table->string('result_2')->nullable();
            $table->string('result_3')->nullable();
            $table->string('result_4')->nullable();
            $table->string('result_5')->nullable();
            $table->string('result_6')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cases', function (Blueprint $table) {
            $table->dropColumn([
                'result_1', 'result_2', 'result_3',
                'result_4', 'result_5', 'result_6'
            ]);
        });
    }
};
