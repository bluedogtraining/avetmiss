<?php

namespace Bdt\Avetmiss\Tests\Fixture;

use Bdt\Avetmiss\Fieldset;
use Bdt\Avetmiss\Row;
use Bdt\Avetmiss\Fields\Field;


class NatPopulated extends Row
{

    public function __construct(Fieldset $fieldset)
    {
        parent::__construct($fieldset);
        $this->addField(Field::make('numeric')->name('foo')->length(5))
             ->addField(Field::make('any')->name('bar')->length(18))
             ->addField(Field::make('date')->name('wee')->length(8));
    }
}
