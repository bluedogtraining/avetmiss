<?php namespace Avetmiss;

use Avetmiss\Fields\Field;
use Avetmiss\Row;


class File
{

	const SAVING_PATH = './';

	protected $rows = [];


	/**
	 *	Add a row to the file
	 */
	public function addRow(Row $row)
	{
		if($row->isValid())
		{
			$this->rows[] = $row;
		}
	}


	/**
	 *	Exports the rows to a file
	 */
	public function export()
	{
		$file = fopen(self::SAVING_PATH . $this->getFileName(), 'w');

		foreach($this->rows as $row)
		{
			fwrite($file, $row ."\n");
		}

		fclose($file);
	}


	/**
	 *	Returns the name of the file such as nat120.txt
	 */
	protected function getFileName()
	{
		return strtolower(str_replace('.php', '', get_called_class())) .'.txt';
	}
}