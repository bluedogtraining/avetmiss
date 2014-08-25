<?php namespace Avetmiss\Nat\V7;

use Avetmiss\Row;
use Avetmiss\Fields\Field;


class Nat080 extends Row
{


    public function __construct()
    {
        $this->addFields([
            Field::make('any')->name('client_id')->length(10),
            Field::make('any')->name('name_for_encryption')->length(60),
            Field::make('any')->name('highest_school_level_completed')->length(2),
            Field::make('any')->name('year_highest_school_level_completed')->length(4),
            Field::make('any')->name('sex')->length(1),
            Field::make('date')->name('date_of_birth')->length(8),
            Field::make('any')->name('postcode')->length(4)->pad('0'),
            Field::make('any')->name('indigenous_status_id')->length(1),
            Field::make('any')->name('language_id')->length(4),
            Field::make('any')->name('labour_force_status_id')->length(2),
            Field::make('any')->name('country_id')->length(4),
            Field::make('any')->name('disability_flag')->length(1),
            Field::make('any')->name('prior_educational_achievement_flag')->length(1),
            Field::make('any')->name('at_school_flag')->length(1),
            Field::make('any')->name('proficiency_in_spoken_english_id')->length(1),
            Field::make('any')->name('adress_location_suburb_locality_or_town')->length(50),
            Field::make('any')->name('unique_student_id')->length(10),
            Field::make('numeric')->name('state_id')->length(2)->pad('0'),
            Field::make('any')->name('address_building_property_name')->length(50),
            Field::make('any')->name('address_flat_unit_details')->length(30),
            Field::make('any')->name('adress_street_number')->length(15),
            Field::make('any')->name('adress_street_name')->length(70),
            Field::make('any')->name('statistical_area_level_1_id')->length(11),
            Field::make('any')->name('statistical_area_level_2_id')->length(9),
        ]);
    }
}
