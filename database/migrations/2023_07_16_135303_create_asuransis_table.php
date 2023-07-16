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
        Schema::create('asuransis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ktp')->length(20);
            $table->string('nama', 100);
            $table->string('jenis_kelamin', 50);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->string('status_pernikahan', 50);
            $table->bigInteger('handphone')->length(20);
            $table->string('email');
            $table->string('negara');
            $table->integer('kelas');
            $table->string('alamat');
            $table->integer('kode_pos');
            $table->bigInteger('kk')->length(50);
            $table->string('status_keluarga', 50);
            $table->integer('jumlah_anak');
            $table->bigInteger('nomor_rekening')->length(50);
            $table->string('pemilik_rekening', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asuransis');
    }
};
