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

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public static function createAlternativeTable(Request $request)
    {
    

        $createBoardingHouse = Kost::create([
            'user_id'       => Auth::user()->id,
            'nama_kost'     => request('nama_kost'),
            'jenis_kost'    => request('jenis_kost'),
            'alamat'        => request('alamat'),
            'latitude'      => Auth::user()->latitude,
            'longitude'     => Auth::user()->longitude,
            'jarak'         => request('jarak'),
            'harga'         => request('harga'),
            'fasilitas'     => request('fasilitas'),
            'panjang_lebar_kamar' => request('panjang_lebar_kamar'),
            'keamanan'      => request('keamanan'),
            'lokasi'        => request('lokasi'),
            'kebersihan'    => request('kebersihan'),
            'daerah_sekitar'=> request('daerah_sekitar'),
            'gambar_kamar'  => FileUpload::uploadFile($request->gambar_kamar, '/kamar'),
            'gambar_kamar_mandi'  => FileUpload::uploadFile($request->gambar_kamar_mandi, '/kamar-mandi'),
            'gambar_tampak_depan'  => FileUpload::uploadFile($request->gambar_tampak_depan, '/kamar-tampak-depan'),
        ]);

        $createAlternative = Alternative::create([
            'kost_id' => $createBoardingHouse->id,
            'harga'         => static::priceRangeRequest($request),
            'jarak'         => static::priceDistanceRequest($request),
            'fasilitas'     => static::facilityRequest(str_replace(',',' ', $request->fasilitas)),
            'lokasi'        => static::locationRequest($request),
            'panjang_lebar_kamar' => static::roomSizeRequest($request),
            'keamanan'      => static::securityRequest($request),
            'kebersihan' => static::cleanlinessRequest($request),
            'daerah_sekitar' => static::areaRequest($request)
        ]);

        foreach (Alternative::get() as $key ) {
     
            Normalization::updateOrCreate(
                ['kost_id' => $key->kost_id],
                [
                    'harga' => $key->harga /  Alternative::max('harga'),
                    'jarak' => $key->jarak / Alternative::max('jarak'),
                    'fasilitas' => $key->fasilitas / Alternative::max('fasilitas'),
                    'panjang_lebar_kamar' => $key->panjang_lebar_kamar / Alternative::max('panjang_lebar_kamar'),
                    'keamanan' => Alternative::min('keamanan') / $key->keamanan,
                    'kebersihan' => Alternative::min('kebersihan') / $key->kebersihan,
                    'lokasi' => Alternative::min('lokasi') / $key->lokasi,
                    'daerah_sekitar' => Alternative::min('daerah_sekitar') / $key->daerah_sekitar
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
                if ($sentences[$index] == " ") {
                    $numberOfSentences++;
                }
                $index++;
            }
            $numberOfSentences++;
            return $numberOfSentences;
    
    }


    public static function priceRangeRequest()
    {
        $reqRange = request('harga');

        if ($reqRange > 250 && $reqRange < 299) {
            return $reqRange = 1;
        }

        if ($reqRange > 300 && $reqRange < 349) {
            return $reqRange = 2;
        }

        if ($reqRange > 350 && $reqRange < 459) {
            return $reqRange = 3;
        }

        if ($reqRange > 460 && $reqRange <= 500) {
            return $reqRange = 4;
        }

        if ($reqRange > 500 ) {
            return $reqRange = 5;
        }

        return $reqRange;
    }

    public static function priceDistanceRequest(Request $request)
    {
        $reqRange = $request->jarak;
     
        if ($reqRange > 150 && $reqRange < 350) {
            return $reqRange = 1;
        }

        if ($reqRange > 360 && $reqRange < 450) {
            return $reqRange = 2;
        }

        if ($reqRange > 460 && $reqRange < 850) {
            return $reqRange = 3;
        }

        if ($reqRange > 960 && $reqRange <= 100000) {
            return $reqRange = 4;
        }

        if ($reqRange > 100000 ) {
            return $reqRange = 5;
        }

        return $reqRange;
    }

    public static function securityRequest(Request $request)
    {
        $reqSecurity = $request->keamanan;

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

    public static function cleanlinessRequest(Request $request)
    {
        $reqCleanliness = $request->kebersihan;

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

    public static function locationRequest(Request $request)
    {
        $reqLocation = $request->lokasi;

        switch ($reqLocation) {
            case 'Tidak Strategis':
                   return $reqLocation = 1;
                break;
            case 'Kurang Strategis':
                   return $reqLocation = 2;
                break;
            case 'Cukup Strategis':
                   return $reqLocation = 3;
                break;
            case 'Strategis':
                   return $reqLocation = 4;
                break;
            case 'Sangat Strategis':
                   return $reqLocation = 5;
                break;
            default:
                    
                break;
        }
    }

    public static function roomSizeRequest(Request $request)
    {
        $reqRoomSize = $request->panjang_lebar_kamar;

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

    public static function areaRequest(Request $request)
    {
        $reqArea = $request->daerah_sekitar;

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

