<?php

namespace Bdt\Avetmiss\Tests;

use Bdt\Avetmiss\Fieldset;
use Bdt\Avetmiss\File;
use Bdt\Avetmiss\Fields\Field;
use Bdt\Avetmiss\Row;
use Bdt\Avetmiss\Tests\Fixture\NatPopulated;


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

        $row = $this->getMockBuilder(Row::class)->disableOriginalConstructor()->getMock();
        $row->method('isValid')->willReturn(false);

        $file->addRow($row);
    }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage Cant add row with different fieldset
     */
    public function testAddMismatchRow()
    {
        $file = new File(new Fieldset([Field::make('any')->name('foo')]));
        $row = new Row(new Fieldset([Field::make('any')->name('bar')]));
        $file->addRow($row);
    }


    public function testExport()
    {
        $fieldset = new Fieldset();
        $file = new File($fieldset);

        $row = new NatPopulated($fieldset);
        $row->foo = '888';
        $row->bar = 'bar foo';
        $row->wee = '30112000';

        $file->addRow($row);

        $file->export('nat120.txt');

        $this->assertEquals("888  bar foo           30112000\r\n", file_get_contents('nat120.txt'));

        unlink('nat120.txt');
    }
}
