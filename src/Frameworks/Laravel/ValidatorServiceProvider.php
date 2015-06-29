<?php

namespace Bdt\Avetmiss\Frameworks\Laravel;

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
            $validateLength = isset($parameters[2]) && $parameters[2] == 'true';

            if (!isset($this->natFieldsets[$natName])) {
                $natFieldset = '\\Bdt\\Avetmiss\\Nat\\V7\\'.ucfirst($natName);
                $this->natFieldsets[$natName] = new $natFieldset;
            }

            $field = $this->natFieldsets[$natName]->getFieldByName($fieldName);

            try {
                $isValid = $field->validate($value);
            } catch (\InvalidArgumentException $e) {
                $isValid = false;
            }

            if ($validateLength && $isValid) {
                $isValid = strlen($value) <= $field->getLength();
            }

            return $isValid;
        }, 'The value for :attribute must be valid according to the :nat_name :field_name field');

        $validator->replacer('avetmiss', function($message, $attribute, $value, $parameters) {
            $natName   = ucfirst($parameters[0]);
            $fieldName = $parameters[1];

            return str_replace([':nat_name', ':field_name'], [$natName, $fieldName], $message);
        });
    }

    public function register()
    {
    }
}