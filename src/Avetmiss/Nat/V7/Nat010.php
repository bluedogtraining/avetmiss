<?php namespace Avetmiss\Nat\V7;

use Avetmiss\Row;
use Avetmiss\Fields\Field;


class Nat010 extends Row
{


	public function __construct()
	{
		$this->addField(Field::make('any')->name('training_organisation_id')->lenght(10))
			 ->addField(Field::make('any')->name('training_organisation_name')->lenght(100))
			 ->addField(Field::make('numeric')->name('training_organisation_type_id')->lenght(2))
			 ->addField(Field::make('any')->name('address_first_line')->lenght(50))
			 ->addField(Field::make('any')->name('address_second_line')->lenght(50))
			 ->addField(Field::make('any')->name('address_location_suburb_locality_town')->lenght(50))
			 ->addField(Field::make('any')->name('postcode')->lenght(4))
			 ->addField(Field::make('numeric')->name('state_id')->lenght(2)->pad('0'))
			 ->addField(Field::make('any')->name('contact_name')->lenght(60))
			 ->addField(Field::make('any')->name('telephone_number')->lenght(20))
			 ->addField(Field::make('any')->name('facsimile_number')->lenght(20))
			 ->addField(Field::make('any')->name('email_adress')->lenght(80));
	}
}