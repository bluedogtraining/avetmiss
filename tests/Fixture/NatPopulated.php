<?php

namespace Bdt\Avetmiss\Tests\Fixture;

use Bdt\Avetmiss\Row;
use Bdt\Avetmiss\Fields\Field;


class NatPopulated extends Row
{

    public function __construct()
    {
        $this->addField(Field::make('numeric')->name('foo')->length(5))
             ->addField(Field::make('any')->name('bar')->length(18))
             ->addField(Field::make('date')->name('wee')->length(8));
    }
}