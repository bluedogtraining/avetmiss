<?php namespace Bdt\Avetmiss\Nat\V7;

use Bdt\Avetmiss\Row;
use Bdt\Avetmiss\Fields\Field;


class Nat010 extends Row
{


    public function __construct()
    {
        $this->addFields([
            Field::make('any')->name('training_organisation_id')->length(10),
            Field::make('any')->name('training_organisation_name')->length(100),
            Field::make('numeric')->name('training_organisation_type_id')->length(2),
            Field::make('any')->name('address_first_line')->length(50),
            Field::make('any')->name('address_second_line')->length(50),
            Field::make('any')->name('address_location_suburb_locality_town')->length(50),
            Field::make('any')->name('postcode')->length(4)->pad('0'),
            Field::make('numeric')->name('state_id')->length(2)->pad('0'),
            Field::make('any')->name('contact_name')->length(60),
            Field::make('any')->name('telephone_number')->length(20),
            Field::make('any')->name('facsimile_number')->length(20),
            Field::make('any')->name('email_adress')->length(80),
        ]);
    }
}