<?php

namespace Antikirra\ArraySort;

final class ArraySort
{
    /**
     * @param array $array
     * @param int $order
     * @param bool $preserveKeys
     * @param bool $byKey
     * @return bool
     */
    public static function sort(&$array, $order = SORT_ASC, $byKey = false, $preserveKeys = false)
    {
        if ($byKey) {
            if ($order === SORT_ASC) {
                ksort($array);
            } elseif ($order === SORT_DESC) {
                krsort($array);
            }
        } else {
            if ($preserveKeys) {
                if ($order === SORT_ASC) {
                    asort($array);
                } elseif ($order === SORT_DESC) {
                    arsort($array);
                }
            } else {
                if ($order === SORT_ASC) {
                    sort($array);
                } elseif ($order === SORT_DESC) {
                    rsort($array);
                }
            }
        }

        return true;
    }
}
