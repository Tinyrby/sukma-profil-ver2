<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kk', function (Blueprint $table) {
            $table->string('no_kk', 16)->primary();
            $table->string('kepala_keluarga');
            $table->string('jenis_bangunan');
            $table->string('pemakaian_air');
            $table->string('kategori_keluarga');
            $table->string('jenis_bantuan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kk');
    }
};