<?php

namespace Bdt\Avetmiss\Fields;

use Bdt\Avetmiss\Fields\Field;

/**
 * Class that must accept an AVETMISS formatted (dmY) date.
 */
class Date extends Field
{
    /**
     * {@inheritDoc}
     */
    public function isFormatValid($value)
    {
        $string = $value;

        $day = (int)substr($string, 0, 2);
        $month = (int)substr($string, 2, 2);
        $year = (int)substr($string, 4, 4);

        return checkdate($month, $day, $year);
    }
}
