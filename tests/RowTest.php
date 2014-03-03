<?php

require __DIR__.'/../vendor/autoload.php';


use Avetmiss\Fields\Any;
use Avetmiss\Row;


class RowTest extends TestCase
{


	public function testExportSpacesPad()
	{
		$field = new Any([
			'name' => 'foo',
			'lenght' => 10,
		]);

		// bar with 7 spaces
		$this->assertEquals('bar', $field->export('bar'));
	}
}