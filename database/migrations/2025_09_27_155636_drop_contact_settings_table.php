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
        // Drop unused contact_settings table
        Schema::dropIfExists('contact_settings');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Recreate contact_settings table if needed
        // This would require the original table structure
    }
};
