<?php

use Avetmiss\File;


class FileTest extends TestCase
{


	public function testAddRow()
	{
		$row = $this->getMock('Avetmiss\Row');

		$file = new File('nat120.txt');
		$file->addRow($row);

		$this->assertTrue(true);
	}


	public function testExport()
	{
		$row = $this->getMock('Avetmiss\Row');

		$file = new File('nat120.txt');
		$file->addRow($row);

		$file->export();
	}
}