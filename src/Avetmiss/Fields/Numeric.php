<?php namespace Avetmiss\Fields;

use Avetmiss\Fields\Field;
use Avetmiss\Fields\FormatInterface;


class Numeric extends Field implements FormatInterface
{
    

    public function validateFormat($value)
    {
    	return is_numeric($value);
    }
}