<?php

namespace Bdt\Avetmiss\Nat\V7;

use Bdt\Avetmiss\Fieldset;
use Bdt\Avetmiss\Fields\Field;

/**
 * Fieldset for the AVETMISS V7 Nat030 -
 *
 * The Program (NAT00030) file contains a record for each qualification, course
 * or skill set associated with enrolments and completions during the collection
 * period.
 *
 * A qualification, course or skill set is a structured program that may include
 * practical experience.
 */
class Nat030 extends Fieldset
{

    /**
     * {@inheritDoc}
     */
    public function __construct()
    {
        parent::__construct(
            [
                Field::make('any')->name('program_id')->length(10),
                Field::make('any')->name('program_name')->length(100),
                Field::make('numeric')->name('nominal_hours')->length(4),
                Field::make('numeric')->name('program_recognition_id')->length(2),
                Field::make('numeric')->name('program_level_of_education_id')->length(3),
                Field::make('numeric')->name('program_field_of_education_id')->length(4),
                Field::make('any')->name('anzsco_id')->length(6),
                Field::make('any')->name('vet_flag')->length(1),
            ]
        );
    }
}
