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
        Schema::table('services', function (Blueprint $table) {
            // Связанные услуги
            $table->unsignedBigInteger('related_service_1_id')->nullable()->comment('ID первой связанной услуги');
            $table->unsignedBigInteger('related_service_2_id')->nullable()->comment('ID второй связанной услуги');
            $table->unsignedBigInteger('related_service_3_id')->nullable()->comment('ID третьей связанной услуги');

            // Полезные статьи
            $table->unsignedBigInteger('related_article_1_id')->nullable()->comment('ID первой полезной статьи');
            $table->unsignedBigInteger('related_article_2_id')->nullable()->comment('ID второй полезной статьи');
            $table->unsignedBigInteger('related_article_3_id')->nullable()->comment('ID третьей полезной статьи');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn([
                'related_service_1_id',
                'related_service_2_id',
                'related_service_3_id',
                'related_article_1_id',
                'related_article_2_id',
                'related_article_3_id'
            ]);
        });
    }
};
