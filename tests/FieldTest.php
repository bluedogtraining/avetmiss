<?php

require __DIR__.'/../vendor/autoload.php';


use Avetmiss\Fields\Any;


class FieldTest extends TestCase
{


	public function testExportSpacesPad()
	{
		$field = new Any([
			'name' => 'foo',
			'lenght' => 10,
		]);

		// bar with 7 spaces
		$this->assertEquals('bar       ', $field->export('bar'));
	}


	public function testCutIfLenghtIsToLong()
	{
		$field = new Any([
			'name' => 'foo',
			'lenght' => 10,
		]);

		// 12 characters
		$string = 'foobarfoobar';

		$this->assertEquals(10, strlen($field->export($string))); 
	}
}