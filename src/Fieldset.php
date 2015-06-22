<?php

namespace Bdt\Avetmiss;

use Bdt\Avetmiss\Fields\Field;

/**
 * Container for storing multiple Field objects
 */
class Fieldset implements \IteratorAggregate
{
    /**
     * @var array
     */
    protected $fields = [];

    /**
     * Create a new Fieldset
     *
     * @param array $fields
     */
    public function __construct(array $fields = [])
    {
        foreach ($fields as $field) {
            $this->addField($field);
        }
    }

    public function addField(Field $field)
    {
        $this->fields[$field->getName()] = $field;
    }

    public function getFieldByName($name)
    {
        if (!isset($this->fields[$name])) {
            throw new UnexistingFieldException($name .' doesn\'t exist in this '.get_called_class()); 
        }

        return $this->fields[$name];
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->fields);
    }
}