<?php namespace Avetmiss\Nat\V7;

use Avetmiss\Row;
use Avetmiss\Fields\Field;


class Nat130 extends Row
{


    public function __construct()
    {
        $this->addFields(array(
            Field::make('any')->name('training_organisation_id')->length(10),
            Field::make('any')->name('program_id')->length(10),
            Field::make('any')->name('client_id')->length(10),
            Field::make('numeric')->name('year_program_completed')->length(4)->pad('20'), // pad with 20 in case just two digits are sent (ex 13 instead of 2013)
            Field::make('any')->name('issued_flag')->length(1),
        ));
    }
}