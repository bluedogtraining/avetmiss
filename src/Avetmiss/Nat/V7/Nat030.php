<?php namespace Avetmiss\Nat\V7;

use Avetmiss\Row;
use Avetmiss\Fields\Field;


class Nat030 extends Row
{


	public function __construct()
	{
		$this->addFields(array(
			Field::make('any')->name('program_id')->length(10),
			Field::make('any')->name('program_name')->length(100),
			Field::make('numeric')->name('nominal_hours')->length(4),
			Field::make('numeric')->name('program_recognition_id')->length(2),
			Field::make('numeric')->name('program_level_of_education_id')->length(3),
			Field::make('numeric')->name('program_field_of_education_id')->length(4),
			Field::make('any')->name('anzsco_id')->length(6),
			Field::make('any')->name('vet_flag')->length(1),
		));
	}
}