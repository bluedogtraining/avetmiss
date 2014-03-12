<?php namespace Avetmiss\Nat\V7;

use Avetmiss\Row;
use Avetmiss\Fields\Field;


class Nat030 extends Row
{


	public function __construct()
	{
		$this->addField(Field::make('any')->name('program_id')->lenght(10))
			 ->addField(Field::make('any')->name('program_name')->lenght(100))
			 ->addField(Field::make('numeric')->name('nominal_hours')->lenght(4))
			 ->addField(Field::make('numeric')->name('program_recognition_id')->lenght(2))
			 ->addField(Field::make('numeric')->name('program_level_of_education_id')->lenght(3))
			 ->addField(Field::make('numeric')->name('program_field_of_education_id')->lenght(4))
			 ->addField(Field::make('any')->name('anzsco_id')->lenght(6))
			 ->addField(Field::make('any')->name('vet_flag')->lenght(1));
	}
}