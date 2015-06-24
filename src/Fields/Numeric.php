<?php

namespace Bdt\Avetmiss\Fields;

use Bdt\Avetmiss\Fields\Field;

/**
 * Field that will accept a value that is numeric.
 */
class Numeric extends Field
{
    /**
     * {@inheritDoc}
     */
    public function isFormatValid($value)
    {
        return is_numeric($value);
    }
}
