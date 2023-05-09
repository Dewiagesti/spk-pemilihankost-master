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
        Schema::create('boarding_houses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained( 'users');
            $table->string('nama_kost',75);
            $table->enum('jenis_kost',['Putra', 'Putri']);
            $table->string('alamat',150);
            $table->string('latitude', 150)->nullable();
            $table->string('longitude', 150)->nullable();
            $table->string('jarak')->nullable();
            $table->string('harga', 20);
            $table->string('fasilitas');
            $table->string('panjang_kamar', 5);
            $table->string('lebar_kamar', 5);
            $table->enum('keamanan',['Sangat Aman','Aman', 'Cukup aman']);
            $table->string('kebersihan', 50);
            $table->string('gambar_kamar') ->nullable();
            $table->string('gambar_kamar_mandi')->nullable();
            $table->string('gambar_tampak_depan')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boarding_houses');
    }
};
