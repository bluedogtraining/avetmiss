<?php

namespace Bdt\Avetmiss;

use Bdt\Avetmiss\Fields\Field;
use Bdt\Avetmiss\Exceptions\FieldNotFoundException;

/**
 * Container for storing multiple Field objects
 */
class Fieldset implements \IteratorAggregate, \Countable
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

    /**
     * Create a new Fieldset with an additional field.
     *
     * @param Field $field
     * @return Fieldset
     */
    public function withField(Field $field)
    {
        $this->fields[$field->getName()] = $field;
    }

    public function getFieldByName($name)
    {
        if (!isset($this->fields[$name])) {
            throw new FieldNotFoundException($name .' doesn\'t exist in this '.get_called_class());
        }

        return $this->fields[$name];
    }

    /**
     * Get the array iterator.
     *
     * @see \IteratorAggregate
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->fields);
    }

    /**
     * Count the fields.
     * 
     * @see \Countable
     */
    public function count()
    {
        return count($this->fields);
    }
}
