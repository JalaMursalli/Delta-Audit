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
        Schema::table('heroes', function (Blueprint $table) {
            // Make the 'image' column nullable
            $table->string('image')->nullable()->change();

            // Add the new 'video' column, also nullable
            $table->string('video')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('heroes', function (Blueprint $table) {
            // Revert 'image' column to not nullable
            $table->string('image')->nullable(false)->change();

            // Remove the 'video' column
            $table->dropColumn('video');
        });
    }
};
