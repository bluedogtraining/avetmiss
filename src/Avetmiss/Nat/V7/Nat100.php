<?php namespace Avetmiss\Nat\V7;

use Avetmiss\Row;
use Avetmiss\Fields\Field;


class Nat100 extends Row
{


    public function __construct()
    {
        $this->addFields([
            Field::make('any')->name('client_id')->length(10),
            Field::make('numeric')->name('prior_education_achievement')->length(3),
        ]);
    }
}