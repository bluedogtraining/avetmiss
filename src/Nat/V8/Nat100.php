<?php

namespace Bdt\Avetmiss\Nat\V8;

use Bdt\Avetmiss\Fieldset;
use Bdt\Avetmiss\Fields\Field;

/**
 * Fieldset for the AVETMISS V8 Nat100
 *
 * The Prior educational achievement (NAT00100) file contains a record for each
 * type of prior educational achievement for a client. A client may have more
 * than one type of prior educational achievement.
 */
class Nat100 extends Fieldset
{

    /**
     * {@inheritDoc}
     */
    public function __construct()
    {
        parent::__construct(
            [
                Field::make('any')->name('client_id')->length(10),
                Field::make('numeric')->name('prior_education_achievement')->length(3),
            ]
        );
    }
}
