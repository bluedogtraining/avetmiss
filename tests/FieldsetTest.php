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
}
