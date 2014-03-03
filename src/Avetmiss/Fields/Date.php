<?php namespace Avetmiss\Fields;

use Avetmiss\Fields\Field;
use Avetmiss\Fields\FormatInterface;


class Date extends Field implements FormatInterface
{
    

    public function validateFormat($value)
    {
    	return true;
    }
}