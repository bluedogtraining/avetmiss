<?php namespace Avetmiss;

use Avetmiss\File;
use Avetmiss\Fields\Field;


abstract class Row
{

	protected $fields = [];
	protected $data = [];


	/**
	 *	Adds a field to this row' structure
	 */
	public function addField(Field $field)
	{
		$this->fields[$field->getName()] = $field;
	}


	/**
	 *	Returns the field named $name
	 */
	public function getField($name)
	{
		if(!array_key_exists($name, $this->fields))
		{
			throw new \Exception($name .' doesn\'t exist in '. get_called_class());
		}

		return $this->fields[$name];
	}


	public function getData($name)
	{
		if(!array_key_exists($name, $this->data))
		{
			throw new \Exception($name .' doesn\'t exist in '. get_called_class());
		}

		return $this->data[$name];
	}


	/**
	 *	Populate one of the field
	 */
	public function __set($name, $value)
	{
		// get the field about to be populated and validate the value
		$field = $this->getField($name);

		if($field->isValid($value))
		{
			$this->data[$name] = $value;

			return true;
		}

		return false;
	}


	/**
	 *	Checks if the row' values are valid with the structure
	 */
	public function isValid()
	{
		return true;
	}


	/**
	 *	Renders the row to a string, including the required lenghts
	 */
	public function __toString()
	{
		$string = '';

		foreach($this->fields as $name => $field)
		{
			$string .= $field->export($this->data[$name]);
		}

		return $string;
	}
}