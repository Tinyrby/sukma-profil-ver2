<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('penduduk', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16)->unique();
            $table->string('no_kk', 16);
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->string('agama');
            $table->string('pendidikan');
            $table->string('pekerjaan');
            $table->string('status_keluarga');
            $table->text('alamat');
            $table->foreignId('id_dusun')->nullable()->constrained('dusun')->onDelete('set null');
            $table->string('status_perkawinan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('penduduk');
    }
};