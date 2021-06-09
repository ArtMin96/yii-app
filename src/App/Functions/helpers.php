<?php

use Carbon\Carbon;

if (! function_exists('carbon')) {
    /**
     * Create a new Carbon instance for the given datetime and/or timezone.
     *
     * @param  \DateTime|string|null $datetime
     * @param  \DateTimeZone|string|null $tz
     * @return Carbon
     */
    function carbon($datetime = null, $tz = null)
    {
        if ($datetime instanceof \DateTime) {
            return Carbon::instance($datetime)->setTimezone($tz);
        }

        return Carbon::parse($datetime, $tz);
    }
}

if (! function_exists('now')) {
    /**
     * Create a new Carbon instance for the current time.
     *
     * @param null $tz
     * @return Carbon
     */
    function now($tz = null)
    {
        return Carbon::now($tz);
    }
}

if (! function_exists('tomorrow')) {
    /**
     * Create a new Carbon instance for tomorrow.
     *
     * @param null $tz
     * @return Carbon
     */
    function tomorrow($tz = null)
    {
        return Carbon::tomorrow($tz);
    }
}

if (! function_exists('yesterday')) {
    /**
     * Create a new Carbon instance for yesterday.
     *
     * @param null $tz
     * @return Carbon
     */
    function yesterday($tz = null)
    {
        return Carbon::yesterday($tz);
    }
}
