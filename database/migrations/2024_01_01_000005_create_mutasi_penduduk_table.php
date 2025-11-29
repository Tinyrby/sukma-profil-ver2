<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mutasi_penduduk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_penduduk')->constrained('penduduk')->onDelete('cascade');
            $table->integer('tahun');
            $table->string('jenis_mutasi');
            $table->date('tanggal');
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mutasi_penduduk');
    }
};