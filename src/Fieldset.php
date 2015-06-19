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
    protected $fields; 

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

    protected function addField(Field $field)
    {
        $this->fields[$field->getName()] = $field;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->fields);
    }
}