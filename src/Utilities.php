<?php

namespace Bdt\Avetmiss;

use DateTime;

/**
 * Helper functions for working with AVETMISS.
 */
class Utilities
{

    /**
     * Converts a MySQL formatted date (Y-m-d) to AVETMISS format (dmY).
     *
     * @param string $mysql
     *
     * @return string
     */
    public static function toDate($mysql = null)
    {
        if (is_null($mysql)) {
            return null;
        }

        return date_format(new DateTime($mysql), 'dmY');
    }

    /**
     * Create an encryption string for AVETMISS.
     *
     * @param string $firstName
     * @param string $lastName
     *
     * @return string
     */
    public static function toNameForEncryption($firstName, $lastName)
    {
        if(empty($lastName)){
            return $firstName . ', ' . $lastName;
        }
        return $lastName . ', ' . $firstName;
    }
}
