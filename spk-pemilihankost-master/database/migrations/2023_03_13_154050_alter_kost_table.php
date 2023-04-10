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
        Schema::table('kost', function (Blueprint $table) {
            $table->renameColumn('`nama kost`', 'nama_kost');
            $table->renameColumn('`jenis kost`', 'jenis_kost');
            $table->renameColumn('`gambar kamar`', 'gambar_kamar');
            $table->renameColumn('`gambar kamar mandi`', 'gambar_kamar_mandi');
            $table->renameColumn('`gambar tampak depan`', 'gambar_tampak_depan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kost', function (Blueprint $table) {
            $table->renameColumn('nama_kost', '`nama kost`');
            $table->renameColumn('jenis_kost', '`jenis kost`');
            $table->renameColumn('gambar_kamar', '`gambar kamar`');
            $table->renameColumn('gambar_kamar_mandi', '`gambar kamar mandi`');
            $table->renameColumn('gambar_tampak_depan', '`gambar tampak depan`');
        });
    }
};
