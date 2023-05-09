<?php

namespace App\Services;

use App\Models\User;
use App\Utils\PriceRangeUtils;
use Illuminate\Http\Request;
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
        $attr = $request->all();
        dd($attr['fasilitas'] = static::facilityRequest(Str::replace(',',' ', $request)));
        // dd($attr['keamanan'] = static::securityRequest($request));
        // dd($attr['jarak'] = static::priceDistanceRequest($request));
        // dd( $attr['harga'] = "hello");
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
        $reqCleanliness = $request->keamanan;

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

    public function areaRequest(Request $request)
    {
        $reqArea = $request->panjang_lebar_kamar;

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

