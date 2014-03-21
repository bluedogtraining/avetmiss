<?php namespace Avetmiss;


class Utilities
{


    public static function toDate($mysql = null)
    {
        if(is_null($mysql))
        {
            return null;
        }

        return date_format(new \DateTime($mysql), 'dmY');
    }
}
