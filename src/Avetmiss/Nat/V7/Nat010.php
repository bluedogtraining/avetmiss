<?php namespace Avetmiss\Nat\V7;

use Avetmiss\Row;
use Avetmiss\Fields\Field;


class Nat010 extends Row
{


	public function __construct()
	{
		$this->addFields([
			Field::make('any')->name('training_organisation_id')->lenght(10),
			Field::make('any')->name('training_organisation_name')->lenght(100),
			Field::make('numeric')->name('training_organisation_type_id')->lenght(2),
			Field::make('any')->name('address_first_line')->lenght(50),
			Field::make('any')->name('address_second_line')->lenght(50),
			Field::make('any')->name('address_location_suburb_locality_town')->lenght(50),
			Field::make('any')->name('postcode')->lenght(4),
			Field::make('numeric')->name('state_id')->lenght(2)->pad('0'),
			Field::make('any')->name('contact_name')->lenght(60),
			Field::make('any')->name('telephone_number')->lenght(20),
			Field::make('any')->name('facsimile_number')->lenght(20),
			Field::make('any')->name('email_adress')->lenght(80),
		]);
	}
}