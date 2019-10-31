<?php

namespace Paladin\Crud\Helpers;

use Paladin\Crud\Repositories\StorageRepository;

/**
 * Class StorageHelper
 *
 * @package Paladin\Crud\Helpers
 */
class StorageHelper
{
    /**
     * Static Function for storing the file.
     *
     * @param $file
     * @param null $path
     * @param null $visibility
     * @return mixed
     */
    public static function store($file, $path = null, $visibility = null)
    {
        return app(StorageRepository::class)->store($file, $path, $visibility);
    }

    /**
     * Static Function for storing the file with different name.
     *
     * @param $file
     * @param $name
     * @param null $path
     * @param null $visibility
     * @return mixed
     */
    public static function storeAs($file, $name, $path = null, $visibility = null)
    {
        return app(StorageRepository::class)->storeAs($file, $name, $path, $visibility);
    }

    /**
     * Static Function to move the file from one location to another.
     *
     * @param $from
     * @param $to
     * @return mixed
     */
    public static function move($from, $to)
    {
        return app(StorageRepository::class)->move($from, $to);
    }

    /**
     * Static Function to check if the file exists in the given path.
     *
     * @param $path
     * @param null $root
     * @return mixed
     */
    public static function exists($path, $root = null)
    {
        return app(StorageRepository::class)->exists($path, $root);
    }
}
