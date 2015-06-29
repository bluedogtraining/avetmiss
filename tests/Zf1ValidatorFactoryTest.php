<?php

namespace Bdt\Avetmiss\Tests;

use Bdt\Avetmiss\Frameworks\Zf1\ValidatorFactory;
use Bdt\Avetmiss\Fields\Field;

class Zf1ValidatorFactoryTest extends TestCase
{

    protected $factory;
    
    public function setup()
    {
        $this->factory = new ValidatorFactory;
    }

    public function testCreate()
    {
        $this->assertFalse($this->factory->create('nat120', 'activity_start_date')->isValid('foo'));
        $this->assertTrue($this->factory->create('nat120', 'activity_start_date')->isValid('09092000'));
        
        $this->assertFalse($this->factory->create('nat080', 'language_id', true)->isValid('foobar'));
        $this->assertTrue($this->factory->create('nat080', 'language_id', true)->isValid('foo'));
    }
}