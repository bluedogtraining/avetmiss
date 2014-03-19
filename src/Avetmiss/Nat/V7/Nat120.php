<?php namespace Avetmiss\Nat\V7;

use Avetmiss\Row;
use Avetmiss\Fields\Field;


class Nat120 extends Row
{


	public function __construct()
	{
		$this->addFields([
			Field::make('any')->name('training_organisation_delivery_location_id')->lenght(10),
			Field::make('any')->name('client_id')->lenght(10),
			Field::make('any')->name('subject_id')->lenght(12),
			Field::make('any')->name('program_id')->lenght(10),
			Field::make('date')->name('activity_start_date')->lenght(8),
			Field::make('date')->name('activity_end_date')->lenght(8),
			Field::make('numeric')->name('delivery_mode_id')->lenght(2),
			Field::make('numeric')->name('outcome_id_national')->lenght(2),
			Field::make('numeric')->name('scheduled_hours')->lenght(4),
			Field::make('numeric')->name('funding_source_national')->lenght(2),
			Field::make('numeric')->name('commencing_program_id')->lenght(1),
			Field::make('any')->name('training_contract_id')->lenght(10),
			Field::make('any')->name('client_id_apprenticeships')->lenght(10),
			Field::make('any')->name('study_reason_id')->lenght(2),
			Field::make('any')->name('vet_in_schools_flag')->lenght(1),
			Field::make('any')->name('specific_funding_id')->lenght(10),
			Field::make('any')->name('outcome_id_training_organisation')->lenght(3),
			Field::make('any')->name('funding_source_state_training_authority')->lenght(3),
			Field::make('numeric')->name('client_tuition_fee')->lenght(4),
			Field::make('any')->name('fee_exemption_concession_type_id')->lenght(1),
			Field::make('any')->name('purchasing_contract_id')->lenght(12),
			Field::make('any')->name('purchasing_contract_schedule_id')->lenght(3),
			Field::make('numeric')->name('hours_attended')->lenght(4),
			Field::make('any')->name('associated_course_id')->lenght(10),
		]);
	}
}