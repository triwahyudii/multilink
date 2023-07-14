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
        Schema::create('pulsas', function (Blueprint $table) {
            $table->id();
            $table->string('provider', 30);
            $table->bigInteger('nomor_handphone')->length(30);
            $table->bigInteger('pulsa')->length(10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pulsas');
    }
};
