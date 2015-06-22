<?php

namespace Bdt\Avetmiss\Nat\V7;

use Bdt\Avetmiss\Fieldset;
use Bdt\Avetmiss\Fields\Field;


class Nat090 extends Fieldset
{


    public function __construct()
    {
        parent::__construct([
            Field::make('any')->name('client_id')->length(10),
            Field::make('any')->name('disability_type')->length(2),
        ]);
    }
}
