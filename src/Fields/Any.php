<?php namespace Bdt\Avetmiss\Fields;

use Bdt\Avetmiss\Fields\Field;
use Bdt\Avetmiss\Fields\FormatInterface;


class Any extends Field implements FormatInterface
{


    public function isFormatValid()
    {
        return true;
    }
}