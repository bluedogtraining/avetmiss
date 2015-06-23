<?php

namespace Bdt\Avetmiss;

use Bdt\Avetmiss\File;
use Bdt\Avetmiss\Fields\Field;
use Bdt\Avetmiss\Exceptions\EmptyRowException;

/**
 * A Row is a container for a single entry of an AVETMISS data set.
 */
class Row
{
    /**
     * @var Fieldset
     */
    protected $fieldset;
    /**
     * @var array
     */
    protected $data = [];

    /**
     * Create a new Row with a Fieldset definition
     *
     * @param Fieldset $fieldset
     */
    public function __construct(Fieldset $fieldset)
    {
        $this->fieldset = $fieldset;
    }

    /**
     * Get the Fieldset for the Row.
     *
     * @return Fieldset
     */
    public function getFieldset()
    {
        return $this->fieldset;
    }

    /**
     * Adds a field to this row's structure.
     *
     * This will replace the existing Fieldset with a new instance of Fieldset
     * containing the additional Field.
     *
     * @param Field $field
     * @return self
     */
    public function addField(Field $field)
    {
        $this->fieldset = $this->fieldset->withField($field);
        
        return $this;
    }


    /**
     * Add multiple fields to this row's structure.
     * 
     * This will replace the existing Fieldset with a new instance of Fieldset
     * containing the additional Field;.
     *
     * @param array $fields
     * return self
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
     * Populate the fields for this Row based on a rendered string.
     *
     * @param string $string
     */
    public function populateFields($string)
    {
        // Verify that the row is of correct length
        $length = 0;

        foreach ($this->fieldset as $field) {
            $length += $field->getLength();
        }

        if ($length == 0) {
            throw new EmptyRowException('The row '. get_called_class() .' to be populated contains no fields');
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
     * Set the value for a field.
     *
     * If the value of the field is invalid, the value will be set to null instead.
     *
     * @param string $name
     * @param mixed $value
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


    /**
     * Get the value for a field.
     *
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        $field = $this->getField($name);
        return isset($this->data[$name]) ? $this->data[$name] : null;
    }


    /**
     * Checks if the row's values are valid with the fieldset definitions.
     *
     * @return boolean
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
     *  Renders the row to a string, including the required lengths and padding.
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
