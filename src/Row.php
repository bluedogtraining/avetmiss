<?php

namespace Bdt\Avetmiss;

use Bdt\Avetmiss\File;
use Bdt\Avetmiss\Fields\Field;
use Bdt\Avetmiss\UnexistingFieldException;
use Bdt\Avetmiss\FieldNotSetException;

class Row
{

    protected $fields = [];
    protected $fieldset;

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
        $this->fields[$field->getName()] = $field;
        
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
    }


    /**
     *  Returns the field named $name
     */
    public function getField($name)
    {
        if (!array_key_exists($name, $this->fields)) {
            throw new UnexistingFieldException($name .' doesn\'t exist in '. get_called_class());
        }

        return $this->fields[$name];
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

        foreach ($this->fields as $field) {
            $length += $field->getLength();
        }

        if ($length == 0) {
            throw new UnexistingFieldException('The row '. get_called_class() .' to be populated contains no fields');
        }

        if (strlen($string) != $length) {
            throw new \InvalidArgumentException('Invalid data to create this row');
        }

        foreach ($this->fields as $field) {
            $value = substr($string, 0, $field->getLength());
            $string = substr($string, $field->getLength());
            $field->setValue($value);
        }

        return $this;
    }


    /**
     *  Populate one of the field
     */
    public function __set($name, $value)
    {
        $field = $this->getField($name);
        $field->setValue($value);
    }


    public function __get($name)
    {
        return $this->getField($name)->getValue();
    }


    /**
     *  Checks if the row' values are valid with the structure
     */
    public function isValid()
    {
        foreach ($this->fields as $field) {
            if (!$field->isValid()) {
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

        foreach ($this->fields as $name => $field) {
            $string .= $field->render();
        }

        return $string;
    }
}
