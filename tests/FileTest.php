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
		$row->foo = '888';
		$row->bar = 'bar foo';
		$row->wee = '30112000';

		$file->addRow($row);

		$file->export('nat120.txt');

		$this->assertEquals("888  bar foo           30112000\n", file_get_contents('nat120.txt'));

		unlink('nat120.txt');
	}
}