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
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 200);
            $table->bigInteger('nomor_rekening')->length(17);
            $table->bigInteger('jumlah')->length(10);
            $table->string('nama_penerima', 200);
            $table->bigInteger('nomor_rekening_penerima')->length(17);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfers');
    }
};
