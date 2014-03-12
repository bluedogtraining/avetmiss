<?php namespace Avetmiss\Nat\V7;

use Avetmiss\Row;
use Avetmiss\Fields\Field;


class Nat090 extends Row
{


	public function __construct()
	{
		$this->addField(Field::make('any')->name('client_id')->lenght(10))
			 ->addField(Field::make('any')->name('disability_type')->lenght(2));
	}
}