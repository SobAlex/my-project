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
        // Drop unused v2 tables that are duplicates
        Schema::dropIfExists('blog_categories_v2');
        Schema::dropIfExists('blogs_v2');
        Schema::dropIfExists('cases_v2');
        Schema::dropIfExists('industry_categories_v2');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Recreate v2 tables if needed (this would require the original table structures)
        // For now, we'll leave this empty as we don't want to recreate the unused structure
    }
};
