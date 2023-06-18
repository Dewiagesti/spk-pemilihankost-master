<?php

namespace App\Services;

use App\Helpers\FileUpload;
use App\Models\Alternative;
use App\Models\Kost;
use App\Models\Normalization;
use App\Models\User;
use App\Utils\PriceRangeUtils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AlternativeService
{

    public static function createAlternativeTable(Request $request)
    {

        // Padad bagian ini berfungsi untuk menambahkan data maupun mengupdate data ke tabel boarding_houses
        $createBoardingHouse = Kost::updateOrCreate(
            ['user_id' => Auth::user()->id],
            [
            'user_id'       => Auth::user()->id,
            'nama_kost'     => request('nama_kost'),
            'jenis_kost'    => request('jenis_kost'),
            'alamat'        => request('alamat'),
            'latitude'      => request('latitude'),
            'longitude'     => request('longitude'),
            'jarak'         => request('jarak'),
            'harga'         => (int)str_replace('.', '', request('harga')),
            'fasilitas'     => request('fasilitas'),
            'panjang_lebar_kamar' => request('panjang_lebar_kamar'),
            'keamanan'      => request('keamanan'),
            'lokasi'        => request('lokasi'),
            'kebersihan'    => request('kebersihan'),
            'daerah_sekitar'=> request('daerah_sekitar'),
            'gambar_kamar'  => FileUpload::uploadFile($request->gambar_kamar, '/kamar') ?? '',
            'gambar_kamar_mandi'  => FileUpload::uploadFile($request->gambar_kamar_mandi, '/kamar-mandi') ?? '',
            'gambar_tampak_depan'  => FileUpload::uploadFile($request->gambar_tampak_depan, '/kamar-tampak-depan') ?? '',
        ]);

        // fungsi ini untuk memanggil fungsi alternativeCreate 
        static::alternativeCreate($createBoardingHouse, $request);
    }


    // fungsi ini untuk proses create alternative pada database
    public static function alternativeCreate($createBoardingHouse, Request $request) 
    {

        Alternative::updateOrCreate(['kost_id' => $createBoardingHouse->id],[
            'kost_id'       => $createBoardingHouse->id,
            'harga'         => static::priceRangeRequest(intval($request['harga'])),
            'jarak'         => static::priceDistanceRequest($request['jarak']),
            'fasilitas'     => static::facilityRequest(str_replace(',','|', $request['fasilitas'])),
            'lokasi'        => static::locationRequest($request['lokasi']),
            'panjang_lebar_kamar' => static::roomSizeRequest($request['panjang_lebar_kamar']),
            'keamanan'      => static::securityRequest($request['keamanan']),
            'kebersihan' => static::cleanlinessRequest($request['kebersihan']),
            'daerah_sekitar' => static::areaRequest($request->daerah_sekitar ?? $request['daerah_sekitar'])
        ]);

        // Fungsi ini untuk mendapatkan Nilai Normalisasi
        foreach (Alternative::get() as $key ) {

            Normalization::updateOrCreate(
                ['kost_id' => $key->kost_id],
                [
                    'fasilitas'             => round($key->fasilitas / Alternative::max('fasilitas'), 2),
                    'panjang_lebar_kamar'   => round($key->panjang_lebar_kamar / Alternative::max('panjang_lebar_kamar'), 2),
                    'keamanan'              => round($key->keamanan / Alternative::max('keamanan'), 2),
                    'kebersihan'            => round($key->kebersihan / Alternative::max('kebersihan'), 2),
                    'harga'                 => round(Alternative::min('harga') / $key->harga, 2),
                    'jarak'                 => round(Alternative::min('jarak'),$key->jarak / 2),
                    'lokasi'                => round(Alternative::min('lokasi') / $key->lokasi, 2),
                    'daerah_sekitar'        => round(Alternative::min('daerah_sekitar') / $key->daerah_sekitar, 2)
                ]
            );
        }

    }


    public static function facilityRequest($sentences)
    {
            $y = "";
            $numberOfSentences = 0;
            $index = 0;

            while($sentences != $y) {
                $y .= $sentences[$index];
                if ($sentences[$index] == "|") {
                    $numberOfSentences++;
                }
                $index++;
            }
            $numberOfSentences++;
            // return $numberOfSentences;
            if ($numberOfSentences > 2 && $numberOfSentences <= 6) {
                return 2;
            }elseif($numberOfSentences > 6 && $numberOfSentences <= 8) {
                return 3;
            }elseif ($numberOfSentences > 8 && $numberOfSentences <= 10) {
                return 4;
            }elseif($numberOfSentences > 10){
                return 5;
            }
            else {
                return 1;
            }

    }


    public static function priceRangeRequest($reqRange)
    {

        if ($reqRange >= 250 && $reqRange <= 299) {
            return $reqRange = 1;
        }

        if ($reqRange >= 300 && $reqRange <= 349) {
            return $reqRange = 2;
        }

        if ($reqRange >= 350 && $reqRange <= 459) {
            return $reqRange = 3;
        }

        if ($reqRange >= 460 && $reqRange <= 500) {
            return $reqRange = 4;
        }

        if ($reqRange > 500 ) {
            return $reqRange = 5;
        }

    }

    public static function priceDistanceRequest($reqDistance)
    {
        
        if ($reqDistance >= 150 && $reqDistance <= 350) {
            return $reqDistance = 1;
        }

        if ($reqDistance > 351 && $reqDistance <= 450) {
            return $reqDistance = 2;
        }

        if ($reqDistance > 451 && $reqDistance <= 850) {
            return $reqDistance = 3;
        }

        if ($reqDistance >= 851 && $reqDistance <= 900) {
            return $reqDistance = 4;
        }

        if ($reqDistance > 901 ) {
            return $reqDistance = 5;
        }
    }

    public static function securityRequest($reqSecurity)
    {
      
        switch ($reqSecurity) {
            case 'Tidak Aman':
                   return $reqSecurity = 1;
                break;
            case 'Kurang Aman':
                   return $reqSecurity = 2;
                break;
            case 'Cukup Aman':
                   return $reqSecurity = 3;
                break;
            case 'Aman':
                   return $reqSecurity = 4;
                break;
            case 'Sangat Aman':
                   return $reqSecurity = 5;
                break;
            default:

                break;
        }

    }

    public static function cleanlinessRequest($reqCleanliness)
    {

        switch ($reqCleanliness) {
            case 'Tidak Bersih':
                   return $reqCleanliness = 1;
                break;
            case 'Kurang Bersih':
                   return $reqCleanliness = 2;
                break;
            case 'Cukup Bersih':
                   return $reqCleanliness = 3;
                break;
            case 'Bersih':
                   return $reqCleanliness = 4;
                break;
            case 'Sangat Bersih':
                   return $reqCleanliness = 5;
                break;
            default:

                break;
        }
    }

    public static function locationRequest($reqLocation)
    {
        switch ($reqLocation) {
            case 'Tidak Strategis':
                   return $reqLocation = 5;
                break;
            case 'Kurang Strategis':
                   return $reqLocation = 4;
                break;
            case 'Cukup Strategis':
                   return $reqLocation = 3;
                break;
            case 'Strategis':
                   return $reqLocation = 2;
                break;
            case 'Sangat Strategis':
                   return $reqLocation = 1;
                break;
            default:

                break;
        }
    }

    public static function roomSizeRequest($reqRoomSize)
    {

        switch ($reqRoomSize) {
            case '2 x 3':
                   return $reqRoomSize = 1;
                break;
            case '2,5 x 3':
                   return $reqRoomSize = 2;
                break;
            case '2,7 x 2,7':
                   return $reqRoomSize = 3;
                break;
            case '2,7 x 3':
                   return $reqRoomSize = 4;
                break;
            case '3 x 3':
                   return $reqRoomSize = 5;
                break;
            default:

                break;
        }
    }

    public static function areaRequest($reqArea)
    {

        switch ($reqArea) {
            case 'Dekat dengan kampus':
                   return $reqArea = 1;
                break;
            case 'Kurang Lebih dekat dengan kampus':
                   return $reqArea = 2;
                break;
            case 'Dekat dengan Jalan Utama':
                   return $reqArea = 3;
                break;
            case 'Dekat dengan Pembelanjaan':
                   return $reqArea = 4;
                break;
            case 'Jauh dari Kampus':
                   return $reqArea = 5;
                break;
            default:

                break;
        }
    }

}

