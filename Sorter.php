<?php

namespace Antikirra\ArraySort;

final class Sorter
{
    private function __construct()
    {
    }

    /**
     * @return KeySorter
     */
    public static function byKey()
    {
        return KeySorter::make();
    }

    /**
     * @return ValueSorter
     */
    public static function byValue()
    {
        return ValueSorter::make();
    }

    /**
     * @return FunctionSorter
     */
    public static function byFunction(callable $callback)
    {
        return FunctionSorter::make($callback);
    }

    /**
     * @return int
     */
    public static function asc($a, $b)
    {
        if ($a == $b) {
            return 0;
        } else if ($a < $b) {
            return -1;
        } else {
            return 1;
        }
    }

    /**
     * @return int
     */
    public static function desc($a, $b)
    {
        return -self::asc($a, $b);
    }
}
