<?php

namespace Bdt\Avetmiss\Nat\V8;

use Bdt\Avetmiss\Fieldset;
use Bdt\Avetmiss\Fields\Field;

/**
 * Fieldset for the AVETMISS V8 Nat010
 *
 * The Training organisation (NAT00010) file contains records about training organisations.
 */
class Nat010 extends Fieldset
{

    /**
     * {@inheritDoc}
     */
    public function __construct()
    {
        parent::__construct(
            [
                Field::make('any')->name('training_organisation_id')->length(10),
                Field::make('any')->name('training_organisation_name')->length(100)->spaceRight(158),
                Field::make('any')->name('contact_name')->length(60),
                Field::make('any')->name('telephone_number')->length(20),
                Field::make('any')->name('facsimile_number')->length(20),
                Field::make('any')->name('email_address')->length(80),
            ]
        );
    }
}
