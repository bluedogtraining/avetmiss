<?php namespace Avetmiss\Nat\V7;

use Avetmiss\Row;
use Avetmiss\Fields\Field;


class Nat130 extends Row
{


    public function __construct()
    {
        $this->addFields([
            Field::make('any')->name('training_organisation_id')->lenght(10),
            Field::make('any')->name('program_id')->lenght(10),
            Field::make('any')->name('client_id')->lenght(10),
            Field::make('numeric')->name('year_program_completed')->lenght(4),
            Field::make('any')->name('issued_flag')->lenght(1),
        ]);
    }
}