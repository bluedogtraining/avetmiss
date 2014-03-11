<?php namespace Avetmiss\Fields;

use Avetmiss\Fields\InvalidValueException;


abstract class Field
{
    
    protected $name = null;
    protected $lenght = null;
    protected $value = null;
    protected $in = null;


    /**
     * Used to generate fields in a fluent way
     *
     * ex. Field::make('any')->name('training_organisation_delivery_location_id')->lenght(10)->in(array);
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


    public function lenght($lenght)
    {
        $this->lenght = $lenght;

        return $this;
    }


    public function in(array $array)
    {
        $this->in = $array;

        return $this;
    }


    public function getName()
    {
    	return $this->name;
    }


    public function getLenght()
    {
    	return $this->lenght;
    }


    public function setValue($value)
    {
        $this->value = $value;

        if(!$this->isValid())
        {
            $this->value = null;
            throw new InvalidValueException($value .' is not a valid value for '. $this->name);
        }
    }


    /**
     * Checks if a value is valid
     */
    public function isValid()
    {
        if(!is_null($this->in))
        {
            return in_array($this->value, $this->in);
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
        $value = substr($value, 0, $this->lenght);

    	// add spaces at the end of the string if required to match the proper lenght
    	return str_pad($value, $this->lenght);
    }
}