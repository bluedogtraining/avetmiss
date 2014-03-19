<?php namespace Avetmiss\Nat\V7;

use Avetmiss\Row;
use Avetmiss\Fields\Field;


class Nat030 extends Row
{


	public function __construct()
	{
		$this->addFields([
			Field::make('any')->name('program_id')->lenght(10),
			Field::make('any')->name('program_name')->lenght(100),
			Field::make('numeric')->name('nominal_hours')->lenght(4),
			Field::make('numeric')->name('program_recognition_id')->lenght(2),
			Field::make('numeric')->name('program_level_of_education_id')->lenght(3),
			Field::make('numeric')->name('program_field_of_education_id')->lenght(4),
			Field::make('any')->name('anzsco_id')->lenght(6),
			Field::make('any')->name('vet_flag')->lenght(1),
		]);
	}
}