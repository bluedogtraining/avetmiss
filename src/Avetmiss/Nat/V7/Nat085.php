<?php namespace Avetmiss\Nat\V7;

use Avetmiss\Row;
use Avetmiss\Fields\Field;


class Nat085 extends Row
{


	public function __construct()
	{
		$this->addField(Field::make('any')->name('client_id')->lenght(10))
			 ->addField(Field::make('any')->name('client_title')->lenght(4))
			 ->addField(Field::make('any')->name('client_first_given_name')->lenght(40))
			 ->addField(Field::make('any')->name('client_last_name')->lenght(40))
			 ->addField(Field::make('any')->name('address_building_property_name')->lenght(50))
			 ->addField(Field::make('any')->name('address_flat_unit_details')->lenght(30))
			 ->addField(Field::make('any')->name('address_street_number')->lenght(15))
			 ->addField(Field::make('any')->name('address_street_name')->lenght(70))
			 ->addField(Field::make('any')->name('address_postal_delivery_box')->lenght(22))
			 ->addField(Field::make('any')->name('address_postal_suburb_locality_town')->lenght(50))
			 ->addField(Field::make('any')->name('postcode')->lenght(4))
			 ->addField(Field::make('numeric')->name('state_identifier')->lenght(2))
			 ->addField(Field::make('any')->name('telephone_number_home')->lenght(20))
			 ->addField(Field::make('any')->name('telephone_number_work')->lenght(20))
			 ->addField(Field::make('any')->name('telephone_number_mobile')->lenght(20))
			 ->addField(Field::make('any')->name('email_address')->lenght(80));
	}
}