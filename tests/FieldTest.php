<?php

use Avetmiss\Fields\Date;
use Avetmiss\Fields\Numeric;
use Avetmiss\Fields\Any;


class FieldTest extends TestCase
{


	public function testExportSpacesPad()
	{
		$field = new Any('foo', 10);
		$field->setValue('bar');

		// bar with 7 spaces
		$this->assertEquals('bar       ', $field->render());
	}


	public function testCutIfLenghtIsToLong()
	{
		$field = new Any('foo', 10);

		// 12 characters
		$field->setValue('foobarfoobar');

		$this->assertEquals(10, strlen($field->render())); 
	}


	/**
	 * @expectedException Exception
	 */
	public function testInvalidDateFormat()
	{
		$field = new Date('foo', 8);
		$field->setValue('foo');

		$this->assertFalse($field->isValid());
	}


	/**
	 * @expectedException Exception
	 */
	public function testValidDateFormat()
	{
		$field = new Date('foo', 8);
		$field->setValue(02032014);

		$this->assertTrue($field->isValid());
	}
}