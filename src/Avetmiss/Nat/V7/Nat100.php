<?php namespace Avetmiss\Nat\V7;

use Avetmiss\Row;
use Avetmiss\Fields\Field;


class Nat100 extends Row
{


	public function __construct()
	{
		$this->addField(Field::make('any')->name('client_id')->lenght(10))
			 ->addField(Field::make('numeric')->name('prior_education_achievement')->lenght(3));
	}
}