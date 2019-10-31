<?php

namespace Paladin\Crud\Helpers;

/**
 * Class StatusHelper
 * @package Paladin\Crud\Helpers
 */
class CrudHelper
{
    /**
     * @param $field
     * @return int
     */
    public static function isPositiveValue($field)
    {
        $positive_array = ['Enabled', 'Yes', 1, 'Y', 'True'];
        if (in_array($field, $positive_array)) {
            return 1;
        }

        return 0;
    }
}
