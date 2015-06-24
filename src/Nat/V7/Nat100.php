<?php

namespace Bdt\Avetmiss\Nat\V7;

use Bdt\Avetmiss\Fieldset;
use Bdt\Avetmiss\Fields\Field;

/**
 * Fieldset for the AVETMISS V7 Nat100
 */
class Nat100 extends Fieldset
{
    /**
     * {@inheritDoc}
     */
    public function __construct()
    {
        parent::__construct([
            Field::make('any')->name('client_id')->length(10),
            Field::make('numeric')->name('prior_education_achievement')->length(3),
        ]);
    }
}
