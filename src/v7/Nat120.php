<?php namespace Avetmiss\V7;

use Avetmiss\Row;
use Avetmiss\Fields\Numeric;


class Nat120 extends Row
{


	public function __construct()
	{
		$this->addField(new Numeric([
			'name' => 'training_organisation_delivery_location_id', 
			'lenght' => 10,
		]));
	}
}