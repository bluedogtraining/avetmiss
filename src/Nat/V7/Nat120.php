<?php

namespace Bdt\Avetmiss\Nat\V7;

use Bdt\Avetmiss\Fieldset;
use Bdt\Avetmiss\Fields\Field;
use Bdt\Avetmiss\Config\V7 as Config;

/**
 * Fieldset for the AVETMISS V7 Nat120
 */
class Nat120 extends Fieldset
{
    /**
     * {@inheritDoc}
     */
    public function __construct()
    {
        parent::__construct([
            Field::make('any')->name('training_organisation_delivery_location_id')->length(10),
            Field::make('any')->name('client_id')->length(10),
            Field::make('any')->name('subject_id')->length(12),
            Field::make('any')->name('program_id')->length(10),
            Field::make('date')->name('activity_start_date')->length(8),
            Field::make('date')->name('activity_end_date')->length(8),
            Field::make('numeric')->name('delivery_mode_id')->length(2),
            Field::make('numeric')->name('outcome_id_national')->length(2),
            Field::make('numeric')->name('scheduled_hours')->length(4)->pad(0),
            Field::make('numeric')->name('funding_source_national')->length(2),
            Field::make('numeric')->name('commencing_program_id')->length(1),
            Field::make('any')->name('training_contract_id')->length(10),
            Field::make('any')->name('client_id_apprenticeships')->length(10),
            Field::make('any')->name('study_reason_id')->length(2),
            Field::make('any')->name('vet_in_schools_flag')->length(1),
            Field::make('any')->name('specific_funding_id')->length(10),
            Field::make('any')->name('outcome_id_training_organisation')->length(3),
            Field::make('any')->name('funding_source_state_training_authority')->length(3),
            Field::make('numeric')->name('client_tuition_fee')->length(4)->pad(0),
            Field::make('any')->name('fee_exemption_concession_type_id')->length(1),
            Field::make('any')->name('purchasing_contract_id')->length(12),
            Field::make('any')->name('purchasing_contract_schedule_id')->length(3),
            Field::make('numeric')->name('hours_attended')->length(4)->pad(0),
            Field::make('any')->name('associated_course_id')->length(10),
            Field::make('any')->name('full_time_learning_option')->length(1)->in(Config::keys('booleans')),
        ]);
    }
}
