<?php namespace Avetmiss\Fields;

use Avetmiss\Fields\Field;
use Avetmiss\Fields\FormatInterface;


class Date extends Field implements FormatInterface
{
    

    public function isFormatValid()
    {
    	$string = $this->value;

    	$day = (int)substr($string, 0, 2);
    	$month = (int)substr($string, 2, 2);
    	$year = (int)substr($string, 4, 4);

    	return checkdate($month, $day, $year);
    }
}