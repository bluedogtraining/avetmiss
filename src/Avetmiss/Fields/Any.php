<?php namespace Avetmiss\Fields;

use Avetmiss\Fields\Field;
use Avetmiss\Fields\FormatInterface;


class Any extends Field implements FormatInterface
{
    

    public function validateFormat($value)
    {
    	return true;
    }
}