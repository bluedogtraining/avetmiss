<?php namespace Avetmiss\Config;


class Config
{


    public static function keys($name)
    {
    	self::check($name);

        return array_keys(static::$$name);
    }


    public static function values($name)
    {
    	self::check($name);

        return array_values(static::$$name);
    }


    private static function check($name)
    {
    	if(!isset(static::$$name))
    	{
    		throw new \DomainException('could not find '. $name .' in the config');
    	}
    }
}