<?php

use \App\Helpers\Str\Stringable;

if (! function_exists('str')) {
    /**
     * @param string $string
     * @return Stringable
     */
    function str($string = '')
    {
        return new Stringable($string);
    }
}