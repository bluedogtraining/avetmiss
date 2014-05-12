<?php

use Fixture\Config;


class ConfigTest extends TestCase
{

    
    public function testGetKeys()
    {
    	$this->assertEquals(array(1, 2, 3, '@'), Config::keys('animals'));
    }

    
    public function testGetValues()
    {
    	$this->assertEquals(array('squirrel', 'camel', 'trex', 'unknown pokemon'), Config::values('animals'));
    }


    /**
     * @expectedException \DomainException
     */
    public function testInvalidConfigDomain()
    {
    	Config::keys('aliens');
    }
}