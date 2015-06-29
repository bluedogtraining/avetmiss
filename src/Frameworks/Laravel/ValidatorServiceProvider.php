<?php

namespace Bdt\Avetmiss\Validators;

use Illuminate\Support\ServiceProvider;

class ValidatorServiceProvider extends ServiceProvider
{
    protected $natFieldsets = [];

    public function boot()
    {
        $validator = $this->app['Illuminate\Contracts\Validation\Factory'];

        $validator->extend('avetmiss', function($attribute, $value, $parameters) {
            $natName = $parameters[0];
            $fieldName = $parameters[1];
            $validateLength = $paramters[2] == 'true';

            if (!isset($this->natFieldsets[$natName])) {
                $natFieldset = '\\Bdt\\Avetmiss\\Nat\\V7\\'.ucfirst($natName);
                $this->natFieldsets[$natName] = new $natFieldset;
            }

            $field = $this->natFieldsets[$natName]->getFieldByName($fieldName);

            $isValid = $field->validate($value);

            if ($validateLength && $isValid) {
                $isValid = strlen($value) <= $field->getLength();
            }

            return $isValid;
        }, 'The :attribute must be valid for the :nat_name :field_name field');

        $validator->replacer('nat_name', function($message, $attribute, $value, $parameters) {
            $natName = $paramters[0];
            return str_replace(':nat_name', ucfirst($natName)); 
        });

        $validator->replace('field_name', function($message, $attribute, $value, $parameters) {
            $fieldName = $parameters[1];
            return str_replace(':field_name', $fieldName);
        });
    }
}