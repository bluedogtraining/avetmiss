<?php

namespace Bdt\Avetmiss\Tests;

use Bdt\Avetmiss\File;
use Bdt\Avetmiss\Row;
use Bdt\Avetmiss\Tests\Fixture\NatPopulated;


class FileTest extends TestCase
{


    /**
     * @expectedException Exception
     */
    public function testAddInvalidRow()
    {
        $row = $this->getMock('Bdt\Avetmiss\Row');

        $file = new File;
        $file->addRow($row);
    }


    public function testExport()
    {
        $file = new File;

        $row = new NatPopulated;
        $row->foo = '888';
        $row->bar = 'bar foo';
        $row->wee = '30112000';

        $file->addRow($row);

        $file->export('nat120.txt');

        $this->assertEquals("888  bar foo           30112000\r\n", file_get_contents('nat120.txt'));

        unlink('nat120.txt');
    }
}