<?php

namespace Paladin\Crud\Repositories;

use Illuminate\Support\Facades\Storage;

/**
 * Class StorageRepository
 *
 * @package Paladin\Crud\Repositories
 */
class StorageRepository
{
    const STORAGE_NAME = 'public';

    /**
     * @var string
     */
    private $path;

    /**
     * StorageRepository constructor.
     */
    public function __construct()
    {
        $this->setPath(self::STORAGE_NAME);
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * Used to store files to the specified path.
     *
     * @param $file
     * @param $path
     * @param null $visibility
     * @return mixed
     */
    public function store($file, $path, $visibility = null)
    {
        return Storage::putFile(($path)? $path : $this->getPath(), $file, $visibility);
    }

    /**
     * Stores files to specific path with desired name.
     *
     * @param $path
     * @param $file
     * @param $name
     * @param null $visibility
     * @return mixed
     */
    public function storeAs($file, $name, $path, $visibility = null)
    {
        return Storage::putFileAs(($path)? $path : $this->getPath(), $file, $name, $visibility);
    }

    /**
     * Moves the stored file from $from location to $to location.
     *
     * @param $from
     * @param $to
     * @param null $root
     * @return string
     */
    public function move($from, $to, $root = null)
    {
        if (!$this->exists($from, $root)) {
            return false;
        }
        if (!starts_with(trim($from, '/'), $this->getPath())) {
            $from = $this->getPath() . "/$from";
            $to = $this->getPath() . "/$to";
        }

        return Storage::move($from, $to);
    }

    /**
     * Checks if the file exists in the given root or path in the config.
     *
     * @param $path
     * @param null $root
     * @return bool
     */
    public function exists($path, $root = null)
    {
        if (!$root) {
            $root = config('filesystems.disks.public.root');
        }
        $path = trim($path, '/');
        if (!file_exists("$root/$path")) {
            return false;
        }

        return true;
    }
}
