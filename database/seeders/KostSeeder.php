<?php

namespace Database\Seeders;

use App\Models\Alternative;
use App\Models\Kost;
use App\Models\Normalization;
use App\Services\AlternativeService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(database_path('data/kost.json'));
        $kosts = json_decode($json, true);

        foreach ($kosts as $kost) {
            $request = new Request($kost); // Buat objek Request dengan data kost
            $createBoardingHouse = Kost::updateOrCreate(
                
                ['user_id' => $request->user_id],
                [
                    'user_id'       => $request->user_id,
                    'nama_kost'     => $request->nama_kost,
                    'jenis_kost'    => $request->jenis_kost,
                    'alamat'        => $request->alamat,
                    'latitude'      => $request->latitude,
                    'longitude'     => $request->longitude,
                    'jarak'         => $request->jarak,
                    'harga'         => (int) str_replace('.', '', $request->harga),
                    'fasilitas'     => $request->fasilitas,
                    'panjang_lebar_kamar' => $request->panjang_lebar_kamar,
                    'keamanan'      => $request->keamanan,
                    'lokasi'        => $request->lokasi,
                    'kebersihan'    => $request->kebersihan,
                    'daerah_sekitar'=> $request->daerah_sekitar,
                    // 'gambar_kamar'  => FileUpload::uploadFile($request->gambar_kamar, '/kamar'),
                    // 'gambar_kamar_mandi'  => FileUpload::uploadFile($request->gambar_kamar_mandi, '/kamar-mandi'),
                    // 'gambar_tampak_depan'  => FileUpload::uploadFile($request->gambar_tampak_depan, '/kamar-tampak-depan'),
                ]
            );

           AlternativeService::alternativeCreate($createBoardingHouse, $request);
     
        }
    }
}
