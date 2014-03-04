<?php namespace Fixture;

use Avetmiss\Row;
use Avetmiss\Fields\Any;
use Avetmiss\Fields\Numeric;
use Avetmiss\Fields\Date;


class NatPopulated extends Row
{

	public function __construct()
	{
		$this->addField(new Numeric('foo', 5))
			 ->addField(new Any('bar', 18))
			 ->addField(new Date('wee', 8));
	}
}