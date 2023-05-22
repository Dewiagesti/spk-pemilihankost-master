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
        Schema::create('alternatives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kost_id')->constrained( 'boarding_houses')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('harga');
            $table->integer('jarak');
            $table->integer('fasilitas');
            $table->integer('panjang_lebar_kamar');
            $table->integer('keamanan');
            $table->integer('kebersihan');
            $table->integer('lokasi');
            $table->integer('daerah_sekitar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alternatives');
    }
};
