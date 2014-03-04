<?php

use Avetmiss\Fields\Numeric;
use Fixture\NatEmpty;


class RowTest extends TestCase
{


	public function testAddAndGetField()
	{
		$row = new NatEmpty;
		$row->addField(new Numeric('foo', 10));

		$this->assertEquals('foo', $row->getField('foo')->getName());
		$this->assertEquals(10, $row->getField('foo')->getLenght());
	}


	public function testIsValidWithInvalidFields()
	{
		$field = $this->getMockBuilder('Avetmiss\Fields\Any')->disableOriginalConstructor()->getMock();
		$field->expects($this->once())->method('isValid')->will($this->returnValue(false));

		$row = new NatEmpty();
		$row->addField($field);

		$this->assertFalse($row->isValid());
	}


	public function testIsValidWithValidFields()
	{
		$field = $this->getMockBuilder('Avetmiss\Fields\Any')->disableOriginalConstructor()->getMock();
		$field->expects($this->once())->method('isValid')->will($this->returnValue(true));

		$row = new NatEmpty();
		$row->addField($field);

		$this->assertTrue($row->isValid());
	}


	/**
     * @expectedException Avetmiss\UnexistingFieldException
     */
    public function testGetInexistantFieldThrowsException()
	{
		$row = new NatEmpty;
		$row->getField('foo');
	}


	public function testToString()
	{
		$row = new NatPopulated;
		$row->foo = '23324';
		$row->bar = 'foo';
		$row->wee = '01122014';

		$this->assertEquals('23324foo               01122014', $row->__toString());
	}
}