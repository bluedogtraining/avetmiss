<?php

namespace Bdt\Avetmiss\Nat\V7;

use Bdt\Avetmiss\Fieldset;
use Bdt\Avetmiss\Fields\Field;

/**
 * Fieldset for the AVETMISS V7 Nat020
 *
 * The Training organisation delivery location (NAT00020) file contains a record for each training
 * delivery location associated with enrolment activity in a training organisation during the collection
 * period.
 *
 * A training organisation delivery location is a specific training site.
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
