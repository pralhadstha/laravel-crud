<?php

namespace Paladin\Crud\Traits;

/**
 * Class ColumnTrait
 *
 * @package Paladin\Crud\Traits
 */
trait ColumnTrait
{
    /**
     * @var array
     */
    public $columns = [];

    /**
     * @var array
     */
    public $columnCallbacks = [];

    /**
     * Sets the column for the table defined.
     *
     * @param $columns
     * @return $this
     */
    public function setColumns($columns)
    {
        foreach ($columns as $key => $column) {
            if (!is_string($key)) {
                $key = $column;
            }
            $this->columns[$key] = $column;
        }

        return $this;
    }

    /**
     * Gets the columns for the table defined earlier.
     *
     * @return array
     */
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * Set the column callbacks if you would like custom values.
     *
     * @param $callbacks
     * @return $this
     */
    public function setColumnCallbacks($callbacks)
    {
        $this->columnCallbacks = $callbacks;

        return $this;
    }

    /**
     * Get the column value for a particular result.
     *
     * @param $result
     * @param $key
     * @return mixed
     */
    public function getColumnValue($result, $key)
    {
        if (!array_key_exists($key, $this->columnCallbacks)) {
            return $result->{$key};
        }
        $method = $this->columnCallbacks[$key];

        return $method($result, $key);
    }
}
