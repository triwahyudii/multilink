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
        Schema::create('bayar_cicilan_leasings', function (Blueprint $table) {
            $table->id();
            $table->string('leasing', 50);
            $table->bigInteger('nomor_tagihan')->length(20);
            $table->string('nama', 200);
            $table->bigInteger('jumlah')->length(10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bayar_cicilan_leasings');
    }
};
