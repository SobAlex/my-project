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
            // First drop the index if it exists
            $table->dropIndex(['industry']);
            // Then drop the column
            $table->dropColumn('industry');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cases', function (Blueprint $table) {
            // Re-add the column if rolling back, with a default value
            $table->string('industry')->default('clothing')->after('client');
        });
    }
};
