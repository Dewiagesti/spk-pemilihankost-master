<?php

namespace App\Utils;

class PriceRangeUtils
{

    public static function conditionPrice(int $reqRange)
    {
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
}
