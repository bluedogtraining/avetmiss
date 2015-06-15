<?php 

namespace Bdt\Avetmiss\Tests\Fixture;

use Bdt\Avetmiss\Config\Config as BaseConfig;


class Config extends BaseConfig
{

    protected static $animals = array(
        '1' => 'squirrel',
        '2' => 'camel',
        '3' => 'trex',
        '@' => 'unknown pokemon',
    );
}