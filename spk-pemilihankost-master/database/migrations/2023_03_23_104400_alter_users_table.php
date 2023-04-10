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
        Schema::table('users', function(Blueprint $table) {
            $table->string('longitude',20)->nullable()->after('alamat');
            $table->string('latitude',20)->nullable()->after('longitude');
            $table->enum('role',['admin','mitra', 'user'])->after('latitude');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('longitude');
            $table->dropColumn('longitude');
            $table->dropColumn('role');
        });
    }
};
