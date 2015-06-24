<?php

namespace Bdt\Avetmiss\Nat\V7;

use Bdt\Avetmiss\Fieldset;
use Bdt\Avetmiss\Fields\Field;

/**
 * Fieldset for the AVETMISS V7 Nat020
 */
class Nat020 extends Fieldset
{
    /**
     * {@inheritDoc}
     */
    public function __construct()
    {
        parent::__construct([
            Field::make('any')->name('training_organisation_id')->length(10),
            Field::make('any')->name('training_organisation_delivery_location_id')->length(10),
            Field::make('any')->name('training_organisation_delivery_location_name')->length(100),
            Field::make('any')->name('postcode')->length(4)->pad('0'),
            Field::make('numeric')->name('state_id')->length(2)->pad('0'),
            Field::make('any')->name('address_location_suburb_locality_town')->length(50),
            Field::make('any')->name('country_id')->length(4),
        ]);
    }
}
