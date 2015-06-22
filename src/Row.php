<?php

namespace Bdt\Avetmiss;

use Bdt\Avetmiss\File;
use Bdt\Avetmiss\Fields\Field;
use Bdt\Avetmiss\UnexistingFieldException;
use Bdt\Avetmiss\FieldNotSetException;

class Row
{

    protected $fieldset;
    protected $data = [];

    public function __construct(Fieldset $fieldset)
    {
        $this->fieldset = $fieldset;
    }

    public function getFieldset()
    {
        return $this->fieldset;
    }

    /**
     *  Adds a field to this row' structure
     */
    public function addField(Field $field)
    {
        $this->fieldset->addField($field);
        
        return $this;
    }


    /**
     * Shortcut to add multiple fields
     */
    public function addFields(array $fields)
    {
        foreach ($fields as $field) {
            $this->addField($field);
        }

        return $this;
    }


    /**
     *  Returns the field named $name
     */
    public function getField($name)
    {
        return $this->fieldset->getFieldByName($name);
    }


    /**
     * Returns a populated Row object
     *
     * @param $row String
     */
    public function populateFields($string)
    {
        // Verify that the row is of correct length
        $length = 0;

        foreach ($this->fieldset as $field) {
            $length += $field->getLength();
        }

        if ($length == 0) {
            throw new UnexistingFieldException('The row '. get_called_class() .' to be populated contains no fields');
        }

        if (strlen($string) != $length) {
            throw new \InvalidArgumentException('Invalid data to create this row');
        }

        foreach ($this->fieldset as $name => $field) {
            $value = substr($string, 0, $field->getLength());
            $string = substr($string, $field->getLength());
            $this->data[$name] = $value;
        }

        return $this;
    }


    /**
     *  Populate one of the field
     */
    public function __set($name, $value)
    {
        // Ensure the field exists
        $field = $this->getField($name);
        try {
            $isValid = $field->validate($value);
        } catch (\Exception $e) {
            $isValid = false;
        }
        
        if ($isValid) {
            $this->data[$name] = $value;
        } else {
            $this->data[$name] = null;
        }
    }


    public function __get($name)
    {
        $field = $this->getField($name);
        return isset($this->data[$name]) ? $this->data[$name] : null;
    }


    /**
     *  Checks if the row' values are valid with the structure
     */
    public function isValid()
    {
        foreach ($this->fieldset as $name => $field) {
            $value = $this->__get($name);
            if (!$field->validate($value)) {
                return false;
            }
        }

        return true;
    }


    /**
     *  Renders the row to a string, including the required lengths
     */
    public function __toString()
    {
        $string = '';

        foreach ($this->fieldset as $name => $field) {
            $value = $this->__get($name);
            $string .= $field->render($value);
        }

        return $string;
    }
}
