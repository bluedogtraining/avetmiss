<?php namespace Avetmiss\Nat\V7;

use Avetmiss\Row;
use Avetmiss\Fields\Field;


class Nat085 extends Row
{


	public function __construct()
	{
		$this->addFields([
			Field::make('any')->name('client_id')->lenght(10),
			Field::make('any')->name('client_title')->lenght(4),
			Field::make('any')->name('client_first_given_name')->lenght(40),
			Field::make('any')->name('client_last_name')->lenght(40),
			Field::make('any')->name('address_building_property_name')->lenght(50),
			Field::make('any')->name('address_flat_unit_details')->lenght(30),
			Field::make('any')->name('address_street_number')->lenght(15),
			Field::make('any')->name('address_street_name')->lenght(70),
			Field::make('any')->name('address_postal_delivery_box')->lenght(22),
			Field::make('any')->name('address_postal_suburb_locality_town')->lenght(50),
			Field::make('any')->name('postcode')->lenght(4),
			Field::make('numeric')->name('state_id')->lenght(2)->pad('0'),
			Field::make('any')->name('telephone_number_home')->lenght(20),
			Field::make('any')->name('telephone_number_work')->lenght(20),
			Field::make('any')->name('telephone_number_mobile')->lenght(20),
			Field::make('any')->name('email_address')->lenght(80),
		]);
	}
}