<?php namespace Fixture;

use Avetmiss\Row;
use Avetmiss\Fields\Field;


class NatPopulated extends Row
{

	public function __construct()
	{
		$this->addField(Field::make('numeric')->name('foo')->lenght(5))
			 ->addField(Field::make('any')->name('bar')->lenght(18))
			 ->addField(Field::make('date')->name('wee')->lenght(8));
	}
}