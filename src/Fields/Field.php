<?php

namespace Bdt\Avetmiss\Fields;

use InvalidArgumentException;
use UnexpectedValueException;

/**
 * Class for defining a field. This object is immutable, any write operations
 * will return a new Field object, instead of modifying the original.
 */
abstract class Field
{

    /**
     * @var string
     */
    protected $name;

    /**
     * @var integer
     */
    protected $length;

    /**
     * @var array
     */
    protected $in;

    /**
     * @var string
     */
    protected $pad;

    /**
     * Factory method to create a Field of a given type. Used for method chaining. e.g.:
     *
     *      Field::make('any')
     *          ->name('training_organisation_delivery_location_id')
     *          ->length(10)
     *          ->in(['values']);
     */
    public static function make($type)
    {
        $field = 'Bdt\Avetmiss\Fields\\' . ucfirst($type);

        return new $field;
    }

    /**
     * Create a new Field, based on the original, with a set name.
     *
     * @param string $name
     *
     * @return Field
     */
    public function name($name)
    {
        $new = clone $this;
        $new->name = $name;

        return $new;
    }

    /**
     * Create a new Field, based on the original, with a set length.
     *
     * @throws InvalidArgumentException
     *
     * @param string $length
     *
     * @return Field
     */
    public function length($length)
    {
        if (!is_int($length)) {
            throw new InvalidArgumentException('length should be an int');
        }

        $new = clone $this;
        $new->length = $length;

        return $new;
    }

    /**
     * Create a new Field, based on the original, with a set array of values to accept.
     *
     * @param array $array
     *
     * @return Field
     */
    public function in(array $array)
    {
        $new = clone $this;
        $new->in = $array;

        return $new;
    }

    /**
     * Create a new Field, based on the original, with a set pad value.
     *
     * @param string $character
     *
     * @return Field
     */
    public function pad($character = '')
    {
        $new = clone $this;
        $new->pad = $character;

        return $new;
    }

    /**
     * Get the name set on the Field.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the length set on the Field.
     *
     * @return integer
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Check that a provided value is valid, based on the rules of the Field.
     *
     * @throws UnexpectedValueException
     * @throws InvalidArgumentException
     *
     * @param mixed $value
     *
     * @return boolean
     */
    public function validate($value)
    {
        if ($this->in !== null && !in_array($value, $this->in)) {
            throw new UnexpectedValueException($value . ' could not be found in the requested config array');
        }

        if (!$this->isFormatValid($value)) {
            throw new InvalidArgumentException($value . ' is not a valid value for ' . $this->name);
        }

        return true;
    }

    /**
     * Renders $value according to the Field definition.
     *
     * @param mixed $input
     *
     * @return string
     */
    public function render($input)
    {
        // get a copy of the value, we don't actually want to alter it
        $value = $input;

        // cut off the string if too long
        $value = substr($value, 0, $this->length);

        // add pad if selected
        if ($this->pad !== null) {
            $value = str_pad($value, $this->length, $this->pad, STR_PAD_LEFT);
        }

        // add spaces at the end of the string if required to match the proper length
        return str_pad($value, $this->length);
    }

    /**
     * Check if the format of the provided value is valid.
     *
     * @param mixed $value
     *
     * @return boolean
     */
    abstract public function isFormatValid($value);
}
