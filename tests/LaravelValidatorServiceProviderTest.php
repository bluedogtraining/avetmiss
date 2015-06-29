<?php

namespace Bdt\Avetmiss\Tests;

use Illuminate\Container\Container;
use Symfony\Component\Translation\Translator;
use Illuminate\Validation\Factory;
use Bdt\Avetmiss\Frameworks\Laravel\ValidatorServiceProvider;

class LaravelValidationServiceProviderTest extends TestCase
{
    protected $factory;

    public function setup()
    {
        $container = new Container();
        $translator = new Translator('en');
        $this->factory = new Factory($translator, $container);
        $container['Illuminate\Contracts\Validation\Factory'] = $this->factory;

        $serviceProvider = new ValidatorServiceProvider($container);
        $serviceProvider->boot();
        $serviceProvider->register();
     
    }

    public function testFactoryWorks()
    {
        $this->assertInstanceOf('Illuminate\Validation\Validator', $this->factory->make([], []));
    }

    public function testAvetmissRuleFails()
    {
        $validator = $this->factory->make([
            'foo' => 'bar',
        ], [
            'foo' => 'avetmiss:nat120,activity_start_date',
        ]);

        $this->assertFalse($validator->passes());
        $this->assertEquals(['The value for foo must be valid according to the Nat120 activity_start_date field'], $validator->messages()->get('foo'));
    }

    public function testAvetmissRulePasses()
    {
        $validator = $this->factory->make([
            '09092000'
        ], [
            'foo' => 'avetmiss:nat120,activity_start_date',
        ]);

        $this->assertTrue($validator->passes());
    }

    public function testAvetmissRuleWithLengthFails()
    {
        $validator = $this->factory->make([
            'foo' => 'foobar',
        ], [
            'foo' => 'avetmiss:nat080,language_id,true',
        ]);

        $this->assertFalse($validator->passes());
    }

    public function testAvetmissRuleWithLengthPasses()
    {
        $validator = $this->factory->make([
            'foo' => 'foo',
        ], [
            'foo' => 'avetmiss:nat080,language_id,true',
        ]);

        $this->assertTrue($validator->passes());
    }
}