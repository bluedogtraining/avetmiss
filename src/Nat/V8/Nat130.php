<?php

namespace Bdt\Avetmiss\Nat\V8;

use Bdt\Avetmiss\Fieldset;
use Bdt\Avetmiss\Fields\Field;

/**
 * Fieldset for the AVETMISS V8 Nat130
 *
 * The Program completed (NAT00130) file contains records for which all
 * requirements for the completion of the qualification, course or skill set,
 * including on-the-job requirements, have been met. Completions for Australian
 * Qualifications Framework (AQF) qualifications and courses are achieved when
 * the client is eligible for the award to be conferred.
 */
class Nat130 extends Fieldset
{

    /**
     * {@inheritDoc}
     */
    public function __construct()
    {
        parent::__construct(
            [
                Field::make('any')->name('training_organisation_id')->length(10),
                Field::make('any')->name('program_id')->length(10),
                Field::make('any')->name('client_id')->length(10),
                Field::make('any')->name('date_program_completed')->length(8),
                Field::make('any')->name('issued_flag')->length(1),
            ]
        );
    }
}
