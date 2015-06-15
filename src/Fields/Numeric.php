<?php namespace Bdt\Avetmiss\Fields;

use Bdt\Avetmiss\Fields\Field;
use Bdt\Avetmiss\Fields\FormatInterface;


class Numeric extends Field implements FormatInterface
{


    public function isFormatValid()
    {
        return is_numeric($this->value);
    }
}