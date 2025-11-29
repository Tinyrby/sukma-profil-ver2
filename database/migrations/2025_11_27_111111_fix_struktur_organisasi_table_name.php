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
        // Rename the incorrectly named table
        Schema::rename('struktur_organisasis', 'struktur_organisasi');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Rename back to the incorrect name if needed
        Schema::rename('struktur_organisasi', 'struktur_organisasis');
    }
};