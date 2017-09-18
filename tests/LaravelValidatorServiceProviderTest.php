<?php

namespace Bdt\Avetmiss\Tests;

use Illuminate\Container\Container;
use Symfony\Component\Translation\Translator as SymfonyTranslator;
use Illuminate\Translation\Translator as LaravelTranslator;
use Illuminate\Translation\ArrayLoader;
use Illuminate\Validation\Factory;
use Bdt\Avetmiss\Frameworks\Laravel\ValidatorServiceProvider;

class LaravelValidationServiceProviderTest extends TestCase
{
    protected $factory;

    public function setup()
    {

        if (version_compare(PHP_VERSION, '5.6.4') >= 0) {
            $translator = new LaravelTranslator(new ArrayLoader, 'en');
        } else {
            $translator = new SymfonyTranslator('en');
        }

        $container = new Container();
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