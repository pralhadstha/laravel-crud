<?php

namespace Paladin\Crud\Helpers;

/**
 * Class StringHelper
 *
 * @package Paladin\Crud\Helpers
 */
class StringHelper
{
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
    public static function after($subject, $search, $loc = 0)
    {
        if ($search == '') {
            return $subject;
        }
        $stringMethod = ((bool)$loc) ? 'strrpos' : 'strpos';
        $pos = $stringMethod($subject, $search);
        if ($pos === false) {
            return $subject;
        }

        return substr($subject, $pos + strlen($search));
    }
}
