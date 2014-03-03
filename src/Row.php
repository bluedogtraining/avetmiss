<?php namespace Avetmiss;

use Avetmiss\File;


class Row
{

	protected $fields = [];
	protected $data = [];


	/**
	 *	Adds a field to this row' structure
	 */
	protected function addField(Field $field)
	{
		$this->fields[$field->getName()] = $field;
	}


	/**
	 *	Returns the field named $name
	 */
	protected function getField($name)
	{
		return array_search($name, $fields);
	}


	/**
	 *	Populate one of the field
	 */
	public function __set($field, $value)
	{
		// get the field about to be populated and validate the value
		$field = $this->getField($field)

		if($field->isValid($value))
		{
			$this->data[$field] = $value;
		}
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

		foreach($this->data as $name => $value)
		{
			$field = $this->getField($name);

			$string .= $field->export($value);
		}

		return $string;
	}
}