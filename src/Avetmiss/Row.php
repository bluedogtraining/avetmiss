<?php namespace Avetmiss;

use Avetmiss\File;
use Avetmiss\Fields\Field;
use Avetmiss\UnexistingFieldException;


abstract class Row
{

	protected $fields = [];


	/**
	 *	Adds a field to this row' structure
	 */
	public function addField(Field $field)
	{
		$this->fields[$field->getName()] = $field;
		
		return $this;
	}


	/**
	 *	Returns the field named $name
	 */
	public function getField($name)
	{
		if(!array_key_exists($name, $this->fields))
		{
			throw new UnexistingFieldException($name .' doesn\'t exist in '. get_called_class());
		}

		return $this->fields[$name];
	}


	/**
	 *	Populate one of the field
	 */
	public function __set($name, $value)
	{
		$field = $this->getField($name);
		$field->setValue($value);
	}


	/**
	 *	Checks if the row' values are valid with the structure
	 */
	public function isValid()
	{
		foreach($this->fields as $field)
		{
			if(!$field->isValid())
			{
				return false;
			}
		}

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
			$string .= $field->render();
		}

		return $string;
	}
}