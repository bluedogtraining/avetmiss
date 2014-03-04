<?php namespace Avetmiss\Fields;

use Avetmiss\Fields\InvalidValueException;


abstract class Field
{
    
    protected $name;
    protected $lenght;
    protected $value = null;


    public function __construct($name, $lenght)
    {
        $this->name = $name;
        $this->lenght = $lenght;
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