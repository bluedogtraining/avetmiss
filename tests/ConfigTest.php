<?php

namespace Bdt\Avetmiss\Tests;

use Bdt\Avetmiss\Tests\Fixture\Config;


class ConfigTest extends TestCase
{

    
    public function testGetKeys()
    {
        $this->assertEquals([1, 2, 3, '@'], Config::keys('animals'));
    }

    
    public function testGetValues()
    {
        $this->assertEquals(['squirrel', 'camel', 'trex', 'unknown pokemon'], Config::values('animals'));
    }


    /**
     * @expectedException \DomainException
     */
    public function testInvalidConfigDomain()
    {
        Config::keys('aliens');
    }
}
