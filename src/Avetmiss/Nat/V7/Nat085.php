<?php namespace Avetmiss\Nat\V7;

use Avetmiss\Row;
use Avetmiss\Fields\Field;


class Nat085 extends Row
{


	public function __construct()
	{
		$this->addFields(array(
			Field::make('any')->name('client_id')->length(10),
			Field::make('any')->name('client_title')->length(4),
			Field::make('any')->name('client_first_given_name')->length(40),
			Field::make('any')->name('client_last_name')->length(40),
			Field::make('any')->name('address_building_property_name')->length(50),
			Field::make('any')->name('address_flat_unit_details')->length(30),
			Field::make('any')->name('address_street_number')->length(15),
			Field::make('any')->name('address_street_name')->length(70),
			Field::make('any')->name('address_postal_delivery_box')->length(22),
			Field::make('any')->name('address_postal_suburb_locality_town')->length(50),
			Field::make('any')->name('postcode')->length(4),
			Field::make('numeric')->name('state_id')->length(2)->pad('0'),
			Field::make('any')->name('telephone_number_home')->length(20),
			Field::make('any')->name('telephone_number_work')->length(20),
			Field::make('any')->name('telephone_number_mobile')->length(20),
			Field::make('any')->name('email_address')->length(80),
		));
	}
}