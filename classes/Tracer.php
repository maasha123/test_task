<?php

class Tracer
{
    public static function trace($var)
    {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }

    public static function traceAndExit($var)
    {
        self::trace($var);
        exit;
    }
}