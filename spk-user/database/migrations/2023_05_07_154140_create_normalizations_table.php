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
            $table->float('harga');
            $table->float('jarak');
            $table->float('fasilitas');
            $table->float('panjang_lebar_kamar');
            $table->float('keamanan');
            $table->float('kebersihan');
            $table->float('lokasi');
            $table->float('daerah_sekitar');
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
