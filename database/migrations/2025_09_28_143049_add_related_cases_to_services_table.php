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
            // Связанные кейсы
            $table->unsignedBigInteger('related_case_1_id')->nullable()->comment('ID первого связанного кейса');
            $table->unsignedBigInteger('related_case_2_id')->nullable()->comment('ID второго связанного кейса');
            $table->unsignedBigInteger('related_case_3_id')->nullable()->comment('ID третьего связанного кейса');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn([
                'related_case_1_id',
                'related_case_2_id',
                'related_case_3_id'
            ]);
        });
    }
};
