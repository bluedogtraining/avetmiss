<?php

namespace Bdt\Avetmiss\Fields;

use Bdt\Avetmiss\Fields\Field;

/**
 * Field that will accept any value of any format.
 */
class Any extends Field
{
    /**
     * {@inheritDoc}
     */
    public function isFormatValid($value)
    {
        return true;
    }
}
