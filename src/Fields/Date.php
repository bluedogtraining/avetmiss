<?php

namespace Bdt\Avetmiss\Fields;

use Bdt\Avetmiss\Fields\Field;
use Bdt\Avetmiss\Fields\FormatInterface;


class Date extends Field implements FormatInterface
{


    public function isFormatValid($value)
    {
        $string = $value;

        $day = (int)substr($string, 0, 2);
        $month = (int)substr($string, 2, 2);
        $year = (int)substr($string, 4, 4);

        return checkdate($month, $day, $year);
    }
}