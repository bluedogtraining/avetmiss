<?php namespace Avetmiss\Nat\V7;

use Avetmiss\Row;
use Avetmiss\Fields\Field;


class Nat020 extends Row
{


    public function __construct()
    {
        $this->addFields([
            Field::make('any')->name('training_organisation_id')->length(10),
            Field::make('any')->name('training_organisation_delivery_location_id')->length(10),
            Field::make('any')->name('training_organisation_delivery_location_name')->length(100),
            Field::make('any')->name('postcode')->length(4),
            Field::make('numeric')->name('state_id')->length(2)->pad('0'),
            Field::make('any')->name('address_location_suburb_locality_town')->length(50),
            Field::make('any')->name('country_id')->length(4),
        ]);
    }
}