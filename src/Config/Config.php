<?php

namespace Bdt\Avetmiss\Config;

/**
 * Class for managing configuration options via static values on the object.
 *
 * To extend this class, define your own properties on the extending class, e.g.:
 *
 *      class ExampleConfig extends Config
 *      {
 *          protected $myOptions = [
 *              'key' => 'value',
 *              'foo' => 'bar',
 *          ];
 *      }
 */
abstract class Config
{
    /**
     * Get the keys for a given configuration option.
     *
     * @param string $name
     * @return array
     */
    public static function keys($name)
    {
        self::check($name);

        return array_keys(static::$$name);
    }

    /**
     * Get the values for a given configuration option.
     *
     * @param string $name
     * @return array
     */
    public static function values($name)
    {
        self::check($name);

        return array_values(static::$$name);
    }

    /**
     * Check that a given configuration option exists.
     *
     * @throws \DomainException
     * @param string $name
     * @return boolean
     */
    private static function check($name)
    {
        if (!isset(static::$$name)) {
            throw new \DomainException('could not find '. $name .' in the config');
        }
    }
}
