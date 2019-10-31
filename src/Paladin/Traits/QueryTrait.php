<?php

namespace Paladin\Crud\Traits;

/**
 * Class QueryTrait
 * @package Paladin\Crud\Traits
 */
trait QueryTrait
{
    /**
     * @var object
     */
    public $query;

    /**
     * @var null
     */
    public $query_cache = null;

    /**
     * Sets the Query to perform the action.
     *
     * @param $block
     * @return $this
     */
    public function setQueryBlock($block)
    {
        $this->query = is_callable($block)
            ? $block($this->query)
            : $block;

        return $this;
    }

    /**
     * Returns the Result of the Query performed.
     *
     * @return null
     */
    public function getQueryResults()
    {
        if ($this->query_cache) {
            return $this->query_cache;
        }

        return $this->query_cache = $this->query->get();
    }

    /**
     * Returns the total number of item in the Query.
     *
     * @return mixed
     */
    public function getQueryTotal()
    {
        return $this->query_cache->count();
    }
}
