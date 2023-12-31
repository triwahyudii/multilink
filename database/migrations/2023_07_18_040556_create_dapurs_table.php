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
        Schema::create('dapurs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->bigInteger('harga')->length(20);
            $table->text('deskripsi');
            $table->string('image');
            $table->string('status')->default('PROSES');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dapurs');
    }
};
