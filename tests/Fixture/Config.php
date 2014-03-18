<?php namespace Fixture;

use Avetmiss\Config\Config as BaseConfig;


class Config extends BaseConfig
{

    protected static $animals = [
        '1' => 'squirrel',
        '2' => 'camel',
        '3' => 'trex',
        '@' => 'unknown pokemon',
    ];
}