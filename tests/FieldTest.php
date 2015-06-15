<?php

namespace Bdt\Avetmiss\Tests;

use Bdt\Avetmiss\Fields\Field;


class FieldTest extends TestCase
{


    /**
     * @expectedException \InvalidArgumentException
     */
    public function testlengthShouldBeInt()
    {
        $field = Field::make('any')->length('z');
    }


    public function testExportSpacesPad()
    {
        $field = Field::make('any')->name('foo')->length(10);
        $field->setValue('bar');

        // bar with 7 spaces
        $this->assertEquals('bar       ', $field->render());
    }


    public function testCutIflengthIsToLong()
    {
        $field = Field::make('any')->name('foo')->length(10);

        // 12 characters
        $field->setValue('foobarfoobar');

        $this->assertEquals(10, strlen($field->render())); 
    }


    /**
     * @expectedException Exception
     */
    public function testInvalidDateFormat()
    {
        $field = Field::make('date')->name('foo')->length(8);
        $field->setValue('bar');
    }


    public function testValidDateFormat()
    {
        $field = Field::make('date')->name('foo')->length(8);
        $field->setValue('02032014');
    }
    

    // make, length, name, in, pad should all return a Field object
    public function testFluentBuilder()
    {
        $field = Field::make('any');
        $this->assertInstanceOf('Bdt\Avetmiss\Fields\Field', $field);

        $field->length(10);
        $this->assertInstanceOf('Bdt\Avetmiss\Fields\Field', $field);

        $field->name('foo');
        $this->assertInstanceOf('Bdt\Avetmiss\Fields\Field', $field);

        $field->in(['foo', 'bar']);
        $this->assertInstanceOf('Bdt\Avetmiss\Fields\Field', $field);

        $field->pad('.');
        $this->assertInstanceOf('Bdt\Avetmiss\Fields\Field', $field);
    }


    public function testInWithValidValue()
    {
        $field = Field::make('any')->name('foo')->length(10)->in(['bar']);
        $field->setValue('bar');

        $this->assertEquals('bar       ', $field->render());
    }


    /**
     * @expectedException \UnexpectedValueException
     */
    public function testInWithInvalidValue()
    {
        $field = Field::make('any')->name('foo')->length(10)->in(['bar']);
        $field->setValue('fiddy');
    }


    public function testPad()
    {
        $field = Field::make('any')->name('foo')->length(10)->pad('.');
        $field->setValue('bar');

        $this->assertEquals('.......bar', $field->render());
    }
}
