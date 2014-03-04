<?php

use Avetmiss\File;
use Avetmiss\Row;
use Fixture\NatPopulated;


class FileTest extends TestCase
{


	/**
	 * @expectedException Exception
	 */
	public function testAddInvalidRow()
	{
		$row = $this->getMock('Avetmiss\Row');

		$file = new File;
		$file->addRow($row);

		$this->assertTrue(true);
	}


	public function testExport()
	{
		$file = new File;

		$row = new NatPopulated;
		$row->foo = '23324';
		$row->bar = 'foo';
		$row->wee = '01122014';

		$file->addRow($row);

		$file->export('nat120.txt');
	}
}