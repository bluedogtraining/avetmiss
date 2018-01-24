<?php

namespace Bdt\Avetmiss\Tests;

use Bdt\Avetmiss\Fields\Field;

class FieldTest extends TestCase
{

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testLengthShouldBeInt()
    {
        $field = Field::make('any')->length('z');
    }

    public function testExportSpacesPad()
    {
        $field = Field::make('any')->name('foo')->length(10);

        // bar with 7 spaces
        $this->assertEquals('bar       ', $field->render('bar'));
    }

    public function testCutIfLengthIsToLong()
    {
        $field = Field::make('any')->name('foo')->length(10);

        // 12 characters
        $this->assertEquals(10, strlen($field->render('foobarfoobar')));
    }

    /**
     * @expectedException Exception
     */
    public function testInvalidDateFormat()
    {
        $field = Field::make('date')->name('foo')->length(8);
        $field->validate('bar');
    }

    public function testValidDateFormat()
    {
        $field = Field::make('date')->name('foo')->length(8);
        $field->validate('02032014');
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

        $this->assertEquals('bar       ', $field->render('bar'));
    }

    /**
     * @expectedException \Bdt\Avetmiss\Exceptions\FieldNotValidException
     */
    public function testInWithInvalidValue()
    {
        $field = Field::make('any')->name('foo')->length(10)->in(['bar']);
        $field->validate('fiddy');
    }

    public function testPad()
    {
        $field = Field::make('any')->name('foo')->length(10)->pad('.');

        $this->assertEquals('.......bar', $field->render('bar'));
    }

    public function testSpaceRight()
    {
        $field = Field::make('any')->name('doge')->length(4)->spaceRight(4);
        $this->assertEquals('coin    ', $field->render('coin'));
    }

    public function testSpaceRightWithRightCharacters()
    {
        $field = Field::make('any')->name('blue doge training')->length(22)->spaceRight(4);
        $this->assertEquals('much fail, very wrong,    ', $field->render('much fail, very wrong,'));
    }

    public function testSpaceRightWithWrongCharacters()
    {
        $field = Field::make('any')->name('blue doge training')->length(22)->spaceRight(4);
        $this->assertNotEquals('much fail, very wrong, wow', $field->render('much fail, very wrong,'));
    }

    public function testFieldImmutability()
    {
        $field = Field::make('any');

        $new = $field->name('foo');
        $this->assertFalse($new == $field);

        $new = $field->in(['bar']);
        $this->assertFalse($new == $field);

        $new = $field->length(10);
        $this->assertFalse($new == $field);

        $new = $field->pad('0');
        $this->assertFalse($new == $field);
    }
}
