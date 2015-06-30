<?php

namespace Bdt\Avetmiss\Tests;

use Bdt\Avetmiss\Fieldset;
use Bdt\Avetmiss\File;
use Bdt\Avetmiss\Fields\Field;
use Bdt\Avetmiss\Row;

class FileTest extends TestCase
{


    /**
     * @expectedException Exception
     * @expectedExceptionMessage Cant add invalid row
     */
    public function testAddInvalidRow()
    {
        $fieldset = new Fieldset([Field::make('any')]);
        $file = new File($fieldset);

        $row = $this->getMockBuilder('\Bdt\Avetmiss\Row')->disableOriginalConstructor()->getMock();
        $row->method('isValid')->withAnyParameters()->willReturn(false);

        $file->writeRow($row);
    }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage Cant add row with different fieldset
     */
    public function testAddMismatchRow()
    {
        $file = new File(new Fieldset([Field::make('any')->name('foo')]));
        $row = new Row(new Fieldset([Field::make('any')->name('bar')]));
        $file->writeRow($row);
    }


    public function testExport()
    {
        $fieldset = new Fieldset([
            Field::make('numeric')->name('foo')->length(5),
            Field::make('any')->name('bar')->length(18),
            Field::make('date')->name('wee')->length(8),
        ]);
        $file = new File($fieldset);

        $row = new Row($fieldset);
        $row->foo = '888';
        $row->bar = 'bar foo';
        $row->wee = '30112000';

        $file->writeRow($row);

        $file->export('nat120.txt');

        $this->assertEquals("888  bar foo           30112000\r\n", file_get_contents('nat120.txt'));

        unlink('nat120.txt');
    }

    public function testCreateRow()
    {
        $fieldset = new Fieldset([Field::make('numeric')->name('foo')]);
        $file = new File($fieldset);

        $row = $file->createRow();

        $this->assertEquals($fieldset, $row->getFieldset());
    }

    public function testGetTime()
    {
        $file = new File(new Fieldset);
        $this->assertTrue($file->getTime() >= 0 && is_numeric($file->getTime()));
    }
}
