<?php

namespace Bdt\Avetmiss;

class Utilities
{


    public static function toDate($mysql = null)
    {
        if (is_null($mysql)) {
            return null;
        }

        return date_format(new \DateTime($mysql), 'dmY');
    }


    public static function toNameForEncryption($first_name, $last_name)
    {
        return $last_name .', '. $first_name;
    }
}
