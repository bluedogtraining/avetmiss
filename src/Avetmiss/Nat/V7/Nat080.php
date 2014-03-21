<?php namespace Avetmiss\Nat\V7;

use Avetmiss\Row;
use Avetmiss\Fields\Field;


class Nat080 extends Row
{


	public function __construct()
	{
		$this->addFields([
			Field::make('any')->name('client_id')->lenght(10),
			Field::make('any')->name('name_for_encryption')->lenght(60),
			Field::make('any')->name('highest_school_level_completed')->lenght(2),
			Field::make('any')->name('year_highest_school_level_completed')->lenght(4),
			Field::make('any')->name('sex')->lenght(1),
			Field::make('date')->name('date_of_birth')->lenght(8),
			Field::make('any')->name('postcode')->lenght(4),
			Field::make('any')->name('indigenous_status_id')->lenght(1),
			Field::make('any')->name('language_id')->lenght(4),
			Field::make('any')->name('labour_force_status_id')->lenght(2),
			Field::make('any')->name('country_id')->lenght(4),
			Field::make('any')->name('disability_flag')->lenght(1),
			Field::make('any')->name('prior_educational_achievement_flag')->lenght(1),
			Field::make('any')->name('at_school_flag')->lenght(1),
			Field::make('any')->name('proficiency_in_spoken_english_id')->lenght(1),
			Field::make('any')->name('adress_location_suburb_locality_or_town')->lenght(50),
			Field::make('any')->name('unique_student_id')->lenght(10),
			Field::make('numeric')->name('state_id')->lenght(2)->pad('0'),
			Field::make('any')->name('address_building_property_name')->lenght(50),
			Field::make('any')->name('address_flat_unit_details')->lenght(30),
			Field::make('any')->name('adress_street_number')->lenght(15),
			Field::make('any')->name('adress_street_name')->lenght(70),
			Field::make('any')->name('statistical_area_level_1_id')->lenght(11),
			Field::make('any')->name('statistical_area_level_2_id')->lenght(9),
		]);
	}
}