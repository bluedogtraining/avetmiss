<?php

namespace Bdt\Avetmiss\Tests;

use Bdt\Avetmiss\Frameworks\Zf1\Validator;
use Bdt\Avetmiss\Fields\Field;

class Zf1ValidatorTest extends TestCase
{
    public function testValidate()
    {
        $any = Field::make('any')->length(5);
        $date = Field::make('date');

        // Don't validate length
        $validator = new Validator($any, false);
        $this->assertTrue($validator->isValid('foo'));
        $this->assertTrue($validator->isValid('foobar'));
        
        // Validate length
        $validator = new Validator($any, true);
        $this->assertTrue($validator->isValid('foo'));
        $this->assertFalse($validator->isValid('foobar'));

        // Fail field validation
        $validator = new Validator($date, false);
        $this->assertFalse($validator->isValid('foo'));
    }
}