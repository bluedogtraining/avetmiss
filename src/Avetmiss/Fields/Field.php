<?php namespace Avetmiss\Fields;


abstract class Field
{
    
    protected $name;
    protected $lenght;


    public function __construct(array $data = null)
    {
        $this->name = $data['name'];
        $this->lenght = $data['lenght'];
    }


    public function getName()
    {
    	return $this->name;
    }


    public function getLenght()
    {
    	return $this->lenght;
    }


    /**
     * Checks if a value is valid
     */
    public function isValid($value)
    {
    	if(!$this->validateFormat())
    	{
    		return false;
    	}
    	
    	return true;
    }


    /**
     * Exports $value according to the field structure
     */
    public function export($value)
    {
        // cut off the string if to long
        $value = substr($value, 0, $this->lenght);

    	// add spaces at the end of the string if required to match the proper lenght
    	return str_pad($value, $this->lenght);
    }
}