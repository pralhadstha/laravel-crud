<?php

use Paladin\Crud\Helpers\StorageHelper;
use Paladin\Crud\Helpers\StringHelper;

if (!function_exists('package_config')) {
    /**
     * Returns the configurations of each modules. If required to get config
     * of other directories inside config folders set $packageName to that directory.
     *
     * @param $key
     * @param null $default
     * @param string $packageName
     * @return mixed
     */
    function package_config($key, $default = null, $packageName = '')
    {
        $packageName = ($packageName) ? $packageName : config('app.modules-config-dir');

        return config("$packageName.$key", $default);
    }
}

if (!function_exists('sng_after')) {
    /**
     * Return the remainder of a string after a given value.
     * Note:
     * 0 loc = 'front'
     * 1 loc = 'last'
     *
     * @param $subject
     * @param $search
     * @param int $loc
     * @return bool|string
     */
    function sng_after($subject, $search, $loc = 0)
    {
        return StringHelper::after($subject, $search, $loc);
    }
}

if (!function_exists('sng_slug')) {
    /**
     * Helper function to create the URL friendly slug for the given value.
     * Note: If any changes comes in Laravel str_slug() we need to change only here.
     *
     * @param $value
     * @param string $separator
     * @return string
     */
    function sng_slug($value, $separator = '-')
    {
        return str_slug($value, $separator);
    }
}

if (!function_exists('stg_move')) {
    /**
     * @param $from
     * @param $to
     * @return mixed
     */
    function stg_move($from, $to)
    {
        return StorageHelper::move($from, $to);
    }
}

if (!function_exists('stg_file_exists')) {
    /**
     * @param $path
     * @param null $root
     * @return mixed
     */
    function stg_file_exists($path, $root = null)
    {
        return StorageHelper::exists($path, $root);
    }
}
