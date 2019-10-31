<?php

namespace Paladin\Crud\Helpers;

use Carbon\Carbon;

/**
 * Class DateHelper
 * @package Paladin\Crud\Helpers
 */
class DateHelper
{
    const TAX_STARTING_YEAR = 2000;

    /**
     * Returns the array of years from the 2000 or desired year with the extended
     * years after today's year.
     *
     * @param int $extraYears
     * @param null $startingYear
     * @return array
     */
    public static function getDateForDropdown($extraYears = 5, $startingYear = null)
    {
        $runningYear = Carbon::now()->year;

        return range(isset($startingYear) ? $startingYear : self::TAX_STARTING_YEAR, $runningYear + $extraYears);
    }
}
