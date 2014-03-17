<?php namespace Avetmiss\Nat\V7;

use Avetmiss\Row;
use Avetmiss\Fields\Field;


class Nat020 extends Row
{


	public function __construct()
	{
		$this->addField(Field::make('any')->name('training_organisation_id')->lenght(10))
			 ->addField(Field::make('any')->name('training_organisation_delivery_location_id')->lenght(10))
			 ->addField(Field::make('any')->name('training_organisation_delivery_location_name')->lenght(100))
			 ->addField(Field::make('any')->name('postcode')->lenght(4))
			 ->addField(Field::make('numeric')->name('state_id')->lenght(2))
			 ->addField(Field::make('any')->name('address_location_suburb_locality_town')->lenght(50))
			 ->addField(Field::make('any')->name('country_id')->lenght(4));
	}
}