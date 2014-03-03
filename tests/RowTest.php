<?php

use Avetmiss\Fields\Numeric;
use Avetmiss\Nat\Fixture\Nat120;


class RowTest extends TestCase
{


	public function testAddAndGetField()
	{
		$field = new Numeric([
			'name' => 'foo',
			'lenght' => 10,
		]);

		$row = new Nat120;
		$row->addField($field);

		$this->assertEquals('foo', $row->getField('foo')->getName());
		$this->assertEquals(10, $row->getField('foo')->getLenght());
	}


	/**
     * @expectedException Exception
     */
    public function testGetInexistantFieldThrowsException()
	{
		$row = new Nat120;
		$row->getField('foo');
	}


	public function testSetShouldAllowValidFields()
	{
		$field = $this->getMock('Avetmiss\Fields\Any');
		$field->expects($this->once())->method('getName')->will($this->returnValue('foo'));
		$field->expects($this->once())->method('isValid')->will($this->returnValue(true));

		$row = new Nat120;
		$row->addField($field);

		$row->foo = 'foo';

		$this->assertEquals(1, count(PHPUnit_Framework_Assert::readAttribute($row, 'data')));
	}


	public function testSetShouldNotAllowInvalidFields()
	{
		$field = $this->getMock('Avetmiss\Fields\Any');
		$field->expects($this->once())->method('getName')->will($this->returnValue('foo'));
		$field->expects($this->once())->method('isValid')->will($this->returnValue(false));

		$row = new Nat120;
		$row->addField($field);

		// because isValid returned false, we don't accept it
		$row->foo = 'foo';

		$this->assertEquals(0, count(PHPUnit_Framework_Assert::readAttribute($row, 'data')));
	}
}