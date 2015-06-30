<?php

namespace Bdt\Avetmiss\Tests;

use Bdt\Avetmiss\Row;
use Bdt\Avetmiss\Fieldset;
use Bdt\Avetmiss\Fields\Field;
use Bdt\Avetmiss\Nat\V7\Nat120;

class RowTest extends TestCase
{
    public function testPopulateFields()
    {
        $rowData = "8901      ACHI100001CPCCCA3012A CPC30208  101020120103201330200000114201133307           @@N             F3 0000 PS100087    0030000@         Y";
        $row = new Row(new Nat120);
        $row->populateFields($rowData);
        $this->assertTrue($row->isValid());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testPopulateFieldsWithIncorrectData()
    {
        $rowData = "8901      ACHI100001CPCCCA3012A CPC30208  10102     03201330  33307                           F3 0000 PS100087    0030000@         Y";
        $row = new Row(new Nat120);
        $row->populateFields($rowData);
    }


    /**
     * @expectedException Bdt\Avetmiss\Exceptions\EmptyRowException
     */
    public function testPopulateFieldsWithEmptyRow()
    {
        $rowData = "8901      ACHI100001CPCCCA3012A CPC30208  101020120103201330200000114201133307           @@N             F3 0000 PS100087    0030000@         Y";
        $row = new Row(new Fieldset);
        $row->populateFields($rowData);
    }


    public function testIsValidWithInvalidFields()
    {
        $field = $this->getMockBuilder('Bdt\Avetmiss\Fields\Any')->disableOriginalConstructor()->getMock();
        $field->expects($this->once())->method('validate')->will($this->returnValue(false));

        $row = new Row(new Fieldset([$field]));

        $this->assertFalse($row->isValid());
    }


    public function testIsValidWithValidFields()
    {
        $field = $this->getMockBuilder('Bdt\Avetmiss\Fields\Any')->disableOriginalConstructor()->getMock();
        $field->expects($this->once())->method('validate')->will($this->returnValue(true));

        $row = new Row(new Fieldset([$field]));

        $this->assertTrue($row->isValid());
    }


    /**
     * @expectedException Bdt\Avetmiss\Exceptions\FieldNotFoundException
     */
    public function testGetInexistantFieldThrowsException()
    {
        $row = new Row(new Fieldset);
        $row->getFieldset()->getFieldByName('foo');
    }


    public function testToString()
    {
        $row = new Row(new Fieldset([
            Field::make('numeric')->name('foo')->length(5),
            Field::make('any')->name('bar')->length(18),
            Field::make('date')->name('wee')->length(8),
        ]));
        $row->foo = '23324';
        $row->bar = 'foo';
        $row->wee = '01122014';

        $this->assertEquals('23324foo               01122014', $row->__toString());
    }
     
    function testGetFieldset()
     {
         $fieldset = new Fieldset([Field::make('numeric')->name('test')]);
         $row = new Row($fieldset);
         $this->assertEquals($fieldset, $row->getFieldset());
     }

    public function testSetField()
    {
        $row = new Row(new Fieldset([
            Field::make('date')->name('foo'),
        ]));

        $row->foo = 'not a date';

        $this->assertNull($row->foo);
    }
}
