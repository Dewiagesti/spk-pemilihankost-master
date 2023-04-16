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
        Schema::dropIfExists('admins');
        Schema::dropIfExists('mitras');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('almat');
            $table->string('email');
            $table->string('no_hp');
            $table->timestamps();
        });
        Schema::create('mitras', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 75);
            $table->string('email', 50);
            $table->string('password', 50);
            $table->string('alamat', 150);
            $table->string('latitude', 15);
            $table->string('longitude', 15);
            $table->string('no_hp', 15);
            $table->timestamps();
        });
    }
};
