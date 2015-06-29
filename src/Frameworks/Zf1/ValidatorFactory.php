<?php

namespace Bdt\Avetmiss\Frameworks\Zf1;

use Zend_Validate;
use Zend_Validate_Callback;
use Zend_Validate_StringLength;

/**
 * Factory for creating validators based on AVETMISS NAT fields.
 */
class ValidatorFactory
{
    /**
     * @var array
     */
    protected $natFieldsets = [];

    /**
     * Create a new validator for a NAT field.
     *
     * @param string $natName
     * @param string $fieldName
     * @param boolean $validateLength
     * @return Zend_Validate
     */
    public function create($natName, $fieldName, $validateLength = false)
    {
        if (!isset($this->natFieldsets[$natName])) {
            $natFieldset = '\\Bdt\Avetmiss\\Nat\\V7\\'.ucfirst($natName);
            $this->natFieldsets[$natName] = new $natFieldset;
        }

        $field = $this->natFieldsets[$natName]->getFieldByName($fieldName);

        $validator = new Zend_Validate();

        $validator->addValidator(new Zend_Validate_Callback(function($value) use ($field) {
            try {
                $isValid = $field->validate($value);
            } catch (\InvalidArgumentException $e) {
                $isValid = false;
            }

            return $isValid;
        }));

        if ($validateLength === true) {
            $validator->addValidator(new Zend_Validate_StringLength([
                'min' => 0,
                'max' => $field->getLength(),
            ]));
        }

        return $validator;
    }
}