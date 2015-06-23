<?php

namespace Bdt\Avetmiss\Tests;

use Bdt\Avetmiss\Fieldset;
use Bdt\Avetmiss\Fields\Field;

class FieldsetTest extends TestCase
{
    public function testCreateNewFieldset()
    {
        $fieldset = new Fieldset([
            Field::make('any')->name('foo'),
            Field::make('any')->name('bar'),
        ]);

        $names = [];
        foreach ($fieldset as $field) {
            $names[] = $field->getName();
        }

        $this->assertEquals([
            'foo', 'bar',
        ], $names);
    }

    public function testWithField()
    {
        $fieldset = new Fieldset([
            Field::make('any')->name('foo'),
        ]);

        $new = $fieldset->withField(Field::make('any')->name('bar'));

        $this->assertFalse($fieldset == $new);
        $this->assertEquals('foo', $new->getFieldByName('foo')->getName());
        $this->assertEquals('bar', $new->getFieldByName('bar')->getName());
    }
}
