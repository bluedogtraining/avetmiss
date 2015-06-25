<?php

namespace Bdt\Avetmiss\Validators;

use Bdt\Avetmiss\Field;
use Zend_Validate;
use Zend_Validate_Callback;
use Zend_Validate_StringLength;
use Zend_Validate_InArray;

/**
 * Zend Framework 1 validator for validating a Field.
 */
class Zf1Validator extends Zend_Validate
{
    /**
     * Create a field validator using Zend Framework 1
     *
     * @param Field $field
     * @param boolean $validateLength whether the field must fit within the speciified length.
     */
    public function __construct(Field $field, $validateLength = false)
    {

        // Validate the field according to its own rules.
        $this->addValidator(new Zend_Validate_Callback(function($value) use ($field) {
            return $field->validate($value);
        }));

        if ($validateLength === true) {
            $this->addValidator(new Zend_Validate_StringLength($field->getLength()));
        }
    }
}