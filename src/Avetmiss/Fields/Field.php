<?php namespace Avetmiss\Fields;


abstract class Field
{

    protected $name = null;
    protected $length = null;
    protected $value = null;
    protected $in = null;
    protected $pad = null;


    /**
     * Used to generate fields in a fluent way
     *
     * ex. Field::make('any')->name('training_organisation_delivery_location_id')->length(10)->in(array);
     */
    public static function make($type)
    {
        $field = 'Avetmiss\Fields\\'. ucfirst($type);

        return new $field;
    }


    public function name($name)
    {
        $this->name = $name;

        return $this;
    }


    public function length($length)
    {
        if(!is_int($length))
        {
            throw new \InvalidArgumentException('length should be an int');
        }

        $this->length = $length;

        return $this;
    }


    public function in(array $array)
    {
        $this->in = $array;

        return $this;
    }


    public function pad($character = '')
    {
        $this->pad = $character;

        return $this;
    }


    public function getName()
    {
        return $this->name;
    }


    public function getlength()
    {
        return $this->length;
    }


    public function setValue($value)
    {
        $this->value = $value;

        if(!$this->isValid())
        {
            $this->value = null;
            throw new \InvalidArgumentException($value .' is not a valid value for '. $this->name);
        }
    }


    public function getValue()
    {
        return $this->value;
    }


    /**
     * Checks if a value is valid
     */
    public function isValid()
    {
        if(!is_null($this->in) && !in_array($this->value, $this->in))
        {
            throw new \UnexpectedValueException($this->value .' could not be found in the requested config array');
        }

        return $this->isFormatValid();
    }


    /**
     * Renders $value according to the field structure
     */
    public function render()
    {
        // get a copy of the value, we don't actually want to alter it
        $value = $this->value;

        // cut off the string if to long
        $value = substr($value, 0, $this->length);

        // add pad if selected
        if(!is_null($this->pad))
        {
            $value = str_pad($value, $this->length, $this->pad, STR_PAD_LEFT);
        }

        // add spaces at the end of the string if required to match the proper length
        return str_pad($value, $this->length);
    }
}