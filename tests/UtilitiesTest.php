<?php

use Avetmiss\Utilities;


class UtilitiesTest extends TestCase
{


    public function testValidMysqlDate()
    {
        $mysql = '2014-02-15';

        $this->assertEquals(15022014, Utilities::toDate($mysql));
    }
}
