<?php namespace Avetmiss\Nat\V7;

use Avetmiss\Row;
use Avetmiss\Fields\Field;


class Nat060 extends Row
{


	public function __construct()
	{
		$this->addFields([
			Field::make('any')->name('muc_flag')->lenght(1),
			Field::make('any')->name('unit_display_id')->lenght(12),
			Field::make('any')->name('unit_name')->lenght(100),
			Field::make('any')->name('module_field_of_education')->lenght(6),
			Field::make('any')->name('vet_flag')->lenght(1),
			Field::make('numeric')->name('nominal_hours')->lenght(4),
		]);
	}
}