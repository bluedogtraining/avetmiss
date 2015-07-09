<?php

namespace Bdt\Avetmiss\Nat\V7;

use Bdt\Avetmiss\Fieldset;
use Bdt\Avetmiss\Fields\Field;

/**
 * Fieldset for the AVETMISS V7 Nat090
 *
 * The Disability (NAT00090) file contains a record for each disability, 
 * impairment, or long-term condition associated with a client. A client may 
 * have more than one type of disability, impairment, or long-term condition.
 */
class Nat090 extends Fieldset
{
    /**
     * {@inheritDoc}
     */
    public function __construct()
    {
        parent::__construct([
            Field::make('any')->name('client_id')->length(10),
            Field::make('any')->name('disability_type')->length(2),
        ]);
    }
}
