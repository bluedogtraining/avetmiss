<?php namespace Avetmiss;

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
		if(!$row->isValid())
		{
			throw new \Exception('Cant add invalid row');
		}

		$this->rows[] = $row;
	}


	/**
	 *	Exports the rows to a file
	 */
	public function export($name)
	{
		$file = fopen(self::SAVING_PATH . $name, 'w');

		foreach($this->rows as $row)
		{
			fwrite($file, $row ."\n");
		}

		fclose($file);
	}
}