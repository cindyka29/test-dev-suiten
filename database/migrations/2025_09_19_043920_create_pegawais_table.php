<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('bagian')->nullable();
            $table->string('nomor_telepon')->nullable();
            $table->string('nomor_rekening')->nullable();
            $table->string('nama_rekening')->nullable();
            $table->string('bank')->nullable();
            $table->string('shift')->nullable();

            // Tambahan sesuai form
            $table->decimal('gaji_pokok', 15, 2)->nullable();
            $table->string('periode_gajian')->nullable(); // contoh: 2 Minggu, 1 Bulan
            $table->decimal('gaji_harian', 15, 2)->nullable();
            $table->decimal('uang_makan', 15, 2)->nullable();
            $table->decimal('uang_makan_merah', 15, 2)->nullable();
            $table->decimal('rate_lembur', 15, 2)->nullable();
            $table->decimal('rate_lembur_merah', 15, 2)->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pegawais');
    }
};
