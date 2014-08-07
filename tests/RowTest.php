<?php

use Avetmiss\Fields\Field;
use Avetmiss\Nat\V7\Nat120;
use Fixture\NatEmpty;
use Fixture\NatPopulated;


class RowTest extends TestCase
{


    public function testAddAndGetField()
    {
        $row = new NatEmpty;
        $row->addField(Field::make('numeric')->name('foo')->length(10));

        $this->assertEquals('foo', $row->getField('foo')->getName());
        $this->assertEquals(10, $row->getField('foo')->getlength());
    }


    public function testPopulateFields()
    {
        $rowData = "8901      ACHI100001CPCCCA3012A CPC30208  101020120103201330200000114201133307           @@N             F3 0000 PS100087    0030000@         Y";
        $row = new nat120;
        $row->populateFields($rowData);
        $this->assertTrue($row->isValid());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testPopulateFieldsWithIncorrectData()
    {
        $rowData = "8901      ACHI100001CPCCCA3012A CPC30208  10102     03201330  33307                           F3 0000 PS100087    0030000@         Y";
        $row = new Nat120;
        $row->populateFields($rowData);
    }


    /**
     * @expectedException Avetmiss\UnexistingFieldException
     */
    public function testPopulateFieldsWithEmptyRow()
    {
        $rowData = "8901      ACHI100001CPCCCA3012A CPC30208  101020120103201330200000114201133307           @@N             F3 0000 PS100087    0030000@         Y";
        $row = new NatEmpty;
        $row->populateFields($rowData);
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
