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
        Schema::create('normalizations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kost_id')->constrained( 'boarding_houses')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('harga', 5);
            $table->string('jarak', 5);
            $table->string('fasilitas', 5);
            $table->string('panjang_lebar_kamar', 5);
            $table->string('keamanan', 5);
            $table->string('kebersihan', 5);
            $table->string('lokasi', 5);
            $table->string('daerah_sekitar', 5);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('normalitations');
    }
};
