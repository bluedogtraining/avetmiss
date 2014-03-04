<?php namespace Avetmiss\Fields;

use Avetmiss\Fields\Field;
use Avetmiss\Fields\FormatInterface;


class Date extends Field implements FormatInterface
{
    

    public function isFormatValid()
    {
    	$string = $this->value;

    	$day = substr($string, 0, 2);
    	$month = substr($string, 2, 2);
    	$year = substr($string, 4, 4);

    	return checkdate($month, $day, $year);
    }
}