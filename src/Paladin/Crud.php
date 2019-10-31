<?php
namespace Paladin\Crud;

class Crud {

    use QueryTrait;

    use ColumnTrait;

    /**
     * @var object
     */
    protected $model;

    /**
     * Options Data to send by default as someone could hit to this function.
     *
     * @return null
     */
    public function optionsData()
    {
        return null;
    }
}
