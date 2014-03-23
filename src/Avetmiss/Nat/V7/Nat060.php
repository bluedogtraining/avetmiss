<?php namespace Avetmiss\Nat\V7;

use Avetmiss\Row;
use Avetmiss\Fields\Field;


class Nat060 extends Row
{


	public function __construct()
	{
		$this->addFields([
			Field::make('any')->name('muc_flag')->length(1),
			Field::make('any')->name('unit_display_id')->length(12),
			Field::make('any')->name('unit_name')->length(100),
			Field::make('any')->name('module_field_of_education')->length(6),
			Field::make('any')->name('vet_flag')->length(1),
			Field::make('numeric')->name('nominal_hours')->length(4),
		]);
	}
}